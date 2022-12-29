<template>
    <div>
       <BarChart />
  
    </div>
</template>
<script>
import BarChart from "./Bar/Bar.vue"
export default {
    name: "Dashboard",
    components: {
        BarChart
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
