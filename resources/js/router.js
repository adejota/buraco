import Vue from 'vue'
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import Home from './views/Home'
import EditProfile from './views/EditProfile'
import Match from './views/Match'

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
        },
        {
            path: '/home',
            name: 'home',
            component: Home,
        },
        {
            path: '/matches/:id',
            component: Match,
        },
        {
            path: '/edit-profile',
            name: 'edit-profile',
            component: EditProfile,
        },
    ],
});