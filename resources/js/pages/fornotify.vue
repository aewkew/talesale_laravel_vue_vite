<template>
    <div>
        <div class="container">
            <form @submit.prevent="updateInvoice()">
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <span
                                class="input-group-text bgsp fs-6 text-white"
                                id="inputGroup-sizing-default"
                            >
                                วันที่จะแจ้งเตือน 
                            </span>
                            <input
                                placeholder="dd-mm-yyyy"
                                type="date"
                                class="form-control input"
                                v-model="follow"
                                aria-describedby="inputGroup-sizing-default"
                            />
                        </div>
                 
                    </div>

                    <div class="col">
                        <div class="input-group mb-3">
                            <span
                                class="input-group-text bgsp fs-6 text-white"
                                id="inputGroup-sizing-default"
                            >
                                รายระเอียดที่แจ้งในวันครบกำหนด
                            </span>
                            <input
                                type="text"
                                class="form-control input"
                                v-model="details"
                                aria-describedby="inputGroup-sizing-default"
                            />
                        </div>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn but-co">
                            แจ้งเตือน
                        </button>
                    </div>
                </div>
            </form>
            <hr />

            <div class="row">
                <div class="col">
                    <div class="table-invoice">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>invoice</th>
                                    <th>วันเสนอราคา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="inc in invoice_cus" :key="inc.id">
                                    <td>{{ inc.number }}</td>
                                    <td>{{ inc.date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div class="table-invoice">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Brand</th>
                                    <th>Color</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="inc in group_count">
                                    <td>{{ inc.product_brand }}</td>
                                    <td>{{ inc.product_color }}</td>
                                    <td>{{ inc.sum_tatol }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "fornotify",
    data() {
        return {
            follow: "",
            details: "",
            invoice_cus: Array,
            group_count: Array,
        };
    },
    created() {
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id;
            this.name = window.Laravel.user.name;
        }
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true;
        }

        this.get_inv();
        this.get_count();
    },
    methods: {
        currentDate() {
            const current = new Date();
            const date = `${current.getFullYear()}-${
                current.getMonth() + 1
            }-${current.getDate()}`;
            return date;
        },
        async get_inv() {
            let url = `/api/invioce_cus/${this.$route.params.id}`;
            await axios.get(url).then((response) => {
                console.log(response);
                this.invoice_cus = response.data.invoice_cus;
            });
        },
        async get_count() {
            let url = `/api/group_item_count/${this.$route.params.id}`;
            await axios.get(url).then((response) => {
                console.log(response);
                this.group_count = response.data.group_count;
            });
        },

        async updateInvoice() {
            let formData = new FormData();
            formData.append("follow_user_id", this.id);
            formData.append("follow_customer_id", this.$route.params.id );
            formData.append("follow", this.follow);
            formData.append("details", this.details);
            let url = '/api/add_follow';
            await axios
                .post(url, formData)
                .then((response) => {
                    console.log(response);
                    if (response.status == 200) {
                        alert(response.data.message);
                    } else {
                        console.log("error");
                    }
                })
                .catch((error) => {
                    this.errors.push(error.response);
                });
        },
    },
};
</script>
<style></style>
