<template>
  <div> 
  <canvas ref="myChart" ></canvas>
</div>
</template>

<script>
import Chart from "chart.js/auto";

export default {
  name: 'monthly-sales-chart',
  
  mounted() {
    new Chart(this.$refs.myChart, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [
          {
            fill: false,
            label: '2023 Sales',
            data: [65, 59, 80, 81, 90]
          }
        ]
      }
    });
  }
}
</script>