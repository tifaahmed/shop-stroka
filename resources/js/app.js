// require('./bootstrap');
import * as createApp from 'vue'

import {createRouter , createWebHistory} from 'vue-router'
// import routes    from './Routes'             ;
import App_layout    from './App.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import layout    from './App.vue'


// window.Vue = require('vue').default;


const routesa = [
    { path: '/', component: layout },
    { path: '/about', component: layout },
  ]

const router  =  createRouter({
    history: createWebHistory(),
    routesa,
  })

  const app = createApp.Vue.createApp({})

  app.use(router)

  app.mount('#app')
