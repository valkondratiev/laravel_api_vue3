import axios from 'axios'
import setAuthHeader from "../../utils/setAuthHeader.js";

export default {
    install(app) {
        app.config.globalProperties.$axios = axios;
        if (localStorage.sequreToken) {
            app.config.globalProperties.$axios.defaults.headers = {
                Authorization: 'Bearer ' + localStorage.sequreToken,
            }
        }
    }

}
