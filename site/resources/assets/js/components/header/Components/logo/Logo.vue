<template>
  <router-link class="logo" v-bind:title="this.translate('menu.home')" v-bind:to="{name: 'home'}">
    <template v-if="independent">
      <svg xmlns="http://www.w3.org/2000/svg"
           xmlns:xlink="http://www.w3.org/1999/xlink" 
           viewBox="0 0 200.06 82.61"
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
  name: 'app-logo',
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
      default: '200px'
    }
  },
}
</script>

<style lang="scss" scoped>
  a {
    user-select: none;
    cursor: pointer;
  }
</style>