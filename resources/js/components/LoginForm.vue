<template>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Логин</label>
                            <input class="form-control" id="login-input">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            login: '',
            password: '',
            validationErrors: [],
            load: false
        }
    }

}
</script>

<style></style>
