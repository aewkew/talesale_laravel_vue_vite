<template>
    <div class="container">
        <Search></Search>

        <div class="sale">List Product</div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-1">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Color</th>
                        <th scope="col">price</th>
                        <th scope="col">Add</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody v-for="item in products" :key="item.id">
                    <tr>
                        <th>{{ item.product_id }}</th>
                        <td>{{ item.product_name }}</td>
                        <td>{{ item.product_brand }}</td>
                        <td>{{ item.product_color }}</td>
                        <td>{{ item.product_price }}</td>
                        <td>
                            <button class="but-co btn" type="button">
                                <i class="bi bi-plus"></i>
                            </button>
                        </td>
                        <td>
                            <button class="but-co btn"  @click.prevent="deleteProduct(item.id)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import Search from "./shop/search.vue";
export default {
    name: "Shop",
    components: { Search },
    data() {
        return {
            products: Array,
           
        };
    },
    created() {
        this.getData();
    },
    methods: {
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
        async deleteProduct(id) {
      
      let url = `/api/deleteProduct/${id}`;
      await axios.delete(url).then(response =>{
          if(response.data.code == 200) {
               alert(response.message);
               this.getData();
          }  
      }).catch(error =>{
          console.log(error);
      } );
  },
      
    },
    mounted() {
        console.log("Product List Component Mounted");
    },
};
</script>
<style></style>
