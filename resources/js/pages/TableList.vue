<template>
    <div class="container">
        <SeachTable></SeachTable>
        <div class="sale">List Customer</div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Company</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody v-for="item in customers" :key="item.id">
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ item.customer_name}}</td>
                        <td>{{ item.customer_address}}</td>
                        <td>{{ item.customer_phone }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>
                            <button class="but-co btn" type="button">
                                null
                            </button>
                        </td>
                        <td>
                            <router-link :to="{ name: 
                            'editcustomer', params:{ id:item.id} }" class="but-co btn" ><i class="bi bi-pencil"></i></router-link>   

                        </td>
                        <td>
                            <button
                                class="but-co btn"
                                @click.prevent="deleteCustomer(item.id)"
                            >
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Model -->
</template>
<script>
import axios from "axios";
import Editcustomer from "./Customer/editcustomer.vue";
import SeachTable from "./TableList/seachTable.vue";

export default {
    name: "Tablelist",
    components: { SeachTable, Editcustomer },

    data() {
        return {
            customers: Array,
        };
    },
    created() {
        this.getData();
    },

    methods: {
        async getData() {
            let url = "/api/customers";
            await axios
                .get(url)
                .then((response) => {
                    this.customers = response.data.customers;
                    console.log(this.customers);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        async deleteCustomer(id) {
            let url = `/api/deleteCustomer/${id}`;
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

   
        
    },

    mounted() {
        console.log("Read Customer List Component Mounted");
    },
};
</script>
<style></style>
