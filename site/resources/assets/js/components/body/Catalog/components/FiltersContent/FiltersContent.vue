<template>
  <header>
    <h2 v-lang.you_selected v-show="someItem"></h2>{{value}}
    <div class="ff-item" v-show="value.brands.length">
      <span v-lang.brand></span>
      <ul>
        <li v-for="(item, index) in value.brands">
          <span class="option">{{item.name}}</span>
          <i class="remove" :title="translate('remove')" @click="remove(index, 'brands')"></i>
        </li>
      </ul>
    </div>
    <div class="ff-item" v-show="value.size.length">
      <span v-lang.size></span>
      <ul>
        <li v-for="(item, index) in value.size">
          <span class="option">{{item}}</span>
          <i class="remove" :title="translate('remove')" @click="remove(index, 'size')"></i>
        </li>
      </ul>
    </div>
    <div class="ff-item" v-show="value.colors.length">
      <span v-lang.color></span>
      <ul>
        <li v-for="(item, index) in value.colors">
          <span class="option-color" 
                v-if="item.name_en == 'colorful'"
                :style="{background: item.code}" 
                :title="item['name_' + language]">
                  <colorfull></colorfull>
          </span>
          <span class="option-color" 
                v-else
                :style="{background: item.code}" 
                :title="item['name_' + language]">
          </span>
          <i class="remove" :title="translate('remove')" @click="remove(index, 'colors')"></i>
        </li>
      </ul>
    </div>
    <div class="ff-item" v-show="value.price.default">
      <span v-lang.price></span>
      <span class="option">{{value.price.from}}</span>
      <i class="remove" :title="translate('remove')" @click="remove(index, 'size')"></i>
    </div>
    <hr v-show="someItem">
  </header>
</template>

<script>
import languagePack  from './lang/languages.js'

const colorfull = (resolve) => {
  require(['../Accordion/components/Colorfull.vue'], resolve);
};

export default {
  name: 'filters-content',
  props: {
    value: {
      required: true,
      type: Object,
    },
  },
  components: {
    colorfull,
  },
  methods: {
    remove(index, optionName) {
      this.value[optionName].splice(index, 1);
      this.$emit('input', this.value);
    },
  },
  computed: {
    someItem() {
      return Object.values(this.value).some((currentValue, index, array) => {
        return currentValue.length > 0;
      });
    },
  },
  messages: languagePack,
}
</script>

<style lang="scss" scoped>
@import "~fontawesome-scss/fontAwesome.scss";

.ff-item {
  display: flex;
  align-items: center;

  ul {
    display: flex;
    flex-wrap: wrap;
    
    li {
      background: #ff9a00;
      color: white;
      list-style: none;
      margin: 5px;
      padding: 4px;
      border-radius: 4px;
      align-items: center;
      display: flex;

      .option-color, .option {
        border-radius: 50% 50%;
        display: inline-block;
        margin-right: 3px;
      }

       .option-color {
        width: 26px;
        height: 26px;
      }
    }
  }

  .remove {
    cursor: pointer;
    @include fa($fa-times, white, 18px);

    &:hover {
      @include fa($fa-times, black, 18px);
    }
  }
}
</style>
