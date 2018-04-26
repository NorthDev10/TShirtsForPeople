<template>
  <div class="slider">
    <swiper class="slide" :options="swiperOption" ref="mySwiper">
      <template v-if="this.language == 'en'">
        <swiper-slide><img src="./assets/slide_en_1.jpg" alt="slide_en_1.jpg"></swiper-slide>
        <swiper-slide><img src="./assets/slide_en_2.jpg" alt="slide_en_2.jpg"></swiper-slide>
      </template>
      <template v-else>
        <swiper-slide><img src="./assets/slide_uk_1.jpg" alt="slide_uk_2.jpg"></swiper-slide>
        <swiper-slide><img src="./assets/slide_uk_2.jpg" alt="slide_uk_2.jpg"></swiper-slide>
      </template>
      <div class="swiper-pagination" slot="pagination"></div>
    </swiper>
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>
</template>

<script>
import { swiper, swiperSlide } from 'vue-awesome-swiper' // slider

export default {
  name: 'carrousel',
  components: {
    swiper,
    swiperSlide
  },
  data() {
    return {
      swiperOption: {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 10000,
          disableOnInteraction: false
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      }
    }
  }
}
</script>

<style lang="scss">
  .swiper-pagination-bullet-active {
    background: #efefef!important;
  }
</style>

<style lang="scss" scoped>

  .slide {
    position: absolute;
    top: 7%;
    width: 100%;
    z-index: -1;

    img {
      width: 100%;
    }
  }

  .swiper-button-next, .swiper-button-prev {
    top: 80%;
    outline: none;
    z-index: 1!important;
  }

  @media screen and (max-width: 960px) {
    .slider, .slide {
      position: relative;
    }

    .swiper-button-next, .swiper-button-prev {
      top: 50%;
    }
  }

  @media screen and (max-width: 460px) {
    .slide, .swiper-button-next, .swiper-button-prev {
      display: none;
    }
  }
</style>