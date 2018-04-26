<template>
  <div>
    <div id="splash-screen">
      <img src="./assets/polos1.jpg" alt="First slide">
    </div>
    <t-shirts-builder></t-shirts-builder>
  </div>
</template>

<script>

const TShirtsBuilder = (resolve) => {
  require(['./components/TshirtsBuilder/TshirtsBuilder.vue'], resolve);
};

export default {
  name: 'app-constructor',
  created() {
    let keywords = document.querySelector("meta[name=keywords]");
    let description = document.querySelector("meta[name=description]");

    document.title = this.translate('meta.Constructor.title');
    keywords.content = this.translate('meta.Constructor.keywords');
    description.content = this.translate('meta.Constructor.description');
  },
  components: {
    TShirtsBuilder
  },
}
</script>