<template>
  <div class="hamburger-menu" v-on:click="toggleMenu()">
    <span class="open-menu" v-show="value">
      <svg version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path xmlns="http://www.w3.org/2000/svg" d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2 s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2 S29.104,22,28,22z"></path></svg>
    </span>
    <span class="close-menu" v-show="!value">
      <svg version="1.1" viewBox="0 0 6.82666 6.82666" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs></defs><g id="Layer_x0020_1"><path class="fil0" d="M5.91083 1.2175c0.0833031,-0.0833031 0.0833031,-0.218366 0,-0.301669 -0.0833031,-0.0833031 -0.218366,-0.0833031 -0.301669,0l-4.69334 4.69333c-0.0833031,0.0833031 -0.0833031,0.218366 0,0.301669 0.0833031,0.0833031 0.218366,0.0833031 0.301669,0l4.69334 -4.69333z"></path><path class="fil0" d="M1.2175 0.915827c-0.0833031,-0.0833031 -0.218366,-0.0833031 -0.301669,0 -0.0833031,0.0833031 -0.0833031,0.218366 0,0.301669l4.69334 4.69333c0.0833031,0.0833031 0.218366,0.0833031 0.301669,0 0.0833031,-0.0833031 0.0833031,-0.218366 0,-0.301669l-4.69334 -4.69333z"></path></g></svg>
    </span>
  </div>
</template>

<script>

export default {
  name: 'svg-burger-menu',
  props: {
    value: {
      required: true,
    }
  },
  methods: {
    toggleMenu() {
      this.$emit('input', !this.value);
    },
  }
}
</script>

<style lang="scss" scoped>
.hamburger-menu {
  display: none;
  cursor: pointer;
  opacity: .9;
  user-select: none;

  @media screen and (max-width: 600px) {
    display: inline-block;

    .open-menu, .close-menu  {
      svg {
        fill: white;
      }
    }

    .open-menu svg {
      width: 40px;
      margin: 10px;
    }

    .close-menu svg {
      width: 50px;
      margin: 5px;
    }

    &:hover {
      background: #FCAC4C;
      opacity: 1;
    }
  }
}
</style>