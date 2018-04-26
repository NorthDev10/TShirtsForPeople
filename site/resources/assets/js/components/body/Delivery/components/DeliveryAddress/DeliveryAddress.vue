<template>
  <div class="contacts">
    <div class="row middle-xs">
      <div v-bind:class="{'col-xs-6': !edit, 'col-xs-12': edit}">
        <h2 v-lang.delivery_address></h2>
      </div>
      <div class="txt-right" v-bind:class="{'col-xs-6': !edit, 'col-xs-12': edit}">
        <slot></slot>
      </div>
    </div>
    <div v-show="edit" class="row">
      <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.first_name></h3>
            <input type="text" 
              class="input-text" 
              v-validate="'required|alpha_spaces'"
              name="first_name"
              v-model.trim="deliveryInfo.first_name">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('first_name')" class="is-danger">
              {{ errors.first('first_name') }}
            </span>
          </div>
        </div>
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.last_name></h3>
            <input type="text" 
              class="input-text" 
              v-validate="'required|alpha_spaces'"
              name="last_name"
              v-model.trim="deliveryInfo.last_name">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('last_name')" class="is-danger">
              {{ errors.first('last_name') }}
            </span>
          </div>
        </div>
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.mobile></h3>
            <input type="text" 
              class="input-text" 
              v-validate="{ required: true, regex: /^(\+[0-9]+)$/ }"
              placeholder="+380"
              name="mobile"
              v-model.trim="deliveryInfo.mobile">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('mobile')" class="is-danger">
              {{ errors.first('mobile') }}
            </span>
          </div>
        </div>
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.address></h3>
            <p>
              <input type="text" 
              class="input-text" 
              v-validate="'required'"
              name="address"
              v-model.trim="deliveryInfo.address">
            </p>
            <p>
              <input type="text" 
              class="input-text" 
              v-bind:placeholder="this.translate('optional')"
              v-model.trim="deliveryInfo.optional_address">
            </p>
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('address')" class="is-danger">
              {{ errors.first('address') }}
            </span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.country></h3>
            <delivery-country 
              v-validate="'required|alpha|min:2'"
              name="country"
              v-model="deliveryInfo.country">
            </delivery-country>
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('country')" class="is-danger">
              {{ errors.first('country') }}
            </span>
          </div>
        </div>
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.state></h3>
            <input type="text" 
              class="input-text" 
              v-validate="'required|alpha_spaces'"
              name="state"
              v-model.trim="deliveryInfo.state">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('state')" class="is-danger">
              {{ errors.first('state') }}
            </span>
          </div>
        </div>
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.city></h3>
            <input type="text" 
              class="input-text" 
              v-validate="'required|alpha_spaces'"
              name="city"
              v-model.trim="deliveryInfo.city">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('city')" class="is-danger">
              {{ errors.first('city') }}
            </span>
          </div>
        </div>
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.postcode></h3>
            <input type="text" 
              class="input-text" 
              v-validate="'required|numeric'"
              name="postcode"
              v-model.trim="deliveryInfo.postcode">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('postcode')" class="is-danger">
              {{ errors.first('postcode') }}
            </span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 txt-align">
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
import languagePack     from './lang/languages.js'
import DeliveryCountry  from './components/DeliveryCountry/DeliveryCountry.vue'

export default {
  name: 'delivery-address',
  props: {
    value:{
      required: true,
    },
    validation: {
      default() {
        return ''
      }
    },
    edit: {
      default: true,
    }
  },
  components: {
    'delivery-country': DeliveryCountry,
  },
  created() {// передаём языковый пакет для локализации полей
    this.$validator.localize(languagePack);
    this.$root.$on('checkDataForm', () => {
      this.save();
    });
  },
  data() {
    return {
      deliveryInfo: {
        country: "UA",
        first_name: "",
        last_name: "",
        mobile: "",
        address: "",
        optional_address: "",
        city: "",
        postcode: "",
      }
    }
  },
  watch: {
    deliveryInfo: {
      handler() {
        this.$emit("input", this.deliveryInfo);
      },
      deep: true,
    },
  },
  methods: {
    save() {
      this.$validator.validateAll().then((result) => {
        this.$emit("checkInput", result);
      });
    }
  },
  messages: languagePack,
}
</script>

<style lang="scss" src="../../scss/common.scss" scoped></style>