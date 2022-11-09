<template>
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
                        Order # 12345 Cart {{ $store.state.cartCount }}
                    </h3>
                </div>
            </div>
        </div>

        <hr />

        <!-- Invoice   -->
   
        <div class="invoice" id="invoice">
            <div class="invoice-data">
                <form @submit.prevent="addInvoice">
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
                                084-61061646 ,Talesale_12@hotmille.com<br />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="invoice-number">
                            <div>INVOICE</div>
                            <div>INV-</div>
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
                                <div class="bill-data" >
                                    <select  class="form-select input form-control" v-model="customer.id" >
                                        <option  v-for="customer in customers" :key="customer.id">{{ customer.customer_name}}</option>  
                                    </select>                          
                                    <!-- 
                                    Tiger kung <br />
                                    Jungti kung Comp <br />
                                    Sansai Chaingmai 50210 <br />
                                    06-46166415 , Jungti_ger_kung@hitmill.com-->
                                </div>
                            </div>
                               <div class="col"></div>
                            <div class="col-4">
                                <div class="data-invoice">

                                       <div class="row"> 
                                        <label  class="col-sm-2 col-form-label" >Date: </label>
                                        <div class="col">  <input id="date" placeholder="dd-mm-yyyy" type="date" class="form-control input" v-model="date" /></div>
                                       </div>
                                       
                                       <div class="row"> 
                                         <label  class="col-sm-2 col-form-label">Date_due: </label>
                                         <div class="col"><input id="due_date" placeholder="dd-mm-yyyy"  type="date" class="form-control input" v-model="due_date"/>  </div>
                                       </div>
                                       <div class="row">
                                          <label class="col-sm-2 col-form-label">Terms: </label>
                                          <div class="col"> <input type="text" class="form-control input" v-model="terms_and_conditions" />  </div>
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
                                <tr
                                    v-for="item in $store.state.cart"
                                    :key="item.id"
                                >
                                    <th scope="row" ><input class="input form-control"  type="hidden" v-model="item.id "/>{{item.id }}</th>
                                    <td>{{ item.product_name }}</td>
                                    <td>{{ item.product_id }}</td>
                                    <td><input class="input form-control"  type="hidden" v-model="item.quantity" />{{ item.quantity }}</td>
                                    <td>{{ item.product_price }}</td>
                                    <td><input class="input form-control"  type="hidden" v-model="item.totalPrice" />{{ item.totalPrice }}</td>
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
                                <div class="col-7 data-total">Sub Total</div>
                                <div class="col-5">
                                    <span><input class="input"  type="hidden" v-model="SubTotal" />{{ SubTotal }} ฿  </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7 data-sub">Tax(7%)</div>
                                <div class="col-5">
                                    <span><input class="input"  type="hidden" v-model="TaxTotal" /> {{ TaxTotal }}฿ </span>
                                </div>
                            </div>
                            <div class="row sum-total">
                                <div class="col-7 sum-total-head">
                                    Total Amount
                                </div>
                                <div class="col-5"><input class="input" type="hidden" v-model="totalPrice"/>{{ totalPrice }} ฿</div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn but-co">Save</button>
            </form>
            </div>
        </div>
       
       
   
          
    </div>
</template>
<script>
import axios from "axios";


export default {
   
    name: "invoice",


    data() {
        return {
            customer:{},
            
        };
    },
    created() {
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id;
            this.name = window.Laravel.user.name;
            this.email = window.Laravel.user.email;
            this.phone = window.Laravel.user.phone;
        } 
        if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
        //this.getData();


        this.getCus();
    },
    computed: {
        cart() {
            return this.$store.state.cart;
        },

        totalPrice: function () {
            let total = 0;
            for (let item of this.$store.state.cart) {
                total += item.totalPrice;
            }
            return total;
        },
        TaxTotal: function () {
            let total = 0;
            for (let item of this.$store.state.cart) {
                total += item.totalPrice * (7 / 100);
            }

            return total.toFixed(2);
        },

        SubTotal: function () {
            let total = 0;
            for (let item of this.$store.state.cart) {
                total += item.totalPrice - item.totalPrice * (7 / 100);
            }
            return total.toFixed(2);
        },
    },

    methods: {
        printInvoice: function () {
            window.print();
        },
        async getCus() {
           
            let url = "/api/customers";
            await axios
                .get(url)
                .then((response) => {
                   // allcustomers.value = response.data.customers;
                this.customers = response.data.customers;
                    console.log(this.customers);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async addInvoice() {
            let formData = new FormData();
                formData.append('number', this.user.id);
                formData.append('customer_id ', this.customer_id);
                formData.append('date', this.date);
                formData.append('due_date', this.due_date);
                formData.append('terms_and_conditions', this.terms_and_conditions);
                formData.append('sub_total', this.SubTotal);
                formData.append('tax_total', this.TaxTotal);
                formData.append('total', this.totalPrice);

                formData.append('product_id', this.item.id);
                formData.append('quantity', this.item.quantity);
                formData.append('unit_price', this.item.totalPrice);

            let url = "/api/add_invoice";
             await axios.post(url, formData).then((response)=>{
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
  
};
</script>
<style></style>
