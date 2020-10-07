require('./bootstrap');
require('normalize.css');
window.Vue = require('vue');

import router from "./router";
import common from "../sass/common.scss";

const app = new Vue({
    el: '#app',
    router
});
