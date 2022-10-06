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
      items: [
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562481",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562482",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562483",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562484",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562485",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562488",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562488",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562488",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562488",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562488",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562488",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562488",
        },
        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562488",
        },

        {
          Date: "2022-08-27",
          Customer: "Aew",
          tel: "0876186637",
          employee: "Tiger Kung",
          Invoid: "1562488",
        },
      ],
    };
  },
    
}
</script>
<style >
    
</style>