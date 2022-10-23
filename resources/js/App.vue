<template>
    <div id="app">

        <div  v-if="isLoggedIn">
            <!-- Sidebar -->
            <Corelayout />

            <!-- Content -->
            <div class="main-panel">
                <TopNavbar></TopNavbar>
                <div class="content">
                    <router-view></router-view>
                </div>
            </div>
        </div>
        
        <div v-else>
            <router-view></router-view>
            <Home></Home>
             
        </div>
        
    </div>
</template>
<script>
import Corelayout from "./layouts/corelayout.vue";
import Content from "./layouts/Content.vue";
import TopNavbar from "./layouts/topNavbar.vue";
import Add from "./pages/shop/add.vue";
import Home from "./pages/Home.vue";
export default {
    name: "App",
    components: { Corelayout, Content, TopNavbar, Add, Home },
    data() {
        return {
           isLoggedIn:false,
        }
    },
    created() {
       if(window.Laravel.isLoggedin){
        this.isLoggedIn = true
       }
    },
    methods: {
      async logout_user(e) {
            e.preventDefault();
            await axios.get('/sanctum/csrf-cookie').then(response => {
                   axios.post('http://127.0.0.1:8000/api/logout')
                .then(response => {
                    if(response.data.success){
                        window.location.href ="/home"
                    }else {
                        console.log(response);
                    }  
                }) 
                .catch(function (error) {
                     console.error(error);
                });
                   
            })
        }
    }
   
};
</script>
<style></style>
