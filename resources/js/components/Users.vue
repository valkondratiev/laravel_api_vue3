<template>
    <div class="container-users">
        <div class="tbl-wrp">
            <table class="table table-hover table-bordered table-sm">
                <thead class="table-light">
                <tr>
                    <th class="" scope="col" style="width: 70px">#</th>
                    <th class="w-25" scope="col">Логин</th>
                    <th class="w-25" scope="col">Роль</th>
                    <th class="w-25" scope="col">Дата регистрации</th>
                    <th class="" scope="col" style="width: 150px">Бан</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(user, index) in users" :key="user.id">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.login }}</td>
                    <td>
                        <select @change="updateUser('role', user)" v-model="user.role" class="form-select" aria-label="">
                            <option>admin</option>
                            <option>user</option>
                        </select>
                    </td>
                    <td>{{ user.created_at }}</td>
                    <td>
                        <button v-if="!user.blocked" @click="user.blocked=1;updateUser('blocked', user)" type="button" class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"></path>
                            </svg>
                            В бан
                        </button>
                        <button v-else @click="user.blocked=0;updateUser('blocked', user)" type="button" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z"></path>
                            </svg>
                            Разбанить
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Users",
    data() {
        return {
            users:[],
        }
    },
    mounted() {
        this.fetchUsers();
    },
    methods:{
        fetchUsers() {
            this.$axios.get('/api/users').then((response) => {
                this.users = response.data;
            });
        },
        updateUser(field, user) {
            this.$axios.patch('/api/users/' + user.id, {[field]: user[field]}).then((response) => {
                this.fetchUsers();
            }).catch((error) => {
                this.fetchUsers();
                console.log(error.toJSON());
            })
        }
    },
}
</script>

<style scoped>

.container-users {
    width: 100%;
}

</style>
