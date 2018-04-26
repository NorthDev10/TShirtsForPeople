<template>
  <div>
    <article v-for="(value, key, index) in tshirts.tshirtList">
      <figure>
        <p><img :src="getUrlImg(value)" :alt="getTshirtName(value)"></p>
        <figcaption>
          <p>{{getTshirtName(value)}}</p>
          <p class="price" v-lang.order_total="{cost: value.price}"></p>
          <button class="button green" type="button" v-lang.add_to_cart></button>
        </figcaption>
      </figure>
    </article>
  </div>
</template>

<script>
import languagePack  from './lang/languages.js'

export default {
  name: 't-shirts',
  props: {
    tshirts: {
      required: true,
      type: Object,
    },
  },
  methods: {
    // /uploads/photo/tshirts/[model]/[brands_name]/[id]
    getUrlImg(TshirtObj) {
      return this.tshirts.preview.path + '/'
        + TshirtObj.model + '/'
        + TshirtObj.brand.translit + '/'
        + TshirtObj.id + '/'
        + TshirtObj.previews[0].images[0];
    },
    getTshirtName(TshirtObj) {
      return TshirtObj['name_' + this.language]
    },
  },
  messages: languagePack,
}
</script>

<style lang="scss" scoped>
  article {
    border: 1px solid transparent;
    max-width: 300px;
    text-align: center;
    padding: 4px;
    margin: 4px;

    figcaption {
      display: flex;
      flex-direction: column;

      .price {
        align-self: center;
        padding: 6px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        background: #29B6F6;
        margin: 10px;
      }
    }

    &:hover {
      transition: border-color 200ms;
      border-color: #FF9A00;
    }
  }

  figure img {
    width: 230px;
  }
</style>
