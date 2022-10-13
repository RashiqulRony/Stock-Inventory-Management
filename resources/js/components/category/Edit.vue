<template>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Category Edit</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" @submit.prevent="update()">

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="title">Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" v-model="category.title" class="form-control" id="title" placeholder="Enter category title">
                                        <span v-if="errors.title" class="error text-danger">{{ errors.title[0] }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="description">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea v-model="category.description" class="form-control" rows="3" id="description" placeholder="Enter description"></textarea>
                                        <span v-if="errors.description" class="error text-danger">{{ errors.description[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="categoryImage">Category Image:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" id="categoryImage">
                                                <label class="custom-file-label selected" for="categoryImage"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="title">Status:</label>
                                    <div class="col-sm-9">
                                        <v-select v-model="category.status" style="width: 100%" placeholder="Select Status" :options="['Active','Inactive']"/>
                                        <span v-if="errors.status" class="error text-danger">{{ errors.status[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div v-if="data.image" class="col-md-4 col-sm-12 col-lg-4">
                    <img class="img-fluid" :src="assetPath+'category/'+ data.image">
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

export default {
    components: {
        vSelect
    },

    data() {
        return {
            data: '',
            category: {
                title: '',
                description: '',
                status: '',
            },

            errors: [],
        };
    },

    mounted() {
        this.getData()
    },

    methods:{
        update() {
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            };

            let postData = new FormData();
            let image = document.getElementById("categoryImage").files[0];
            if (image !== undefined){
                if(image.type === 'image/jpeg' || image.type === 'image/png' || image.type === 'image/webp' || image.type === 'image/gif'){
                    postData.append('image', image);
                }else {
                    alert('This file is not an image')
                }
            }
            postData.append('title', this.category.title);
            postData.append('description', this.category.description);
            postData.append('status', this.category.status);
            postData.append('_method', "PUT");

            axios.post(Api.category+"/"+this.$route.params.id, postData, { headers: store.getters.headers, config })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.alertMessage('success', response.message)
                        this.$router.push({ path: `/category` });
                    } else {
                        this.errors = response.errors
                    }
                })
                .catch((error) => {
                    this.alertMessage('error', 'Something went wrong. Please try again')
                    console.log(error);
                });
        },

        getData() {
            axios.get(Api.category+"/"+this.$route.params.id, { headers: store.getters.headers })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.data = response.data
                        this.category = {
                            title: response.data.title,
                            description: response.data.description,
                            status: response.data.status,
                        }

                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        alertMessage(type, message) {
            this.$swal.fire({
                toast: true,
                icon: type,
                title: message,
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        }
    }
}
</script>

<style scoped>
.custom-file-label{
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
