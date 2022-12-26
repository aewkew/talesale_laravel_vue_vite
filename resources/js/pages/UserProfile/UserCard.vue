<template>
    <div class="card align-self-center">
        <div class="card-body card-user">
            <div class="container">
                <div class="row datapro">
                    <div class="col-2">
                        <div class="headname">ID Employee</div>
                        <div class="dataname">{{ id }}</div>
                    </div>
                    <div class="col-2">
                        <div class="headname">NickName</div>
                        <div class="dataname">{{ name }}</div>
                    </div>

                    <div class="col">
                        <div class="headname">Email</div>
                        <div class="dataname">{{ email }}</div>
                    </div>

                    <div class="col">
                        <div class="headname">Tel.</div>
                        <div class="dataname">{{ phone }}</div>
                    </div>

                    <div class="col align-self-center">
                        <!-- Button trigger modal -->
                        <button
                        
                            type="button"
                            class="btn btn-primary "
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                        >
                            Edit
                        </button>
                        <!-- Modal -->
                       <EditfileForm> </EditfileForm>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import EditfileForm from "./EditfileForm.vue";
export default {
    components: { EditfileForm },
    data() {
        return {
            data: {},
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
        this.getUserId();
    },
    methods:{
        async getUserId(){
            let url = `api/userid/${this.id}`
            await axios.get(url).then(response => {
                console.log(response);
                this.user =response.data;
            })   
        },
        props: ['id'],
      
    }
};
</script>
<style></style>
