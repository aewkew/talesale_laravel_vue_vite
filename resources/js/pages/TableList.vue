<template>
    <div class="container">
        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link fs-4 active"
                        id="home-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#home-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="home-tab-pane"
                        aria-selected="true"
                    >
                        รออนุมัติ 
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link fs-4"
                        id="profile-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#profile-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="profile-tab-pane"
                        aria-selected="false"
                    >
                        จ่ายแล้ว
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link fs-4"
                        id="contact-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#contact-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="contact-tab-pane"
                        aria-selected="false"
                    >
                        ยกเลิก
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link fs-4"
                        id="all-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#all-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="all-tab-pane"
                        aria-selected="false"
                    >
                        ทั้งหมด
                    </button>
                </li>
            </ul>
            
            <!-- Pedding -->
            <div class="tab-content" id="myTabContent">
                <div
                    class="tab-pane fade show active fs-4"
                    id="home-tab-pane"
                    role="tabpanel"
                    aria-labelledby="home-tab"
                    tabindex="0"
                >
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID </th>
                                <th scope="col">Invoice</th>
                                <th scope="col">ลูกค้า</th>
                                <th scope="col">เบอร์โทร</th>
                                <th scope="col">วันออกใบเสนอราคา</th>
                                <th scope="col">วันครบกำหนดชำระ</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">แก้ไข</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="pinv in pending_inv" :key="pinv.id">
                                <td>
                                    <span> {{ pinv.id }}</span>
                                </td>
                                <td>{{ pinv.number }}</td>

                                <td>{{ pinv.customer_name }}</td>
                                <td>{{ pinv.customer_phone }}</td>
                                <td>
                                    {{ pinv.date }}
                                </td>
                                
                                <td> 
                                    <span
                                        v-if="pinv.due_date == currentDate()"
                                        class="text-danger"
                                        ><strong> {{ pinv.due_date }} </strong>
                                    </span>
                                    <span
                                        v-else="pinv.due_date == !currentDate()"
                                        ><strong> {{ pinv.due_date }}</strong>
                                    </span>
                                </td>

                                <td>
                                    <span v-if="pinv.status == 'pending'">
                                        <p class="text-warning">
                                            <strong>{{ pinv.status }} </strong>
                                        </p>
                                    </span>
                                    <span v-else-if="pinv.status == 'success'"
                                        ><p class="text-success">
                                            {{ pinv.status }}
                                        </p></span
                                    >
                                    <span v-else-if="pinv.status == 'cancelled'"
                                        ><p class="text-danger">
                                            {{ pinv.status }}
                                        </p></span
                                    >
                                </td>
                                <td>
                                    <router-link
                                        class="but-co btn"
                                        :to="{
                                            name: 'invoiceTs',
                                            params: { id: pinv.id },
                                        }"
                                        ><i class="bi bi-pencil"></i>
                                    </router-link>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Success -->
                <div
                    class="tab-pane fade fs-4"
                    id="profile-tab-pane"
                    role="tabpanel"
                    aria-labelledby="profile-tab"
                    tabindex="0"
                >
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">ลูกค้า</th>
                                <th scope="col">เบอร์โทร</th>
                                <th scope="col">วันออกใบเสนอราคา</th>
                                <th scope="col">วันครบกำหนดชำระ</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">แก้ไข</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="sinv in success_inv" :key="sinv.id">
                                <td>
                                    <span> {{ sinv.id }}</span>
                                </td>
                                <td>{{ sinv.number }}</td>

                                <td>{{ sinv.customer_name }}</td>
                                <td>{{ sinv.customer_phone }}</td>
                                <td>
                                    {{ sinv.date }}
                                </td>
                                <td>
                                    <span
                                        v-if="sinv.due_date == currentDate()"
                                        class="text-danger"
                                        ><strong> {{ sinv.due_date }}</strong>
                                    </span>
                                    <span
                                        v-else="sinv.due_date == !currentDate()"
                                        ><strong> {{ sinv.due_date }}</strong>
                                    </span>
                                </td>
                                <td>
                                    <span v-if="sinv.status == 'pending'">
                                        <p class="text-warning">
                                            <strong>{{ sinv.status }} </strong>
                                        </p>
                                    </span>
                                    <span v-else-if="sinv.status == 'success'"
                                        ><p class="text-success">
                                            {{ sinv.status }}
                                        </p></span
                                    >
                                    <span v-else-if="sinv.status == 'cancelled'"
                                        ><p class="text-danger">
                                            {{ sinv.status }}
                                        </p></span
                                    >
                                </td>
                                <td>
                                    <router-link
                                        class="but-co btn"
                                        :to="{
                                            name: 'invoiceTs',
                                            params: { id: sinv.id },
                                        }"
                                        ><i class="bi bi-pencil"></i>
                                    </router-link>
                                </td>
                              
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Cancel Invoice -->
                <div
                    class="tab-pane fade fs-4"
                    id="contact-tab-pane"
                    role="tabpanel"
                    aria-labelledby="contact-tab"
                    tabindex="0"
                >
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">ลูกค้า</th>
                                <th scope="col">เบอร์โทร</th>
                                <th scope="col">วันออกใบเสนอราคา</th>
                                <th scope="col">วันครบกำหนดชำระ</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">แก้ไข</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="cinv in cancel_inv" :key="cinv.id">
                                <td>
                                    <span> {{ cinv.id }}</span>
                                </td>
                                <td>{{ cinv.number }}</td>

                                <td>{{ cinv.customer_name }}</td>
                                <td>{{ cinv.customer_phone }}</td>
                                <td>{{ cinv.date }}</td>
                                <td>
                                    <span
                                        v-if="cinv.due_date == currentDate()"
                                        class="text-danger"
                                        ><strong> {{ cinv.due_date }}</strong>
                                    </span>
                                    <span
                                        v-else="cinv.due_date == !currentDate()"
                                        ><strong> {{ cinv.due_date }}</strong>
                                    </span>
                                </td>
                                <td>
                                    <span v-if="cinv.status == 'pending'">
                                        <p class="text-warning">
                                            <strong>{{ cinv.status }} </strong>
                                        </p>
                                    </span>
                                    <span v-else-if="cinv.status == 'success'"
                                        ><p class="text-success">
                                            {{ cinv.status }}
                                        </p></span
                                    >
                                    <span v-else-if="cinv.status == 'cancelled'"
                                        ><p class="text-danger">
                                            {{ cinv.status }}
                                        </p></span
                                    >
                                </td>
                                <td>
                                    <router-link
                                        class="but-co btn"
                                        :to="{
                                            name: 'invoiceTs',
                                            params: { id: cinv.id },
                                        }"
                                        ><i class="bi bi-pencil"></i>
                                    </router-link>
                                </td>
                              
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- ALL invoice-->
                <div
                    class="tab-pane fade fs-4"
                    id="all-tab-pane"
                    role="tabpanel"
                    aria-labelledby="all-tab"
                    tabindex="0"
                >
                    <div class="tableContrainer">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">ลูกค้า</th>
                                    <th scope="col">เบอร์โทร</th>
                                    <th scope="col">วันออกใบเสนอราคา</th>
                                    <th scope="col">วันครบกำหนดชำระ</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">แก้ไข</th>
                             
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in invoices" :key="item.id">
                                    <td>
                                        <span>{{ item.id }}</span>
                                    </td>
                                    <td>{{ item.number }}</td>

                                    <td>{{ item.customer_name }}</td>
                                    <td>{{ item.customer_phone }}</td>
                                    <td>
                                        {{ item.date }}
                                    </td>
                                    <td>
                                        <span
                                            v-if="
                                                item.due_date == currentDate()
                                            "
                                            class="text-danger"
                                            ><strong>
                                                {{ item.due_date }}</strong
                                            >
                                        </span>
                                        <span
                                            v-else="
                                                item.due_date == !currentDate()
                                            "
                                            ><strong>
                                                {{ item.due_date }}</strong
                                            >
                                        </span>
                                    </td>
                                    <td>
                                        <span v-if="item.status == 'pending'">
                                            <p class="text-warning">
                                                <strong
                                                    >{{ item.status }}
                                                </strong>
                                            </p>
                                        </span>
                                        <span
                                            v-else-if="item.status == 'success'"
                                            ><p class="text-success">
                                                {{ item.status }}
                                            </p></span
                                        >
                                        <span
                                            v-else-if="
                                                item.status == 'cancelled'
                                            "
                                            ><p class="text-danger">
                                                {{ item.status }}
                                            </p></span
                                        >
                                    </td>
                                    <td>
                                        <router-link
                                            class="but-co btn"
                                            :to="{
                                                name: 'invoiceTs',
                                                params: { id: item.id },
                                            }"
                                            ><i class="bi bi-pencil"></i>
                                        </router-link>
                                    </td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
            invoices: Array,
            cancel_inv: Array,
            pending_inv: Array,
            success_inv: Array,
        };
    },
    created() {
        this.getInv();
        this.success_Inv();
        this.cancel_Inv();
        this.pending_Inv();
    },

    methods: {
        currentDate() {
            const today = new Date();
            const yyyy = today.getFullYear();
            let mm = today.getMonth() + 1; // Months start at 0!
            let dd = today.getDate();

            if (dd < 10) dd = "0" + dd;
            if (mm < 10) mm = "0" + mm;

            const Today =  yyyy  + "-" + mm + "-" + dd ;
            return Today;
        },

        async getInv() {
            let url = "/api/invoices_join";
            await axios.get(url).then((response) => {
                this.invoices = response.data.invoices;
                console.log(this.invoices);
            });
        },
        async success_Inv() {
            let url = "/api/where_sucess";
            await axios.get(url).then((response) => {
                this.success_inv = response.data.success_inv;
            });
        },
        async cancel_Inv() {
            let url = "/api/where_cancelled";
            await axios.get(url).then((response) => {
                this.cancel_inv = response.data.cancel_inv;
                console.log(this.cancel_inv);
            });
        },
        async pending_Inv() {
            let url = "/api/where_pending";
            await axios.get(url).then((response) => {
                this.pending_inv = response.data.pending_inv;
            });
        },
    },

    mounted() {
        console.log("Invoice follow");
    },
};
</script>

<style></style>
