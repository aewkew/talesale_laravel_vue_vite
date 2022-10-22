<template>
    <div class="container">
         <div class="row justify-content-center"> 
            <div class="col-md-6">
                <div class="card">
                    <div class="card">
                          <div class="card-header">Login</div>
                          <div class="card-body">
      
                             <div class="form-group">
                              <label for="name" > Name </label>
                              <input type="text" class="form-control" name="name" v-model=" name">
                            
                              </div>

                              <div class="form-group">
                              <label for="email" > Email </label>
                              <input type="text" class="form-control" name="email" v-model=" email">
                        
                              </div>

                              <div class="form-group">
                              <label for="password" > Password </label>
                              <input type="password" class="form-control" name="password" v-model=" password">
                       
                              </div>

                              
                              <div class="row"> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button class="btn but-co" @click="handleSubmit"> Register </button>
                                    </div>
                                </div>
                              </div>
                                 <div class="col-md-6 text-right">
                                    <router-link to="/login">Aleady</router-link>
                                 </div>
                   
                          </div>
                          
                    </div>
                </div>
            </div>
         </div>
    </div>
</template>
<script>
import axios from "axios";


export default {

    data() {
        return {
           
                name: "",
                email: "",
                password: "",
                error: null
            
    
        }
    },
    methods: {
      async handleSubmit(e) {
             e.preventDefault()
                if(this.password.length > 0) {
                   await axios.get('./cofig/sanctum/csrf-cookie').then(response => {
                         axios.post('http://127.0.0.1:8000/api/register_user', {
                            name: this.name,
                            email: this.email,
                            password: this.password
                        })
                        .then(response => {
                            if (response.data.success) {
                                 window.location.href = "/login"
                            } else {
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
    beforeRouteEnter(to, from, next) {
            if (window.Laravel.isLoggedin) {
                return next('dashboard');
            }
            next();
        }
};
</script>
<style></style>
