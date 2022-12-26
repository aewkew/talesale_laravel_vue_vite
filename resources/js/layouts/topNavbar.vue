<template > 
  <!-- 
 <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="row"> 
        <ul class="navbar-nav">
            <li class="nav-item">
              Dashboard 
            </li>
            <li class="nav-item">
           
            </li>
            <li class="nav-item">
                <a style="cursor: pointer;" @click="logout" >  </a>
            </li>
        </ul>
    </div>
    </div> 
    
  </nav>-->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid nav2">
    <a class="navbar-brand" href="#"> 
        <!-- 
                        <img 
                            src="https://seeklogo.com/images/B/Burger_King-logo-67A54F414B-seeklogo.com.png"
                        />
                  <span>Talesell Comp </span>-->   </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-4 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="#"> Dashboard</a>
        </li>
        <li class="nav-item">
            <router-link :to="{name:'Userprofile',params:{id:id}}">
          <a class="nav-link " > <span class="fw-bold">{{name}}</span><span v-if="id == 1">:addmin</span> <span v-else="id == !1">:Employee</span> </a>
        </router-link>
        </li>
        <li class="nav-item">
          <a class="nav-link "  style="cursor: pointer;" @click="logout" >Logout</a>
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
            this.id = window.Laravel.user.id
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