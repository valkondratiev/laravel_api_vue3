<template>
    <div class="alert" v-if="text!==''">
        <span class="closebtn" @click="close">&times;</span>
        <strong>Error!</strong> {{ text }}
    </div>
</template>

<script>
export default {
    name: "ErrorBox",
    props:{
        text:{
            required:true,
            type:String,
        }
    },
    emits:['errorClose'],
    methods:{
        close() {
            this.$emit('errorClose');
        }
    },
    watch: {
        'text'(newValue) {
            if (newValue !== '') {
                setTimeout(() => this.close(), 2000);
            }
        }
    }
}
</script>

<style scoped>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    position: absolute;
    right: 15px;
    z-index: 10;
}
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}
.closebtn:hover {
    color: black;
}
</style>
