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
        </div>
        
    </div>
</template>

<script>
import Corelayout from "./layouts/corelayout.vue";
import Content from "./layouts/Content.vue";
import TopNavbar from "./layouts/topNavbar.vue";
import Home from "./pages/Home.vue";

import { useStore } from 'vuex'
import { computed } from 'vue'
const store = useStore()
const stack = computed(() => {
    return store.state.stack
})
export default {
    name: "App",
    components: { Corelayout, Content, TopNavbar, Home },
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
   
   
};
</script>
<style></style>
