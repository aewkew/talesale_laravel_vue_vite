<template>
     <div data-toggle="modal fade add" 
        class="modal fade"
        id="customer"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
     
        aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title " id="staticBackdropLabel">
                        Edit company 
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>

                <div class="modal-body">
                    <form @submit.prevent="editcustomer">
                    <div class="row ">
                        <label for="staticBackdropLabel" class="form-label" >Customer Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control"  v-model="customer.name"  />
                            </div>
                    </div>
                    <div class="row ">
                        <label for="staticBackdropLabel" class="form-label" >Customer Address</label>
                        <div class="input-group">
                            <input  type="text" class="form-control"  v-model="customer.address"/>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputGroupSelect01" class="form-label" >Customer  Phone  </label>
                        <div class="input-group">
                            <div class="form-group">
                                <input  type="text" class="form-control"  v-model="customer.phone" />  
                            </div>
                        </div>
                    </div>

                    <!--<div class="row">
                        <label for="inputvalue"  class="form-label" > Value </label>
                        <div class="input-group"> 
                            <input type="number" class="form-control" id="inputvalue">
                        </div>
                    </div>-->

                    <div class="row subre"> 
                        <div class="col sub"> <button type="submit" class="btn btn-primary">Submit</button> </div>
                        <div class="col res"> <button type="reset" class="btn btn-danger">reset</button> </div>
                        
                    </div>
                </form>

                </div>

                <div class="modal-footer">
                    <button  class="btn btn-secondary" data-bs-dismiss="modal" >
                       Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: "editcustomer",
    data(){
        return{
            customer:{},
            name:'',
            address:'',
            phone:'',
            errors:[]
        }
      
    },
    created (){
        this.getProductById();
    },
    methods: {
        async getProductById() {
            let url = `/api/getcustomers/${this.
            $route.params.id}`;
            await axios.get(url).then(response => {
                console.log(response);
               this.customer = response.data;
            });
       },
       async editcustomer() {
            this.errors =[];
            if(!this.customer.name){
                this.errors.push("Name is required")
            }
            if(!this.customer.address){
                this.errors.push("Description is required")
            }
            if(!this.customer.phone){
                this.errors.push("Price is required")
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

           
        },
       
    },
    mounted: function() {
        console.log('Edit Customer');
    }
}
</script>
<style>
    
</style>