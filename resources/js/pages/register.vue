<template>
    <div class="container">
        <div class="row jutify-content-center">
            <div class="col-md-8">
                <div
                    v-if="error !== null"
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                >
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"
                    ></button>

                    <strong>{{ error }}</strong>
                </div>

                <div class="card card-default">
                    <div class="card-header"><h5>Register New User</h5></div>
                    <div class="card-body">
                        <form v-on:submit.prevent="create_user" >
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-sm-4 col-form-label text-md-right"
                                    >Name</label
                                >
                                <div class="col-md-8">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        v-model="form.name"
                                        required
                                        autofocus
                                        autocomplete="off"
                                        placeholder="Enter your name"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mt-1">
                                <label
                                    for="email"
                                    class="col-sm-4 col-form-label text-md-right"
                                    >E-Mail Address</label
                                >
                                <div class="col-md-8">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        v-model="form.email"
                                        required
                                        autofocus
                                        autocomplete="off"
                                        placeholder="Enter your email"
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
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        v-model="form.password"
                                        required
                                        autocomplete="off"
                                        placeholder="Enter your password"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mt-1 mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-success"
                                    
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "register",
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                error: null,
            },
        }
    },
    methods: {
        create_user() {
            axios
            .post('http://127.0.0.1:8000/api/register',this.form)
            .then((response) => {
                this.form.name = '';
                this.form.email = '';
                this.form.password= '';
                console.log(response);
                if(response.data.success){
                    window.location.href = "/login"
                }else{
                    this.error = response.data.message
                }
            })
            .catch(function (error) {
                            console.error(error);
                        });
        }
        

    }
};
</script>
<style></style>
