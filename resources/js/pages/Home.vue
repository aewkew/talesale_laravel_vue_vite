<template>
    <div class="card_login">
        <div class="align-items-middle col-md-6">
            <div class="card text-center">
                <div class="card-header fw-bold fs-3 text-white">
                    Login

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="text-white fw-semibold"> Name User </label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            v-model="name"
                        />
                    </div>

                    <div class="form-group">
                        <label for="password"  class="text-white fw-semibold"> Password </label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            v-model="password"
                        />
                    </div>

                    <div class="row ">
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
                        <router-link to="/register"
                            > <span class="text-danger fs-6 fw-normal">Create new Accout </span></router-link
                        >
                    </div>
                </div>
            </div>
        </div>

     
    </div>
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
<style></style>
