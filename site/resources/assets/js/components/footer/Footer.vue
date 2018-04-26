<template>
  <footer>
    <div class="row">
      <app-logo></app-logo>
      <div class="menu-quick-links">
        <h2 v-lang.menu.title></h2>
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div>
              <router-link v-lang.menu.home v-bind:title="this.translate('menu.home')" v-bind:to="{name: 'home', params: {lang: this.language}}"></router-link>
            </div>
            <div>
              <router-link v-lang.menu.catalog v-bind:title="this.translate('menu.catalog')" v-bind:to="{name: 'catalog', params: {lang: this.language}}"></router-link>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div>
              <router-link v-lang.menu.constructor v-bind:title="this.translate('menu.constructor')" v-bind:to="{name: 'constructor', params: {lang: this.language}}"></router-link>
            </div>
            <div>
              <router-link v-lang.menu.about_us v-bind:title="this.translate('menu.about_us')" v-bind:to="{name: 'about_us', params: {lang: this.language}}"></router-link>
            </div>
          </div>
        </div>
      </div>
      <div class="social-links">
        <h2 v-lang.socialNetworks.title></h2>
        <div>
          <a v-bind:title="this.translate('socialNetworks.facebook')" class="fa-facebook" href="https://facebook.com/" target="_blank"></a>
          <a v-bind:title="this.translate('socialNetworks.youtube')" class="fa-youtube" href="https://www.youtube.com/" target="_blank"></a>
          <a v-bind:title="this.translate('socialNetworks.instagram')" class="fa-instagram" href="https://www.instagram.com/" target="_blank"></a>
        </div>
      </div>
      <div class="our-contacts">
        <h2 v-lang.address.title></h2>
        <ul>
          <li class="fa-map-marker" v-lang.address.our_address></li>
          <li class="fa-phone" v-lang.address.phone></li>
          <li class="fa-envelope" v-lang.address.email></li>
        </ul>
      </div>
    </div>
  </footer>
</template>

<script>


export default {
  name: 'app-footer',
  components: {
 //   'app-logo': Logo
  },
  data () {
    return {
      msg: 'Welcome to page HEADER'
    }
  }
}
</script>

<style src="./scss/footer.scss" lang="scss" scoped></style>
