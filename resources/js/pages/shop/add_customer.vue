<template >
    <div class="modal fade add"
        id="CustomerModel"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true" >
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title " id="exampleModalLabel">
                        Add Customer
                    </h1>
                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form @submit.prevent="addcustomer">
                    <div class="row ">
                        <label for="exampleModalLabel" class="form-label" > Name Customer </label>
                            <div class="form-group">
                                <input type="text" class="form-control"  v-model="name"  />
                            </div>
                    </div>
                    <div class="row ">
                        <label for="exampleModalLabel" class="form-label" > Address </label>
                        <div class="input-group">
                            <input  type="text" class="form-control" v-model="address"/>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputGroupSelect01" class="form-label" > Phone </label>
                        <div class="input-group">
                            <div class="form-group">
                                <input  type="text" class="form-control" v-model="phone"/>  
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
export default { 
    data() {
        return {
            customer: {},
            name: '',
            address: '',
            phone: '',
            errors:[]
        };
    },
    created() {
        this.getData();
    },
    methods: {
         async getData() {
            let url = "/api/customers";
            await axios
                .get(url)
                .then((response) => {
                    this.customers = response.data.customers;
                    console.log(this.customers);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
       async addcustomer() {

            this.errors =[];
            if(!this.name){
                this.errors.push("Name is required")
            }
            if(!this.address){
                this.errors.push("Brand is required")
            }
            if(!this.phone){
                this.errors.push("Color is required")
            }
       
            if(!this.errors.length){
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('address', this.address);
                formData.append('phone', this.phone);
             
                await axios.post('/api/addcustomers', formData).then((response) =>{
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
    mounted() {
        console.log("ADD Customer List Component Mounted");
    },
    
}
</script>
<style >
    
</style>