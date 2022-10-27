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

                <tbody>
                    <tr v-for="(item, i) in items" :key="i" :to="item.to">
                        <th scope="row">{{ item.Date }}</th>
                        <td>{{ item.Customer }}</td>
                        <td>{{ item.tel}}</td>
                        <td>{{ item.employee }}</td>
                        <td>
                            <button
                                class="but-co btn "
                                type="button"
                            >
                            {{ item.Invoid }}
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
      
    };
  },
    
}
</script>
<style >
    
</style>