<template>
  <div class="cart-checkout">
    <h2 v-lang.title></h2>
    <div class="row">
      <div class="col-xs-3">
        <strong v-lang.sub_total></strong>
      </div>
      <div class="col-xs-offset-6 col-xs-3 sub_total_cost txt-align-r"
           v-lang.sub_total_cost="{price: subTotal}"></div>
    </div>
    <router-link
      type="button"
      tag="button"
      class="button green"
      v-lang.checkout
      v-bind:to="{ name: 'delivery', params: { lang: this.language }}">
    </router-link>
    <div class="row">
      <div class="col-xs-12">
        <strong v-lang.we_accept></strong>
      </div>
      <div class="col-xs-12">
        <img src="./assets/WE_ACCEPT.png" v-bind:alt="this.translate('payment_options')">
      </div>
    </div>
  </div>
</template>

<script>
import languagePack from './lang/languages.js'
import LocalStorage from '../../../../../js/LocalStorage.js'

export default {
  name: 'cart-checkout',
  props: {
    subTotal: {
      required: true,
      type: Number,
    }
  },
  messages: languagePack,
}
</script>

<style lang="scss" scoped>
  @import "../../scss/common.scss";

  .cart-checkout {
    box-sizing: border-box;

    img {
      max-width: 100%;
    }

    .button {
      width: 100%;
      padding: 10px;
      font-size: 18px;
      margin: 10px 0;
    }

    .txt-align-r {
      text-align: right;
    }

    .sub_total_cost {
      font-weight: bold;
    }
  }
</style>