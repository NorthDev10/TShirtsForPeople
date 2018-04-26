<template>
  <div class="custom-select">
    <div class="selected-option" v-on:click="visibleOptions = !visibleOptions">
      <span>
        {{currentState.val}}
      </span>
      <span class="fa-arrows"></span>
    </div>

    <div v-show="visibleOptions" class="custom-option">
      <span v-for="(option, key) in options" 
            v-on:click="optionSelected(key, option)">
        {{option}}
      </span>
    </div>
  </div>
</template>

<script>

export default {
  name: 'custom-select',
  props: {
    returnVal: {
      default: true,
      type: Boolean
    },
    options: {
      required: true,
      type: Array,
    },
    value: {//сюда попадают значение из директивы v-model
      required: true,
    }
  },
  created() {
    if(this.returnVal) {
      this.currentState.val = this.value;
    } else {
      this.currentState.val = this.options[this.value];
    }
  },
  data() {
    return {
      visibleOptions: false,
      currentState: {
        key: 0,
        val: 0,
      },
    }
  },
  methods: {
    optionSelected(key, option) {
      if(this.currentState.key != key) {
        this.currentState.key = key;
        this.currentState.val = option;
        
        if(this.returnVal) {
          this.$emit('input', this.currentState.val);
        } else {
          this.$emit('input', this.currentState.key);
        }
      }
    },
    hideCustomSelect(e) {
      try {
        if(!(e.target.parentNode.classList.contains('custom-select') || 
          e.target.parentNode.classList.contains('selected-option') || 
          e.target.classList.contains('selected-option'))) {
            this.visibleOptions = false;
        }
      } catch(e) {
        this.visibleOptions = false;
      }
    }
  },
  watch: { //чтоб при смене языка обновлялось выбранное значение в select-е
    options() {
      this.currentState.val = this.options[this.currentState.key];
    }
  },
  mounted() {
    document.body.addEventListener("click", this.hideCustomSelect);
  },
  beforeDestroy() {
    document.body.removeEventListener("click", this.hideCustomSelect);
  }
}
</script>

<style lang="scss" scoped>
  @import "~fontawesome-scss/fontAwesome.scss";

  .custom-select {
    user-select: none;

    .selected-option {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border: 0;
      min-width: 150px;
      background: #ffce83;
      font-size: 1.2em;
      padding: 5px;
      cursor: pointer;
    }

    .custom-option {
      display: flex;
      flex-direction: column;
      background: #ffb646;
      position: absolute;
      min-width: 160px;
      text-align: left;
      cursor: pointer;
      z-index: 1;

      span {
        font-size: 1.1em;
        padding: 5px;

        &:hover {
          background: #ff9a00;
        }
      }
    }

    .fa-arrows {
      @include fa($fa-caret-down, black, 18px);
    }
  }
</style>