<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger mt-4" v-if="errors.length" > 
                            <ul class="mb-0">
                                <li v-for="(error,index) in errors" :key="index"> 
                                    {{ error}}
                                </li>
                            </ul>
                        </div>

                     <form @submit.prevent="addproduct">
                        <div class="row">
                            <label  class="form-label text-white fs-3">Name product</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    v-model="name"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label  class="form-label text-white fs-3" > Brand </label>
                            <div class="form-group">
                                <input  type="text" class="form-control" v-model="brand"/>   
                            </div>
                        </div>

                        <div class="row">
                            <label  class="form-label text-white fs-3" > Color </label>
                            <div class="form-group">
                                <input  type="text" class="form-control" v-model="color"/>  
                            </div>
                        </div>


                        <div class="row">
                            <label  class="form-label text-white fs-3"> price </label>
                            <div class="form-group">
                                <input class="form-control" v-model="price" />                                  
                            </div>
                        </div>

                        <div class="row subre">
                            <div class="col sub">
                                <button type="submit" class="btn btn-primary"
                                     >
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
    name: "create",
    data() {
        return {
            product: {},
            name: '',
            brand: '',
            color: '',
            price: '',
            errors:[]
        };
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
                formData.append('name', this.name);
                formData.append('brand', this.brand);
                formData.append('color', this.color);
                formData.append('price', this.price);
             
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
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}; 
</script>
<style></style>
