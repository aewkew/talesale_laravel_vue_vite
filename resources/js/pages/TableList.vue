<template>
    <div class="container">
        <div> 
            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link fs-3 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">รออนุมัติ</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link fs-3" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">จ่ายแล้ว</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link fs-3" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">ยกเลิก</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link fs-3" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="false">ทั้งหมด</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active fs-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">1</div>
  <div class="tab-pane fade fs-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">2</div>
  <div class="tab-pane fade fs-3" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">3</div>
  <div class="tab-pane fade fs-3" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">4</div>
</div>
        </div>
        <div class="sale">History Dealing Customer  </div>

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
