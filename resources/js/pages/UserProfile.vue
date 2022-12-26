<template >
    <div class="container">
        <UserCard> </UserCard>

        <div class="sale">User list</div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ลูกค้า</th>
                        <th scope="col">เบอร์</th>
                        <th scope="col">Invoice number</th>
                        <th scope="col">ขายเมื่อ</th>
                        <th scope="col">พนักงาน</th>
                        <th scope="col">รายระเอียด</th>
                    </tr>
                </thead>

                <tbody  v-for="item in invoices" :key="item.id">
                    <tr >
                        <th scope="row">{{item.customer_name }}</th>
                        <td>{{ item.customer_phone}}</td>
                        <td>{{ item.number}}</td>
                        <td>{{ item.updated_at}}</td>
                        <td>{{ item.user_id}}</td>
                        <td>
                            <button class="but-co btn " type="button"><i class="bi bi-plus"></i></button>
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
            invoices:Array
        }

    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        } 
        if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }

        this.getInv();
    },
    methods: {
        async getInv(){
            let url='/api/invoices_join';
               await axios .get(url).then((response) =>{
                this.invoices = response.data.invoices;
                console.log(this.invoices);
             }) 
        },
    },
    mounted() {
        console.log("history_dealings List Component Mounted");
    },
}
</script>
<style >
    
</style>