<template>
  <div class="wrapper">
    <div class="content">
      <app-header></app-header>
      <router-view></router-view>
    </div>
    <app-footer></app-footer>
    <vue-snotify></vue-snotify>
  </div>
</template>

<script>
import Header          from './components/header/Header.vue'
import Footer          from './components/footer/Footer.vue'

export default {
  name: 'app',
  components: {
    'app-header': Header,
    'app-footer': Footer
  },
}
</script>

<style lang="scss">
  @import "~flexboxgrid/dist/flexboxgrid.min.css";
  @import "../scss/app.scss";
  @import "~vue-snotify/styles/material";
  @import '~swiper/dist/css/swiper.css';
</style>