<template>
    

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
                                    Register
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
                                <div class="form-outline form-white mb-0">
                                    <input
                                        type="number"
                                        class="form-control form-control-lg"
                                        name="name"
                                        v-model="phone"
                                        id="typeEmailX"
                                    />
                                    <label class="form-label" for="typeEmailX"
                                        >Phone</label
                                    >
                                </div>
                                <div class="form-outline form-white mb-0">
                                    <input
                                        type="text"
                                        class="form-control form-control-lg"
                                        name="name"
                                        v-model="email"
                                        id="typeEmailX"
                                    />
                                    <label class="form-label" for="typeEmailX"
                                        >Email</label
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
                                    Register
                                </button>
                            </div>

                            <div>
                                <p class="mb-0">
                                    Have an account? Please
                                    <router-link to="/login" class="text-danger fs-6 fw-normal">login</router-link>
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
            phone: "",
            email: "",
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
                        .post("/api/register_user", {
                            name: this.name,
                            phone: this.phone,
                            email: this.email,
                            password: this.password,
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
