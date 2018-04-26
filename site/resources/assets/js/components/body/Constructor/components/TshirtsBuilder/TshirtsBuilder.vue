<template>
  <form @submit.prevent="validateBeforeSubmit" class="t-shirts-builder">
    <h1 v-lang.title></h1>
    <div class="row center-xs">
      <div class="col-xs-12 col-md-4 preview">
        <floating-block-in-parent v-bind:top-fixed="100" v-bind:screen-min-width="1025">
          <t-shirt-preview 
            v-on:selectedPiece="selectedPiece"
            v-bind:tshirtSex="tshirtOptions.tshirtSex"
            v-bind:colorList="tshirtOptions.colors">
              <h3 v-lang.tshirtsBuilder.order_total="{cost: computePrice}"></h3>
              <p v-lang.tshirtsBuilder.free_shipping></p>
          </t-shirt-preview>
        </floating-block-in-parent>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-4 fields">
        <div v-bind:class="{'hide-picker': visibleColorPickers.base_color}">
          <label v-lang.base_color></label>
          <slider-picker v-model="tshirtOptions.colors.base" />
        </div>
        <div v-bind:class="{'hide-picker': visibleColorPickers.seam_color}">
          <label v-lang.seam_color></label>
          <slider-picker v-model="tshirtOptions.colors.belt" />
        </div>
        <div v-bind:class="{'hide-picker': visibleColorPickers.collar_color}">
          <label v-lang.collar_color></label>
          <slider-picker v-model="tshirtOptions.colors.neck" />
        </div>
        <div v-bind:class="{'hide-picker': visibleColorPickers.color_right_sleeve}">
          <label v-lang.color_right_sleeve></label>
          <slider-picker v-model="tshirtOptions.colors.sleevesR" />
        </div>
        <div v-bind:class="{'hide-picker': visibleColorPickers.color_seam_left_sleeve}">
          <label v-lang.color_seam_left_sleeve></label>
          <slider-picker v-model="tshirtOptions.colors.sleevesSeamL" />
        </div>
        <div v-bind:class="{'hide-picker': visibleColorPickers.color_seam_right_sleeve}">
          <label v-lang.color_seam_right_sleeve></label>
          <slider-picker v-model="tshirtOptions.colors.sleevesSeamR" />
        </div>
        <div v-bind:class="{'hide-picker': visibleColorPickers.color_left_sleeve}">
          <label v-lang.color_left_sleeve></label>
          <slider-picker v-model="tshirtOptions.colors.sleevesL" />
        </div>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-4 col-md-offset-4 col-lg-offset-0 fields">
        <div>
          <custom-select 
              v-model="tshirtOptions.tshirtSex"
              v-bind:return-val="false"
              v-bind:options="optionsTshirtSex"></custom-select>
        </div>
        <div>
          <label v-lang.tshirtsBuilder.size></label>
          <custom-select 
            v-model="tshirtOptions.size"
            v-bind:options="optionsSize"></custom-select>
        </div>
        <div>
          <label v-lang.amount></label>
          <div class="product-quantity-info d-flex flex-row">
            <button type="button" v-on:click="quantityDecrease()" class="button orange quantity-btn">-</button>
            <input class="input-text"
                   type="text"
                   name="amount"
                   v-validate="'required|min_value:1'"
                   v-on:keypress="inputFiltering"
                   v-model.number="tshirtOptions.quantity">
            <button type="button" v-on:click="quantityIncrease()" class="button orange quantity-btn">+</button>
            <i v-show="errors.has('tshirtOptions.quantity')" class="fa fa-warning"></i>
            <span v-show="errors.has('tshirtOptions.quantity')" class="help is-danger">{{ errors.first('tshirtOptions.quantity') }}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row center-xs">
      <div class="col-xs-12">
        <div>
          <button type="submit" class="button orange" v-lang.add_to_cart></button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import LocalStorage           from '../../../../../js/LocalStorage.js'
import CreateSvgUrl           from './js/CreateSvgUrl.js'
import languagePack           from './lang/languages.js'
import { Slider }             from 'vue-color' // Color Pickers

export default {
  name: 't-shirts-builder',
  components: {
    'slider-picker': Slider,
  },
  data() {
    return {
      tshirtOptions: {
        id: undefined,
        imgURL: undefined,
        tshirtSex: 0,
        brand: '',
        size: 'M',
        quantity: 1,
        price: 4,
        colors: {
          base: {hex: 'orange'},
          belt: {hex: 'yellow'},
          neck: {hex: 'yellow'},
          sleevesL: {hex: 'dodgerblue'},
          sleevesR: {hex: 'dodgerblue'},
          sleevesSeamL: {hex: 'yellow'},
          sleevesSeamR: {hex: 'yellow'},
        },
      },
      visibleColorPickers: {
        base_color: false,
        seam_color: true,
        collar_color: true,
        color_right_sleeve: true,
        color_seam_left_sleeve: true,
        color_seam_right_sleeve: true,
        color_left_sleeve: true,
      },
      optionsSize: [
        'XS',
        'S',
        'M',
        'L',
        'XL',
        '2XL',
      ],
    }
  },
  methods: {
    selectedPiece(value) { // в моб. версии отображается только выбранный ColorPicker
      for(let colorPicker in this.visibleColorPickers) {
        this.visibleColorPickers[colorPicker] = true;
      }
      this.visibleColorPickers[value] = false;
    },
    quantityIncrease() {
      this.tshirtOptions.quantity++;
    },
    quantityDecrease() {
      if(this.tshirtOptions.quantity > 1) {
        this.tshirtOptions.quantity--;
      }
    },
    inputFiltering(event) {
      if(event.key < '0' || event.key > '9') {
        event.preventDefault();
      }
    },
    validateBeforeSubmit() {
      this.$validator.validateAll().then((result) => {
        if(!result) {
          this.$snotify.info(this.$validator.errors.first("amount"));
          return;
        }
        this._addToCart();
      });
    },
    _addToCart() {
      this.tshirtOptions.brand = 'DIY';
      this.tshirtOptions.imgURL = CreateSvgUrl.getSVGUrl(".t-shirts-builder svg");
      LocalStorage.addObj(this.tshirtOptions, 'Cart');
      this.$root.$emit('onCartUpdated', this.getNumberOfTShirtsInTheCart());
    },
    getNumberOfTShirtsInTheCart() {
      return LocalStorage.readData('Cart').length;
    }
  },
  computed: {
    optionsTshirtSex() {
      return [
        this.translate('for_woman'),
        this.translate('for_man')
      ]
    },
    computePrice() {
      // цена рассчитывается от количества цветов, используемой в футболке
      let uniqueСolorList = new Set();

      for(let key in this.tshirtOptions.colors) {
        uniqueСolorList.add(this.tshirtOptions.colors[key].hex);
      }
      // минимальная цена футболки 5$
      let price = (4 + uniqueСolorList.size) * this.tshirtOptions.quantity;

      this.tshirtOptions.price = price;

      if(this.language == 'uk') {
        return price * 27;
      }
      return price;
    },
  },
  messages: languagePack,
  created() {
    this.$validator.localize('uk', {
      attributes: {
        amount: 'Kількість',
      }
    });
  }
}
</script>

<style lang="scss" scoped>
  .t-shirts-builder {
    padding: 10px;

  @media screen and (max-width: 1024px) {
    .hide-picker {
      display: none!important;
    }
  }

    h1 {
      margin: 0 20px 25px;
    }

    .preview {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: start;

      & > * {
        margin-bottom: 7px;
      }
    }

    .fields > div {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 25px 0;

      label {
        margin: 12px;
      }
    }

    .input-text {
      text-align: center;
      width: 50px;
      font-size: 28px;
    }

    .quantity-btn {
      font-weight: normal;
      font-size: 30px;
    }
  }
</style>
