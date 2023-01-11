<template>
  <div> 
  <canvas ref="myChart_Bar" ></canvas>
</div>
</template>

<script>
import Chart from "chart.js/auto";

export default {
  name: 'BarChart',
  computed: {},
    created() {
      
    },
    methods:{
      
    },

  mounted() {
    let url = "/api/total_chart";
             axios.get(url).then((response) => {
                // allcustomers.value = response.data.customers;
                this.month = response.data.month_item.map((month_item) => {
                    return month_item.month;
                });

                this.sum_tatol = response.data.month_item.map((month_item) => {
                    return month_item.sum_tatol;
                });
                console.log("test_month", this.month);
                console.log("test_sum_tatol", this.sum_tatol);
            });
            var yValues = [55, 49, 44, 24, 15];
            var xValues =  Utils.months({count: 7})
            var barColors = ["red", "green","blue","orange","brown"];

    new Chart(this.$refs.myChart_Bar, {
      type: 'bar',
      data: {
        labels: this.month,
        datasets: [
          {
            backgroundColor: barColors,
            //label: '2022 Sales',
            data: this.sum_tatol,
          }
        ]
      },options:{
        responsive: true,
        scales: {
      y: {
        beginAtZero: true
      }
    }
      }
    });
  }
}
</script>