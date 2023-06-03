<template>
    <h5>Комментарии :</h5>
    <div id="comments-container" class="col-sm-5 col-md-6 col-12 pb-4 overflow-auto" ref="scrollComponent" style="display: flex;flex-direction: column;align-items: center;width: 100%;height: calc(100% - 606px);" >
        <div v-if="comments.length" v-for="(comment, index) in comments" :class="[ index % 2 == 0 ? 'test text-justify darker mt-4 float-right' : 'test comment mt-4 text-justify float-left']" style="width: 600px;">
            <h4>{{ comment.author + ' (id:' + comment.id + ')' }}</h4>
            <span> - {{ convertDate(comment.date) }}</span>
            <br>
            <p>{{ comment.text }}</p>
        </div>
        <div v-else style="margin-top: 50px; font-style: italic"> Комментарии отсутствуют... </div>
    </div>
</template>

<script>
export default {
    name: "Comments",
    data(){
        return {
            comments : [],
            currentPage:0,
            lastPage:0,
        }
    },
    props: {
        currentImage:{
            default:null
        }
    },
    methods:{
        fetchComments() {
            let page = 1;
            if(this.currentPage!=0 && this.lastPage!=0 && this.currentPage < this.lastPage) {
                page = this.currentPage + 1;
            }
            if(this.currentPage === this.lastPage  && this.currentPage!==0) {
                return;
            }
            this.$axios.get('/api/image/'+this.currentImage+'/comment?page=' + page).then((response) => {
                if(response.data.meta.current_page > 1) {
                    this.comments = this.comments.concat(response.data.data) ;
                } else {
                    this.comments = response.data.data;
                }
                if(response.data.data.length) {
                    this.currentPage = response.data.meta.current_page;
                    this.lastPage = response.data.meta.last_page;
                }
            })
        },
        convertDate(date) {
            let options = {
                year: "numeric",
                month: "long",
                day: "numeric",
                hour: "2-digit",
                minute: "2-digit"
            }
            return new Date(date * 1000).toLocaleDateString('ru-RU', options)
        },
        handleScroll() {
            let element = document.getElementById("comments-container");
            if(element.scrollTop + element.offsetHeight >= element.scrollHeight) {
                this.fetchComments();
            }
        },
    },
    watch: {
        currentImage: {
            handler: function(newSelected, oldSelected) {
                this.comments = [];
                this.currentPage = 0;
                this.lastPage = 0;
                this.fetchComments();
            },
        }
    },
    mounted() {
        document.getElementById("comments-container").addEventListener("scroll", this.handleScroll);
    },

}
</script>

<style scoped>

body{
    background-color: black;
}


.darker{
    border: 1px solid #0b074a;
    background-color: #2a205e;
    border-radius: 5px;
    padding-left: 40px;
    padding-right: 30px;
    padding-top: 10px;

}

.comment{
    border: 1px solid rgb(16, 46, 46, 1);
    background-color: rgb(9 120 110 / 97%);
    border-radius: 5px;
    padding-left: 40px;
    padding-right: 30px;
    padding-top: 10px;

}
.comment h4,.comment span,.darker h4,.darker span{
    display: inline;
}

.comment p,.comment span,.darker p,.darker span{
    color: rgb(184, 183, 183);
}

h4{
    color: white;
    font-weight: bold;
}
h5{
    text-align: center;
}
label{
    color: rgb(212, 208, 208);
}

.form-group p a{
    color: white;
}

#darker img{
    margin-right: 15px;
    position: static;
}

.form-group input,.form-group textarea{
    background-color: black;
    border: 1px solid rgba(16, 46, 46, 1);
    border-radius: 12px;
}

form{
    border: 1px solid rgba(16, 46, 46, 1);
    background-color: rgba(16, 46, 46, 0.973);
    border-radius: 5px;
    padding: 20px;
}

</style>
