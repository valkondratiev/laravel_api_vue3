import { createRouter, createWebHistory } from 'vue-router'

import LoginForm from '../components/LoginForm.vue'
import App from '../components/App.vue'

const routes = [
    {
        path: '/',
        name: 'app.index',
        component: App
    },

    {
        path: '/login',
        name: 'login.index',
        component: LoginForm
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
