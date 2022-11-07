<template >
    <div class="container">
        <div class="sale">Notifications</div>
         
        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Tel</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>

                <tbody v-for="item in customers" :key="item.id">
                    <tr>
                        <th scope="row">{{item.created_at}} </th>
                        <td>{{ item.customer_name }}</td>
                        <td> </td>
                        <td>{{ item.customer_phone }}</td>
                        <td>
                            <button
                                class="but-co btn "
                                type="button"
                            >
                           
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div> 
    </div>

</template>
<script>
export default {
    name: "Notifications",

    data() {
        return {
            customers: Array,
        };
    },
    created() {
        this.getData();
    },

    methods: {
        async getData() {
            let url = "/api/customers";
            await axios
                .get(url)
                .then((response) => {
                    this.customers = response.data.customers;
                    console.log(this.customers);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        async deleteCustomer(id) {
            let url = `/api/deleteCustomer/${id}`;
            await axios
                .delete(url)
                .then((response) => {
                    if (response.data.code == 200) {
                        alert(response.message);
                        this.getData();
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },

   
        
    },

    mounted() {
        console.log("Read Customer List Component Mounted");
    },
    
}
</script>
<style >
    
</style>