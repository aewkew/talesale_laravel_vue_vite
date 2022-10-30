<template>
    <div  class="card">
        <div class="card-body shopCard">
            <div class="row">
              
                <div class="col-auto">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelect01"
                            >Brand</label
                        >
                        <select class="form-select" id="">
                            <option value="" selected>Choose...</option>
                            <option >Red</option>
                          
                        </select>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="input-group">
                        <label class="input-group-text" for="product"
                            >Color</label >                     
                        <select  class="form-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option >Red</option>
                            <option >Blue</option>
                            <option >Black</option>
                            <option >Yellow</option>
                        </select>
                    </div>
                </div>

                <div class="col-auto"> 
                    <div class="row">
                        <div class="col">
                            <button type="button"
                                class="btn but-co"
                                data-bs-toggle="modal"
                                data-bs-target="#CustomerModel"> 
                                <i class="bi bi-person-plus-fill"  style="font-size: 1.4rem"></i>
                            </button>
                            
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="row">
                        <div class="col">
                            <button
                                type="button"
                                class="btn but-co"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                            
                                Add
                            </button>
                           
                        </div>

                        <div class="col">
                            <button type="button" class="btn but-co"
                                data-bs-toggle="modal"
                                data-bs-target="#CompanyModel"> 
                                <i
                                    class="bi bi-building"
                                    style="font-size: 1.4rem"
                                ></i>
                            </button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn but-co">
                                <i
                                    class="bi bi-basket"
                                    style="font-size: 1.4rem"
                                ></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Add></Add>
        <Add_customer></Add_customer>
        <Add_company></Add_company>
      
    </div>
</template>
<script>
import Add from "./add.vue";
import Add_customer from "./add_customer.vue";
import Add_company from "./add_company.vue";
import axios from "axios";

export default {
    name: "search",
    components: { Add, Add_customer ,Add_company},
    ata() {
        return {
            products: Array,
            keyword: null,
           
        };
    },
    created() {
        this.getData();
    },
    watch:{
      keyword(){
        this.getResult();
      }    
    },
    methods:{
        async getData() {
            let url = "/api/products";
            await axios
                .get(url)
                .then((response) => {
                    this.products = response.data.products;
                    console.log(this.products);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async getResult(){
            let url ='/api/search';
              await axios.get(url,{params:{keyword: this.keyword} })
                 .then(res => this.products = res.data)
                 .catch(error => {});

        }
    }
};
</script>
<style></style>
