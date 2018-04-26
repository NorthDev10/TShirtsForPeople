<template>
  <label class="container">{{title}}
    <input type="checkbox" v-model="state" v-on:click="clickOnCheckbox()">
    <span class="checkmark"></span>
  </label>
</template>

<script>

export default {
  name: 'custom-checkbox',
  props: {
    title: {
      default: '',
    },
    value: {//сюда попадают значение из директивы v-model
      type: Boolean,
    },
    status: {
      default: false,
    },
  },
  data() {
    return {
      state: this.value || this.status,
    }
  },
  watch: {
    status() {
      this.state = this.status;
    },
    value() {
      this.state = this.value;
    },
  },
  methods: {
    clickOnCheckbox() {
      this.$emit('input', !this.value);
    }
  },
}
</script>

<style lang="scss" scoped>
  .container {
    display: inline;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    user-select: none;

    input {
      position: absolute;
      opacity: 0;
      cursor: pointer;

      &:checked ~ .checkmark {
        background-color: #ff9a00;
      }

      &:checked ~ .checkmark:after {
        display: block;
      }
    }

    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #ffce83;

      &:after {
        content: "";
        position: absolute;
        display: none;
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg);
      }
    }

    &:hover input ~ .checkmark {
      background-color: #F4D5A7;
    }
  }
</style>