<template>
    <!-- 
    <div class="container align-items-center justify-content-center">
        <div class="card_login">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <div class="card-header fw-bold fs-3">Login</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class="fw-semibold">
                                    Name User
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    v-model="name"
                                />
                            </div>

                            <div class="form-group">
                                <label for="password" class="fw-semibold">
                                    Password
                                </label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    v-model="password"
                                />
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button
                                            class="btn but-co login"
                                            @click="handleSubmit"
                                        >
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <router-link to="/register">
                                    <span class="text-danger fs-6 fw-normal"
                                        >Create new Accout
                                    </span></router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div
                class="row d-flex justify-content-center align-items-center h-100"
            >
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div
                        class="card text-white"
                        style="border-radius: 1rem; background-color: #4b74f0"
                    >
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-6 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-4 text-uppercase">
                                    Login
                                </h2>

                                <div class="form-outline form-white mb-0">
                                    <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    name="name"
                                    v-model="name"
                                    
                                        id="typeEmailX"
    
                                    />
                                    <label class="form-label" for="typeEmailX"
                                        >Name</label
                                    >
                                </div>

                                <div class="form-outline form-white mb-2">
                                    <input
                                        type="password"
                                        id="typePasswordX"
                                        class="form-control form-control-lg"
                                        name="password"
                                    v-model="password"
                                    />
                                    <label
                                        class="form-label"
                                        for="typePasswordX"
                                        >Password</label
                                    >
                                </div>
                                <button
                                    class="btn btn-outline-light btn-lg px-5"
                                    type="submit"
                                    @click="handleSubmit"
                                >
                                    Login
                                </button>
                            </div>

                            <div>
                                <p class="mb-0">
                                    Don't have an account?
                                    <router-link to="/register">
                                    <span class="text-danger fs-6 fw-normal"
                                        >Create new Accout
                                    </span></router-link
                                >
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            name: "",
            password: "",
            error: null,
        };
    },
    methods: {
        async handleSubmit(e) {
            e.preventDefault();
            if (this.password.length > 0) {
                await axios.get("/sanctum/csrf-cookie").then((response) => {
                    axios
                        .post("/api/login", {
                            name: this.name,
                            password: this.password,
                        })
                        .then((response) => {
                            if (response.data.success) {
                                this.$router.go("/dashboard");
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
            return next("/dashboard");
        }
        next();
    },
};
</script>
<style scope></style>
