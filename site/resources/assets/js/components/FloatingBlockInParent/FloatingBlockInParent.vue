<template>
  <div v-bind:class="{fixed: isFixed, relative: isRelative}"
       v-bind:style="{top: topRelative + 'px',
                      width: parentBlockWidth + 'px',
                      'z-index': zIndex}">
    <slot>
      <span>This parent floating block</span>
    </slot>
  </div>
</template>

<script>
// делает дочерний блок плавающим, в пределах родительского блока
export default {
  name: 'floating-block-in-parent',
  props: {
    topFixed: {//отступ сверху при фиксированном позиционировании
      default: 100,
      type: Number,
    },
    screenMinWidth: { // ширина экрана, при котором компонент начинает "плавать"
      default: 1200,
      type: Number,
    },
    zIndex: { // z-index
      default: 0,
      type: Number,
    }
  },
  mounted() {
    this.parentBlock = this.$el.parentNode;
    // вычисляем координату OY родительского блока
    this._calculateCoordinate();

    window.addEventListener("scroll", this._handleScroll);
    window.addEventListener("resize", this._resizeThrottler);
  },
  data() {
    return {
      isFixed: false,
      isRelative: false,
      topRelative: this.topFixed,

      parentBlock: undefined,
      coordsFloatingBlock: undefined,
      coordsParentBlock: undefined,
      parentBlockOY0: undefined,
      parentBlockOY1: undefined,
      parentBlockWidth: undefined,
    }
  },
  methods: {
    // вычисляем координату OY
    _calculateCoordinate() {
      // обновляем размер элемента и его позицию относительно окна
      this.coordsFloatingBlock = this.$el.getBoundingClientRect();
      this.coordsParentBlock = this.parentBlock.getBoundingClientRect();
      this.parentBlockWidth = this._getContentWidth(this.parentBlock);
      // вычисляем координату OY родительского блока
      this.parentBlockOY0 = this.coordsParentBlock.top + window.scrollY;
      this.parentBlockOY1 = this.parentBlockOY0 + this.coordsParentBlock.height;
    },
    _handleScroll() {
      if(window.innerWidth >= this.screenMinWidth) {
        //дочерний блок следует за скроллом
        this._calculateCoordinate();
        let isPosFixed = this._floatingBlockFollowsScrolling();
        let isPosRelative = this._blockAdheresBoundariesParentBlock();

        if(isPosFixed) {
          this.isRelative = false;
          this.isFixed = true;
          this.topRelative = this.topFixed;
        } else {
          this.isFixed = false;
        }

        // дочерний блок прилипает к границе родительского блока
        if(isPosRelative) {
          this.coordsFloatingBlock = this.$el.getBoundingClientRect();
          this.coordsParentBlock = this.parentBlock.getBoundingClientRect();

          this.isRelative = true; // position: relative;
          this.isFixed = false; // position: fixed; top: this.topRelative px;
          this.topRelative = this.coordsParentBlock.height 
            - this.coordsFloatingBlock.height 
            - this._getMarginTopBottom(this.$el.firstChild);
        } else {
          this.topRelative = this.topFixed;
        }
      } else {
        this.isRelative = false;
        this.isFixed = false;
      }
    },
    //дочерний блок следует за скроллом
    _floatingBlockFollowsScrolling() {
      return window.scrollY > this.parentBlockOY0 - this.topFixed;
    },
    // дочерний блок прилипает к границе родительского блока
    _blockAdheresBoundariesParentBlock() {
      return window.scrollY 
        + this.topFixed 
        + this.coordsFloatingBlock.height - this._getMarginTopBottom(this.$el.firstChild)
        > this.parentBlockOY1;
    },
    /*
      событие изменения размера окна могут повторятся многократно с высокой скоростью,
      поэтому регулировку события выполняется по таймеру
    */
    _resizeThrottler() {
      if(!this.resizeTimeout) {
        this.resizeTimeout = setTimeout(() => {
          this.resizeTimeout = null;
          this._calculateCoordinate();
        }, 66);
      }
    },
    _getContentWidth(element) {
      let styles = getComputedStyle(element);

      return element.clientWidth
        - parseFloat(styles.paddingLeft)
        - parseFloat(styles.paddingRight);
    },
    _getMarginTopBottom(element) {
      try {
        let styles = getComputedStyle(element);

        return parseFloat(styles.marginTop)
          + parseFloat(styles.marginBottom);
      } catch(e) {
        return 0;
      }
    },
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this._handleScroll);
    window.removeEventListener("resize", this._resizeThrottler);
  }
}
</script>

<style lang="scss" scoped>

  .fixed {
    position: fixed;
  }

  .relative {
    position: relative;
  }
</style>