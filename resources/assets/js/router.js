import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Top from './pages/Top';

const DEFAULT_TITLE = 'てくてくツアーガイドさん | ';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Top',
            component: Top,
            meta: {title: 'TOP'}
        }
    ]
});

router.afterEach((to) => {
    document.title = DEFAULT_TITLE + to.meta.title;
});

export default router;
