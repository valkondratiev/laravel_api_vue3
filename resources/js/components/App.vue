<template>
    <main>
        <ErrorBox :text="error" @errorClose="errorRead()"/>
        <Sidebar/>
        <router-view name="sidebar"/>
    </main>
</template>

<script>
import Sidebar from "./Sidebar.vue";
import ErrorBox from "./ErrorBox.vue";
export default {
    components: {
        Sidebar,
        ErrorBox
    },
    data() {
        return {
            error:''
        }
    },
    methods: {
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
</style>
