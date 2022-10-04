<template>
    <div class="container">
          <Search></Search>
        

        <div class="sale">List Product</div>

        <div class="tableContrainer">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Code product</th>
                        <th scope="col">Date</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Color</th>
                        <th scope="col">price</th>
                        <th scope="col">Add</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(item, i) in items" :key="i" :to="item.to">
                        <th scope="row">{{ item.Code_Product }}</th>
                        <td>{{ item.Date }}</td>
                        <td>{{ item.Brand }}</td>
                        <td>{{ item.Color }}</td>
                        <td>{{ item.price }}</td>
                        <td>
                            <button class="but-co btn btn-primary"  type="button">
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
import Card from '../components/Cards/Card.vue';
import Search from './shop/search.vue';
export default {
    name: "Shop",
    data() {
        return {
            items: [
                {
                    Code_Product: "13287",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13288",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
                {
                    Code_Product: "13289",
                    Date: "2022-08-24",
                    Brand: "HP",
                    Color: "Blue",
                    price: "115",
                },
            ],
        };
    },
    components: { Card, Search }
};
</script>
<style></style>
