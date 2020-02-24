import Vue from 'vue'
import VueRouter from 'vue-router'
const cookies = require('vue-cookies');
import Dashboard from '@/components/Dashboard';
import Login from '@/components/Login';

Vue.use(VueRouter)

const routes = [
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: { 
      requiresAuth: true        
    }
  },
  {
    path: '/',
    name: 'login',
    component: Login
  },
  {
    path: '/logout',
    name: 'logout',
    component: function(){
        cookies.remove('access_token');
        cookies.remove('refresh_token');
        router.push({ name: 'login' });
    }
  }
  

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  let token = cookies.get('access_token');  

  if(to.matched.some(record => record.meta.requiresAuth)) {
    if(token == null){
      next({
        path: '/',
        params: { nextUrl: to.fullPath }
      })      
    }else{
      next();
    }
  }else{      
      next();
  }
});


export default router
