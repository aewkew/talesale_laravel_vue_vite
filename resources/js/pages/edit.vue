<template>
    <div class="container">
        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Code product</th>
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
                        <th scope="row">{{ item.id }}</th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.description }}</td>
                        <td>{{ item.price }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>{{ item.updated_at }}</td>
                        <td>
                            <button class="but-co btn" type="button">
                                <i class="bi bi-plus"></i>
                            </button>
                        </td>
                        <td>

                            <!-- Button trigger modal -->
                            <button
                                class="but-co btn"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                            >
                                <i class="bi bi-pencil"></i>
                            </button>

                            <Toedit></Toedit>
                        </td>

                        <td> 
                            <button class="but-co btn" type="button">
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
    data() {
        return {
            data: [],
        };
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
    },
    components: { Toedit }
};
</script>
<style></style>
