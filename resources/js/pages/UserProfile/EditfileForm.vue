<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Modal title
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
               

                    <form @submit.prevent="updateUser">
                        <div class="row">
                            <label class="form-label text-black fs-3">
                                NickName</label
                            >
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="name"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label text-black fs-3">
                               Email</label
                            >
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="email"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label class="form-label text-black fs-3">
                                Tel
                            </label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="phone"
                                />
                            </div>
                        </div>


                        <div class="row subre">
                            <div class="col sub">
                                <button type="submit" class="btn btn-primary">
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
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            data: {
           
            name: '',
            email: '',
            phone: '',
            errors:[]
            },
        };
    },
    created() {
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id;
            this.name = window.Laravel.user.name;
            this.email = window.Laravel.user.email;
            this.phone = window.Laravel.user.phone;
        }
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true;
        }
    },
    methods: {
        async getProductById() {
            let url = `http://127.0.0.1:8000/api/userid/${this.id}`;
            await axios.get(url).then(response => {
                console.log(response);
                this.user =response.data;
            });
    

        },
        async updateUser(){
            this.errors =[];
            if(!this.name){
                this.errors.push("Name is required")
            }
            if(!this.email){
                this.errors.push("Description is required")
            }
            if(!this.phone){
                this.errors.push("Description is required")
            }
            if(!this.errors.length){
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('phone', this.phone);
                let url = `/api/editUser/${this.id}`;
                await axios.post(url, formData).then((response) =>{
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

        },
    },
};
</script>
<style></style>
