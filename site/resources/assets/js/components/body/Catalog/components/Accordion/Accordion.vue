<template>
  <div class="accordion">
    <div class="accordion-item">
      <div class="item-header" @click="accordionItem = 0">
        <span v-lang.brands></span>
        <span :class="{'fa-plus': accordionItem != 0, 
                       'fa-minus': accordionItem == 0}">
        </span>
      </div>
      <div class="item-content" v-show="accordionItem == 0">
        <ul>
          <li v-for="(item, index) in options.brands">
            <custom-checkbox 
              :title="item.name"
              :status="isSelectedItem('id', 'brands', item) >= 0"
              @input="selected('id', 'brands', item)">
            </custom-checkbox>
          </li>
        </ul>
      </div>
    </div>
    <div class="accordion-item">
      <div class="item-header" @click="accordionItem = 1">
        <span v-lang.size></span>
        <span :class="{'fa-plus': accordionItem != 1, 
                       'fa-minus': accordionItem == 1}">
        </span>
      </div>
      <div class="item-content" v-show="accordionItem == 1">
        <ul>
          <li v-for="(item, index) in options.size">
            <custom-checkbox 
              :title="item"
              :status="isOptionInList(item)"
              @input="toogleOptionInList(item, 'size')">
            </custom-checkbox>
          </li>
        </ul>
      </div>
    </div>
    <div class="accordion-item">
      <div class="item-header" @click="accordionItem = 2">
        <span v-lang.color></span>
        <span :class="{'fa-plus': accordionItem != 2, 
                       'fa-minus': accordionItem == 2}">
        </span>
      </div>
      <div class="item-content" v-show="accordionItem == 2">
        <ul class="colors">
          <template v-for="(item, index) in options.colors">
            <li v-if="item.id == 5"
                class="item-color"
                :title="item['name_' + language]"
                :class="item.name_en.replace(' ', '-')"
                @click="selected('id', 'colors', item)">
                  <colorfull></colorfull>
                  <span 
                    :class="{'hidden': !(isSelectedItem('id', 'colors', item) >= 0)}">
                  </span>
            </li>
            <li v-else 
                class="item-color"
                :style="{background: item.code}"
                :title="item['name_' + language]"
                :class="item.name_en.replace(' ', '-')"
                @click="selected('id', 'colors', item)">
                  <span 
                    :class="{'hidden': !(isSelectedItem('id', 'colors', item) >= 0)}">
                  </span>
            </li>
          </template>
        </ul>
      </div>
    </div>
    <div class="accordion-item">
      <div class="item-header" @click="accordionItem = 3">
        <span v-lang.price></span>
        <span :class="{'fa-plus': accordionItem != 3, 
                       'fa-minus': accordionItem == 3}">
        </span>
      </div>
      <div class="item-content price" v-show="accordionItem == 3">
        <span v-lang.price_from></span>
        <input type="text" class="input-text" v-model="value.price.from">
        <span v-lang.price_up_to></span>
        <input type="text" class="input-text" v-model="value.price.to">
        <span v-lang.currency></span>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import languagePack  from './lang/languages.js'

const colorfull = (resolve) => {
  require(['./components/Colorfull.vue'], resolve);
};

export default {
  name: 'accordion',
  props: {
    value: {
      required: true,
    },
    options: {
      required: true,
    },
  },
  data() {
    return {
      accordionItem: 0,
    };
  },
  created() {
    for(let i = 0; i < this.options.colors.length; ++i) {
      this.options.colors[i].selected = false;
    }
  },
  components: {
    colorfull,
  },
  methods: {
    selected(uName, optionName, item) {
      if(!this.removeSelectedOption(uName, optionName, item)) {
        this.value[optionName].push(item);
      }
    },
    removeSelectedOption(uName, optionName, item) {
      let index = this.isSelectedItem(uName, optionName, item);
      if(index >= 0) {
        this.value[optionName].splice(index, 1);
        this.$emit('input', this.value);
        return true;
      }
    },
    isSelectedItem(uName, optionName, item) {
      for(let i in this.value[optionName]) {
        if(this.value[optionName][i][uName] == item[uName]) {
          return i;
        }
      }
      return -1;
    },
    isOptionInList(itemName) {
      return this.value.size.indexOf(itemName) >= 0;
    },
    toogleOptionInList(name, optionName) {
      let index = this.value[optionName].indexOf(name);
      if(index >= 0) {
        this.value[optionName].splice(index, 1);
      } else {
        this.value[optionName].push(name);
      }
      this.$emit('input', this.value);
    },
  },
  watch: {
    'value.price': function() {
      this.value.price.default = false;
    },
  },
  messages: languagePack,
}
</script>

<style lang="scss" scoped>
@import "~fontawesome-scss/fontAwesome.scss";

  .accordion {
    border: 1px solid #FF9A00;

    .item-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      user-select: none;
      background: #FFCE83;
      padding: 7px;
      
      &:hover {
        background: #FF9A00;
      }

      .fa-plus {
        @include fa($fa-plus, black, 18px);
      }

      .fa-minus {
        @include fa($fa-minus, black, 18px);
      }
    }

    .item-content {
      margin: 5px;

      &.price {
        display: flex;
        justify-content: space-around;
        align-items: center;
      }

      ul {
        li {
          list-style: none;
        }
      }

      .input-text {
        width: 100%;
        margin: 0 8px;
      }

      .colors {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        justify-content: center;

        .item-color {
          width: 26px;
          height: 26px;
          border-radius: 50% 50%;
          margin: 5px 5px;
          cursor: pointer;
          box-shadow: 0px 0px 4px black;
          position: relative;

          span {
            position: absolute;
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            transform: rotate(45deg);
            border: 1px solid white;
            border-width: 0 3px 3px 0;
          }

          &.white span, &.colorful span, 
          &.silver span, &.beige span, &.yellow span,
          &.light-pink span {
            border-color: black;
          }

          &:hover {
            opacity: .7;
          }
        }

        .hidden {
          display: none;
        }
      }
    }
  }
</style>
