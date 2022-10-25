<template >
    <div class="container">
        <UserCard> </UserCard>



        <div class="sale">User list</div>

        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id Customer</th>
                        <th scope="col">Customer name</th>
                        <th scope="col">Employee name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="item in data" v-bind:key="item.productId">
                        <th scope="row"></th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.description }}</td>
                        <td>{{ item.price }}</td>
              
                        <td>
                            <button
                                class="but-co btn "
                                type="button"
                            >
                                <i class="bi bi-plus"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> 

    </div>
</template>
<script>
import UserCard from './UserProfile/UserCard.vue';
export default {
    name: "Userprofile",
    components: { UserCard },
    data() {

    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        } 
        if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
    },
}
</script>
<style >
    
</style>