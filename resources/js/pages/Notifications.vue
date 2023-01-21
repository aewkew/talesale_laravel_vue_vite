<template>
    <div class="container">
        <div class="sale">Notifications {{ currentDate() }}</div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">วันแจ้งเตือน</th>
                        <th scope="col">ลูกค้า</th>
                        <th scope="col">เบอร์โทร</th>
                        <th scope="col">รายระเอียดเสนอ</th>
                        <th scope="col">ปิดแจ้งเตือน</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="ino in follow_join" :key="ino.id">
                        <th
                            scope="row"
                            v-if="ino.follow == currentDate()"
                            class="text-danger"
                        >
                            {{ ino.follow }}
                        </th>
                        <th scope="row" v-else="ino.follow == !currentDate()">
                            {{ ino.follow }}
                        </th>
                        <td>{{ ino.customer_name }}</td>
                        <td>{{ ino.customer_phone }}</td>
                        <td>{{ ino.details }}</td>
                        <td class="text-center">
                            <button
                                type="button"
                                class="but-co btn"
                                @click="deleteFollow(ino.id)"
                            >
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "Notifications",

    data() {
        return {
            follow_join: Array,
        };
    },
    created() {
        this.get_notifi();
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
        async get_notifi() {
            let url = "/api/join_follow";
            await axios
                .get(url)
                .then((response) => {
                    this.follow_join = response.data.follow_join;
                    console.log(this.group_noti);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async deleteFollow(id) {
            let url = `/api/delete_follow/${id}`;
            await axios
                .delete(url)
                .then((response) => {
                    if (response.data.code == 200) {
                        alert(response.data.message);
                    } else {
                        console.log("error");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },

    mounted() {
        console.log("Read Nottify List Component Mounted");
    },
};
</script>
<style></style>
