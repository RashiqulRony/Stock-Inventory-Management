<template>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Profile Update</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" @submit.prevent="profileUpdate()">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="domain">Domain:</label>
                                    <div class="col-sm-9">
                                        <input type="text" :value="this.mainDomain" readonly disabled class="form-control" id="domain" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="name">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" v-model="user.name" class="form-control" id="name" placeholder="Enter your name">
                                        <span v-if="errors.name" class="error text-danger">{{ errors.name[0] }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="email">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" v-model="user.email" class="form-control" id="email" placeholder="Enter your email">
                                        <span v-if="errors.email" class="error text-danger">{{ errors.email[0] }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="phone">Phone:</label>
                                    <div class="col-sm-9">
                                        <input type="text" v-model="user.phone" class="form-control" id="phone" placeholder="Enter your phone number">
                                        <span v-if="errors.phone" class="error text-danger">{{ errors.phone[0] }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="avatar">Profile Picture:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" id="avatar">
                                                <label class="custom-file-label selected" for="avatar"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="logo">Logo:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" id="logo">
                                                <label class="custom-file-label selected" for="logo"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="logo">Address:</label>
                                    <div class="col-sm-9">
                                        <textarea v-model="user.address" class="form-control" rows="3" id="address" placeholder="Enter your full address"></textarea>
                                        <span v-if="errors.address" class="error text-danger">{{ errors.address[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="old_password">Old Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="old_password" placeholder="Enter your old password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="new_password">New Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="new_password" placeholder="Enter your new password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="password_confirmation">Confirm Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password_confirmation" placeholder="Enter confirm password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
export default {

    data() {
        return {
            user: {
                domain: this.domainName,
                name: this.$store.getters.authUser.name,
                email: this.$store.getters.authUser.email,
                phone: this.$store.getters.authUser.phone,
                address: this.$store.getters.authUser.address,
            },
            errors: [],
        };
    },

    mounted() {

    },

    methods:{
        profileUpdate() {
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            };
            let postData = new FormData ();
            let avatar = document.getElementById("avatar").files[0];
            if (avatar !== undefined){
                if(avatar.type === 'image/jpeg' || avatar.type === 'image/png' || avatar.type === 'image/webp' || avatar.type === 'image/gif'){
                    postData.append('avatar', avatar);
                }else {
                    alert('This file is not an image')
                }
            }

            let logo = document.getElementById("logo").files[0];
            if (logo !== undefined){
                if(logo.type === 'image/jpeg' || logo.type === 'image/png' || logo.type === 'image/webp' || logo.type === 'image/gif'){
                    postData.append('logo', logo);
                }else {
                    alert('This file is not an image')
                }
            }

            postData.append('domain', this.user.domain);
            postData.append('name', this.user.name);
            postData.append('email', this.user.email);
            postData.append('phone', this.user.phone);
            postData.append('address', this.user.address);


            this.$store.dispatch("profileUpdate", postData).then(response => {
                console.log(response)

            }).catch(error => {
                console.log(error)
            });

            /*axios.post(Api.common.profile, postData, { headers: store.getters.headers, config })
                .then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.alertMessage('success', response.message)
                    } else {
                        this.errors = response.errors;
                        console.log(this.errors)
                        this.alertMessage('error', 'Something went wrong. Required all fields')
                    }
                })
                .catch((error) => {
                    console.log(error);
                    this.alertMessage('error', 'Something went wrong. Please try again!!')
                });
*/
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
