<template>
    <div class="content-page">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Product View</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th width="20%">Name</th>
                                <th width="1%">:</th>
                                <td>{{ data.name }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <th>:</th>
                                <td>{{ data.category_title }}</td>
                            </tr>
                            <tr>
                                <th>Subcategory</th>
                                <th>:</th>
                                <td>{{ data.subcategory_title }}</td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <th>:</th>
                                <td>{{ data.brand_title }}</td>
                            </tr>
                            <tr>
                                <th>Descriptions</th>
                                <th>:</th>
                                <td>{{ data.descriptions }}</td>
                            </tr>
                            <tr>
                                <th>Notes</th>
                                <th>:</th>
                                <td>{{ data.notes }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <th>:</th>
                                <td>{{ data.status }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <th>:</th>
                                <td>
                                    <img width="100" :src="assetPath+'product/'+ data.image">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Product Variants</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Code</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Pieces</th>
                                <th>Weight</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Stock</th>
                            </tr>
                            <template v-if="data.variants.length > 0">
                                <tr v-for="(variant, index) in data.variants" :key="'vt'+index">
                                    <td>{{ variant.code }}</td>
                                    <td>{{ variant.color }}</td>
                                    <td>{{ variant.size }}</td>
                                    <td>{{ variant.pieces }}</td>
                                    <td>{{ variant.weight }}</td>
                                    <td>{{ variant.cost }}</td>
                                    <td>{{ variant.price }}</td>
                                    <td>{{ variant.stock }}</td>
                                </tr>
                            </template>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            data: '',

        };
    },

    mounted() {
        this.getData();
    },

    methods:{
        getData() {
            axios.get(Api.product+"/"+this.$route.params.id, { headers: store.getters.headers })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.data = response.data
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
