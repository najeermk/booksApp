import Vue from 'vue'
import Router from 'vue-router'


//const Home = () => import('./components/Home.vue' /* webpackChunkName: "resource/js/components/home" */)
// const List = () => import('./components/books/List.vue' /* webpackChunkName: "resource/js/components/books/display" */)
// const Add = () => import('./components/books/Add.vue' /* webpackChunkName: "resource/js/components/books/add" */)
// const Edit = () => import('./components/books/Edit.vue' /* webpackChunkName: "resource/js/components/books/edit" */)

import Home from './components/Home.vue'
import List from './components/books/List.vue'             
import Add from './components/books/Add.vue'
import Edit from './components/books/Edit.vue'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes : [
        {
            name: 'Home',
            path: '/',
            component: Home
        },
        {
            name: 'List',
            path: '/books',
            component: List
        },
        // {
        //     name: 'show',
        //     path: '/books/:id',
        //     component: Edit
        // },
        {
            name: 'Edit',
            path: '/books/:id/edit',
            component: Edit
        },
        {
            name: 'Add',
            path: '/books/store',
            component: Add
        }
    ]
})