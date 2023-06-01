import { createRouter, createWebHistory } from 'vue-router'

import LoginForm from '../components/LoginForm.vue'

const routes = [
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
