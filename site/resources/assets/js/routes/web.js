// подключаем компоненты (страницы) веб-приложения
import Home           from '../components/body/Home/Home.vue'
import Catalog        from '../components/body/Catalog/Catalog.vue'
import TShirt         from '../components/body/TShirt/TShirt.vue'
import Constructor    from '../components/body/Constructor/Constructor.vue'
import AboutUs        from '../components/body/AboutUS/AboutUS.vue'
import Delivery       from '../components/body/Delivery/Delivery.vue'
import CartWithGoods  from '../components/body/CartWithGoods/CartWithGoods.vue'

export default  [
  {
    path: '/:lang?',
    name: 'home',
    component: Home,
  },
  {
    path: '/:lang/catalog',
    name: 'catalog',
    component: Catalog,
    children: [
      {
        path: ':id',
        component: TShirt,
      }
    ]
  },
  {
    path: '/:lang/about_us',
    name: 'about_us',
    component: AboutUs,
  },
  {
    path: '/:lang/constructor',
    name: 'constructor',
    component: Constructor,
  },
  {
    path: '/:lang/delivery',
    name: 'delivery',
    component: Delivery,
  },
  {
    path: '/:lang/cart',
    name: 'CartWithGoods',
    component: CartWithGoods,
  },
];
