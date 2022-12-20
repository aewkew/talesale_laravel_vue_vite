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

                     <form @submit.prevent="updateProduct">
                        <div class="row">
                            <label  class="form-label text-white fs-3"> product</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    v-model="product.product_name"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <label  class="form-label text-white fs-3"> Brand</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    v-model="product.product_brand"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label  class="form-label text-white fs-3" > Color </label>
                            <div class="form-group">
                                <input  type="text" class="form-control"
                                    v-model="product.product_color"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label  class="form-label text-white fs-3"> price </label>
                            <div class="form-group">
                                <input class="form-control" 
                                    v-model="product.product_price"
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
    name: "editProduct",
    data() {
        return {
            product: {},
            product_name: '',
            product_brand: '',
            product_color: '',
            product_price: '',
            errors:[]
        };
    },
    created (){
      this.getProductById();
    },
    methods: {
        
       async getProductById() {
            let url = `http://127.0.0.1:8000/api/getproduct/${this.
            $route.params.id}`;
            await axios.get(url).then(response => {
                console.log(response);
                this.product =response.data;
            });
       },

       async updateProduct() {
            this.errors =[];
            if(!this.product.product_name){
                this.errors.push("Name is required")
            }
            if(!this.product.product_brand){
                this.errors.push("Brand is required")
            }
            if(!this.product.product_color){
                this.errors.push("Color is required")
            }
            if(!this.product.product_price){
                this.errors.push("Price is required")
            }

            if(!this.errors.length){
                let formData = new FormData();
                formData.append('product_name', this.product.product_name);
                formData.append('product_brand', this.product.product_brand);
                formData.append('product_color', this.product.product_color);
                formData.append('product_price', this.product.product_price);
                let url = `/api/updateProduct/${this.$route.params.id}`;
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
        console.log('Edit Product');
    }
};
</script>
<style></style>
