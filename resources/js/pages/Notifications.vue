<template >
    <div class="container">
        <div class="sale">Notifications {{ currentDate()  }}</div>
         
        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">วันแจ้งเตือน</th>
                        <th scope="col">ลูกค้า</th>
                        <th scope="col">เบอร์โทร</th>
                        <th scope="col">รายระเอียดเสนอ</th>
                        <th scope="col">ปิดการแจ้งเตือน</th>
                    </tr>
                </thead>
                <tbody >
                    <tr v-for="ino in group_noti" :key="ino.id" >
                        <th scope="row" v-if="ino.follow == currentDate()"  class="text-danger ">{{ ino.follow }}</th>
                        <th scope="row" v-else="ino.follow == !currentDate() ">{{ ino.follow }}</th>
                        <td>{{ ino.customer_name }}</td>
                        <td>{{ ino.customer_phone }}</td>
                        <td>{{ ino.details}}</td>
                        <td><button class="but-co btn" type="button" > </button> </td>
                    </tr>
                </tbody>
            </table>
            
        </div> 
    </div>
  

</template>
<script>
export default {
    name: "Notifications",

    data() {
        return {
            group_noti:Array
        };
    },
    created() {
       this.get_notifi();
    },

    methods: {
        currentDate() {
            const current = new Date();
            const date = `${current.getFullYear()}-${
                current.getMonth() + 1
            }-${current.getDate()}`;
            return date;
        },
        async get_notifi(){
            let url = "/api/groupInv_notti"
            await axios.get(url).then((response) =>{
                this.group_noti = response.data.group_noti;
                console.log(this.group_noti);
            })
            .catch((error) => {
                    console.log(error);
                });

        }     
    },

    mounted() {
        console.log("Read Nottify List Component Mounted");
    },
    
}
</script>
<style >
    
</style>