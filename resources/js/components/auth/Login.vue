<template>
    <section class="login-content">
        <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
                <div class="col-lg-8">
                    <div v-if="errors.email || errors.password || message" class="alert alert-danger" role="alert">
                        <div v-if="message" class="iq-alert-text">{{ message }}</div>
                        <ul v-else>
                            <li v-for="error in errors">{{ error[0] }}</li>
                        </ul>
                    </div>
                    <div class="card auth-card">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center auth-content">
                                <div class="col-lg-7 align-self-center">
                                    <div class="p-3">
                                        <h2 class="mb-2">Sign In</h2>
                                        <p>Login to stay connected.</p>
                                        <form @submit.prevent="login()">
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group">
                                                        <input v-model="user.email" class="floating-input form-control" type="email" placeholder=" ">
                                                        <label>Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group">
                                                        <input v-model="user.password" class="floating-input form-control" type="password" placeholder=" ">
                                                        <label>Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label control-label-1" for="customCheck1">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a href="#" class="text-primary float-right">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Sign In</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-5 content-right">
                                    <img :src="'/assets/images/login/01.png'" class="img-fluid image-right" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    email: '',
                    password: '',
                    domain: this.domainName,
                },
                errors: [],
                message: null
            };
        },

        mounted() {
            if (this.$store.getters.isLoggedIn === true) {
                this.$router.push({ path: `/dashboard` });
            }
        },

        methods: {
            login() {
                this.$store.dispatch("login", this.user).then(response => {
                    console.log(response.status)
                    if (response.status === 200) {
                        this.message = null
                        this.errors = []
                        window.location.reload()
                    } else if (response.error) {
                        this.errors = []
                        this.message = response.error
                    }else {
                        this.message = null
                        this.errors = response.errors
                    }
                }).catch(error => {
                    console.log(error)
                });
            }
        }
    }
</script>
