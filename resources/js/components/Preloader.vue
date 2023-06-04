<template>
<div v-if="load" class="full-width-loading"></div>
</template>

<script>
export default {
    name: "Preloader",
    props:{
        load:{
            type:Boolean,
            required:true
        }
    }
}
</script>

<style scoped>
.full-width-loading {
    z-index: 999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    text-align: center;
    background: rgba(255, 255, 255, .7);
    position: absolute
}

.full-width-loading:after {
    position: absolute;
    top: 50%;
    left: 50%;
    display: block;
    width: 36px;
    height: 36px;
    margin: -18px auto auto -18px;
    content: '';
    border: solid 3px;
    border-color: #f6846a transparent;
    border-radius: 100%;
    animation: spin 1s infinite linear
}

</style>
