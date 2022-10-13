<template>

            <div>
                <a href="{{ route('companies.create') }}" class="btn btn-success"> Create Inks</a>
                <br> <br>
            </div>
    <div>
        <div class="tableContrainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ink_ID  </th>
                        <th scope="col">Ink's Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Add</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="inks in data" v-bind:key="inks.inkId">
                        <td>{{ inks.ink_id }}</td>
                        <td>{{ inks.ink_name }}</td>
                        <td>{{ inks.ink_price }}</td>

                        <td>
                            <button class="but-co btn" type="button">
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
import axios from 'axios';
export default {
    name: 'Inklist',
    data() {
        return{
          data: [],
        };
    },
    created(){
        this.getData();
    },
    methods: {
        getData() {
            axios
            .get("http://127.0.0.1:8000/api/Inklist")
            .then((res) => (this.data = res.data))
        }
    }
}
</script>
<style >

</style>
