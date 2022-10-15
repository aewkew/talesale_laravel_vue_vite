<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label
                                for="inputnickname"
                                class="form-label text-white fs-3"
                            >
                                product
                            </label>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputnickname"
                                    v-model="name"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label
                                for="inputfullname"
                                class="form-label text-white fs-3"
                            >
                                Description
                            </label>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputfullname"
                                    v-model="description"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label
                                for="inputprice"
                                class="form-label text-white fs-3"
                            >
                                price
                            </label>
                            <div class="input-group">
                                <input
                                    class="form-control"
                                    id="inputprice"
                                    v-model="price"
                                />
                            </div>
                        </div>

                        <div class="row subre">
                            <div class="col sub">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                     @click="addproduct"
                                >
                                    Submit
                                </button>
                            </div>
                            <div class="col res">
                                <button type="reset" class="btn btn-danger">
                                    reset
                                </button>
                            </div>
                            
                        </div>
              
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "create",
    data() {
        return {
            name: "",
            description: "",
            price: "",
        };
    },
    methods: {
        addproduct() {
            axios
                .post("http://127.0.0.1:8000/api/addproduct", {
                    name: this.name,
                    description: this.description,
                    price: this.price,
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
<style></style>
