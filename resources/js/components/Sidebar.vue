<template>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="people-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
            <path fill-rule="evenodd"
                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
        </symbol>
        <symbol id="grid" viewBox="0 0 16 16">
            <path
                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"></path>
        </symbol>
    </svg>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="http://127.0.0.1:8000/storage/logo.png" style="width: 80px">
            <span class="fs-4">Админ-панель</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <router-link to="/images">
                    <a href="#" :class="'nav-link link-dark' + [this.currentModule == 'index.images' ? ' active' : '']">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Фотографии
                    </a>
                </router-link>
            </li>
            <li>
                <router-link to="/users">
                    <a href="#" :class="'nav-link link-dark' + [this.currentModule == 'index.users' ? ' active' : '']">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Пользователи
                    </a>
                </router-link>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <button @click="logout" type="button" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"></path>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"></path>
                </svg>
                Выйти
            </button>
        </div>
    </div>
    <div class="b-example-divider"></div>
</template>

<script>
    import router from "../router/index.js";

    export default {
        data(){
            return {
                currentModule : 'index.images'
            }
        },
        watch:{
            $route (to, from) {
                this.currentModule = to.name;
            }
        },
        mounted() {
            router.push({ path: '/images' });
        },
        methods:{
            logout(){
                localStorage.removeItem('sequreToken');
                delete this.$axios.defaults.headers.Authorization;
                router.push({path: '/login'})
            }
        }
    }
</script>

<style>
main {
    display: flex;
    flex-wrap: nowrap;
    height: 100vh;
    height: -webkit-fill-available;
    max-height: 100vh;
    overflow-x: auto;
    overflow-y: hidden;
}

body {
    min-height: 100vh;
    min-height: -webkit-fill-available;
}

html {
    height: -webkit-fill-available;
}


.b-example-divider {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.bi {
    vertical-align: -.125em;
    pointer-events: none;
    fill: currentColor;
}

.dropdown {
    text-align: center;
}

.nav-flush .nav-link {
    border-radius: 0;
}


.btn-toggle-nav a {
    display: inline-flex;
    padding: .1875rem .5rem;
    margin-top: .125rem;
    margin-left: 1.25rem;
    text-decoration: none;
}

.btn-toggle-nav a:hover,
.btn-toggle-nav a:focus {
    background-color: #d2f4ea;
}
a {
    text-decoration: none;
}
</style>
