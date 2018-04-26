<template>
  <header> 
    <svg-header></svg-header>
    <horizontal-menu></horizontal-menu>
  </header>
</template>

<script>
import SVGHeader   from './components/SVGHeader/SVGHeader.vue'
import HorizontalMenu  from './components/horizontal-menu/horizontal-menu.vue'

export default {
  name: 'app-header',
  components: {
    'horizontal-menu': HorizontalMenu,
    'svg-header': SVGHeader,
  },
}
</script>

<style lang="scss" scoped>
  header {
    margin-bottom: 31%;

    @media screen and (max-width: 960px) {
      margin-bottom: 0;
    }
  }
</style>