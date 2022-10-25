<template >
    <div class="card">
        <div class="card-body card-user">
            <div class="container">
            <div class="row datapro "> 
                <div class="col-1"> 
                    <div class="headname"> ID Employee </div>
                    <div class="dataname">{{id}}</div>  
                </div>
                <div class="col-2"> 
                    <div class="headname">NickName </div>
                    <div class="dataname">{{name}}</div>  
                </div>

                <div class="col">
                    <div class="headname">Email</div>
                    <div class="dataname" >{{email}}</div>
                </div>

                <div class="col">
                    <div class="headname">Tel.</div>
                    <div class="dataname" >{{phone}}</div>
                </div>

                <div class="col ">
                    <button type="button" class="btn but-co"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"
                    >Edit</button>
                </div>
            </div>
        </div>
        </div>
        <EditfileForm></EditfileForm>
    </div>
</template>
<script>
import EditfileForm from './EditfileForm.vue';
export default {
    components: { EditfileForm },
    data(){

    },
    created() {
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id
            this.name = window.Laravel.user.name
            this.email = window.Laravel.user.email
            this.phone = window.Laravel.user.phone
        } 
        if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
    },
}
</script>
<style >
    
</style>