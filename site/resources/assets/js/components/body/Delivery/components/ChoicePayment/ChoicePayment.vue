<template>
  <div class="contacts">
    <div class="row middle-xs">
      <div v-bind:class="{'col-xs-6': !edit, 'col-xs-12': edit}">
        <h2 v-lang.payment_type></h2>
      </div>
      <div class="txt-right" v-bind:class="{'col-xs-6': !edit, 'col-xs-12': edit}">
        <slot></slot>
      </div>
    </div>
    <div v-show="edit">
      <div class="row center-xs">
        <div class="col-xs-12">
          <button class="button orange" 
                  type="button"
                  v-on:click="paymentDetails.payment_type = 'card'" 
                  v-lang.credit_card
                  v-bind:class="{'active-orange-btn': paymentDetails.payment_type == 'card'}">
          </button>
          <button class="button orange" 
                  type="button"
                  v-on:click="paymentDetails.payment_type = 'paypal'" 
                  v-bind:class="{'active-orange-btn': paymentDetails.payment_type == 'paypal'}"
                  v-lang.pay_pal>
          </button>
        </div>
      </div>
      <div class="row" v-show="paymentDetails.payment_type == 'card'">
        <div class="col-xs-12 col-sm-6 col-md-12">
          <div class="row middle-xs center-xs start-md">
            <div class="col-xs-12 col-md-7">
              <h3 v-lang.card_number></h3>
              <input type="text" 
                    class="input-text" 
                    v-validate="'required|credit_card'"
                    name="card_number"
                    v-model.trim="paymentDetails.cardDetails.cardNumber">
            </div>
            <div class="col-xs-12 col-md-5">
              <span v-show="errors.has('card_number')" class="is-danger">
                {{ errors.first('card_number') }}
              </span>
            </div>
          </div>
          <div class="row middle-xs center-xs start-md">
            <div class="col-xs-12 col-md-7">
              <h3 v-lang.expiry_date></h3>
              <input type="text" 
                    class="input-text expiry-date" 
                    v-bind:placeholder="translate('month')" 
                    v-validate="'required|date_format:MM'" 
                    v-on:keyup="nextField($event, 2)" 
                    name="expiry_date_m" 
                    v-model.trim="paymentDetails.cardDetails.expiryDateM">
              <input type="text" 
                    class="input-text expiry-date" 
                    v-bind:placeholder="translate('year')"
                    v-validate="'required|date_format:YY'"
                    name="expiry_date_y"
                    v-model.trim="paymentDetails.cardDetails.expiryDateY">
            </div>
            <div class="col-xs-12 col-md-5">
              <p>
                <span v-show="errors.has('expiry_date_m')" class="is-danger">
                  {{ errors.first('expiry_date_m') }}
                </span>
              </p>
              <p>
                <span v-show="errors.has('expiry_date_y')" class="is-danger">
                  {{ errors.first('expiry_date_y') }}
                </span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-12">
          <div class="row middle-xs center-xs start-md">
            <div class="col-xs-12 col-md-7">
              <h3 v-lang.name_on_card></h3>
              <input type="text" 
                    class="input-text" 
                    v-validate="'required|alpha_spaces'"
                    name="name_on_card"
                    v-model.trim="paymentDetails.cardDetails.nameOnCard">
            </div>
            <div class="col-xs-12 col-md-5">
              <span v-show="errors.has('name_on_card')" class="is-danger">
                {{ errors.first('name_on_card') }}
              </span>
            </div>
          </div>
          <div class="row middle-xs center-xs start-md">
            <div class="col-xs-12 col-md-7">
              <h3 v-lang.cvv></h3>
              <input type="text" 
                    class="input-text cvv" 
                    v-validate="'required|digits:3'"
                    name="cvv"
                    v-model.trim="paymentDetails.cardDetails.cvv">
            </div>
            <div class="col-xs-12 col-md-5">
              <span v-show="errors.has('cvv')" class="is-danger">
                {{ errors.first('cvv') }}
              </span>
            </div>
          </div>
        </div>
        <div class="col-xs-12">
          <custom-checkbox 
            v-bind:title="translate('save_card_details')"
            v-model="paymentDetails.cardDetails.saveCardDetails">
          </custom-checkbox>
        </div>
      </div>
      <div v-show="paymentDetails.payment_type == 'paypal'" class="row center-xs">
        <div class="col-xs-12">
          <p>
            <a target="_blank" 
              v-bind:title="translate('pay_by_paypal')" 
              href="https://www.paypal.com/us/home">
                <img width="200px"
                  src="./assets/paypal-express-checkout-logo.png" 
                  v-bind:alt="translate('pay_by_paypal')">
            </a>
          </p>
          <p v-lang.about_paypal class="text-justify"></p>
        </div>
      </div>
      <div class="txt-align">
        <button type="button" 
                class="button blue" 
                v-on:click="save()" 
                v-lang.save_btn>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import languagePack from './lang/languages.js'

export default {
  name: 'choice-payment',
  props: {
    value: {
      required: true,
    },
    edit: {// Флаг указывающий, что данное поле редактируется
      default: true,
    }
  },
  data() {
    return {
      paymentDetails: {
        payment_type: 'card',
        cardDetails: {
          cardNumber: "",
          expiryDateM: "",
          expiryDateY: "",
          nameOnCard: "",
          cvv: "",
          saveCardDetails: false,
        },
      },
    }
  },
  watch: {
    paymentDetails: {
      handler() {
        this.$emit("input", this.paymentDetails);
      },
      deep: true,
    },
  },
  mounted() {
    // После монтирования компонента в DOM, передадим родителю начальные данные
    this.$emit("input", this.paymentDetails);
    this.$root.$on('checkDataForm', () => {
      this.save();
    });
  },
  methods: {
    save() {
      if(this.paymentDetails.payment_type != 'paypal') {
        this.$validator.validateAll().then((result) => {
          this.$emit("checkInput", result);
        });
      } else {
        this.$emit("checkInput", true);
      }
    },
    nextField(el, length) {
      if(el.target.value.length >= length) {
        el.target.nextElementSibling.focus();
      }
    },
  },
  messages: languagePack,
}
</script>

<style lang="scss" src="../../scss/common.scss" scoped></style>

<style lang="scss" scoped>
  .delivery-select {
    margin: 10px;
  }

  .text-justify {
    text-align: justify;
  }

  .expiry-date, .cvv {
    width: 50px!important;
  }
</style>
