<template>
     <div data-toggle="modal fade add" 
        class="modal fade"
        id="EditCusModel"
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
                    <form @submit.prevent="editcompany">
                    <div class="row ">
                        <label for="staticBackdropLabel" class="form-label" >Company Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control"  v-model="name"  />
                            </div>
                    </div>
                    <div class="row ">
                        <label for="staticBackdropLabel" class="form-label" >Company Address</label>
                        <div class="input-group">
                            <input  type="text" class="form-control"  v-model="address"/>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputGroupSelect01" class="form-label" >Company Phone  </label>
                        <div class="input-group">
                            <div class="form-group">
                                <input  type="text" class="form-control"  v-model="phone" />  
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
    
    },
    methods: {
       
    }
}
</script>
<style>
    
</style>