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
                <tbody >
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button class="but-co btn " type="button" > </button> </td>
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
            group_item:[],
        };
    },
    created() {
        this.getData();
        this.groupItem();
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
        async groupItem() {
            let url = '/api/group_item';
            await axios.get(url).then((response) => {
                console.log(response);
                this.group_item = response.data.group_item;
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