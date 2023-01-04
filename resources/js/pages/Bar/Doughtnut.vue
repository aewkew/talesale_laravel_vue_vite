
<template>
     <div>{{ count_color }} </div>
   
 <div> 

      <Doughnut 
      :options="chartoptions"
        :data="chartData"/>  
          
</div>
</template>
<script lang="ts">
import axios from 'axios';
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Doughnut } from 'vue-chartjs'


ChartJS.register(ArcElement, Tooltip, Legend)
export default {
   
    name: "BarDoughnut",
    components: { Doughnut },
    data()   {
        return {
            props: ['chartData'],
            Doughnut_data:[],
            count_color:[],  
            data:[],
           
             chartData: {
                labels: [],
                
                datasets: [
                    {
                        backgroundColor: [
                            "#41B883",
                            "#E46651",
                            "#00D8FF",
                            "#DD1B16",
                            
                        ],
                        data: [],
                    },
                ],
            },
            chartoptions: {
                responsive: true,
                maintainAspectRatio: false,
            },
        }
    },
   
   created(){ 
    this.filterData();
    },
    computed: {
        color_chart: function(){
            this.filterData();
            console.log('test_compu')
            return  this.filterData()
        }
    },
    methods:{
        async filterData(){
            let url = '/api/color_chrat'
            await axios .get(url).then((response) => {
                    // allcustomers.value = response.data.customers;
                    this.count_color = response.data;
                    console.log(this.count_color);
                })
    
     
        }
          
    },

    mounted() {
       
    },
  
};
</script>
<style></style> 

