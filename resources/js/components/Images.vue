<template>
    <div class="image-wrapper" style="width: 100%">
    <ImageTable @changeImage="changeImageComments($event)"/>
    <Comments :currentImage="currentImage"/>
        </div>
</template>

<script>
import ImageTable from "./ImageTable.vue";
import Comments from "./Comments.vue";
export default {
    data(){
        return {
            currentImage: null,
        }
    },
    name: "Images",
    components: {Comments, ImageTable},
    methods:{
        changeImageComments(currentImage) {
            this.currentImage = currentImage;
        },
    },
}
</script>

<style scoped>

</style>
