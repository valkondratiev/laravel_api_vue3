import * as bootstrap from 'bootstrap';
import 'alpinejs';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from './router'
import axiosPlugin from './plugins/axios.js'
import Paginate from "vuejs-paginate-next";

import LoginForm from '@/components/LoginForm.vue';

createApp({
    components: {
        LoginForm,
    }
}).use(router).use(axiosPlugin).use(Paginate).mount('#app')


