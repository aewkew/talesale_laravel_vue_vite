<template>
     <div>
        <div class="container">
            <!-- Hedeline -->

            <div class="row">
                <div class="col">
                    <div class="exprint">
                        <button
                            type="button"
                            class="btn but-co"
                            @click="printInvoice()"
                            value="invoice"
                        >
                            <i class="bi bi-printer"></i> Print
                        </button>

                        <button class="btn but-co" @click="downloadPDF">
                            <i class="bi bi-file-earmark-pdf"></i>Export
                        </button>
                    </div>
                </div>
                <div class="col">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <h3 class="pull-right">
                            <form @submit.prevent="updateInvoice">     
                            
                            <input type="text"  class="form-control" v-model="invoice.status" placeholder='status'/>
                             
                             <button type="submit" class="btn but-co">Save</button>
                            </form>
                        
                       
                                                    
                        </h3>
                    </div>
                </div>
            </div>

            <hr />

            <!-- Invoice   -->

            <div class="invoice" id="invoice" >
                <div class="invoice-data">
                    <form >
                        <div class="row">
                            <div class="col">
                                <div class="logo-invoice">
                                    <img
                                        src="https://seeklogo.com/images/B/Burger_King-logo-67A54F414B-seeklogo.com.png"
                                    />
                                </div>
                                <div class="row">
                                    <div class="company">
                                        Talesale cartridge Company
                                    </div>
                                    <div class="company-address">
                                        2033/02 Rung Arun, <br />
                                        HangDong, Chaing Mai 50230<br />
                                        ,Thailand <br />
                                        084-61061646
                                        ,Talesale_12@hotmille.com<br />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="invoice-number">
                                    <div>INVOICE</div>
                                    <div></div>
                                    <div>
                                     
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="bill">
                                <div class="row">
                                    <div class="row">
                                        <div class="bill-name">BILL TO</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="bill-data">
                                          
                                       
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col-4">
                                        <div class="data-invoice">
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label"
                                                   
                                                    >Date:
                                                </label>
                                                <div class="col">
                                                    {{ invoice.date }}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label"
                                                    >Date_due:
                                                </label>
                                                <div class="col">
                                                    {{ invoice.due_date }}
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label"
                                                    >Terms:
                                                </label>
                                                <div class="col">
                                                   {{ invoice.terms_and_conditions}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="table-invoice">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Item</th>
                                            <th scope="col">Product Id</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Cost</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <tr   >
                                          
                                            <th scope="row"> 
                                        
                                            </th>
                                            <td></td>
                                            <td></td>
                                            <td> 
                                                <!--   <input type="text" id="quantity" class="form-control input" :value="quantity=item.quantity"/>-->  
                                            </td>
                                            <td></td>
                                            <td > 
                                                <!--  <input type="text" id="unit_price" class="form-control input" :value="unit_price=item.totalPrice"/>    -->
                                               
                                            </td> 
                                           
                                        </tr> 
                                    </tbody>
                                </table>
                                <div></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col">
                                <div class="total-invoice">
                                    <div class="row">
                                        <div class="col-7 data-total">
                                            Sub Total
                                        </div>
                                        <div class="col-5">
                                            <span>฿ </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7 data-sub">
                                            Tax(7%)
                                        </div>
                                        <div class="col-5">
                                            <span>
                                                <div class="input">
                                                    ฿
                                                </div></span
                                            >
                                        </div>
                                    </div>
                                    <div class="row sum-total">
                                        <div class="col-7 sum-total-head">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            ฿
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      
                                              
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';


export default {
    name: "Tablelist",


    data() {
        return {
            invoice:{},
            invoice_num:[],
            invoice_item:[],
            group_item:[],

            status:''
        }
    },
    created() {
     this.getAllInv();
    },

    methods: {
        async getAllInv(){
             let url=`/api/get_all_invoice/${this.
                $route.params.id}`;
               await axios.get(url).then(response => {
                console.log(response);
                this.invoice_num= response.data; 
                this.invoice_item= response.data; 
               });
        },
        async getAllInv(){
             let url='/api/group_item';
               await axios.get(url).then(response => {
                console.log(response);
                this.group_item = response.data; 
               });
        },
       
        async updateInvoice(){
            let formData = new FormData();
            formData.append('status', this.invoice.status);
               let url = `/api/updateInvoice/${this.$route.params.id}`;
               await axios.post(url, formData).then((response) =>{
                    console.log(response);
                    if(response.status == 200){
                       alert(response.data.message)
                    }else {
                        console.log('error');
                    }
                }).catch(error=> {
                    this.errors.push(error.response);
                });

        }
        
    },

    mounted() {
        console.log("Invoice Edit");
    },
};


</script>

<style >
    
</style>