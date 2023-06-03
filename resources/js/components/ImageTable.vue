<template>
    <div class="table-wrap">
        <table class="table table-hover table-bordered table-sm">
            <thead class="table-light">
            <tr>
                <th class="" scope="col">#</th>
                <th class="w-50" scope="col">Автор</th>
                <th class="" scope="col">Долгота</th>
                <th class="" scope="col">Широта</th>
                <th class="" scope="col">Время</th>
                <th class="" style="width: 150px" scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(image, index) in images" :key="image.id" @click="selectRow(image.id)" :class="[image.id === this.selectedImage ? 'highlight' : '']">
                <th scope="row">{{ image.id }}</th>
                <td>{{ image.username }}</td>
                <td>{{ image.lat }}</td>
                <td>{{ image.lng }}</td>
                <td>{{ convertDate(image.date) }}</td>
                <td>
                    <button type="button" class="btn btn btn-danger" @click="deleteImage(image.id)" style="margin-right: 20px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                        </svg>
                    </button>
                    <button type="button" class="btn btn btn-info" @click="previewImage(image.url)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="pagination-wrapper">
        <paginate
            :page-count="pageCount"
            :page-range="3"
            :margin-pages="1"
            :click-handler="changePage"
            :prev-text="'Пред.'"
            :next-text="'След.'"
            :container-class="'pagination'"
            :page-class="'page-item'"
        />
    </div>
</template>

<script>
import Pagination from 'vuejs-paginate-next';
export default {
    name: "ImageTable",
    components: {paginate: Pagination},
    data() {
        return {
            images:[],
            currentPage:1,
            pageCount:0,
            selectedImage: null
        }
    },
    created() {
        this.fetchImages()
    },
    methods: {
        fetchImages(page = 1) {
        this.$axios.get('/api/image?page='+ page).then((response) => {
            if(response.data.meta.last_page < page && response.data.meta.last_page !== 0 ) {
                this.fetchImages(response.data.meta.last_page);
            }
            this.images = response.data.data;
            this.pageCount = response.data.meta.last_page;
            this.currentPage = response.data.meta.current_page;
            if(response.data.data.length){
                this.selectedImage = response.data.data[0].id;
            }
            })
        },
        convertDate(date) {
            return new Date(date * 1000).toISOString().slice(0, 16).replace('T',' ')
        },
        deleteImage(id) {
            this.$axios.delete('/api/image/'+ id).then((response) => {
                this.fetchImages(this.currentPage);
            })
        },
        previewImage(url) {
            window.open(url, '_blank').focus();
        },
        changePage (pageNum) {
            this.fetchImages(pageNum);
        },
        selectRow(image){
            this.selectedImage = image;
        }
    },

    watch: {
        selectedImage: {
            handler: function(newSelected, oldSelected) {
                this.$emit('changeImage', newSelected)
            },
        },
    },
    emits: ["changeImage"],
}
</script>

<style scoped>
.pagination-wrapper {
    display: flex;
    justify-content: right;
    margin-right: 20px;
}
.table-wrap {
    min-height: 520px;
}

table.table.table-hover.table-bordered.table-sm tr.highlight td, tr.highlight th {
    background-color: #d6f1d4;
}
tr {
    white-space: nowrap;
}

</style>
