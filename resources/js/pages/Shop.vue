<template>
    <div class="container">
      
        <div class="card">
            <div class="card-body shopCard">
                <div class="row">
                    <div class="col">
                        <input
                            type="text"
                            v-model="keyword_color"
                            class="form-control"
                            placeholder="Search Color"
                        />
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            v-model="keyword_brand"
                            class="form-control"
                            placeholder="Search Brand"
                        />
                    </div>

                    <div class="col-auto">
                        <div class="input-group">
                            <label
                                class="input-group-text"
                                for="inputGroupSelect01"
                                >Brand</label
                            >
                            <select class="form-select" id="">
                                <option value="" selected>Choose...</option>
                                <option>Red</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="input-group">
                            <label class="input-group-text" for="product"
                                >Color</label
                            >
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <option>Red</option>
                                <option>Blue</option>
                                <option>Black</option>
                                <option>Yellow</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="row">
                            <div class="col">
                                <button
                                    type="button"
                                    class="btn but-co"
                                    data-bs-toggle="modal"
                                    data-bs-target="#CustomerModel"
                                >
                                    <i
                                        class="bi bi-person-plus-fill"
                                        style="font-size: 1.4rem"
                                    ></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="row">
                            <div class="col">
                                <button
                                    type="button"
                                    class="btn but-co"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"
                                >
                                    Add
                                </button>
                            </div>

                            <div class="col">
                                <button
                                    type="button"
                                    class="btn but-co"
                                    data-bs-toggle="modal"
                                    data-bs-target="#CompanyModel"
                                >
                                    <i
                                        class="bi bi-building"
                                        style="font-size: 1.4rem"
                                    ></i>
                                </button>
                            </div>

                            <div class="col">
                                <button type="button" class="btn but-co">
                                    <i
                                        class="bi bi-basket"
                                        style="font-size: 1.4rem"
                                    ></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Add></Add>
        <Add_customer></Add_customer>
        <Add_company></Add_company>
       

        <div class="row">
            <div class="col"><div class="sale">List Product</div></div>
            <div class="col"></div>
        </div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-1">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Color</th>
                        <th scope="col">price</th>
                        <th scope="col">Add</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody v-for="item in products" :key="item.id">
                    <tr>
                        <th>{{ item.product_id }}</th>
                        <td>{{ item.product_name }}</td>
                        <td>{{ item.product_brand }}</td>
                        <td>{{ item.product_color }}</td>
                        <td>{{ item.product_price }}</td>
                        <td>
                            <button class="but-co btn" type="button">
                                <i class="bi bi-plus"></i>
                            </button>
                        </td>
                        <td>
                            <button
                                class="but-co btn"
                                @click.prevent="deleteProduct(item.id)"
                            >
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import axios from "axios";

import Add from "./shop/add.vue";
import Add_customer from "./shop/add_customer.vue";
import Add_company from "./shop/add_company.vue";
export default {
    name: "Shop",
    components: {  Add, Add_customer ,Add_company },
    data() {
        return {
            products: {},
            keyword_color: null,
            keyword_brand: null,
        };
    },
    created() {
        this.getData();
    },
    watch: {
        keyword_color() {
            this.getColor();
            
        },
        keyword_brand(){
            this.getBrand();
        }
    },
    methods: {
        async getData() {
            let url = "/api/products";
            await axios
                .get(url)
                .then((response) => {
                    this.products = response.data.products;
                    console.log(this.products);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async deleteProduct(id) {
            let url = `/api/deleteProduct/${id}`;
            await axios
                .delete(url)
                .then((response) => {
                    if (response.data.code == 200) {
                        alert(response.message);
                        this.getData();
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async getColor() {
            let url = "/api/search_color";
              await axios
                .get(url, { params: { keyword_color: this.keyword_color } })
                .then((res) => (this.products = res.data))
                .catch((error) => {});
        },
        async getBrand(){
            let url = "/api/search_brand";
              await axios
                 .get(url, { params: { keyword_brand: this.keyword_brand } })
                 .then((res) => (this.products = res.data))
                 .catch((error) => {});
        }
    },

    mounted() {
        console.log("Product List Component Mounted");
    },
};
</script>
<style></style>
