<template>
    <div>
        <div class="container">
            <div class="card"> 
                <div class="card-body shopCard"> 
                <div class="col">
                        <input
                            type="text"
                            v-model="keyword_custel"
                            class="form-control"
                            placeholder="Search Tel."
                        />
                    </div>
                 </div>   
            </div> 
            <div class="row">
            <div class="col">
                <div class="sale">List Customer</div>
            </div>

            <div class="tableContrainer">
                <table class="table">
                    <thead> 
                        <tr>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">เบอร์โทร</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ประวัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in customer" :key="item.id">
                            <td>{{ item.customer_name }}</td>
                            <td>{{ item.customer_address }}</td>
                            <td>{{ item.customer_phone }}</td>
                            <td>
                                <router-link :to="{ name: 
                            'editcustomer', params:{ id:item.id} }" class="but-co btn"><i class="bi bi-pencil"></i> </router-link>
                            </td>
                            <td>
                                <router-link :to="{ name: 
                            'detail_customer', params:{ id:item.id} }" class="but-co btn">รายระเอียด</router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
        </div> 
    </div>
</template>
<script>
import axios from 'axios'

export default {
    data(){
        return {
            customer:[],
            keyword_custel:null
        }
    },
    created(){
      this.get_cus();
    },
    watch:{
        keyword_custel(){
            this.get_custel();
        }
    },
    methods:{
        async get_cus(){
            let url = 'api/customers'
            await axios.get(url).then((response) =>{
                this.customer = response.data.customers
            })

        },
        async get_custel(){
            let url ='api/searchCus_tel'
            await axios.get(url,{params: { keyword_custel: this.keyword_custel }})
            .then((res)=> (this.customer = res.data))
            .catch((error) => {});
            
        } 
        
    }
    
}
</script>
<style >
    
</style>