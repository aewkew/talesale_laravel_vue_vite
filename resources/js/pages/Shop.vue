<script >
import axios from "axios";

import Add from "./shop/add.vue";
import Add_customer from "./shop/add_customer.vue";
import Add_company from "./shop/add_company.vue";
import { useRouter } from "vue-router";
const router = useRouter();

const newInvoice = async () => {
    let form = await axios.get("/api/create_invoice");
    //console.log("form", form.data);
    router.push('invoice');
};

export default {
    name: "Shop",
    components: { Add, Add_customer, Add_company },
    data() {
        return {
            products: {},
            keyword_color: null,
            keyword_brand: null,
            keyword_id: null,
            // se_color:'',
        };
    },

    created() {
        this.getData();

        if (window.Laravel.user) {
            this.name = window.Laravel.user.name;
        }
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true;
        }
        //this.getData();
    },
    watch: {
        keyword_color() {
            this.getColor();
        },
        keyword_brand() {
            this.getBrand();
        },
        keyword_id() {
            this.getId();
        },
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

        async addToCart(item) {
            this.$store.commit("addToCart", item);
        },
        async removeFromCart(item) {
            this.$store.commit("removeFromCart", item);
        },
        async sevecart() {
            let data = {
                cart: JSON.stringify(this.$store.state.cart),
            };
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

        async getBrand() {
            let url = "/api/search_brand";
            await axios
                .get(url, { params: { keyword_brand: this.keyword_brand } })
                .then((res) => (this.products = res.data))
                .catch((error) => {});
        },
        async getId() {
            let url = "/api/search_id";
            await axios
                .get(url, { params: { keyword_id: this.keyword_id } })
                .then((res) => (this.products = res.data))
                .catch((error) => {});
        },
        async newInvoice() {
            let form = await axios.get("/api/create_invoice");
             console.log("form", form.data);
             

        }
    },
    computed: {
        totalPrice() {
            let total = 0;

            for (let item of this.$store.state.cart) {
                total += item.totalPrice;
            }

            return total.toFixed(2);
        },
    },

    mounted() {
        console.log("Product List Component Mounted");
    },
};
</script>
<style></style>

<template>
    <div class="container">
        <div class="card">
            <div class="card-body shopCard">
                <div class="row">
                    <div class="col">
                        <input
                            type="text"
                            v-model="keyword_id"
                            class="form-control"
                            placeholder="Search ID"
                        />
                    </div>

                    <div class="col">
                        <div class="input-group">
                            <label class="input-group-text" for="product"
                                >Color</label
                            >
                            <select class="form-select" v-model="keyword_color">
                                <option selected value="">All Color</option>
                                <option value="Red">Red</option>
                                <option value="Blue">Blue</option>
                                <option value="Black">Black</option>
                                <option value="Yellow">Yellow</option>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="input-group">
                            <label class="input-group-text" for="product"
                                >Brand</label
                            >

                            <select class="form-select" v-model="keyword_brand">
                                <option selected value="">All Brand</option>
                                <option value="Epson">Epson</option>
                                <option value="Brother">Brother</option>
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
                                <div class="dropdown">
                                    <button
                                        type="button"
                                        class="btn btn-danger dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        Cart {{ $store.state.cartCount }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a
                                                v-for="item in $store.state
                                                    .cart"
                                                :key="item.id"
                                                class="dropdown-item"
                                            >
                                                {{ item.product_name }} x{{
                                                    item.quantity
                                                }}
                                                ฿{{ item.totalPrice }}
                                                <span
                                                    class="btn btn-danger btn-sm"
                                                    @click.prevent="
                                                        removeFromCart(item)
                                                    "
                                                    >X</span
                                                >
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                Total: {{ totalPrice }}
                                            </a>
                                        </li>
                                        <!-- <li><hr class="dropdown-divider"></li> -->
                                        <li class="nav-item">
                                            <a class="btn btn-danger" @click="newInvoice">  
                                          
                                           
                                            <router-link
                                                :to="{
                                                    name: 'invoice',
                                                    params: {
                                                        item: $store.state.cart,
                                                    },
                                                }"
                                                >check out</router-link
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
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
        <!-- Shop -->
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
                        <td>{{ item.product_price.toFixed(2) }}</td>
                        <td>
                            <button class="but-co btn" @click="addToCart(item)">
                                Add to Cart
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
