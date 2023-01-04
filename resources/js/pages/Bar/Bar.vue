<template >
    <div > 
       <Bar
                            id="my-chart-id"
                            :options="chartOptions"
                            :data="chartData"
  /> 
      
    </div>
 
</template>
<script >
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
  name: 'BarChart',
  components: {  Bar  },
  data() {
    return {
        chartData: {
            labels: [ 'January', 'February', 'March' ],
        datasets: [
            {         
             data: [40 ,  20,   12]  , 
                backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16'],
                    
             } 
    ]
      },
      chartOptions: {
        responsive: true
      }
    }
  },
  created(){ 
    this.filterData();
 
    },
    computed: {
        color_chart: function(){
          this.count_color
          this.chart_label = JSON.stringify(this.count_color.invoice_item)
            console.log('test_compu',this.count_color)
            console.log('test_compu20',this.chart_label )
            return  this.count_color
        }
    },
    methods:{
        async filterData(){
          var color_chart
            let url = '/api/color_chrat'
            await axios .get(url).then((response) => {
                    // allcustomers.value = response.data.customers;
                    this.count_color = response.data;
                   
                  
                    console.log('test_bar',this.color_chart);
                    console.log('test_data');
                })
           
    
     
        }
          
    },
    mounted(){
      console.log('tt')
    }
}
</script>
<style >
    
</style>