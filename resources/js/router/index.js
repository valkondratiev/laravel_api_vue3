import {createRouter, createWebHistory} from 'vue-router'

import LoginForm from '../components/LoginForm.vue'
import App from '../components/App.vue'
import Images from "../components/Images.vue"
import Users from "../components/Users.vue";

const routes = [
    {
        path: '/',
        name: 'app.index',
        components: {
            app: App
        },
        children: [
            {
                name: "index.images",
                path: "images",
                components: {
                    sidebar: Images
                }
            },
            {
                name: "index.users",
                path: "users",
                components: {
                    sidebar: Users
                }
            },
        ]
    },


    {
        path: '/login',
        name: 'login.index',
        components: {
            app: LoginForm
        }
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
