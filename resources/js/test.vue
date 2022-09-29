// require('./bootstrap');

import {createApp} from 'vue'
import {createRouter , createWebHistory} from 'vue-router'
import routes    from './Routes'             ;
import layout from './layout.vue';

import App_layout     from './App.vue'

const router = createRouter({
    history: createWebHistory(),
    routes:[{
        path: '',
        component: layout,
        name: 'layout',
        children: [
            // AdminRoutes,
            // AuthRoutes
        ]
    }]
  })

//   app.use(router);
//   app.mount('#app')

// const router = createRouter(routes);

// const app = new createApp({});

// const app = new createApp({
//     el: '#app',
//     history: createWebHistory('lll'),

//     router  :  new createRouter( routes ) ,
//     render  : h => h(App_layout),

//     data: {
//         query: {
//             CurrentPage:1,
//         }
//     }
// });


// const app = createApp({
//     components:{
//         App,
//     }
// })

