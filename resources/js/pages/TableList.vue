

<template>
    <div class="container">
        <SeachTable></SeachTable>
        <div class="sale">History Dealing Customer</div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Invoice</th>
                        <th scope="col">Company</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">DueDate</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody >
                    <tr v-for="item in invoice" :key="item.id">
                        <td>{{ item.number }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.customer.customer_name}}</td>
                        <td>{{ item.customer.customer_phone }}</td>
                        <td>{{ item.date }}</td>
                        <td>{{ item.due_date }}</td>
                        <td>{{ item.status }}</td>
                        <td></td>    
                        <td></td>  
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Model -->
</template>
<script>
import axios from "axios";

import SeachTable from "./TableList/seachTable.vue";

export default {
    name: "Tablelist",
    components: { SeachTable },

    data() {
        return {
            invoices:{}
        }
    },
    created() {
        this.getInv();

    },
    watch: {
        
    },

    methods: {
        async getInv() {
            let url = "/api/invoices";
             await axios 
                   .get(url) 
                   .then((response) =>{
                      this.invoice = response.data.invoice;
                      console.log(this.invoice);
                   } )
                   .catch((error) => {
                    console.log(error);
                });
        },
      
        
    },

    mounted() {
        console.log("Invoice follow");
    },
};
</script> 


<style></style>
