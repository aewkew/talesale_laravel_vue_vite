<template>
    <div class="container-fluid dashborad">
        <div class="row">
            <div class="col m-2">
                <div class="card">
                    <div
                        class="card-header text-start fs-6 fw-semibold py-2 text-black"
                    >
                        ยอดความนิยมของแต่ละสี
                    </div>
                    <div class="card-body">
                        <BarDoughtnut />
                    </div>
                </div>
            </div>

            <div class="col m-2">
                <div class="card">
                    <div
                        class="card-header text-start fs-6 fw-semibold py-2 text-black"
                    >
                        ยอดขายแต่ละเดือน ปีที่ผ่านมา
                    </div>

                    <div class="card-body">
                        <BarChart />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col m-3">
                <div class="card">
                    <div
                        class="card-header text-start fs-6 fw-semibold py-2 text-black"
                    >
                        ลูกค้ายังไม่ได้ชำระเดือนนี้
                    </div>
                    <div class="card-body">
                        <div class="tabledash">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">วันครบกำหนดชำระ</th>
                                        <th scope="col">ลูกค้า</th>
                                        <th scope="col">เบอร์โทร</th>
                                    </tr>
                                </thead>

                                <tbody v-for="md in pending_month">
                                    <tr>
                                        <td v-if="md.due_date  == currentDate()" class="fw-semibold text-danger ">{{ md.due_date }}</td>
                                        <td v-else="md.due_date  == !currentDate()" class="fw-semibold ">{{ md.due_date }}</td>
                                        <td>{{ md.customer_name }}</td>
                                        <td>{{ md.customer_phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m-3">
                <div class="card">
                    <div
                        class="card-header text-start fs-6 fw-semibold py-2 text-black"
                    >
                        ติดตามลูกค้าสำหรับเดือนนี้
                    </div>
                    <div class="card-body">
                        <div class="tabledash">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ติดตาม</th>
                                        <th scope="col">ลูกค้า</th>
                                        <th scope="col">เบอร์โทร</th>
                                        <th scope="col">รายระเอียด</th>
                                    </tr>
                                </thead>

                                <tbody v-for="fm in follow_month">
                                    <tr>
                                        <td v-if="fm.follow == currentDate()" class="fw-semibold text-danger ">{{ fm.follow}}</td>
                                        <td v-else="fm.follow == !currentDate()" class="fw-semibold ">{{ fm.follow}}</td>
                                        <td>{{ fm.customer_name }}</td>
                                        <td>{{ fm.customer_phone }}</td>
                                        <td>{{ fm.details}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import BarChart from "./Bar/Bar.vue";
import BarDoughtnut from "./Bar/Doughtnut.vue";
export default {
    name: "Dashboard",
    components: {
        BarChart,
        BarDoughtnut,
    },
    data() {
        return {
            name: null,
            pending_month: "",
            follow_month: "",
        };
    },

    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name;
        }
        this.get_peddind();
        this.get_follow_month();
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
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
        async get_peddind() {
            let url = "api/month_where_pending";
            await axios
                .get(url)
                .then((response) => {
                    this.pending_month = response.data.pending_month;
                    console.log(this.pending_month);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async get_follow_month() {
            let url = "api/follow_month";
            await axios
                .get(url)
                .then((response) => {
                    this.follow_month = response.data.follow_month;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
<style></style>
