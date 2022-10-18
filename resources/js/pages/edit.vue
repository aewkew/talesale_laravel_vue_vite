<template>
    <div class="container">
        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">price</th>
                        <th scope="col">Create date</th>
                        <th scope="col">Update date</th>
                        <th scope="col">Add</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody v-for="item in products" :key="item.id">
                    <tr>
                        <td scope="row">{{ item.id }}</td>
                        <td scope="row">{{ item.name }}</td>
                        <td scope="row">{{ item.description }}</td>
                        <td scope="row">{{ item.price }}</td>
                        <td scope="row">{{ item.created_at }}</td>
                        <td scope="row">{{ item.updated_at }}</td>
                        <td><button class="but-co btn" type="button">
                                <i class="bi bi-plus"></i></button>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button
                                class="but-co btn"
                                data-bs-toggle="modal"
                                data-bs-target="#EditModal"
                            >
                                <i class="bi bi-pencil"></i>
                            </button>
                            <Toedit></Toedit>
                        </td>

                        <td>
                            <button
                                class="but-co btn"
                                @click.prevent="deleteProduct(item.id)"
                            >
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
import axios from "axios";
import Toedit from "./toedit.vue";

export default {
    name: "edit",
    components: { Toedit },

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
            let url = 'http://127.0.0.1:8000/api/products';
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
      
            let url = `http://127.0.0.1:8000/api/deleteProduct/${id}`;
            await axios.delete(url).then(response =>{
                if(response.data.code == 200) {
                     alert(response.message);
                     this.getData();
                }  
            }).catch(error =>{
                console.log(error);
            } );
        },

        /* getData() {
           
            axios
                .get("http://127.0.0.1:8000/api/products")
                .then((res) => (this.data = res.data));
                
        }, */
    },
    mounted() {
        console.log("Contact List Component Mounted");
        
    },
};
</script>
<style></style>
