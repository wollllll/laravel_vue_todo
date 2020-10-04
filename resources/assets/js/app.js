require('./bootstrap');
require('normalize.css');
window.Vue = require('vue');

import router from "./router";

const app = new Vue({
    el: '#app',
    router
});
