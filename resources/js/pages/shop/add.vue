<template>
    <div class="modal fade"
        id="staticBackdrop"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title " id="staticBackdropLabel">
                        เพิ่มสินค้า
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>

                <div class="modal-body">
                    <form @submit.prevent="addproduct">
                    <div class="row ">
                        <label for="staticBackdropLabel" class="form-label" > ชื่อสินค้า </label>
                            <div class="form-group">
                                <input type="text" class="form-control"  v-model="name"  />
                            </div>
                    </div>
                    
                    <div class="row ">
                        <label for="staticBackdropLabel" class="form-label" > แบรนด์ </label>
                        <div class="form-group">
                             <select class="form-select" v-model="brand">
                                <option value="Canon">Canon</option>
                                <option value="Epson">Epson</option>
                                <option value="Brother">Brother</option>
                                <option value="Hp">Hp</option>
                            </select>
                        </div>
                       
                      <!--
                        <div class="input-group">
                            <input  type="text" class="form-control" v-model="brand"/>
                        </div> -->
                    </div>

                    <div class="row">
                        <label for="inputGroupSelect01" class="form-label" > สีสินค้า </label>
                        <div class="form-group"> 
                             <select class="form-select" v-model="color">
                            <option value="Blue">Blue</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Red">Red</option>
                            <option value="Black">Black</option>
                        </select>
                        </div>
                       
                        <!-- 
                        <div class="input-group">
                            <div class="form-group">
                                <input  type="text" class="form-control" v-model="color"/>  
                            </div>
                        </div>-->
                    </div>

                    <div class="row"> 
                        <label for="inputprice" class="form-label" > ราคา </label>
                        <div class="form-group">
                                <input class="form-control" v-model="price" />                                  
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
import axios from "axios";
export default {
    name: "add",
     
    data() {
        return {
           // product: {},
            name: '',
            brand: '',
            color: '',
            price: '',
            errors:[]
        };
    },
    created() {
   
    },
    methods: {
         
       async addproduct() {

            this.errors =[];
            if(!this.name){
                this.errors.push("Name is required")
            }
            if(!this.brand){
                this.errors.push("Brand is required")
            }
            if(!this.color){
                this.errors.push("Color is required")
            }
            if(!this.price){
                this.errors.push("Price is required")
            }

            if(!this.errors.length){
                let formData = new FormData();
                formData.append('product_name', this.name);
                formData.append('product_brand', this.brand);
                formData.append('product_color', this.color);
                formData.append('product_price', this.price);
             
                await axios.post('/api/addproduct', formData).then((response) =>{
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
        console.log("ADD Product List Component Mounted");
    },
  
};
</script>

