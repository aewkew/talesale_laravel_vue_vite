<script >
  import axios from 'axios';
  import { onMounted, ref } from 'vue';
  import { useRouter } from "vue-router";
  const router = useRouter()



  const newInvoice = async () => {
      let form = await axios.get('/api/create_invoice')
      console.log('form', form.data) 
      router.push('/invoiceCart')
     }

</script>
<template >
    <div>
        <a class="btn btn-secondary" @click="newInvoice"> New invoice </a>
        
    </div>
</template>

<style >
    
</style>