<template >
    <div class="container">
        <UserCard> </UserCard>

        <div class="sale">User list</div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id Customer</th>
                        <th scope="col">Customer name</th>
                        <th scope="col">Employee name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>

                <tbody  v-for="item in history_dealings" :key="item.id">
                    <tr >
                        <th scope="row">{{ item.product_name}}</th>
                        <td>{{ item.name  }}</td>
                        <td>{{ item.customer_name }}</td>
                        <td>{{ }}</td>
              
                        <td>
                            <button
                                class="but-co btn "
                                type="button"
                            >
                                <i class="bi bi-plus"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> 

    </div>
</template>
<script>
import axios from 'axios';
import UserCard from './UserProfile/UserCard.vue';
export default {
    name: "Userprofile",
    components: { UserCard },
    data() {
        return {
         history_dealings: Array,
        }

    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        } 
        if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
        //this.getData();
        this.getJoin();
    },
    methods: {
       /* async getData() {
            let url = "/api/hisdeal";
            await axios
                .get(url)
                .then((response) => {
                    this.history_dealings = response.data.history_dealings;
                    console.log(this.history_dealings);
                })
                .catch((error) => {
                    console.log(error);
                });
        },*/

        async getJoin() {
            let url ="/api/iner-join_his";
            await axios
            .get(url)
            .then((response) => {
                    this.history_dealings = response.data.history_dealings;
                    console.log(this.history_dealings);
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    },
    mounted() {
        console.log("history_dealings List Component Mounted");
    },
}
</script>
<style >
    
</style>