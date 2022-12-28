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
                                        <h4 class="card-title">Purchases</h4>
                                    </div>
                                    <div class="col-6">
                                        <router-link class="btn btn-sm btn-primary rounded-pill" style="float: right" :to="'/sale/create'">
                                            <i class="ri-add-line"></i>
                                            Create
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

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

}
</script>

<style scoped>

</style>
