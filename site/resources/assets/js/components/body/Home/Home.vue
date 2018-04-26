<template>
  <div>
    <carrousel></carrousel>
  </div>
</template>

<script>

const carrousel = (resolve) => {
  require(['./components/carrousel/carrousel.vue'], resolve);
};

export default {
  name: 'app-home',
  created() {
    let keywords = document.querySelector("meta[name=keywords]");
    let description = document.querySelector("meta[name=description]");

    document.title = this.translate('meta.Home.title');
    keywords.content = this.translate('meta.Home.keywords');
    description.content = this.translate('meta.Home.description');
  },
  components: {
    'carrousel': carrousel,
  },
}
</script>

<style lang="scss">

</style>
