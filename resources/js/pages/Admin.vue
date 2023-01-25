<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="col dashborad">
                        <div class="sale">สรุปยอดขาย</div>
                        <div class="card">
                            <div class="card-head text-white fs-5">
                                ยอดขาย ประจำเดือนนี้
                            </div>
                            <div class="card-body">
                                <div v-for="sum in total_month">
                                    <div class="row">
                                        <div class="col-4 fs-5 fw-normal">
                                            ยอดรวม
                                        </div>
                                        <div class="col fs-5 fw-light">
                                            {{ sum.sum_total.toFixed(2) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 fs-5 fw-normal">
                                            ไม่รวมภาษี
                                        </div>
                                        <div class="col fs-5 fw-light">
                                            {{ sum.sum_sub.toFixed(2) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 fs-5 fw-normal">
                                            ภาษี
                                        </div>
                                        <div class="col fs-5 fw-light">
                                            {{ sum.sum_tax.toFixed(2) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col">
                        <div class="sale">คิดคอมคอมมิชชั่นประจำเดือน</div>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ชื่อ</th>
                                    <th scope="col">ยอดขาย</th>
                                    <th scope="col">ค่าคอมมิชชั่น</th>
                                </tr>
                            </thead>

                            <tbody v-for="emp in sum_employee">
                                <tr>
                                    <td>{{ emp.name }}</td>
                                    <td>{{ emp.sum_total.toFixed(2) }}</td>
                                    <td>{{ emp.sum_com.toFixed(2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "Addmin",
    data() {
        return {
            sum_employee: "",
            total_month: "",
        };
    },
    created() {
        this.get_employee();
        this.get_total();
    },
    methods: {
        async get_employee() {
            let url = "api/sum_employee";
            await axios
                .get(url)
                .then((response) => {
                    this.sum_employee = response.data.sum_employee;
                    console.log(this.sum_employee);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async get_total() {
            let url = "api/sum_month";
            await axios
                .get(url)
                .then((response) => {
                    this.total_month = response.data;
                    console.log(this.total_month);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
<style></style>
