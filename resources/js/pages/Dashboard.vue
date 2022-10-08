<script setup> 
import { onMounted , ref} from "vue"

let products =ref([])

onMounted(async () => {
    getProducts()
}) 

const getProducts = async () => {
    let response = await axios.get("api/get_all_product")
    products.value = response.data.products

}

</script>

<template >
    <div >
      <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Code product</th>
                        <th scope="col">Date</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Color</th>
                        <th scope="col">price</th>
                        <th scope="col">Add</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(item, i) in products" :key="i" :to="item.id" v-if="products.length > 0">
                        <th scope="row"></th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.description }}</td>
                        <td>{{ item.price }}</td>
                        <td></td>
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


export default {
    name: 'Dashboard',

}
</script>
<style >
    
</style>