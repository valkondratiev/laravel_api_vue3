<template>
    <main>
    <Sidebar/>
        <router-view name="sidebar"/>
</main>
</template>

<script>
import Sidebar from "./Sidebar.vue";
export default {
    components: {Sidebar}
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
