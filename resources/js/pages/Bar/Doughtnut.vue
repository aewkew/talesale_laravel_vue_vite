<template>
    <div>
        <Doughnut 
        :options="chartoptions" 
         :data="chartData" />
    </div>

    <div>
        {{ this.labels }}
        {{ color }}
        <!-- 
      <Doughnut 
      :options="chartoptions"
        :data="chartData"/>  -->
    </div>
</template>
<script >
import axios from "axios";
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";
import { Doughnut } from "vue-chartjs";
import Chart from "chart.js/auto";


ChartJS.register(ArcElement, Tooltip, Legend);
export default {
    name: "BarDoughnut",
    components: { Doughnut },
    type: 'doughnut',
    data() {
        return {
            color:[],
            labels:[],
            data: [],

            //props: ["chartData"],
            get_label:[],
            // data: [],
            chartData: {
                labels: this.labels ,
                datasets: [
                    {
                        backgroundColor: [
                            "#41B883",
                            "#E46651",
                            "#00D8FF",
                            "#DD1B16",
                        ],
                        data: this.color,
                    },
                ],
            },
            chartoptions: {
                responsive: true,
                maintainAspectRatio: false,
            },
        };
    },

    created() {
        this.get_Data();
        console.log('bb')
       
      
    },
    computed: {
       
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
                console.log("test_color2", );  
            });
        },
        
    },

    mounted(){
        this.get_Data();

      

    },
};
</script>
<style></style>
