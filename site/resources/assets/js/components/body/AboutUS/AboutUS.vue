<template>
  <div>
    <div id="splash-screen">
      <img src="./assets/Sportswear_Apparel_Manufacturing.jpg" alt="First slide">
    </div>
    <div class="container">
      Dmitry
    </div>
  </div>
</template>

<script>

export default {
  name: 'app-about-us',
  created() {
    let keywords = document.querySelector("meta[name=keywords]");
    let description = document.querySelector("meta[name=description]");

    document.title = this.translate('meta.AboutUS.title');
    keywords.content = this.translate('meta.AboutUS.keywords');
    description.content = this.translate('meta.AboutUS.description');
  },
  components: {

  },
  data () {
    return {
      msg: 'Welcome to page AboutUS'
    }
  }
}
</script>

<style lang="scss">

</style>
