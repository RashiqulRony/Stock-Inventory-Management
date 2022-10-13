<template>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Product Create</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" @submit.prevent="create()">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="category">Category:</label>
                                    <div class="col-sm-9">
                                        <v-select v-model="product.category"
                                                  :reduce="(option) => option.id"
                                                  :options="categories"
                                                  label="title" id="category"
                                                  style="width: 100%"
                                                  @input="getSubcategory"
                                                  placeholder="Select category" />
                                        <span v-if="errors.category" class="error text-danger">{{ errors.category[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="subcategory">Subcategory:</label>
                                    <div class="col-sm-9">
                                        <v-select v-model="product.subcategory"
                                                  :reduce="(option) => option.id"
                                                  :options="subcategories"
                                                  label="title" id="subcategory"
                                                  style="width: 100%"
                                                  placeholder="Select subcategory" />
                                        <span v-if="errors.subcategory" class="error text-danger">{{ errors.subcategory[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="brand">Brand:</label>
                                    <div class="col-sm-9">
                                        <v-select v-model="product.brand"
                                                  :reduce="(option) => option.id"
                                                  :options="brands"
                                                  label="title" id="brand"
                                                  style="width: 100%"
                                                  placeholder="Select brand" />
                                        <span v-if="errors.brand" class="error text-danger">{{ errors.brand[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="title">Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" v-model="product.title" class="form-control" id="title" placeholder="Enter product title">
                                        <span v-if="errors.title" class="error text-danger">{{ errors.title[0] }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="description">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea v-model="product.description" class="form-control" rows="3" id="description" placeholder="Enter description"></textarea>
                                        <span v-if="errors.description" class="error text-danger">{{ errors.description[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="image">product Image:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" id="image">
                                                <label class="custom-file-label selected" for="image"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="title">Status:</label>
                                    <div class="col-sm-9">
                                        <v-select v-model="product.status" style="width: 100%" placeholder="Select Status" :options="['Active','Inactive']"/>
                                        <span v-if="errors.status" class="error text-danger">{{ errors.status[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
            product: {
                category: '',
                subcategory: '',
                brand: '',
                name: '',
                description: '',
                notes: '',
                status: '',
            },
            categories: [],
            subcategories: [],
            brands: [],
            errors: [],
        };
    },

    mounted() {
        this.getCategories();
        this.getBrands();
    },

    methods:{
        create() {
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            };

            let postData = new FormData();
            let image = document.getElementById("image").files[0];
            if (image !== undefined){
                if(image.type === 'image/jpeg' || image.type === 'image/png' || image.type === 'image/webp' || image.type === 'image/gif'){
                    postData.append('image', image);
                }else {
                    alert('This file is not an image')
                }
            }
            postData.append('category', this.product.category);
            postData.append('title', this.product.title);
            postData.append('description', this.product.description);
            postData.append('status', this.product.status);

            axios.post(Api.product, postData, { headers: store.getters.headers, config })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.alertMessage('success', response.message)
                        this.$router.push({ path: `/product` });
                    } else {
                        this.errors = response.errors
                    }
                })
                .catch((error) => {
                    this.alertMessage('error', 'Something went wrong. Please try again')
                    console.log(error);
                });
        },

        getCategories() {
            axios.get(Api.common.getCategories, { headers: store.getters.headers })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.categories = response.data
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        getSubcategory() {
            let item = this.categories.find(item => item.id === this.product.category);
            if (item.subcategories.length > 0) {
                this.subcategories = item.subcategories;
            } else {
                this.subcategories = [];
                this.product.subcategory = '';
            }
        },

        getBrands() {
            axios.get(Api.common.getBrands, { headers: store.getters.headers })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.brands = response.data
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
