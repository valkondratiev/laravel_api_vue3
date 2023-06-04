<template>
    <ErrorBox :text="error" @errorClose="errorRead()"/>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-4 bd-example">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Логин</label>
                            <input v-model="login" class="form-control" id="login-input">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Пароль</label>
                            <input v-model="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="text-center">
                            <button @click='submitLogin' class="btn btn-primary">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
            <Preloader :load="load"/>
        </div>
    </div>
</template>

<script>
import setAuthHeader from "../../utils/setAuthHeader.js";
import router from "../router/index.js";
import Preloader from "./Preloader.vue";
import ErrorBox from "./ErrorBox.vue";

export default {
    components:{
        Preloader,
        ErrorBox
    },
    data() {
        return {
            login: '',
            password: '',
            validationErrors: [],
            load: false,
            error:''
        }
    },

    methods: {
        submitLogin(e) {
            e.preventDefault();
            //validate data
            this.load = true;
            let loginAxios = this.$axios.create();
            delete loginAxios.defaults.headers.Authorization;
            loginAxios.interceptors.response = this.$axios.interceptors.response;

            loginAxios.post('/api/account/signin', {
                login: this.login,
                password: this.password
            }).then((response) => {
                localStorage.setItem('sequreToken', response.data.token);
                setAuthHeader(this, response.data.token);
                router.push({path: '/images'});
            })
                .finally(()=> this.load = false)
        },
        errorRead(){
            this.error = '';
        },
    },
    mounted() {
        this.emitter.on("newError", msg => {
            this.error = msg;
        });
    }
}
</script>

<style scoped>
.bd-example {
    position: relative;
    padding: 1rem;
    margin: 1rem -.75rem 0;
    border: solid #dee2e6;
    border-width: 1px 0 0
}

.bd-example::after {
    display: block;
    clear: both;
    content: ""
}

@media (min-width: 576px) {
    .bd-example {
        padding:1.5rem;
        margin-right: 0;
        margin-left: 0;
        border-width: 1px;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem
    }

    .bd-example+.bd-clipboard+.highlight {
        border-bottom-right-radius: .25rem;
        border-bottom-left-radius: .25rem
    }
}

</style>
