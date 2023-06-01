import * as bootstrap from 'bootstrap';
import 'alpinejs';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from './router'

import LoginForm from '@/components/LoginForm.vue';

createApp({
    components: {
        LoginForm,
    }
}).use(router).mount('#app')
