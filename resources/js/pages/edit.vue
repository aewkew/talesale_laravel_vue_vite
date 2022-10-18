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
              
                <tbody>
                    
                    <tr v-for="item in data" v-bind:key="item.productId">
                        <th>{{ item.id }}</th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.description }}</td>
                        <td>{{ item.price }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>{{ item.updated_at }}</td>
                        <td>
                            <button class="but-co btn" type="button" @click="addProduct"  > 
                                <i class="bi bi-plus"></i>
                            </button>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button
                                class="but-co btn"
                                @click="onEdit(item.id)"
                                data-bs-toggle="modal"
                                 data-bs-target="#EditModal"
                            >
                                <i class="bi bi-pencil"></i>
                            </button>
                            <Toedit ></Toedit>
                        </td>

                        <td>
                            <button
                                class="but-co btn"
                                type="button"
                              
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
import router from "../router";
import Toedit from "./toedit.vue";

const onEdit = (id) => {
    router.push('./toedit/'+id)
}
export default {
    name: "edit",
    props:['foo'],
    data() {
        return {
            data: [],
            editProduct:{} 
        }
    },
    created() {
        this.getData();
    },
    methods: {

        getData() {
            axios
                .get("http://127.0.0.1:8000/api/products")
                .then((res) => (this.data = res.data));
        },

        editProduct(){
            console.log(item.id)
           
        },
 
    },
    components: { Toedit },
};
</script>
<style></style>
