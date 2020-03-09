import Vue from 'vue'
import Vuex from 'vuex'
import dashboard from './modules/dashboard'
import orders from './modules/orders'
import loading from './modules/loading'
import Navbar from '@/components/partials/Navbar'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    loading,
    dashboard,
    orders,
    Navbar
  }
})
