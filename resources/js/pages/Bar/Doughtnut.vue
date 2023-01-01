
<template>
     
    <div >
      
        
    </div>
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
    data() {
        return {
            invoice_item:[],
            Black:0,
            
            chartData: {
                labels: ["VueJs", "EmberJs", "ReactJs", "AngularJs"],
                datasets: [
                    {
                        backgroundColor: [
                            "#41B883",
                            "#E46651",
                            "#00D8FF",
                            "#DD1B16",
                        ],
                        data: [40, 20, 80, 10],
                    },
                ],
            },
            chartoptions: {
                responsive: true,
                maintainAspectRatio: false,
            },
        };
    },
    created(){
     this.getcolor();
    },
    methods:{
        async getcolor(){
            let url = '/api/color_chrat'
            await axios.get(url).then((response) =>{
                this.invoice_item = response.data.invoice_item
                console.log(this.invoice_item);
            });
          
        },
       
        
    },
    mounted() {
       console.log( 'fdfg', this.invoice_item)
    },
};
</script>
<style></style> 

