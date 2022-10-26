<template>
    <div class="container">
        <SeachTable></SeachTable>
        <div class="sale">List Customer</div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Company</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody v-for="item in customers" :key="item.id">
                    <tr>
                        <td>{{ item.id }}</td>
                        <td></td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.address }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>
                            <button class="but-co btn" type="button">
                                null
                            </button>
                        </td>
                        <td>
                            <button  class="but-co btn" @click="editcustomer(item)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                     <i class="bi bi-pencil"></i>
                            </button>

                            <!-- Modal -->
                            <div
                                class="modal fade"
                                id="exampleModal"
                                tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true"
                                ref="EditCustomer"
                            >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5
                                                class="modal-title"
                                                id="exampleModalLabel"
                                            >
                                                Modal title
                                            </h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <div class="modal-body">
                                            <form @submit.prevent="updateCustomer">
                        <div class="row">
                            <label  class="form-label text-black fs-5"> Customer Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                    v-model="editcustomerData.name"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label  class="form-label text-black fs-5" > Customer Address</label>
                            <div class="form-group">
                                <input  type="text" class="form-control"
                                    v-model="editcustomerData.address"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label  class="form-label text-black fs-5"> Customer Phone </label>
                            <div class="form-group">
                                <input class="form-control" 
                                    v-model="editcustomerData.phone"
                                />
                            </div>
                        </div>

                        <div class="row subre">
                            <div class="col sub">
                                <button type="submit" class="btn btn-primary" >
                                    Submit
                                </button>
                            </div>
                            <div class="col res">
                                <button type="reset" class="btn btn-danger">
                                    reset
                                </button>
                            </div>
                        </div>
                    </form>
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
                                                type="button"
                                                class="btn btn-primary"
                                            >
                                                Save changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button
                                class="but-co btn"
                                @click.prevent="deleteCustomer(item.id)"
                            >
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Model -->
</template>
<script>
import axios from "axios";
import Editcustomer from "./Customer/editcustomer.vue";
import SeachTable from "./TableList/seachTable.vue";

export default {
    name: "Tablelist",
    components: { SeachTable, Editcustomer },

    data() {
        return {
            customers: Array,
            customer: {},
            
            errors: [],
            editcustomerData:{
name: "",
            address: "",
            phone: "",
            },
        };
    },
    created() {
        this.getData();
    },

    methods: {
        async getData() {
            let url = "/api/customers";
            await axios
                .get(url)
                .then((response) => {
                    this.customers = response.data.customers;
                    console.log(this.customers);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        async deleteCustomer(id) {
            let url = `/api/deleteCustomer/${id}`;
            await axios
                .delete(url)
                .then((response) => {
                    if (response.data.code == 200) {
                        alert(response.message);
                        this.getData();
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        
        editcustomer(customer) {
            this.editcustomerData = customer;
        },
        updateCustomer(){
            this.errors =[];
            if(!this.editcustomerData.name){
                this.errors.push("Name is required")
            }
            if(!this.editcustomerData.address){
                this.errors.push("Description is required")
            }
            if(!this.editcustomerData.phone){
                this.errors.push("Price is required")
            }

            if(!this.errors.length){
                let formData = new FormData();
                formData.append('name', this.editcustomerData.name);
                formData.append('address', this.editcustomerData.address);
                formData.append('pone', this.editcustomerData.phone);
                let url = `api/updateCustomer/${this.editcustomerData.id}`;
                 axios.post(url, formData).then((response) =>{
                    console.log(response);
                    if(response.status == 200){
                       alert(response.data.message)
                    }else {
                        console.log('error');
                    }
                }).catch(error=> {
                    this.errors.push(error.response);
                });

            }

        }
        
    },

    mounted() {
        console.log("Read Customer List Component Mounted");
    },
};
</script>
<style></style>
