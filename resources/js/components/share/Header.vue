<template>
    <div>
        <template v-if="$store.getters.isLoading">
            <div class="loading">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </template>
        <div class="iq-sidebar  sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a :href="'/dashboard'" class="header-logo">
                    <template v-if="$store.getters.authUser.logo">
                        <img style="height: 45px" :src="this.assetPath+$store.getters.authUser.logo" class="img-fluid rounded-normal light-logo" :alt="this.domainName">
                    </template>
                    <template v-else>
                        <img :src="'/assets/images/logo.png'" class="img-fluid rounded-normal light-logo" :alt="this.domainName">
                        <h5 class="logo-title ml-3">{{ this.domainName }}</h5>
                    </template>
                </a>
                <div @click="menuSlideShow()" class="iq-menu-bt-sidebar ml-0">
                    <i class="las la-bars wrapper-menu" :class="menuSlide === true ? 'menuSlide' : ''"></i>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li :class="{active : this.$route.name === 'Dashboard'}">
                            <a @click="changeRoute('Dashboard')">
                                <svg class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                                <span class="ml-4">Dashboards</span>
                            </a>
                        </li>
                        <li :class="{active : this.$route.name === 'Category'}">
                            <a @click="changeRoute('Category')">
                                <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                <span class="ml-4">Categories</span>
                            </a>
                        </li>
                        <li :class="{active : this.$route.name === 'Subcategory'}">
                            <a @click="changeRoute('Subcategory')">
                                <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                <span class="ml-4">Subcategories</span>
                            </a>
                        </li>

                        <li :class="{active : this.$route.name === 'Brand'}">
                            <a @click="changeRoute('Brand')" class="">
                                <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Brands</span>
                            </a>
                        </li>


                        <li :class="{active : this.$route.name === 'Product'}">
                            <a @click="changeRoute('Product')">
                                <svg class="svg-icon" id="p-dash2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span class="ml-4">Products</span>
                            </a>
                        </li>

                        <li :class="{active : this.$route.name === 'Purchase'}">
                            <a @click="changeRoute('Purchase')">
                                <svg class="svg-icon" id="p-dash5" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                <span class="ml-4">Purchases</span>
                            </a>
                        </li>

                        <li :class="{active : this.$route.name === 'Sale'}">
                            <a @click="changeRoute('Sale')">
                                <svg class="svg-icon" id="p-dash4" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                    <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                </svg>
                                <span class="ml-4">Sale</span>
                            </a>
                        </li>
                        <li :class="{active : this.$route.name === 'Customer'}">
                            <a @click="changeRoute('Customer')">
                                <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span class="ml-4">Customers</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Reports</span>
                            </a>
                            <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li>
                    </ul>
                </nav>

                <div class="p-3"></div>
            </div>
        </div>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a :href="'/dashboard'" class="header-logo">
                            <template v-if="$store.getters.authUser.logo">
                                <img style="height: 45px" :src="this.assetPath+$store.getters.authUser.logo" class="img-fluid rounded-normal" :alt="this.domainName">
                            </template>
                            <template v-else>
                                <img :src="'/assets/images/logo.png'" class="img-fluid rounded-normal" :alt="this.domainName">
                                <h5 class="logo-title ml-3">{{ this.domainName }}</h5>
                            </template>

                        </a>
                    </div>
                    <div class="iq-search-bar device-search">

                    </div>
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-bell">
                                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                        </svg>
                                        <span class="bg-primary "></span>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 ">
                                                <div class="cust-title p-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h5 class="mb-0">Notifications</h5>
                                                        <a class="badge badge-primary badge-card" href="#">3</a>
                                                    </div>
                                                </div>
                                                <div class="px-3 pt-0 pb-0 sub-card">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center cust-card py-3 border-bottom">
                                                            <div class="">
                                                                <img class="avatar-50 rounded-small" :src="'/assets/images/user/01.jpg'" alt="01">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Emma Watson</h6>
                                                                    <small class="text-dark"><b>12 : 47 pm</b></small>
                                                                </div>
                                                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center cust-card py-3 border-bottom">
                                                            <div class="">
                                                                <img class="avatar-50 rounded-small" :src="'/assets/images/user/02.jpg'" alt="02">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Ashlynn Franci</h6>
                                                                    <small class="text-dark"><b>11 : 30 pm</b></small>
                                                                </div>
                                                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center cust-card py-3">
                                                            <div class="">
                                                                <img class="avatar-50 rounded-small" :src="'/assets/images/user/03.jpg'" alt="03">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Kianna Carder</h6>
                                                                    <small class="text-dark"><b>11 : 21 pm</b></small>
                                                                </div>
                                                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#"
                                                   role="button">
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown caption-content">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img v-if="$store.getters.authUser.avatar" :src="this.assetPath+$store.getters.authUser.avatar" class="img-fluid rounded" :alt="$store.getters.authUser.name">
                                        <img v-else :src="'/assets/images/user/1.png'" class="img-fluid rounded" alt="user">
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 text-center">
                                                <div class="media-body profile-detail text-center">
                                                    <img :src="'/assets/images/page-img/profile-bg.jpg'" alt="profile-bg" class="rounded-top img-fluid mb-4">
                                                    <template>
                                                        <img v-if="$store.getters.authUser.avatar" :src="this.assetPath+$store.getters.authUser.avatar" alt="profile-img" class="rounded profile-img img-fluid avatar-70">
                                                        <img v-else :src="'/assets/images/user/1.png'" alt="profile-img" class="rounded profile-img img-fluid avatar-70">
                                                    </template>

                                                </div>
                                                <div class="p-3">
                                                    <h5 class="mb-1">{{ $store.getters.authUser.name }}</h5>
                                                    <p class="mb-0">{{ $store.getters.authUser.email }}</p>
                                                    <div class="d-flex align-items-center justify-content-center mt-3">
                                                        <a :to="'/profile'" class="btn border mr-2">Profile</a>
                                                        <a href="javascript:void(0)" @click="logout" class="btn border">Sign Out</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                menuSlide: false
            }
        },
        mounted() {
        },

        methods:{
            logout() {
                let _this = this;
                _this.$store.dispatch("isLoading", true)
                _this.$store.dispatch("logout");
                setTimeout(function () {
                    _this.$router.push({ path: `/` });
                    _this.$store.dispatch("isLoading", false)
                }, 1000)
            },

            changeRoute(route) {
                const _this = this;
                if (_this.$route.name !== route) {
                    _this.$store.dispatch("isLoading", true)
                    setTimeout(function () {
                        _this.$router.push({ name: route});
                        _this.$store.dispatch("isLoading", false)
                    }, 1000)
                }
            },

            menuSlideShow() {
                let windowWidth = window.innerWidth
                if (windowWidth > 1299){
                    this.menuSlide = this.menuSlide === false;
                }
            },

        }
    }
</script>

<style scoped>
    .menuSlide {
        margin: 0 100px;
    }
    .iq-menu li {
        cursor: pointer;
    }
</style>
