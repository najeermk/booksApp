require('./bootstrap');

import Vue from 'vue'
import App from './components/App.vue'
import router from './routes'

const app = new Vue({
    el : '#app',
    router,
    components : {App}
})