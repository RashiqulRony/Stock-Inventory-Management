<template>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title">Brands</h4>
                                    </div>
                                    <div class="col-6">
                                        <router-link class="btn btn-sm btn-primary rounded-pill" style="float: right" :to="'/brand/create'">
                                            <i class="ri-add-line"></i>
                                            Create
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(row, index) in allData" :key="index">
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>
                                            <img v-if="row.image" width="80" :src="assetPath + '/brand/' +row.image">
                                        </td>
                                        <td>{{ row.title }}</td>
                                        <td>{{ row.description }}</td>
                                        <td>{{ row.status }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                <div class="btn-group" role="group">
                                                    <button :id="'btnGroupDrop'+index" type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" :aria-labelledby="'btnGroupDrop'+index" style="">
                                                        <router-link class="dropdown-item" :to="{name: 'BrandEdit', params: {id: row.id}}">Edit</router-link>
                                                        <a @click="deleteRow(row.id)" class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            allData: []
        }
    },

    mounted() {
        this.getData()
    },

    methods:{

        getData() {
            axios.get(Api.brand, { headers: store.getters.headers })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.allData = response.data
                    } else {
                        this.allData = []
                    }
                })
                .catch((error) => {
                    this.alertMessage('error', 'Something went wrong. Please try again')
                    console.log(error);
                });
        },

        deleteRow(id) {
            this.$swal.fire({
                title: 'Are you sure?',
                text: 'Do you want delete this row?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(Api.brand+"/"+id, { headers: store.getters.headers })
                        .then((response) => response.data)
                        .then((response) => {
                            if (response.status === true) {
                                this.alertMessage('success', response.message)
                                this.getData()
                            } else {
                                this.alertMessage('error', 'Something went wrong. Please try again')
                            }
                        })
                        .catch((error) => {
                            this.alertMessage('error', 'Something went wrong. Please try again')
                            console.log(error);
                        });
                }
            })
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
