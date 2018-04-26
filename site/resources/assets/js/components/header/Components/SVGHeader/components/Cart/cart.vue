<template>
  <router-link class="cart" v-bind:title="this.translate('menu.cart')" v-bind:to="{name: 'CartWithGoods', params: {lang: this.language}}">
    <template v-if="independent">
      <svg xmlns="http://www.w3.org/2000/svg"
           xmlns:xlink="http://www.w3.org/1999/xlink" 
           viewBox="0 0 137.83 116.27" 
           v-bind:width="w">
        <svg-body v-bind:x="x" v-bind:y="y"></svg-body>
      </svg>
    </template>
    <template v-else>
      <svg-body v-bind:x="x" v-bind:y="y"></svg-body>
    </template>
  </router-link>
</template>

<script>
import svgBody from './svg-body.vue'

export default {
  name: 'svg-cart',
  components: {
    svgBody
  },
  props: {
    independent: {
      default: true,
      type: Boolean,
    },
    x: {
      default: 0,
      type: Number,
    },
    y: {
      default: 0,
      type: Number,
    },
    w: {
      default: '60px'
    }
  },
}
</script>

<style lang="scss" scoped>
  a {
    cursor: pointer;
  }
</style>