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

                <tbody v-for="item in invoices" :key="item.id">
                    <tr>
                        <td>{{item.date }}</td>
                        <td v-if="item.customer">{{ item.customer.customer_name}}</td>
                        <td v-else></td>
                        <td>{{item.number }}</td>
                        
                        <td></td>
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
            let url = "/api/invoices";
            await axios
                .get(url)
                .then((response) => {
                    this.invoices = response.data.invoices;
                    console.log(this.invoices);
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
