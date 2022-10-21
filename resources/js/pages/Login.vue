<template >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm6 mt-4">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     <strong>{{ error}} </strong>
                </div>
                 <form> 
                    <div class="row">
                     <div class="form-group">
                        <label for="email"> User : </label>
                        <input type="email" class="form-control" id="email"> 
                     </div></div>

                     <div class="row">
                     <div class="form-group">
                       <label for="password"> Password :  </label>
                       <input type="password" class="form-control" id="password">
                     </div>
                     </div>
                     <div class="row"> 
                        <div class="col"><button type="submit" class="btn btn-primary">Login</button> </div>
                        <div class="col"> <router-link to ="/register"> register </router-link> </div>
                     
                    </div>
                 </form>
            </div> 
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name:"login",
    data() {
        return{
            email:"",
            password:"",
            error:null

        }
    },
    methods:{
    async handleSubmit(e){
            e.preventDefault()
            if(this.password.length >0){
                let url = 'http://127.0.0.1:8000/api/register';
                this.axios.get('/sanctum/csrf-cookie').then(response => {
                    this.axios.post('api/login',{
                        email: this.email,
                        password: this.password
                    })
                    .then(response => {
                        if (response.data.success){
                            this.$router.go('/dashboard')
                        } else{
                            this.error = response.data.message
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                })
            }
            
        }
    },
    beforeRouteEnter (to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next('dashboard');
        }
        next();
    }
}
</script>
<style >
    
</style>