<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="ModalEdit"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Edit product
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                 
                        <div class="row">
                            <label
                                for="inputnickname"
                                class="form-label text-blue fs-3"
                            >
                                product
                            </label>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputnickname"
                                    v-model="name"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label
                                for="inputfullname"
                                class="form-label text-blue fs-3"
                            >
                                Description
                            </label>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputfullname"
                                    v-model="description"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label
                                for="inputprice"
                                class="form-label text-blue fs-3"
                            >
                                price
                            </label>
                            <div class="input-group">
                                <input
                                    class="form-control"
                                    id="inputprice"
                                    v-model="price"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary"
                                @click="updateproduct(item.id)"
                                >
                                    Submit
                                </button>
                            </div>
                            <div class="col">
                                <button type="reset" class="btn btn-danger">
                                    reset
                                </button>
                            </div>
                        </div>
               
                </div>

                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";


export default {
    name: "toedit",
    data() {
        return {
            item:{
            id:0,
            name: '',
            description: '',
            price: '', 
            }
            
        };
    },

    methods: {
        
    },
    mounted(){
            axios.put('http://127.0.0.1:8000/api/editproduct/'+id).then(response=>{
                      console.log(response)
                   
                    });
                      
       
    }
};
</script>
<style></style>
