<template>
    <!-- Modal -->
    <div
       data-toggle="modal" 
        class="modal fade"
       id="EditModal"
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

                    <div class="form-group">
                        <div class="row">
                            <label for="name" class="form-label text-blue fs-3">
                                product {{ info }}
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                v-model="name"
                                name="name"
                                id="name"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <label
                            for="description"
                            class="form-label text-blue fs-3"
                        >
                            Description
                        </label>
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                id="description"
                                v-model="description"
                                description="description"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="form-label text-blue fs-3">
                            price
                        </label>
                        <div class="form-group">
                            <input
                                class="form-control"
                                id="price"
                                v-model="price"
                                price="price"
                            />
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
                    <button
                        @click="updateProduct"
                        type="button"
                        class="btn btn-primary"
                    >
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    
};
</script>
<style></style>
