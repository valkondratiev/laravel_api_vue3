import axios from 'axios'
import router from "../router/index.js";

export default {
    install(app) {
        app.config.globalProperties.$axios = axios;


        if (localStorage.sequreToken) {
            app.config.globalProperties.$axios.defaults.headers = {
                Authorization: 'Bearer ' + localStorage.sequreToken,
                Accept:'application/json',
            }
        }
        app.config.globalProperties.$axios.interceptors.response.use(
            function(response) {
                return response;
            },
            function(error) {
                if (error.response.status == 403 || error.response.status == 401) {
                    localStorage.removeItem('sequreToken');
                    delete app.config.globalProperties.$axios.defaults.headers.Authorization;
                    router.push({path: '/login'})
                }
            }
        );
    }

}
