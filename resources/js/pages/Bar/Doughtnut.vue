<template>
    <div>
      <canvas ref="myChart"></canvas>
    </div>

</template>
<script>
import axios from "axios";
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";
import { Doughnut } from "vue-chartjs";
import Chart from "chart.js/auto";

ChartJS.register(ArcElement, Tooltip, Legend);
export default {
    name: "BarDoughnut",
    computed: {},
    created() {
        this.get_Data();
    },
    methods: {
        async get_Data() {
            let url = "/api/color_chrat";
            await axios.get(url).then((response) => {
                // allcustomers.value = response.data.customers;
                this.labels = response.data.invoice_item.map((invoice_item) => {
                    return invoice_item.labels;
                });

                this.color = response.data.invoice_item.map((invoice_item) => {
                    return invoice_item.count;
                });
                console.log("test_labels", this.labels);
                console.log("test_color", this.color);
            });
        },
    },
    mounted() {
        let url = "/api/color_chrat";
        axios.get(url).then((response) => {
            // allcustomers.value = response.data.customers;
            this.labels = response.data.invoice_item.map((invoice_item) => {
                return invoice_item.labels;
            });

            this.color = response.data.invoice_item.map((invoice_item) => {
                return invoice_item.count;
            });
            console.log("test_labels", this.labels);
            console.log("test_color", this.color);
            new Chart(this.$refs.myChart, {
                type: "doughnut",
                data: {
                    labels:this.labels,
                    datasets: [
                        { 
                            backgroundColor: [
                            "#3A3B3C",
                            "#1974D2",
                            "#E55451",
                            "#FFDB58",
                        ],
                          
                            data: this.color,
                        },
                    ],
                },
                options: {
                responsive: true,
                maintainAspectRatio: false,
            },
            });

            console.log("test_labels2", this.labels);
        });
    },
};
</script>
<style></style>
