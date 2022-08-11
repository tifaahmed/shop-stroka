import Vue from 'vue'
import  createRouter from 'vue-router'

import routes    from './Routes'             ;

import App_layout    from './App.vue'


window.Vue = require('vue').default;

Vue.use( createRouter ) ;

const app = new Vue({
    el: '#app',
    router  :  new createRouter( routes ) ,
    render  : h => h( App_layout ),

    data: {
        query: {
            CurrentPage:1,
        }
    //     messages: [],
    //     newMessage: '',
    //     user: '',
    //     typing: false
    },
    // methods: {
    //     sendMessage() {
    //         // add new message to messages array
    //         this.messages.push({
    //             user: Laravel.user,
    //             message: this.newMessage
    //         });

    //         // clear input field
    //         this.newMessage = '';

    //         // persist to database
    //     }
    // }
});



 