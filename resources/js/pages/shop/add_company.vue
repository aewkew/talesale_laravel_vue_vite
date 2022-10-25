<template >
    <div class="modal fade add"
        id="CompanyModel"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
     
        aria-hidden="true" >
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title " id="staticBackdropLabel">
                        Add Company
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>

                <div class="modal-body">
                    <form @submit.prevent="addcompany">
                    <div class="row ">
                        <label for="staticBackdropLabel" class="form-label" >Company Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control"  v-model="company_name"  />
                            </div>
                    </div>
                    <div class="row ">
                        <label for="staticBackdropLabel" class="form-label" >Company Address</label>
                        <div class="input-group">
                            <input  type="text" class="form-control"  v-model="company_address"/>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputGroupSelect01" class="form-label" >Company Phone  </label>
                        <div class="input-group">
                            <div class="form-group">
                                <input  type="text" class="form-control"  v-model="company_phone" />  
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
            company: {},
            company_name: '',
            company_address: '',
            company_phone: '',
            errors:[]
        };
    },
    created() {
        this.getData();
    },
    methods: {
         async getData() {
            let url = "/api/companies";
            await axios
                .get(url)
                .then((response) => {
                    this.company = response.data.companies;
                    console.log(this.company);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
       async addcompany() {

            this.errors =[];
            if(!this.company_name){
                this.errors.push("Name is required")
            }
            if(!this.company_address){
                this.errors.push("Brand is required")
            }
            if(!this.company_phone){
                this.errors.push("Color is required")
            }
       
            if(!this.errors.length){
                let formData = new FormData();
                formData.append('company_name', this.company_name);
                formData.append('company_address', this.company_address);
                formData.append('company_phone', this.company_phone);

                await axios.post('/api/addCompanies', formData).then((response) =>{
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
        console.log("ADD Company List Component Mounted");
    },
    
}
</script>
<style>
    
</style>