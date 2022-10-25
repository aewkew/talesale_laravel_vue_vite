<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card">
                        <div class="card-header">Regiseter</div>
                        <div class="card-body">
                            
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label text-md-right" >Name</label >           
                                     <div class="col-md-8">
                                        <input
                                        class="form-control" name="name" v-model="name"
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label text-md-right" >Phone</label >           
                                     <div class="col-md-8">
                                        <input
                                        class="form-control" name="phone" v-model="phone"
                                        />
                                    </div>
                                </div>


                                <div class="form-group row mt-1">
                                    <label class="col-sm-4 col-form-label text-md-right" for="email">E-Mail Address</label >                                   
                                    <div class="col-md-8">
                                        <input name="email"                          
                                            type="text"
                                            class="form-control"
                                            v-model="email"
                                           
                                        />
                                    </div>
                                </div>

                                <div class="form-group row mt-1">
                                    <label
                                        for="password"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Password</label
                                    >
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="password" v-model=" password"/>  
                                    </div>
                                </div>

                                <div class="form-group row mt-1 mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button
                                            class="btn btn-success"
                                            @click="handleSubmit"
                                        >
                                            Register
                                        </button>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-8 offset-md-4">
                                        <small class="text-muted">
                                            Have an account? Please
                                            <router-link to="/login"
                                                >login</router-link
                                            >
                                        </small>
                                    </div>
                                </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
                name: "",
                phone:"",
                email: "",
                password: "",
                error: null
        };
        
    },
    methods: {
        async handleSubmit(e) {
            e.preventDefault();
            if(this.password.length > 0) {
                await axios.get('/sanctum/csrf-cookie').then((response) => {
                     axios.post('/api/register_user',{
                            name: this.name,
                            phone: this.phone,
                            email: this.email,
                            password: this.password
                        })
                        .then((response) => {
                            if (response.data.success) {
                                window.location.href = "/login";
                            } else {
                                this.error = response.data.message;
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                });
            }
        },
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next("dashboard");
        }
        next();
    },
};
</script>
<style></style>
