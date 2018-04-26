<template>
  <div class="row t-shirts">
    <div class="center-xs col-xs-12 col-sm-6">
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
    <div class="col-xs-12 col-sm-6">
      <div class="row middle-xs">
        <div class="col-xs-12">
          <strong v-lang.price="{price: getPrice}"></strong>
        </div>
        <div class="col-xs-12">
          {{tshirt.brand}}
        </div>
        <div class="col-xs-12">{{getTShirtSex}}</div>
        <div class="color col-xs-12">{{getColor}}</div>
        <div class="col-xs-12">{{tshirt.size}}</div>
        <div class="col-xs-12">
          <label v-lang.quantity></label>: {{tshirt.quantity}}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import languagePack from './lang/languages.js'

export default {
  name: 'mini-t-shirt',
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
        return this.translate('for_man');
      }
      return this.translate('for_woman');
    },
    getColor() {
      if(typeof this.tshirt.colors == "object") {
        return this.translate('custom_color');
      }
    }
  },
}
</script>

<style lang="scss" scoped>

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

    .color {
      color: #c0c0c0;
    }
  }

  .t-shirts:last-child {
    border-bottom: none;
  }
</style>