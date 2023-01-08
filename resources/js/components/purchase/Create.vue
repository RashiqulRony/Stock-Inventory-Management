<template>
    <div class="content-page">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Purchase Create</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="name">Product Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" placeholder="Enter product name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <strong>Product Info</strong>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="row">
                            <InputTag v-model="tags" class="form-control" style="line-height: 35px;" />
                            {{ tags }}
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
import InputTag from "../share/InputTag";

export default {
    components: {
        vSelect,
        InputTag
    },

    data() {
        return {
            errors: [],
            tags: []
        };
    },

    mounted() {

    },

    methods:{
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

</style>
