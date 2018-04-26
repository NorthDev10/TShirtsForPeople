<template>
  <nav class="horizontal-menu"
       v-bind:class="{'show-horizontal-menu' : showHorizontalMenu}">
    <div class="list-items" v-bind:class="{ active: !stateMenu }">
      <svg-burger-menu v-model="stateMenu"></svg-burger-menu>
      <div class="cart-flag">
        <svg-cart></svg-cart>
        <router-link class="select-lang" 
            v-bind:title="this.translate('menu.choice_lang')" 
            v-bind:to="{params: {lang: this.language == 'uk'?'en':'uk'}}">
          <template v-if="this.language == 'uk'? true : false">
            <img src="./assets/flag_of_usa.png" alt="Flag of USA">
            <span v-lang.menu.choice_lang></span>
          </template>
          <template v-else>
            <img src="./assets/flag_of_ukraine.png" alt="Flag of Ukraine">
            <span v-lang.menu.choice_lang></span>
          </template>
        </router-link>
      </div>
    </div>
    <div class="links" v-on:click="stateMenu = true" >
      <router-link 
        v-lang.menu.home
        v-bind:title="this.translate('menu.home')"
        v-bind:to="{name: 'home', params: {lang: this.language}}">
      </router-link>
      <router-link 
        v-lang.menu.catalog
        v-bind:title="this.translate('menu.catalog')"
        v-bind:to="{name: 'catalog', params: {lang: this.language}}">
      </router-link>
      <router-link 
        v-lang.menu.constructor 
        v-bind:title="this.translate('menu.constructor')" 
        v-bind:to="{name: 'constructor', params: {lang: this.language}}">
      </router-link>
      <router-link 
        v-lang.menu.about_us 
        v-bind:title="this.translate('menu.about_us')" 
        v-bind:to="{name: 'about_us', params: {lang: this.language}}">
      </router-link>
    </div>
  </nav>
</template>

<script>
import BurgerMenu from './components/svg-burger-menu.vue'

export default {
  name: 'horizontal-menu',
  data() {
    return {
      stateMenu: true,
      showHorizontalMenu: false,
    }
  },
  components: {
    'svg-burger-menu': BurgerMenu,
  },
  methods: {
    handleScroll() {
      this.showHorizontalMenu = window.scrollY > 300;
    },
  },
  beforeMount() {
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
  },
}
</script>

<style lang="scss" src="./scss/style.scss" scoped></style>