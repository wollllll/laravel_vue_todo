import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Top from './pages/Top';

const DEFAULT_TITLE = '俺のTODO';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Top',
            component: Top,
        }
    ]
});

document.title = DEFAULT_TITLE;

export default router;
