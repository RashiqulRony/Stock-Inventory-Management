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
                                        <h4 class="card-title">Customers</h4>
                                    </div>
                                    <div class="col-6">
                                        <router-link class="btn btn-sm btn-primary rounded-pill" style="float: right" :to="'/customer/create'">
                                            <i class="ri-add-line"></i>
                                            Create
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="getData" class="mb-3">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" v-model="filter" class="form-control" placeholder="Name, Email, Phone Number, Address">
                                    </div>

                                    <div class="col">
                                        <button style="height: 45px" class="btn btn-outline-success">Search</button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Points</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(row, index) in allData.data" :key="index">
                                        <th scope="row">{{ ((allData.current_page - 1) * allData.per_page + index) + 1 }}</th>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img v-if="row.photo" :src="assetPath + '/customer/' +row.photo" class="img-fluid rounded avatar-50 mr-3" :alt="row.name">
                                                <div>
                                                    {{ row.name }}
                                                    <p v-if="row.address" class="mb-0"><small>{{ row.address }}</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ row.email }}</td>
                                        <td>{{ row.phone }}</td>
                                        <td style="line-height: 1.5">
                                            <span>Total Point : {{ row.total_point }}</span> <br>
                                            <span>Withdraw Point : {{ parseFloat(row.total_point) - parseFloat(row.point) }}</span> <br>
                                            <span>Current Point: {{ row.point }}</span>
                                        </td>
                                        <td>{{ row.status }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                <div class="btn-group" role="group">
                                                    <button :id="'btnGroupDrop'+index" type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" :aria-labelledby="'btnGroupDrop'+index" style="">
                                                        <router-link class="dropdown-item" :to="{name: 'CustomerEdit', params: {id: row.id}}">Edit</router-link>
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

                <div v-if="allData.links" class="col-md-12 col-lg-12 col-sm-12">
                    <Paginate v-on:changepage="getData($event)" :from="allData.from" :to="allData.to" :total="allData.total" :links="allData.links" :currentPage="allData.current_page"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Paginate from "vue-laravel-paginate";

export default {
    components: {
        Paginate
    },

    data() {
        return {
            allData: [],
            filter: '',
        }
    },

    mounted() {
        this.getData()
    },

    methods:{

        getData(page = 1) {
            this.$store.dispatch("isLoading", true)
            axios.get(Api.customer + '?page='+page+'&filter='+this.filter, { headers: store.getters.headers })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.allData = response.data
                        this.$store.dispatch("isLoading", false)
                    } else {
                        this.allData = []
                        this.$store.dispatch("isLoading", false)
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
                    axios.delete(Api.customer+"/"+id, { headers: store.getters.headers })
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
