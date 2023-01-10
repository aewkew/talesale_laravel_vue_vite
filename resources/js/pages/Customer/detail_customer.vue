<template>
    <div>
        <div class="container">
            <div class="card text-center">
                <div class="card-body card-user">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-2 fs-5 text-white-50">
                                        ชื่อ
                                    </div>
                                    <div
                                        class="col fs-5 fw-semibold text-white"
                                    >
                                        {{ customer.customer_name }}
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-3 fs-5 text-white-50">
                                        ที่อยู่
                                    </div>
                                    <div
                                        class="col fs-6 fw-semibold text-white"
                                    >
                                        {{ customer.customer_address }}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col fs-5 text-white-50">
                                        เบอร์โทร
                                    </div>
                                    <div
                                        class="col fs-5 fw-semibold text-white"
                                    >
                                        {{ customer.customer_phone }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="sale">List invoice</div>
            </div>
            <!-- history invoice -->
            <div class="tableContrainer">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">invoive</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">ยอดจัดซื้อ</th>
                            <th scope="col">เคลื่อนไหวล่าสุด</th>
                            <th scope="col">รายระเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="inc in invoice_cus" :key="inc.id">
                            <td>{{ inc.number }}</td>
                            <td>
                                <span v-if="inc.status == 'pending'">
                                    <p class="text-warning">
                                        <strong>{{ inc.status }} </strong>
                                    </p>
                                </span>
                                <span v-else-if="inc.status == 'success'"
                                    ><p class="text-success">
                                        {{ inc.status }}
                                    </p></span
                                >
                                <span v-else-if="inc.status == 'cancelled'"
                                    ><p class="text-danger">
                                        {{ inc.status }}
                                    </p></span
                                >
                            </td>
                            <td>{{ inc.total }}</td>
                            <td>{{ inc.updated_at }}</td>
                            <td>
                                <router-link
                                    :to="{
                                        name: 'invoice_customer',
                                        params: { id: inc.id },
                                    }"
                                    class="but-co btn"
                                >
                                    รายระเอียด</router-link
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "detail_customer",
    data() {
        return {
            customer: {},
            date: "",

            invoice_cus: Array,
        };
    },
    created() {
        this.getCustomerById();
        this.get_inv();
    },
    methods: {
        async getCustomerById() {
            let url = `/api/getcustomers/${this.$route.params.id}`;
            await axios.get(url).then((response) => {
                console.log(response);
                this.customer = response.data;
            });
        },
        async get_inv() {
            let url = `/api/invioce_cus/${this.$route.params.id}`;
            await axios.get(url).then((response) => {
                console.log(response);
                this.invoice_cus = response.data.invoice_cus;
            });
        },
    },
};
</script>
<style></style>
