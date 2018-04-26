<template>
  <div>
    <search-input 
      class="min-width-300" 
      v-model="indexCountry"
      v-bind:return-val="false"
      v-bind:options="countryNameList">
    </search-input>
  </div>
</template>

<script>
import countryList    from './lang/en/index'
import languagePack   from './lang/languages.js'

export default {
  name: 'delivery-country',
  props: {
    value: {
      required: true,
    }
  },
  data () {
    return {
      indexCountry: 224,
    }
  },
  computed: {
    countryCodeList() {
      return Object.keys(countryList);
    },
    countryNameList() {
      return this.countryCodeList.map((countryName) => {
        return this.translate(countryName);
      });
    },
    selectedCountryCode() {
      return this.countryCodeList[this.indexCountry];
    }
  },
  watch: {
    indexCountry() {
      this.$emit('input', this.selectedCountryCode);
    }
  },
  messages: languagePack,
}
</script>

<style lang="scss">
  .min-width-300 > input {
    box-sizing: border-box;
    min-width: 260px;
  }
</style>
