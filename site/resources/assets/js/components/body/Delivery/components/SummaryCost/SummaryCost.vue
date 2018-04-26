<template>
  <floating-block-in-parent class="cart-items" 
            v-bind:top-fixed="80"
            v-bind:screen-min-width="1024">
    <div class="row middle-xs items">
      <div class="col-xs-9">
        <h2 v-lang.total_tshirts="{number: totalTShirts}"></h2>
      </div>
      <div class="col-xs-3 edit-items">
        <router-link 
          class="fa-edit"
          v-bind:to="{ name: 'CartWithGoods', params: { lang: this.language }}"
          v-bind:title="this.translate('edit')">
        </router-link>
      </div>
    </div>
    <div class="overflow">
      <mini-t-shirt v-for="(tshirt, key) in tshirtList"
                    v-bind:tshirt="tshirt"
                    v-bind:key="key"
      ></mini-t-shirt>
    </div>
    <div class="row total">
      <div class="col-xs-8" v-lang.subtotal></div>
      <div class="col-xs-4 total-price" v-lang.cost="{cost: costOfTShirts}"></div>
    </div>
    <div class="row">
      <div class="col-xs-8" v-lang.delivery></div>
      <div class="col-xs-4 total-price" v-lang.cost="{cost: costOfDelivery}"></div>
    </div>
    <div class="row">
      <div class="col-xs-8">
        <strong v-lang.total_to_pay></strong>
      </div>
      <div class="col-xs-4 total-price">
        <strong v-lang.cost="{cost: totalPrice}"></strong>
      </div>
    </div>
  </floating-block-in-parent>
</template>

<script>
import languagePack     from './lang/languages.js'
import MiniTShirt       from './components/MiniTShirt/MiniTShirt.vue'

export default {
  name: 'summary-cost',
  components: {
    'mini-t-shirt': MiniTShirt,
  },
  props: {
    costOfDelivery: {
      required: true,
      type: Number,
    },
    tshirtList: {
      required: true,
      type: Array,
    }
  },
  data () {
    return {
      
    }
  },
  computed: {
    costOfTShirts() {
      let totalPrice = this.tshirtList.reduce((sum, current) => {
        return sum + Number(current.price) * Number(current.quantity);
      }, 0);

      if(this.language == 'uk') {
        return totalPrice * 27;
      }
      return totalPrice;
    },
    totalPrice() {
      return this.costOfTShirts + this.costOfDelivery;
    },
    totalTShirts() {
      return this.tshirtList.reduce((sum, current) => {
        return sum + Number(current.quantity);
      }, 0);
    },
  },
  messages: languagePack,
}
</script>

<style lang="scss" scoped>
  @import "~fontawesome-scss/fontAwesome.scss";

  .overflow {
    overflow-y: auto;
    height: 300px;
  }

  .cart-items {
    box-shadow: 0 0 3px grey;
    padding: 8px;
    margin-bottom: 12px;
    text-align: left;

    .total {
      margin-top: 10px;
      padding-top: 10px;
      border-top: 1px solid #eee;
    }

    .items {
      margin-bottom: 12px;
      border-bottom: 1px solid #eee;
    }

    h2 {
      text-transform: uppercase;
      color: #2d2d2d;
    }

    h2, a {
      padding: 12px 0;
      color: #2d2d2d;
    }

    .row > div {
      padding-bottom: 10px;
    }
  }

  .cart-items {
    box-sizing: border-box;

    .edit-items a {
      padding: 12px;
    }

    .edit-items, .total-price {
      text-align: right;
    }
  }

  .fa-edit {
    @include fa($fa-edit, black, 7px);

    &:hover {
      opacity: .7;
    }
  }
</style>