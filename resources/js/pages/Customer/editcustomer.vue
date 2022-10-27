<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger mt-4" v-if="errors.length" > 
                            <ul class="mb-0">
                                <li v-for="(error,index) in errors" :key="index"> 
                                    {{error}}
                                </li>
                            </ul>
                        </div>

                     <form @submit.prevent="updateCustomer">
                        <div class="row">
                            <label  class="form-label text-white fs-3">Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                    v-model="customer.name"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <label  class="form-label text-white fs-3"> Address </label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    v-model="customer.address"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label  class="form-label text-white fs-3"> Phone </label>
                            <div class="form-group">
                                <input class="form-control" 
                                    v-model="customer.phone"
                                />
                            </div>
                        </div>

                        <div class="row subre">
                            <div class="col sub">
                                <button type="submit" class="btn btn-primary" >
                                    Submit
                                </button>
                            </div>
                            <div class="col res">
                                <button type="reset" class="btn btn-danger">
                                    reset
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "editcustomer",
    data() {
        return {
            customer: {},
            name: '',
            address: '',
            phone: '',
            errors:[]
        };
    },
    created (){
      this.getCustomerById();
    },
    methods:{
        async getCustomerById () {
            let url = `/api/getcustomers/${this.
            $route.params.id}`;
            await axios.get(url).then(response => {
                console.log(response);
               this.customer = response.data;
            });
        },
        async updateCustomer(){
            this.errors =[];
            if(!this.customer.name){
                this.errors.push("customer is required")
            }
            if(!this.customer.address){
                this.errors.push("address is required")
            }
            if(!this.customer.phone){
                this.errors.push("phone is required")
            }

            if(!this.errors.length){
                let formData = new FormData();
                formData.append('name', this.customer.name);
                formData.append('address', this.customer.address);
                formData.append('phone', this.customer.phone);
                let url = `/api/updateCustomer/${this.$route.params.id}`;
                await axios.post(url, formData).then((response) =>{
                    console.log(response);
                    if(response.status == 200){
                       alert(response.data.message)
                    }else {
                        console.log('error');
                    }
                }).catch(error=> {
                    this.errors.push(error.response);
                });

            }

           

        }

    },
    mounted: function() {
        console.log('Edit Customer');
    }
   
};
</script>
<style></style>
