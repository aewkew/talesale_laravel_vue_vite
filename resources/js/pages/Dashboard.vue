<template>
    <div class="container-fluid dashborad">
        <div class="row">
            <div class="col-5 m-2">
                <div class="card">
                    <div
                        class="card-header text-start fs-6 fw-semibold py-2 text-black"
                    >
                        ยอดขายสีปีที่ผ่านมา
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
                    <div class="card-header text-start fs-6 fw-semibold py-2 text-black"> ลูกค้ายังไม่ได้ชำระเดือนนี้ </div>
                    <div class="card-body">

                    </div>

                </div>

            </div> 
            <div class="col m-3"> 
                <div class="card">
                    <div class="card-header text-start fs-6 fw-semibold py-2 text-black"> ติดตามลูกค้าสำหรับเดือนนี้ </div>
                    <div class="card-body">

                    </div>

                </div>

            </div> 

        </div>
    </div>
</template>
<script>
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
        };
    },

    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name;
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    },
};
</script>
<style></style>
