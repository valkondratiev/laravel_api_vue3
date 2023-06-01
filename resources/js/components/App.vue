<template>
        <Sidebar/>
        <router-view />
</template>

<script>
import Sidebar from "./Sidebar.vue";
export default {
    components: {Sidebar}
}

</script>
