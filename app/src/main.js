import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify';
import passport from './plugins/passport'
import axios from 'axios'
import VueAxios from 'vue-axios'

import './components';

// import Navbar from '@/components/partials/Navbar'
// Vue.component('Navbar', Navbar)



Vue.config.productionTip = false;
Vue.use(VueAxios, axios);
Vue.use(passport);

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount('#app')
