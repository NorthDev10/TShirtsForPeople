<template>
  <div class="row t-shirts">
    <div class="col-xs-1 col-xs-offset-11 center-xs">
      <span class="remove" v-on:click="removeTShirt"></span>
    </div>
    <div class="center-xs col-xs-12 col-sm-2">
       <t-shirt-preview 
        v-if="typeof this.tshirt.colors == 'object'"
        v-bind:previewWidth="100" 
        v-bind:tshirtSex="tshirt.tshirtSex"
        v-bind:colorList="tshirt.colors">
      </t-shirt-preview>
      <img v-else
           v-bind:src="tshirt.imgURL"
           v-bind:alt="tshirt.brand">
    </div>
    <div class="col-xs-12 col-sm-10">
      <div class="row middle-xs">
        <div class="col-xs-12">
          <strong v-lang.price="{price: getPrice}"></strong>
        </div>
        <div class="col-xs-12">
          {{tshirt.brand}}
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3">{{getTShirtSex}}</div>
        <div class="color col-xs-12 col-sm-6 col-lg-3">{{getColor}}</div>
        <div class="col-xs-12 col-sm-6 col-lg-3">
          <custom-select 
            v-model="tshirt.size"
            v-bind:return-val="true"
            v-bind:options="optionsSize"></custom-select>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3">
          <label v-lang.quantity></label>
          <input 
            type="number"
            class="input-text" 
            v-on:keypress="inputFiltering"
            v-model="tshirt.quantity" 
            min="1">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import languagePack           from './lang/languages.js'

export default {
  name: 't-shirt',
  props: {
    tshirt: {
      required: true,
      type: Object,
    },
  },
  data () {
    return {
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
    removeTShirt() {
      return new Promise((resolve, reject) => {
        let toast = this.$snotify.confirm(
          this.translate('remove_t_shirt'),
          this.translate('confirm_the_action'), {
            timeout: 5000,
            showProgressBar: true,
            closeOnClick: false,
            pauseOnHover: true,
            buttons: [
              {
                text: this.translate('yes'),
                action: (toast) => {
                  this.$emit('onTShirtRemoval', this.tshirt.id);
                  this.$snotify.remove(toast.id);
                  resolve(true);
                },
              },
              {
                text: this.translate('no'),
                action: (toast) => {
                  this.$snotify.remove(toast.id);
                  resolve(false);
                },
              }
            ]
          }
        );
        toast.on("destroyed", (toast) => {
          resolve(false);
        });
      });
    },
    inputFiltering(event) {
      if(event.key < '0' || event.key > '9') {
        event.preventDefault();
      }
    },
  },
  messages: languagePack,
  computed: {
    getPrice() {
      if(this.language == 'uk') {
        return this.tshirt.price * 27 * this.tshirt.quantity;
      }
      return this.tshirt.price * this.tshirt.quantity;
    },
    getTShirtSex() {
      if(this.tshirt.tshirtSex) {
        return this.translate('for_man')
      }
      return this.translate('for_woman');
    },
    getColor() {
      if(typeof this.tshirt.colors == "object") {
        return this.translate('custom_color');
      }
    }
  },
  watch: {
    'tshirt.quantity': function(newVal, oldVal) {
      if(newVal == 0) {
        this.removeTShirt().then((confirmation) => {
          if(!confirmation) {
            this.tshirt.quantity = oldVal;
          }
        });
      }
    }
  }
}
</script>

<style lang="scss" scoped>
  @import "~fontawesome-scss/fontAwesome.scss";

  .t-shirts {
    border-bottom: 1px solid #eee;
    margin: 12px;
    padding-bottom: 12px;
    color: #2d2d2d;

    .row > div {
      padding-bottom: 10px;
    }

    img {
      max-width: 100px;
    }

    .input-text {
      width: 50px;
    }

    .remove {
      cursor: pointer;
      @include fa($fa-times, 'red', 20pt);
      background-repeat: no-repeat;

      &:hover {//%23 это # для Firefox
        @include fa($fa-times, '%23c1272d', 20pt);
      }
    }

    label {
      padding: 5px;
    }

    .color {
      color: #c0c0c0;
    }
  }

  .t-shirts:last-child {
    border-bottom: none;
  }
</style>