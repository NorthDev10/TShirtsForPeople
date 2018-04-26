<template>
  <g v-bind:transform="getPosition">
    <polygon class="a" points="25.01 30.05 135.1 38.95 135.1 77.14 42.93 88.06 25.01 30.05"/>
    <path class="carcass" d="M2.41,16H19.2l-2.41-1.84L26.1,44.75l7.6,25c1.75,5.76,4.06,11.6,5.33,17.49.13.59.07.13,0-.23a10,10,0,0,1,0,1.42c-.06,2.16,0,4.33,0,6.49v10.9a2.54,2.54,0,0,0,2.5,2.5h93.86c3.22,0,3.22-5,0-5H41.55l2.5,2.5c0-6.15.73-12.74,0-18.84-.56-4.71-2.81-9.62-4.18-14.14L28.33,34.88l-6.71-22A2.56,2.56,0,0,0,19.2,11H2.41c-3.22,0-3.22,5,0,5Z"/>
    <path class="carcass" d="M24.74,32.39l96.51,8.49,13.85,1.22-2.5-2.5V77.14l2.5-2.5-81.78,9.8L41.55,85.85,44,87.69,27.15,29.22c-.89-3.09-5.71-1.77-4.82,1.33L39.14,89a2.52,2.52,0,0,0,2.41,1.84L123.33,81l11.77-1.41a2.56,2.56,0,0,0,2.5-2.5V39.59a2.56,2.56,0,0,0-2.5-2.5L38.59,28.6,24.74,27.39C21.54,27.1,21.55,32.11,24.74,32.39Z"/>
    <g>
      <line class="c" x1="134.41" y1="59.32" x2="33.41" y2="59.32"/>
      <path class="carcass" d="M134.41,56.82h-101c-3.22,0-3.22,5,0,5h101c3.22,0,3.22-5,0-5Z"/>
    </g>
    <g>
      <line class="c" x1="41.55" y1="88.91" x2="41.55" y2="31.64"/>
      <path class="carcass" d="M44.05,88.91V31.64c0-3.22-5-3.22-5,0V88.91c0,3.22,5,3.22,5,0Z"/>
    </g>
    <g>
      <line class="c" x1="53.64" y1="87" x2="53.64" y2="32.27"/>
      <path class="carcass" d="M56.14,87V32.27c0-3.22-5-3.22-5,0V87c0,3.22,5,3.22,5,0Z"/>
    </g>
    <g>
      <line class="c" x1="65.1" y1="85.73" x2="65.1" y2="33.55"/>
      <path class="carcass" d="M67.6,85.73V33.55c0-3.22-5-3.22-5,0V85.73c0,3.22,5,3.22,5,0Z"/>
    </g>
    <g>
      <line class="c" x1="76.55" y1="83.82" x2="76.55" y2="35.45"/>
      <path class="carcass" d="M79.05,83.82V35.45c0-3.22-5-3.22-5,0V83.82c0,3.22,5,3.22,5,0Z"/>
    </g>
    <g>
      <line class="c" x1="87.37" y1="82.55" x2="87.37" y2="35.45"/>
      <path class="carcass" d="M89.87,82.55V35.45c0-3.22-5-3.22-5,0V82.55c0,3.22,5,3.22,5,0Z"/>
    </g>
    <g>
      <line class="c" x1="96.91" y1="80.64" x2="96.91" y2="37.36"/>
      <path class="carcass" d="M99.41,80.64V37.36c0-3.22-5-3.22-5,0V80.64c0,3.22,5,3.22,5,0Z"/>
    </g>
    <g>
      <line class="c" x1="105.19" y1="80.64" x2="105.19" y2="37.36"/>
      <path class="carcass" d="M107.69,80.64V37.36c0-3.22-5-3.22-5,0V80.64c0,3.22,5,3.22,5,0Z"/>
    </g>
    <g>
      <line class="c" x1="112.82" y1="78.73" x2="112.82" y2="38"/>
      <path class="carcass" d="M115.32,78.73V38c0-3.22-5-3.22-5,0V78.73c0,3.22,5,3.22,5,0Z"/>
    </g>
    <g>
      <line class="c" x1="120.46" y1="78.73" x2="120.46" y2="38.64"/>
      <path class="carcass" d="M123,78.73V38.64c0-3.22-5-3.22-5,0V78.73c0,3.22,5,3.22,5,0Z"/>
    </g>
    <g>
      <line class="c" x1="128.1" y1="76.82" x2="128.1" y2="39.91"/>
      <path class="carcass" d="M130.6,76.82V39.91c0-3.22-5-3.22-5,0V76.82c0,3.22,5,3.22,5,0Z"/>
    </g>
    <circle class="wheels" cx="122.05" cy="105.45" r="10.82"/>
    <circle class="wheels" cx="59.05" cy="105.45" r="10.82"/>
    <circle class="c" cx="122.05" cy="105.45" r="4.45"/>
    <circle class="c" cx="59.05" cy="105.45" r="4.45"/>
    <path class="a" d="M24.74,31.44"/>
    <template v-if="numberOfGoods > 0">
      <circle class="ac" cx="63.91" cy="22.5" r="22.5"/>
      <text class="ad" v-show="numberOfGoods > 9" transform="translate(50 32)">{{numberOfGoods}}</text>
      <text class="ad" v-show="numberOfGoods < 10" transform="translate(57 32)">{{numberOfGoods}}</text>
    </template>
  </g>
</template>

<script>
import LocalStorage from '../../../../../../js/LocalStorage.js'

export default {
  name: 'svg-body',
  mounted() {
    this.numberOfGoods = LocalStorage.readData('Cart').length;
    // при изменении количества товара - обновляем счётчик
    this.$root.$on('onCartUpdated', (val) => {
      this.numberOfGoods = val;
    });
  },
  data () {
    return {
      numberOfGoods: 0
    }
  },
  props: {
    x: {
      default: 0
    },
    y: {
      default: 0
    },
  },
  computed: {
    getPosition() {
      return 'translate(' + this.x + ' ' + this.y + ')';
    }
  },
}
</script>

<style lang="scss" scoped>
  a:hover .carcass {
    fill: #cebd2a;
  }

  .carcass {
    fill: #39b54a;
  }

  .wheels {
    fill: #29abe2;
  }

  .ac {
    fill: #c1272d;
  }

  .ad {
    font-size: 30.94px;
  }

  .ae {
    font-size: 18.55px;
  }
  
  .ad, .c, .a {
    fill: #fff;
  }
</style>