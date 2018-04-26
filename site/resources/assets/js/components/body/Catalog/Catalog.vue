<template>
  <div>
    <div id="splash-screen">
      <img src="./assets/bazovyy-garderob-ne-prigodilsya.jpg" alt="First slide">
    </div>
    <div class="container-fluid">
      <div class="row">
        <aside class="col-xs-12 col-md-3">
          <accordion :options="options" v-model="selectedOptions"></accordion>
        </aside>
        <section class="col-xs-12 col-md-9">
          <filters-content v-model="selectedOptions"></filters-content>
          <t-shirts class="t-shirt"
                    :tshirts="tshirts" 
                    @nextPage="loadTshirts">
          </t-shirts>
          <button type="button"
                  class="button"
                  :class="{
                    'gray': tshirtsLoaded,
                    'blue': !tshirtsLoaded,
                  }"
                  @click="loadTshirts(tshirts.paginate.current_page + 1)"
                  v-lang.elements.show_more_tshirts>
          </button>
        </section>
      </div>
    </div>
    <modal-win :options="options" :tshirt="tshirts.tshirtList[0]"></modal-win>
  </div>
</template>

<script>
import axios from 'axios'
import languagePack  from './lang/languages.js'
import ModalWin      from './components/ModalWin/ModalWin.vue'

const Tshirts = (resolve) => {
  require(['./components/Tshirts/Tshirts.vue'], resolve);
};

const Accordion = (resolve) => {
  require(['./components/Accordion/Accordion.vue'], resolve);
};

const FiltersContent = (resolve) => {
  require(['./components/FiltersContent/FiltersContent.vue'], resolve);
};

export default {
  name: 'app-catalog',
  created() {
    let keywords = document.querySelector("meta[name=keywords]");
    let description = document.querySelector("meta[name=description]");

    document.title = this.translate('meta.title');
    keywords.content = this.translate('meta.keywords');
    description.content = this.translate('meta.description');

    axios.get('/api/v1.0/options', {
      params: {
          lang: this.language,
        }
      })
        .then((response) => {
          this.options = response.data;
        })
        .catch((error) => {
          this.$snotify.error(this.translate('info.something_went_wrong'));
          console.log(error);
        });

    this.loadTshirts(1);
  },
  components: {
    't-shirts': Tshirts,
    Accordion,
    FiltersContent,
    ModalWin,
  },
  methods: {
    loadTshirts(page) {
      if(this.isFirstLoadTShirts() || this.isNextPage(page)) {
        axios.get('/api/v1.0/tshirts', {
            params: {
              page: page,
              lang: this.language,
            }
          })
            .then((response) => {
              if(this.tshirts.tshirtList == undefined) {
                this.tshirts = response.data;
              } else {
                this.tshirts.tshirtList = 
                    this.tshirts.tshirtList.concat(response.data.tshirtList);
                this.tshirts.paginate = response.data.paginate;
                this.tshirts.lang = response.data.lang;
                this.tshirts.preview = response.data.preview;
              }
            })
            .catch((error) => {
              this.$snotify.error(this.translate('info.something_went_wrong'));
              console.log(error);
            });
      }
    },
    isFirstLoadTShirts() {
      return this.tshirts.tshirtList == undefined;
    },
    isNextPage(currentPage) {
      try {
        let isNextPage = currentPage <= this.tshirts.paginate.last_page;
        if(!isNextPage) {
          this.tshirtsLoaded = true;
        }
        return isNextPage;
      } catch(e) {
        return false;
      }
    },
  },
  data() {
    return {
      tshirtsLoaded: false,
      options: {},
      selectedOptions: {
        size: [],
        gender: [],
        model: [],
        fabric: [],
        colors: [],
        brands: [],
        price: {
          default: true, // фильтр не был изменён
          from: 0,
          to: 24,
        }
      },
      tshirts: {},
    }
  },
  messages: languagePack,
}
</script>

<style lang="scss" scoped>
section {
  display: flex;
  flex-direction: column;

  .t-shirt {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
  }

  .button {
    margin: 10px;
    align-self: center;
  }
}
</style>
