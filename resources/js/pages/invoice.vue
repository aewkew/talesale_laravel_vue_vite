<script setup>
import axios from "axios";

import { onMounted, ref } from "vue";

let form = ref([]);

onMounted(async () => {
    indexForm();
});

const indexForm = async () => {
    let response = await axios.get("/api/create_invoice");
    //console.log('form', response.data)
    form.value = response.data;
};
</script>

<template>
    <div>
        <div class="container">
            <!-- Hedeline -->

            <div class="row">
                <div class="col">
                    <div class="exprint">
                        <button class="btn but-co" onclick="window.print()">
                            <i class="bi bi-printer"></i>Print Invoice
                        </button>
                        <!-- 

                        <button
                            type="button"
                            class="btn but-co"
                            @click="printInvoice()"
                            value="invoice"
                        >
                            <i class="bi bi-printer"></i> Print
                        </button>-->
                    </div>
                </div>
                <div class="col">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <h3 class="pull-right">
                            Order # {{ form.number }} Cart
                            {{ $store.state.cartCount }}
                        </h3>
                    </div>
                </div>
            </div>

            <hr />

            <div class="invoice">
                <div class="invoice-data">
                    <div
                        class="row d-flex justify-content-center header headin"
                    >
                        ใบเสนอราคา
                    </div>
                    <form @submit.prevent="saveCart()">
                        <div class="comnum">
                            <div class="row">
                                <div class="col">
                                    <div class="brandInv">
                                        <div class="col">
                                            <div class="logo-invoice">
                                                <img
                                                    src="https://seeklogo.com/images/B/Burger_King-logo-67A54F414B-seeklogo.com.png"
                                                />
                                            </div>
                                            <div class="row">
                                                <div class="company">
                                                    บริษัทเทเลย์เซล จำกัด
                                                </div>
                                                <div class="company-address">
                                                    2033/2 , อเวนิวสันทราย
                                                    ตึกสอง ,
                                                    <br />
                                                    อำเภอ สันทราย ,ตำบล สันทราย
                                                    ,จังหวัด เชียงใหม่ 50200<br />
                                                    084-61061646
                                                    ,Talesale_12@hotmille.com<br />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="number">
                                        <div class="col">
                                            <div class="invoice-number">
                                                <div>INVOICE</div>
                                                <div>{{ form.number }}</div>
                                                <div>
                                                    <input
                                                        id="number"
                                                        type="hidden"
                                                        class="form-control input"
                                                        v-model="form.number"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="bill">
                                <div class="row">
                                    <div class="bill-name">ลูกค้า</div>

                                    <div class="col-6">
                                        <div class="bill-data">
                                            <select
                                                class="form-select input form-control"
                                                v-model="CustomerID"
                                            >
                                                <option disabled value="">
                                                    Select customer
                                                </option>
                                                <option
                                                    v-for="customer in customers"
                                                    :key="customer.id"
                                                    v-bind:value="{
                                                        id: customer.id,
                                                        cus_add:
                                                            customer.customer_address,
                                                        cus_ph: customer.customer_phone,
                                                        cus_nam:
                                                            customer.customer_name,
                                                    }"
                                                >
                                                    {{ customer.customer_name }}
                                                </option>
                                            </select>
                                            {{ CustomerID.cus_nam }} ,
                                            {{ CustomerID.cus_ph }} <br />
                                            {{ CustomerID.cus_add }}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="data-invoice">
                                            <div class="row">
                                                <div class="col datefix">
                                                    วันที่ :
                                                </div>

                                                <div class="col">
                                                    <input
                                                        id="date"
                                                        type="date "
                                                        :value="currentDate()"
                                                        class="form-control input"
                                                        :v-model="
                                                            (date =
                                                                currentDate())
                                                        "
                                                        hidden
                                                    />
                                                    <span
                                                        >{{ currentDate2() }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col duedate">
                                                    กำหนดชำระ :
                                                </div>
                                                <div class="col date_p">
                                                    <input
                                                        id="due_date"
                                                        placeholder="dd-mm-yyyy"
                                                        type="date"
                                                        class="form-control input"
                                                        v-model="due_date"
                                                    />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col terms">
                                      
                                                </div>
                                                <div class="col">
                                                   
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
                                            <th scope="col">
                                                รายระเอียดสินค้า
                                            </th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">ราคา/หน่วย</th>
                                            <th scope="col">จำนวนเงิน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr v-for="(item,index) in $store.state.cart" >
                                         
                                            <th scope="row">
                                                {{ index + 1 }}
                                                <!--     <input type="text" id="product_id" class="form-control input" :value="product_id=item.id" />-->
                                            </th>
                                            <td>{{ item.product_name }}</td>
                                           
                                            <td>
                                                {{ item.quantity }}
                                                <!--   <input type="text" id="quantity" class="form-control input" :value="quantity=item.quantity"/>-->
                                            </td>
                                            <td>{{ item.product_price }}</td>
                                            <td>
                                                {{ item.totalPrice }}
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
                                            รวมเงิน
                                        </div>
                                        <div class="col-5">
                                            <span>{{ SubTotal }} ฿ </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7 data-sub">
                                            ภาษีมูลค่าเพิ่ม(7%)
                                        </div>
                                        <div class="col-5">
                                            <span>
                                                <div class="input">
                                                    {{ TaxTotal }}฿
                                                </div></span
                                            >
                                        </div>
                                    </div>
                                    <div class="row sum-total">
                                        <div class="col-7 sum-total-head">
                                            ยอดรวมทั้งสิ้น
                                        </div>
                                        <div class="col-5">
                                            {{ TotalPrice }} ฿
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn but-co">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            customers: {},
            CustomerID: "",
            due_date: "",
            date: "",

            value2: "",

            item: {
                product_id: "",
                quantity: "",
                unit_price: "",
            },
            errors: [],
            Prod: "",
            multi_cart: [],
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
            this.isLoggedIn = true;
        }
        //this.getData();
        this.getCus();
        this.$store.state.cart;

        /*
        this.$store.getters.cart;
        let data = JSON.stringify(this.$store.state.cart);
        let toData = JSON.parse(data);
        console.log('test',data);
        console.log('test2',toData);
        console.log('testPre',toData[0].id + toData[0].product_brand);

        for(let i=0; i<toData.length; i++){
            console.log('testPre2',toData[i].id + toData[i].product_brand);
        } */
    },
    computed: {
        cart() {
            return this.$store.state.cart;
        },

        TotalPrice: function () {
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
        async getCus() {
            let url = "/api/all_customer";
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
        currentDate() {
            const current = new Date();
            const date = `${current.getFullYear()}-${
                current.getMonth() + 1
            }-${current.getDate()}`;
            return date;
        },
        currentDate2() {
            const current = new Date();
            const date = `${
                current.getMonth() + 1
            }/${current.getDate()}/${current.getFullYear()}`;
            return date;
        },

        async saveCart() {
            //  let listcart = {cart: JSON.stringify(this.$store.state.cart)  }
            // let data2 = JSON.stringify(this.$store.state.cart);
            // let toData =JSON.parse(data);
            let formData = new FormData();
            formData.append("number", this.form.number);
            formData.append("customer_id", this.CustomerID.id);
            formData.append("date", this.date);
            formData.append("due_date", this.due_date);
           // formData.append("terms_and_conditions", this.terms_and_conditions);
            formData.append("sub_total", this.SubTotal);
            formData.append("tax_total", this.TaxTotal);
            formData.append("total", this.TotalPrice);
            formData.append("user_id", this.id);
            //append('product_id',this.id);
            // console.log('testPre2',toData[i].id + toData[i].product_brand);
            // formData.append("product_id", this.toData[i].id);
            // formData.append("product_id",JSON.stringify(this.product_id));
            // formData.append("quantity",JSON.stringify(this.quantity));
            // formData.append("unit_price", JSON.stringify(this.unit_price));
            formData.append("product_id", this.product_id);
            formData.append("quantity", this.quantity);
            formData.append("unit_price", this.unit_price);
            formData.append(
                "cart_data",
                JSON.stringify(this.$store.state.cart)
            );
            // let data = {cart: JSON.stringify(this.$store.state.cart) }
            let url = "/api/add_invoice";
            await axios
                .post(url, formData)
                .then(async (response) => {
                    console.log(response);
                    if (response.data.message == "success") {
                        alert(response.data.message);
                        await this.saveMultiCart();
                    } else if (response.data.success == "false") {
                        alert("data is duppicate");
                    }
                })
                .catch((error) => {
                    this.errors.push(error.response);
                });
        },
        async saveMultiCart() {
            this.multi_cart = this.$store.state.cart;
            var cart = this.$store.state.cart;
            for (let i = 0; i <= cart.length; i++) {
                var payload = {
                    // id : cart[i].id,
                    product_id: cart[i].id,
                    unit_price: cart[i].totalPrice,
                    quantity: cart[i].quantity,
                    //invoice_id : cart[i].'invoiceid',
                };

                var config = {
                    method: "post",
                    url: "/api/add_multi_invoice",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    data: payload,
                };

                axios(config)
                    .then(function (response) {
                        console.log(response);
                        if (response.status == 200) {
                            status = "success";
                        } else {
                            console.log("error");
                        }
                        if (response.data.success) {
                            window.location.href = "/Tablelist";
                        }
                    })
                    .catch(function (error) {
                        this.errors.push(error.response);
                    });
            }
        },
    },
    mounted() {
        console.log("Hi");
    },
};
</script>
<style scope></style>
