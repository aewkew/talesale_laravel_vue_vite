<template>
    <div>
        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Code product ทำไมมันขึ้นเเดง</th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">price</th>
                        <th scope="col">Add</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="item in data" v-bind:key="item.productId">
                        <th scope="row"></th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.description }}</td>
                        <td>{{ item.price }}</td>

                        <td>
                            <button class="but-co btn" type="button">
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
import axios from 'axios';
export default {
    name: 'Dashboard',
    data() {
        return{
          data: [],
        };
    },
    created(){
        this.getData();
    },
    methods: {
        getData() {
            axios
            .get("http://127.0.0.1:8000/api/products")
            .then((res) => (this.data = res.data))
        }
    }
}
</script>
<style >

</style>
