import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from './router'
import axiosPlugin from './plugins/axios.js'
import Paginate from "vuejs-paginate-next";
import mitt from 'mitt';

import LoginForm from '@/components/LoginForm.vue';

const emitter = mitt();

const app  = createApp({
    components: {
        LoginForm,
    }
}).use(router).use(axiosPlugin).use(Paginate);
app.config.globalProperties.emitter = emitter;
app.mount('#app');

