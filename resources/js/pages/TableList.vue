
<template>
    <div class="container">
        <div class="sale">History Dealing Customer</div>
        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
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
                    <tr v-for="item in invoices" :key="item.id">
                        <td>
                          <span  > {{item.id}}</span>
                        </td>
                        <td>{{ item.number}}</td>   
                        <td> null</td>
                        <td>{{ item.customer_name }}</td>
                        <td>{{ item.customer_phone }}</td>
                        <td>{{ item.date }}</td>
                        <td>{{ item.due_date }}</td>
                        <td > <span v-if="item.status == 'pending'" > <p class="text-warning"><strong>{{ item.status }} </strong></p> </span> 
                             <span v-else-if="item.status == 'success'" ><p class="text-success"> {{ item.status }} </p></span> 
                             <span v-else-if="item.status == 'cancelled'" ><p class="text-danger"> {{ item.status }} </p></span>
                        </td>
                        <td> <router-link :to="{ name:'invoiceTs', params:{ id:item.id}}"><i class="bi bi-pencil"></i> </router-link> <button class="but-co btn">  </button></td>
                        <td> <button class="but-co btn"><i class="bi bi-trash"></i> </button></td>  
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
            invoices:Array
        }
    },
    created() {
         this.getInv();


    },

    methods: {
       async getInv(){
            let url='/api/invoices_join';
               await axios .get(url).then((response) =>{
                this.invoices = response.data.invoices;
                console.log(this.invoices);
             }) 
        },
        async getAllInv(){
             let url=`/api/get_all_invoice/${this. $route.params.id}`;
               await axios.get(url).then(response => {
                console.log(response);
                this.product = response.data;
               });
        }
    },

    mounted() {
        console.log("Invoice follow");
    },
};
</script> 


<style></style>
