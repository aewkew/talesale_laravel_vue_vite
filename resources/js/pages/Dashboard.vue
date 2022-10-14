<template>
    <div>
        <a href="Inklist" class="btn btn-success" > Create Product</a>
        <br> <br>

         <div class="container"> 
        <div class="row "> 
             <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <label for="inputnickname" class="form-label text-white fs-3"  > product </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputnickname" >
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputfullname" class="form-label text-white fs-3" > Description </label>
                        <div class="input-group">
                            <input type="text"  class="form-control" id="inputfullname" >
                        </div>
                    </div>

                    <div class="row"> 
                        <label for="inputprice" class="form-label text-white fs-3" > price </label>
                        <div class="input-group">
                            <input  class="form-control" id="inputprice">
                        </div>
                    </div>

                    

                    <div class="row subre"> 
                        <div class="col sub"> <button type="submit" class="btn btn-primary">Submit</button> </div>
                        <div class="col res"> <button type="reset" class="btn btn-danger">reset</button> </div>
                        
                    </div>
                </div> 
             </div>
        </div>
    </div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Code product </th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">price</th>
                        <th scope="col">Add</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="item in data" v-bind:key="item.productId">
                        <th scope="row"> {{ item.id }}</th>
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
