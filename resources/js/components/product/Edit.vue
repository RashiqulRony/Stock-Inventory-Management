<template>
    <div class="content-page">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Product Edit</h4>
                    </div>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" @submit.prevent="update()">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="category">Category:</label>
                                    <div class="col-sm-9">
                                        <v-select :reduce="(option) => option.id"
                                                  :options="categories"
                                                  v-model="product.category"
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
                                    <label class="control-label col-sm-3 align-self-center" for="name">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" v-model="product.name" class="form-control" id="name" placeholder="Enter product name">
                                        <span v-if="errors.name" class="error text-danger">{{ errors.name[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="image">Product Image:</label>
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
                                    <label class="control-label col-sm-3 align-self-center" for="description">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea v-model="product.description" class="form-control" rows="3" id="description" placeholder="Enter description"></textarea>
                                        <span v-if="errors.description" class="error text-danger">{{ errors.description[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="notes">Notes:</label>
                                    <div class="col-sm-9">
                                        <textarea v-model="product.notes" class="form-control" rows="3" id="notes" placeholder="Enter notes"></textarea>
                                        <span v-if="errors.notes" class="error text-danger">{{ errors.notes[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="status">Status:</label>
                                    <div class="col-sm-9">
                                        <v-select v-model="product.status" id="status" style="width: 100%" placeholder="Select Status" :options="['Active','Inactive']"/>
                                        <span v-if="errors.status" class="error text-danger">{{ errors.status[0] }}</span>
                                    </div>
                                </div>
                            </div>

                            <div v-if="data.image" class="col-md-4 col-sm-12 col-lg-4">
                                <img class="img-fluid" :src="assetPath+'product/'+ data.image">
                            </div>

                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h5 class="mt-3">Product Variants</h5>
                                <div v-for="(variant, index) in variants" :key="'var_'+index"  class="form-row mt-2">
                                    <div class="col">
                                        <input type="text" v-model="variant.code" class="form-control" placeholder="code">
                                    </div>
                                    <div class="col">
                                        <input type="text" v-model="variant.color" class="form-control" placeholder="color">
                                    </div>
                                    <div class="col">
                                        <input type="text" v-model="variant.size" class="form-control" placeholder="size">
                                    </div>
                                    <div class="col">
                                        <input type="number" min="1" v-model="variant.pieces" class="form-control" placeholder="pieces">
                                    </div>
                                    <div class="col">
                                        <input type="text" v-model="variant.weight" class="form-control" placeholder="weight">
                                    </div>
                                    <div class="col">
                                        <input type="number" required step="0.01" min="1" max="99999999" v-model="variant.cost" class="form-control" placeholder="cost">
                                    </div>
                                    <div class="col">
                                        <input type="number" required step="0.01" min="1" max="99999999" v-model="variant.price" class="form-control" placeholder="price">
                                    </div>
                                    <div class="col">
                                        <input type="number" required min="1" max="99999999" v-model="variant.stock" class="form-control" placeholder="stock">
                                    </div>
                                    <div class="col">
                                        <button style="float: right; height: 45px;" v-if="index !== 0" @click="remove(index)" type="button" class="btn btn-outline-danger">Remove</button>
                                        <button style="float: right; height: 45px;" v-else @click="addMore()" type="button" class="btn btn-outline-success">Add More</button>
                                    </div>
                                </div>

                                <div class="form-group text-right mt-5">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>

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
            product: {
                category: '',
                subcategory: '',
                brand: '',
                name: '',
                description: '',
                notes: '',
                status: '',
            },
            variants: [{
                code: "",
                color: "",
                size: "",
                weight: "",
                cost: "",
                price: "",
                stock: "",
                pieces: "",
            }],
            categories: [],
            subcategories: [],
            brands: [],
            errors: [],

        };
    },

    mounted() {
        this.getCategories();
        this.getBrands();
        this.getData();
    },

    methods:{
        getData() {
            axios.get(Api.product+"/"+this.$route.params.id, { headers: store.getters.headers })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.getSelectedSubcategory(response.data.category_id,)
                        this.data = response.data
                        this.product = {
                            category: response.data.category_id,
                            subcategory: response.data.subcategory_id,
                            brand: response.data.brand_id,
                            name: response.data.name,
                            description: response.data.descriptions,
                            notes: response.data.notes,
                            status: response.data.status,
                        }
                        if (response.data.variants.length > 0) {
                            this.variants = response.data.variants
                        }

                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        update() {
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
            postData.append('subcategory', this.product.subcategory);
            postData.append('brand', this.product.brand);
            postData.append('name', this.product.name);
            postData.append('description', this.product.description);
            postData.append('notes', this.product.notes);
            postData.append('status', this.product.status);
            postData.append('variants', JSON.stringify(this.variants));
            postData.append('_method', "PUT");

            axios.post(Api.product+"/"+this.$route.params.id, postData, { headers: store.getters.headers, config })
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

        getSubcategory(e) {
            let item = this.categories.find(item => item.id === e);
            this.product.category = e;
            if (item.subcategories.length > 0) {
                this.product.subcategory = '';
                this.subcategories = item.subcategories;
            } else {
                this.subcategories = [];
                this.product.subcategory = '';
            }
        },

        getSelectedSubcategory(category_id) {
            axios.get(Api.common.getCatWiseSubcat+'/'+category_id, { headers: store.getters.headers })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.subcategories = response.data
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
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

        addMore() {
            this.variants.push({
                code: "",
                color: "",
                size: "",
                weight: "",
                cost: "",
                price: "",
                stock: "",
                pieces: "",
            });
        },
        remove(index) {
            this.variants.splice(index, 1);
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
