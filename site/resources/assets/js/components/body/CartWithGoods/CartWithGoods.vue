<template>
  <div>
    <div id="splash-screen">
      <img src="./assets/150514-Trolley-Bags-112.jpg" alt="First slide">
    </div>
    <div class="container">
      <div class="row center-xs" v-if="tshirtList.length > 0">
        <div class="col-xs-12 col-md-8">
          <div class="contents-of-the-cart">
            <h2 v-lang.title></h2>
            <div>
              <t-shirt v-for="(tshirt) in tshirtList"
                       v-bind:tshirt="tshirt"
                       v-bind:key="tshirt.id"
                       v-on:onTShirtRemoval="removeTShirt"
              ></t-shirt>
            </div>
            <div class="sub-total row end-xs">
              <div class="col-xs-5 col-xs-offset-4" v-lang.sub_total></div>
              <div class="col-xs-3" v-lang.sub_total_cost="{price: totalPrice}"></div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-8 col-lg-4">
          <floating-block-in-parent v-bind:top-fixed="100" v-bind:screen-min-width="1200">
            <cart-checkout v-bind:sub-total="totalPrice"></cart-checkout>
          </floating-block-in-parent>
        </div>
      </div>
      <div v-else class="row center-xs">
        <div class="col-xs-12">
          <strong v-lang.your_cart_is_empty></strong>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LocalStorage           from '../../../js/LocalStorage.js'
import languagePack           from './lang/languages.js'

const TShirt = (resolve) => {
  require(['./components/TShirt/TShirt.vue'], resolve);
};

const CartCheckout = (resolve) => {
  require(['./components/CartCheckout/CartCheckout.vue'], resolve);
};

export default {
  name: 'cart-with-goods',
  components: {
    't-shirt': TShirt,
    'cart-checkout': CartCheckout,
  },
  created() {
    let keywords = document.querySelector("meta[name=keywords]");
    let description = document.querySelector("meta[name=description]");

    document.title = this.translate('meta.CartWithGoods.title');
    keywords.content = this.translate('meta.CartWithGoods.keywords');
    description.content = this.translate('meta.CartWithGoods.description');

    this.tshirtList = LocalStorage.readData('Cart');
  },
  data () {
    return {
      tshirtList: [],
    }
  },
  computed: {
    totalPrice() {
      let totalPrice = 0;
      for(let i in this.tshirtList) {
        totalPrice += (this.tshirtList[i].price * this.tshirtList[i].quantity);
      }

      if(this.language == 'uk') {
        return totalPrice * 27;
      }
      return totalPrice;
    },
  },
  methods: {
    removeTShirt(id) {
      for(let i in this.tshirtList) {
        if(this.tshirtList[i].id == id) {
          this.tshirtList.splice(i, 1);
          break;
        }
      }
      this.$snotify.success(this.translate('t_shirt_removed'));
    },
    getNumberOfTShirtsInTheCart() {
      return LocalStorage.readData('Cart').length;
    },
  },
  watch: {
    // при изменении содержимого в корзинке, мы обновляем localStorage
    tshirtList: {
      handler() {
        let tempJsonCart = JSON.stringify(this.tshirtList);
        if(LocalStorage.readData("Cart") != tempJsonCart) {
          LocalStorage.saveData(this.tshirtList, 'Cart');
          this.$root.$emit('onCartUpdated', this.getNumberOfTShirtsInTheCart());
        }
      },
      deep: true
    },
  },
  messages: languagePack,
}
</script>

<style lang="scss" scoped>
  @import "./scss/common.scss";

  .container {
    padding: 0 .5rem;
  }

  .contents-of-the-cart {
    .sub-total {
      font-weight: bold;
    }
  }
</style>