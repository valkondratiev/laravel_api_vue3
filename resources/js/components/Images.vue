<template>
    <div class="image-wrapper" style="width: 100%">
    <ImageTable/>
    <Comments/>
        </div>
</template>

<script>
import ImageTable from "./ImageTable.vue";
import Comments from "./Comments.vue";
export default {
    name: "Images",
    components: {Comments, ImageTable}
}
</script>

<style scoped>

</style>
