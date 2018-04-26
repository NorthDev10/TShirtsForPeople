<template>
  <div>
    <div id="splash-screen">
      <img src="./assets/shipping_and_payment.jpg" alt="First slide">
    </div>
    <div class="container-fluid">
      <form v-on:submit.prevent="submit()">
        <div class="row center-xs" v-if="tshirtList.length > 0">
          <div class="col-xs-12 col-md-6">
            <h1 v-lang.title></h1>
            <customer-data 
              v-model="customerInfo" 
              v-bind:edit="formVisibleList.customerInfo" 
              v-on:checkInput="checkForm('customerInfo', $event)">
                <button type="button" 
                  class="button green" 
                  v-show="!formVisibleList.customerInfo"
                  v-on:click="toggleForm('customerInfo')"
                  v-lang.edit_btn>
                </button>
            </customer-data>
            <delivery-address 
              v-model="deliveryInfo"
              v-bind:edit="formVisibleList.deliveryInfo" 
              v-on:checkInput="checkForm('deliveryInfo', $event)">
              <button type="button" 
                class="button green" 
                v-show="!formVisibleList.deliveryInfo"
                v-on:click="toggleForm('deliveryInfo')"
                v-lang.edit_btn>
              </button>
            </delivery-address>
            <delivery-service 
              v-bind:selectedCountry="deliveryInfo.country" 
              v-model="deliveryService">
            </delivery-service>
            <choice-payment 
              v-model="paymentDetails" 
              v-bind:edit="formVisibleList.paymentDetails" 
              v-on:checkInput="checkForm('paymentDetails', $event)">
              <button type="button" 
                class="button green" 
                v-show="!formVisibleList.paymentDetails"
                v-on:click="toggleForm('paymentDetails')"
                v-lang.edit_btn>
              </button>
            </choice-payment>
          </div>
          <div class="col-xs-12 col-md-4">
            <summary-cost 
              v-bind:costOfDelivery="deliveryService.price"
              v-bind:tshirtList="tshirtList">
            </summary-cost>
          </div>
        </div>
        <div v-else class="row center-xs">
          <div class="col-xs-12">
            <strong v-lang.your_cart_is_empty></strong>
          </div>
        </div>
        <div class="row center-xs">
          <div class="col-xs-12 col-md-6 field-btn">
            <button type="submit" class="button green" v-lang.place_order></button>
          </div>
          <div class="col-md-4"></div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios            from 'axios'
import LocalStorage     from '../../../js/LocalStorage.js'
import languagePack     from './lang/languages.js'

const SummaryCost = (resolve) => {
  require(['./components/SummaryCost/SummaryCost.vue'], resolve);
};

const CustomerData = (resolve) => {
  require(['./components/CustomerData/CustomerData.vue'], resolve);
};

const DeliveryAddress = (resolve) => {
  require(['./components/DeliveryAddress/DeliveryAddress.vue'], resolve);
};

const DeliveryService = (resolve) => {
  require(['./components/DeliveryService/DeliveryService.vue'], resolve);
};

const ChoicePayment = (resolve) => {
  require(['./components/ChoicePayment/ChoicePayment.vue'], resolve);
};

export default {
  name: 'delivery',
  created() {
    let keywords = document.querySelector("meta[name=keywords]");
    let description = document.querySelector("meta[name=description]");

    document.title = this.translate('meta.Delivery.title');
    keywords.content = this.translate('meta.Delivery.keywords');
    description.content = this.translate('meta.Delivery.description');

    this.tshirtList = LocalStorage.readData('Cart');
    //this.delivery = LocalStorage.readData('Delivery');
  },
  components: {
    'summary-cost': SummaryCost,
    'customer-data': CustomerData,
    'delivery-address': DeliveryAddress,
    'choice-payment': ChoicePayment,
    'delivery-service': DeliveryService,
  },
  data () {
    return {
      selectedDelivery: 0,
      tshirtList: [],
      customerInfo: {},
      deliveryInfo: {},
      deliveryService: {
        id: 0,
        price: 0,
      },
      paymentDetails: {},
      checkInputList: {
        customerInfo: false,
        deliveryInfo: false,
        paymentDetails: false,
      },
      formVisibleList: {
        customerInfo: true,
        deliveryInfo: false,
        paymentDetails: false,
      },
    }
  },
  methods: {
    submit() {
      // Проверяем, заполнен ли правильно компонент 
      for(let checkInput in this.checkInputList) {
        if(this.checkInputList[checkInput] == false) {
          this.$snotify.info(this.translate('check_data'));
          this.$root.$emit('checkDataForm'); // Проверяем данные во всех формах
          return false;
        }
      }
      this.placeOrder();
    },
    placeOrder() {
      axios.post('/api/v1.0/place-order', {
        tshirtList: this.tshirtList,
        customerInfo: this.customerInfo,
        deliveryInfo: this.deliveryInfo,
        deliveryService: this.deliveryService,
        paymentDetails: this.paymentDetails,
      })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    checkForm(key, val) {
      // скрываем форму, если она прошла валидацию
      this.formVisibleList[key] = !val;
      this.checkInputList[key] = val; // сохраняем статус валидации формы
    },
    toggleForm(key) {
      for(let formVisible in this.formVisibleList) {
        if(formVisible == key) {
          this.formVisibleList[formVisible] = true;
        } else {
          this.formVisibleList[formVisible] = false;
        }
      }
    },
  },
  messages: languagePack,
}
</script>

<style lang="scss" src="./scss/common.scss" scoped></style>

<style lang="scss" scoped>
  .container-fluid {
    padding-top: 10px;
  }

 .field-btn {
    padding: 5px 20px;
  }

  button[type=submit] {
    width: 100%;
    font-size: 18px;
    padding: 10px 0;
  }
</style>
