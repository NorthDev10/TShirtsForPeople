// подключаем необходимые пакеты
import Vue                          from 'vue'
import VueRouter                    from 'vue-router'
import MultiLanguage                from 'vue-multilanguage'
import Snotify                      from 'vue-snotify' // всплывающие сообщения (toast)
import VeeValidate, { Validator }   from 'vee-validate'; // валидатор форм

import LanguagePack     from './lang/languages'
import messagesUk       from 'vee-validate/dist/locale/uk'
import messagesEn       from 'vee-validate/dist/locale/en'

import Routes           from './routes/web'

// подключаем главный компонент веб-приложения
import App                   from './App.vue'
import AppLogo               from './components/header/Components/logo/Logo.vue'
import SvgCart               from './components/header/Components/SVGHeader/components/Cart/cart.vue'
import customSelect          from './components/custom-select/CustomSelect.vue'
import SearchInput           from './components/search-input/SearchInput.vue'
import CustomCheckbox        from './components/CustomCheckbox/CustomCheckbox.vue'
import FloatingBlockInParent from './components/FloatingBlockInParent/FloatingBlockInParent.vue'
import TshirtPreview         from './components/TshirtPreview.vue'

// встраиваем плагины во Vue
Vue.use(VueRouter);
Vue.use(Snotify);
Vue.use(VeeValidate);
Vue.use(MultiLanguage, LanguagePack.getLanguages());

// подключаем локализацию для валидатора форм
Validator.localize('uk', messagesUk);
Validator.localize('en', messagesEn);

// Глобальная регистрация компонентов
Vue.component(AppLogo.name, AppLogo);
Vue.component(SvgCart.name, SvgCart);
Vue.component(FloatingBlockInParent.name, FloatingBlockInParent);
Vue.component(customSelect.name, customSelect);
Vue.component(SearchInput.name, SearchInput);
Vue.component(TshirtPreview.name, TshirtPreview);
Vue.component(CustomCheckbox.name, CustomCheckbox);

// Настройка маршрутов
const router = new VueRouter({
  mode: 'history', // говорим, что хотим использовать HTML 5 history (default hash)
  routes: Routes
});

// связываем экземпляр Vue с DOM-элементом, передаём маршруты и основной компонент
let tshirtApp = new Vue({
  router,
  render: h => h(App), // указываем, "корневой" компонент
  created() {
    // проверяем, поддерживается ли выбранный язык
    LanguagePack.setLanguages(this);
  },
  watch: {
    $route() {// отслеживаем изменение маршрутов
      LanguagePack.setLanguages(this);
    }
  }
}).$mount('#app'); // в элементе с id #app, будет монтироватся наше приложение

window.tshirtApp = tshirtApp;
