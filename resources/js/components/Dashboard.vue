<template>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-transparent card-block card-stretch card-height border-none">
                        <div class="card-body p-0 mt-lg-2 mt-0">
                            <h3 class="mb-3">Hi {{ $store.getters.authUser.name }}, {{ message }}</h3>
                            <p class="mb-0 mr-4">Your dashboard gives you views of key performance or business
                                process.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="card card-transparent card-block card-stretch card-height border-none">
                        <div class="card-body p-0 mt-lg-2 mt-0">
                            <div class="LCD">
                                <div style="letter-spacing: 7px;" id="clock"> {{ clock }}</div> <br>
                                <div style="font-size: 30px;" id="today"> {{ today }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4 card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="assets/images/product/1.png" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <p class="mb-2">Total Sales</p>
                                            <h4>31.50</h4>
                                        </div>
                                    </div>
                                    <div class="iq-progress-bar mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="85">
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4 card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-danger-light">
                                            <img src="assets/images/product/2.png" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <p class="mb-2">Total Cost</p>
                                            <h4>$ 4598</h4>
                                        </div>
                                    </div>
                                    <div class="iq-progress-bar mt-2">
                                    <span class="bg-danger iq-progress progress-1" data-percent="70">
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4 card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-success-light">
                                            <img src="assets/images/product/3.png" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <p class="mb-2">Product Sold</p>
                                            <h4>4589 M</h4>
                                        </div>
                                    </div>
                                    <div class="iq-progress-bar mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="75">
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Overview</h4>
                            </div>
                            <div class="card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton001"
                                      data-toggle="dropdown">
                                    This Month<i class="ri-arrow-down-s-line ml-1"></i>
                                </span>
                                    <div class="dropdown-menu dropdown-menu-right shadow-none"
                                         aria-labelledby="dropdownMenuButton001">
                                        <a class="dropdown-item" href="#">Year</a>
                                        <a class="dropdown-item" href="#">Month</a>
                                        <a class="dropdown-item" href="#">Week</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="layout1-chart1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Revenue Vs Cost</h4>
                            </div>
                            <div class="card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton002"
                                      data-toggle="dropdown">
                                    This Month<i class="ri-arrow-down-s-line ml-1"></i>
                                </span>
                                    <div class="dropdown-menu dropdown-menu-right shadow-none"
                                         aria-labelledby="dropdownMenuButton002">
                                        <a class="dropdown-item" href="#">Yearly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="layout1-chart-2" style="min-height: 360px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: '',
            clock: '',
            today: '',
        }
    },
    mounted() {
        this.getStatus()
        setInterval(() => this.currentTime(), 1000)
    },
    methods: {
        getStatus() {
            let today = new Date()
            let curHr = today.getHours()
            if (curHr < 12) {
                this.message = 'Good Morning'
            } else if (curHr < 18) {
                this.message = 'Good Afternoon'
            } else {
                this.message = 'Good Evening'
            }
        },

        currentTime() {
            let date = new Date();
            // let todayDate = date.toDateString();
            let hh = date.getHours();
            let mm = date.getMinutes();
            let ss = date.getSeconds();
            let session = "AM";
            let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            let todayDate = date.toLocaleDateString("bn-BD", options)

            if(hh === 0){
                hh = 12;
            }
            if(hh > 12){
                hh = hh - 12;
                session = "PM";
            }

            hh = (hh < 10) ? "0" + hh : hh;
            mm = (mm < 10) ? "0" + mm : mm;
            ss = (ss < 10) ? "0" + ss : ss;

            // document.getElementById("clock").innerText = hh + ":" + mm + ":" + ss + " " + session;
            this.clock = hh + ":" + mm + ":" + ss + " " + session;
            // document.getElementById("today").innerText = todayDate;
            this.today = todayDate

        }
    }
}
</script>
<style scoped>
.LCD > div {
    font-family: cursive;
    font-size: 40px;
}
</style>
