<template>
  <div class="contacts">
    <div class="row middle-xs">
      <div v-bind:class="{'col-xs-6': !edit, 'col-xs-12': edit}">
        <h2 v-lang.customer_data></h2>
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
                name="customer_first_name"
                v-model.trim="customerInfo.first_name">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('customer_first_name')" class="is-danger">
              {{ errors.first('customer_first_name') }}
            </span>
          </div>
        </div>
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.last_name></h3>
            <input type="text" 
                class="input-text" 
                v-validate="'required|alpha_spaces'"
                name="customer_last_name"
                v-model.trim="customerInfo.last_name">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('customer_last_name')" class="is-danger">
              {{ errors.first('customer_last_name') }}
            </span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="row middle-xs center-xs start-md">
          <div class="col-xs-12 col-md-7">
            <h3 v-lang.email></h3>
            <input type="text" 
                class="input-text" 
                placeholder="example@example.com"
                v-validate="'required|email'"
                name="customer_email"
                v-model.trim="customerInfo.email">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('customer_email')" class="is-danger">
              {{ errors.first('customer_email') }}
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
                name="customer_mobile"
                v-model.trim="customerInfo.mobile">
          </div>
          <div class="col-xs-12 col-md-5">
            <span v-show="errors.has('customer_mobile')" class="is-danger">
              {{ errors.first('customer_mobile') }}
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
import languagePack from './lang/languages.js'

export default {
  name: 'customer-data',
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
      customerInfo: {
        first_name: "",
        last_name: "",
        email: "",
        mobile: "",
      }
    }
  },
  mounted() {
    this.$root.$on('checkDataForm', () => {
      this.save();
    });
  },
  watch: {
    customerInfo: {
      handler() {
        this.$emit("input", this.customerInfo);
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
