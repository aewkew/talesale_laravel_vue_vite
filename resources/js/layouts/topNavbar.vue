<template > 

 <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" >Dashboard </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" ><router-link :to="{name:'Userprofile',params:{id:id}}"> <div class="col">Profile:{{name}}</div></router-link></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="cursor: pointer;" @click="logout" > Logout </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" ></a>
            </li>
        </ul>
            
        
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