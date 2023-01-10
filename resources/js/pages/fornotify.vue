<template>
    <div>
        <div class="container">
            
            <div class="row">  
                <div class="col">
                    <div class="input-group mb-3 " >
                        <span class="input-group-text bgsp fs-6 text-white" id="inputGroup-sizing-default"> วันที่จะแจ้งเตือน </span>
                     <input  placeholder="dd-mm-yyyy" type="date" class="form-control input" v-model="follow" aria-describedby="inputGroup-sizing-default"/> 
                    </div>
                      </div>                                              
                <div class="col">  
                    <div class="input-group mb-3">
                        <span class="input-group-text bgsp fs-6 text-white" id="inputGroup-sizing-default"> รายระเอียดที่แจ้งในวันครบกำหนด </span>
                     <input   type="text" class="form-control input" v-model="details" aria-describedby="inputGroup-sizing-default"/> 
                    </div>
                </div>
                <div class="col-1"> 
                    <button type="submit" class="btn but-co">แจ้งเตือน</button>
                </div>
            </div>


            <div class="row">
                <div class="col">
                   
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "fornotify",
    data() {
        return{
            follow:"",
            details:""
        }
    },
};
</script>
<style></style>
