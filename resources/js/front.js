
require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import HomePage from './pages/HomePage';
import AboutPage from './pages/AboutPage';
import ContactUsPage from './pages/ContactUsPage';
import PostPage from './pages/PostPage';
import PostsPage from './pages/PostsPage';
import Page404 from './pages/Page404';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomePage,
    },
    {
        path: '/about',
        name: 'about',
        component: AboutPage,
    },
    {
        path: '/contact-us',
        name: 'contact',
        component: ContactUsPage,
    },
    {
        path: '/posts',
        name: 'postsIndex',
        component: PostsPage,
    },
    {
        path: '/posts/:slug',
        name: 'postsShow',
        component: PostPage,
        props: true,
    },
    {
        path: '*',
        name: 'page404',
        component: Page404,
    }
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

new Vue({
    el: '#root',
    render: h => h(App),
    router,
});
