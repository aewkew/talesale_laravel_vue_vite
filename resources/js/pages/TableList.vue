<template>
    <div class="container">
        <div class="sale">History Dealing Customer  <p>{{currentDate()}}</p> </div>
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
                        <td>
                          
                            <span v-if=" item.date ==  currentDate()" class="text-warning"><strong> {{ item.date }}</strong> </span>
                            <span v-else=" item.date == !currentDate()" class="text-success"><strong> {{ item.date }}</strong> </span>
                        
                        </td>
                        <td>{{ item.due_date }}</td>
                        <td > <span v-if="item.status == 'pending'" > <p class="text-warning"><strong>{{ item.status }} </strong></p> </span> 
                             <span v-else-if="item.status == 'success'" ><p class="text-success"> {{ item.status }} </p></span> 
                             <span v-else-if="item.status == 'cancelled'" ><p class="text-danger"> {{ item.status }} </p></span>
                        </td>
                        <td> <router-link class="but-co btn" :to="{ name:'invoiceTs', params:{ id:item.id}}"><i class="bi bi-pencil"></i> </router-link></td>
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
        currentDate() {
      const current = new Date();
      const date = `${current.getFullYear()}-${current.getMonth()+1}-${current.getDate()}`;
      return date;
    },
       async getInv(){
            let url='/api/invoices_join';
               await axios .get(url).then((response) =>{
                this.invoices = response.data.invoices;
                console.log(this.invoices);
             }) 
        },
        
    },

    mounted() {
        console.log("Invoice follow");
 
     
    },
};
</script> 


<style></style>
