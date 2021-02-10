import Vue from 'vue'
import router from './router';
import App from './views/App';

export const eventBus = new Vue();

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});