<template>
  <div class="contacts">
    <h2 v-lang.delivery_service></h2>
    <custom-select
      class="delivery-select" 
      v-model="selectedService.id" 
      v-bind:returnVal="false"
      v-bind:options="deliveryServiceNameList">
    </custom-select>

    <div class="row">
      <div class="col-xs-6" v-lang.cost_of_delivery></div>
      <div class="col-xs-6">
        <span v-show="deliveryPrice == 0" v-lang.free></span>
        <span v-show="deliveryPrice > 0"
              v-lang.cost="{cost: deliveryPrice}">
        </span>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6" v-lang.shipping_time></div>
      <div class="col-xs-6" v-lang.amount_of_days="{day: deliveryTime}">
      </div>
    </div>
    <p v-if="selectedCountry != 'UA'" v-lang.only_working_days></p>
  </div>
</template>

<script>
import languagePack from './lang/languages.js'

export default {
  name: 'delivery-service',
  props: {
    selectedCountry: {
      required: true,
    },
    value:{
      required: true,
    },
  },
  data() {
    return {
      selectedService: {
        id: 0,
        price: 0,
      },
      deliveryService: [
        {
          id: 0,
          name: 'nova_poshta',
          price: 4,
          localPrice: 1,
          localDeliveryTime: 3,
          deliveryTime: 45,
        },
        {
          id: 1,
          name: 'dhl',
          price: 50,
          localPrice: 10,
          localDeliveryTime: 1,
          deliveryTime: 10,
        },
        {
          id: 2,
          name: 'meest_express',
          price: 5,
          localPrice: 1.5,
          localDeliveryTime: 3,
          deliveryTime: 45,
        },
        {
          id: 3,
          name: 'ukrposhta',
          price: 0,
          localPrice: 0.8,
          localDeliveryTime: 7,
          deliveryTime: 60,
        },
      ],
    }
  },
  computed: {
    deliveryServiceNameList() {
      return this.deliveryService.map((deliveryService, i, arr) => {
        return this.translate(deliveryService.name);
      });
    },
    selectedDeliveryService() {
      return this.deliveryService.filter(
        deliveryService => deliveryService.id == this.selectedService.id
      )[0];
    },
    deliveryPrice() {
      let price;

      if(this.selectedCountry == 'UA') {
        price = this.selectedDeliveryService.localPrice;
      } else {
        price = this.selectedDeliveryService.price;
      }
      
      if(this.language == 'uk') {
        price *= 27;
      }

      this.selectedService.price = price;
      return price;
    },
    deliveryTime() {
      let time;

      if(this.selectedCountry == 'UA') {
        time = this.selectedDeliveryService.localDeliveryTime;
      } else {
        time = this.selectedDeliveryService.deliveryTime;
      }

      return time;
    },
  },
  watch: {
    selectedService: {
      handler() {
        this.$emit("input", this.selectedService);
      },
      deep: true,
    },
  },
  mounted() {
    // После монтирования компонента в DOM, передадим родителю начальные данные
    this.$emit("input", this.selectedService);
  },
  messages: languagePack,
}
</script>

<style lang="scss" src="../../scss/common.scss" scoped></style>

<style lang="scss" scoped>
  .delivery-select {
    margin: 10px;
  }
</style>
