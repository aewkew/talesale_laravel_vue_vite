<template>
    <div class="container">
        
        <Search></Search>

        <div class="sale">List Product</div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-auto">Code product</th>
                        <th scope="col-auto">Name</th>
                        <th scope="col-auto">Brand</th>
                        <th scope="col-auto">Color</th>
                        <th scope="col-auto">price</th>
                        <th scope="col-auto">Add</th>
                    </tr>
                </thead>

                <tbody v-for="item in products" :key="item.id">
                    <tr >
                        <th>{{ item.id }}</th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.brand }}</td>
                        <td>{{ item.color }}</td>
                        <td>{{ item.price }}</td>
                        <td>
                            <button
                                class="but-co btn "
                                type="button">
                                <i class="bi bi-plus"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
     

   

    </div>
</template>
<script>
import Card from "../components/Cards/Card.vue";
import Search from "./shop/search.vue";
export default {
    name: "Shop",
    components: { Card, Search },
    data() {
        return {
            products: Array,
        };
    },
    created() {
        this.getData();
    },
    methods:{
        async getData(){
            let url = '/api/products';
            await axios
                .get(url)
                .then((response) => {
                    this.products = response.data.products;
                    console.log(this.products);
                })
                .catch((error) => {
                    console.log(error);
                });
        }

    },
    mounted() {
        console.log("Contact List Component Mounted");
        
    },
   
};
</script>
<style></style>
