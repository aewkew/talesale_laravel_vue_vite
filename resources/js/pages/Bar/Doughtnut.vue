
<template>
 <div>
      <Doughnut 
                :options="chartoptions"
                 :data="chartData"/>
  
                    
</div>
</template>
<script lang="ts">
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Doughnut } from 'vue-chartjs'
ChartJS.register(ArcElement, Tooltip, Legend)
export default {
    name: "BarDoughnut",
    components: { Doughnut },
    data() {
        return {
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
};
</script>
<style></style> 

