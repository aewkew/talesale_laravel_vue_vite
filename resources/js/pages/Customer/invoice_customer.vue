<template>
    <div>
        <div class="container">
            <!-- Hedeline -->
            <div class="row">
                <div class="col-1">
                    <div class="exprint">
                        <button class="btn but-co" onclick="window.print()">
                            <i class="bi bi-printer"></i>Print 
                        </button>
                    </div>
                </div>
                <div class="col-6"> 
                        <select class="form-select billprint" aria-label=".form-select example" v-model="bill">
                            <option selected>Open this select menu</option>
                             <option value="ใบแจ้งหนี้">ใบแจ้งหนี้</option>
                             <option value="ใบเสร็จ">ใบเสร็จ</option>
                        </select>
                    </div>
                 
          
                <div class="col-5">
                    <div class="status">
                    <div class="row">
                        <div class="col-3 fs-3">Status:</div>
                        <div class="col-3 fs-4">
                            <span v-if="invoice.status == 'pending'">
                                <p class="text-warning fw-semibold">
                                    {{ invoice.status }}
                                </p></span
                            >
                            <span v-else-if="invoice.status == 'success'"
                                ><p class="text-success fw-semibold">
                                    {{ invoice.status }}
                                </p></span
                            >
                            <span v-else-if="invoice.status == 'cancelled'"
                                ><p class="text-danger fw-semibold">
                                    {{ invoice.status }}
                                </p></span
                            >
                        </div>
                        <div class="col">
                            <div class="invoice-title">
                                <form @submit.prevent="updateInvoice">
                                    <div class="input-group mb-2">
                                        <select
                                            class="form-select"
                                            aria-label="Default select example"
                                            v-model="EditStatus"
                                        >
                                            <option value="success">
                                                success
                                            </option>
                                            <option value="cancelled">
                                                cancelled
                                            </option>
                                        </select>
                                        <button
                                            class="btn but-co btn-outline-secondary"
                                            type="submit"
                                            id="button-addon2"
                                        >
                                            Edit Status
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>

            <hr />

            <!-- Invoice   -->

            <div class="invoice" id="invoice">
                <div class="invoice-data">
                    <div class="row d-flex justify-content-center header headin"  >
                       {{bill}}
                    </div>
                    <form>
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
                                                <div>{{ invoice.number }}</div>
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
                                            {{ InvCus[0].customer_name }},
                                            {{ InvCus[0].customer_phone }}  <br />
                                            {{ InvCus[0].customer_address }}
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="data-invoice">
                                            <div class="row">
                                                <div class="col datefix">
                                                    วันที่ :
                                                </div>
                                                <div class="col">
                                                    {{ invoice.date }}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col duedate">
                                                    กำหนดชำระ :
                                                </div>
                                                <div class="col date_p">
                                                    {{ invoice.due_date }}
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
                                            <th scope="col">Product Id</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">ราคา/หน่วย</th>
                                            <th scope="col">จำนวนเงิน</th>
                                        </tr>
                                    </thead>
                                    <tbody v-for="index in group_item">
                                        <tr v-for="(inv,indexs) in index">
                                            <th scope="row">{{ indexs + 1  }}</th>
                                            <td>{{ inv.product_name }}</td>
                                            <td>{{ inv.product_id }}</td>
                                            <td>{{ inv.product_price }}</td>
                                            <td>{{ inv.quantity }}</td>
                                            <td>{{ inv.unit_price }}</td>
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
                                            <span>
                                                {{ invoice.sub_total }} ฿
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7 data-sub">
                                            Tax(7%)
                                        </div>
                                        <div class="col-5">
                                            <span>
                                                <div class="input">
                                                    {{ invoice.tax_total }} ฿
                                                </div></span
                                            >
                                        </div>
                                    </div>
                                    <div class="row sum-total">
                                        <div class="col-7 sum-total-head">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            ฿ {{ invoice.total }}
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
import axios from "axios";

export default {
    name: "invoice_customer",
    data() {
        return {
            invoice: {},
            invoice_num: [],
            inv_item: [],
            group_item: {},
            InvCus: {},
            status: "",
            bill:'',
        };
    },
    created() {
        this.getAllInv();
        this.group_item_ch();
        this.inv_cus();
    },

    methods: {
        async getAllInv() {
            let url = `/api/get_all_invoice/${this.$route.params.id}`;
            await axios.get(url).then((response) => {
                console.log(response);
                this.invoice = response.data;
            });
        },

        async group_item_ch() {
            let url = `/api/group_item_ch/${this.$route.params.id}`;
            await axios.get(url).then((response) => {
                console.log(response);
                this.group_item = response.data.group_item;
            });
        },
        async inv_cus() {
            let url = `/api/Inv_cus/${this.$route.params.id}`;
            await axios.get(url).then((response) => {
                console.log(response);
                this.InvCus = response.data.InvCus;
            });
        },

        async updateInvoice() {
            let formData = new FormData();
            formData.append("status", this.EditStatus);
            let url = `/api/updateInvoice/${this.$route.params.id}`;
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

    mounted() {
        console.log("Invoice Edit");
    },
};
</script>

<style></style>
