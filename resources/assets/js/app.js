require('./bootstrap');

window.Vue = require('vue');

import router from "./router";
$ = jQuery = require('jquery');

const app = new Vue({
    el: '#app',
    router
});
