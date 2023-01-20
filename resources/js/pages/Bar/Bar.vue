<template>
    <div>
        <canvas ref="myChart_Bar"></canvas>
    </div>
</template>

<script>
import Chart from "chart.js/auto";

export default {
    name: "BarChart",
    computed: {},
    created() {},
    methods: {},

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
            var xValues = /*this.month;*/ ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"] ;
            var month_value = /*this.month;*/ ["Jan"];
            var yValues = this.sum_tatol;
            var barColors = ["#1E90FF", "#8EEBEC", "#78C7C7", "#AAF0D1", "#50C878","#FED8B1","#FBE7A1","#FFA07A","#F98B88","#E799A3","#CCCCFF","#E6A9EC"];

            new Chart(this.$refs.myChart_Bar, {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [
                        {
                            label: ["First month"],
                            backgroundColor: barColors,
                            data: yValues,
                        },
                    ],
                },
                options: {
                    legend: { display: false },
                    title: {
                        display: true,
                       
                    },
                },
            });
        });
    },
   
};
</script>
