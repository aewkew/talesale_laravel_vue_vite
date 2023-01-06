<template>
  <div> 
  <canvas ref="myChart" width="500" height="300"></canvas>
</div>
</template>

<script>
import Chart from "chart.js/auto";

export default {
  name: 'monthly-sales-chart',
  mounted() {
    new Chart(this.$refs.myChart, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [
          {
            label: '2018 Sales',
            data: [300, 700, 450, 750, 450]
          }
        ]
      }
    });
  }
}
</script>