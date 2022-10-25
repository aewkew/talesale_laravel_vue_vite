<template >
    <div class="card">
        <div class="card-body card-user">
            <div class="row datapro "> 
                <div class="col">

                </div>

                <div class="col"> 
                    <div class="headname">NickName </div>
                    <div class="dataname">{{name}}</div>  
                </div>

                <div class="col">
                    <div class="headname" >FullName</div>
                    <div class="dataname" >{{email}} </div>
                </div>

                <div class="col">
                    <div class="headname">Email</div>
                    <div class="dataname" >@hotmail.com</div>
                    
                </div>

                <div class="col">
                    <div class="headname">Tel.</div>
                    <div class="dataname" >087-78979879</div>
                </div>

                <div class="col ">
                    <button type="button"
                                class="btn but-co"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"
                    
                    >Edit</button>
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
            this.name = window.Laravel.user.name
        } 
        if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
    },
}
</script>
<style >
    
</style>