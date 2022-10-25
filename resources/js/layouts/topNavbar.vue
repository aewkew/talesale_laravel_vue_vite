<template >
 <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand">Dashboard </a>

      <div class="collapse navbar-collapse">
        <div class="navbar-nav ml-auto">
            <div class="row">
            <router-link :to="{name:'Userprofile',params:{id:id}}"> <div class="col">Profile:{{name}}</div></router-link>
           
            <div class="col">  <a style="cursor: pointer;" @click="logout">Logout </a></div>
            </div>
         
        </div>
      </div>
    </div>
  </nav>
            
</template>
<script>
import axios from 'axios'

export default {
    data() {
        return {
            name: null,
            email: null,
            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
            this.email = window.Laravel.user.email
        } 
        if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
    },
    methods: {
           async logout(e) {
                e.preventDefault()
               axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/logout')
                    .then(response => {
                        if(response.data.success) {
                            window.location.href = "/login"
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                })
            }
        },
   
    
}
</script>
<style >
    
</style>