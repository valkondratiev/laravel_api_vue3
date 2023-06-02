import * as bootstrap from 'bootstrap';
import 'alpinejs';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from './router'
import axiosPlugin from './plugins/axios.js'

import LoginForm from '@/components/LoginForm.vue';

createApp({
    components: {
        LoginForm,
    }
}).use(router).use(axiosPlugin).mount('#app')


