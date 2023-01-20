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
            var xValues = this.month;
            var yValues = this.sum_tatol;
            var barColors = ["red", "green", "blue", "orange", "brown"];

            new Chart(this.$refs.myChart_Bar, {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [
                        {
                            backgroundColor: barColors,
                            data: yValues,
                        },
                    ],
                },
                options: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: "World Wine Production 2018",
                    },
                },
            });
        });
    },
   
};
</script>
