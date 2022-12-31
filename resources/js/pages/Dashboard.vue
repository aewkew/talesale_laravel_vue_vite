<template>
    <div>
        <div class="row">
            <div class="col"> <BarDoughtnut /></div>
            <div class="col"> <BarChart /> </div>
            
             </div>
      
  
    </div>
</template>
<script>
import BarChart from "./Bar/Bar.vue"
import BarDoughtnut from "./Bar/Doughtnut.vue"
export default {
    name: "Dashboard",
    components: {
        BarChart,
        BarDoughtnut 
  },
    data() {
        
        return {
            name: null,
           
        }
    },
   
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        

    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
    
  
}
</script>
<style >

</style>
