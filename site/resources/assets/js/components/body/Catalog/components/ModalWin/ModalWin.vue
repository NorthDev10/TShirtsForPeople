<template>
  <div class="modal-win">{{selected}}{{tshirt.quantity}}
    <custom-select
      :options="tshirtSize"
      v-model="selected.tshirtSize"
    ></custom-select>
  </div>
</template>

<script>
import languagePack           from './lang/languages.js'

export default {
  name: 'modal-win',
  props: {
    tshirt: {
    //  required: true,
  //    type: Object,
    },
    options: {

    },
  },
  data () {
    return {
      selected: {
        tshirtSize: this.tshirt.quantity[0].size,
      }
    }
  },
  methods: {
    searchTShirtBySize() {
      for(let tshirtKey in this.tshirt.quantity) {
        if(this.tshirt.quantity[tshirtKey].size == selected.tshirtSize) {
          return tshirtKey;
        }
      }
    }
  },
  computed: {
    tshirtSize() {
      let sizeList = [];
      for(let tshirt of this.tshirt.quantity) {
        sizeList.push(tshirt.size);
      }
      return sizeList;
    }
  },
  messages: languagePack,
}
</script>

<style lang="scss" scoped>
  .modal-win {
    position: fixed;
    top: 20%;
    left: 50%;
    background: white;
  }
</style>