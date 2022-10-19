<template >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm6 mt-4">
                 <form> 
                     <div class="form-group">
                        <label for="employee"> Employee : </label>
                        <input type="employee" class="form-control" id="employee"> 
                     </div>
                     <div class="form-group">
                       <label for="password"> Password :  </label>
                       <input type="password" class="form-control" id="password">
                     </div>
                     <button type="submit" class="btn btn-primary">Login</button>
                 </form>
            </div> 
        </div>
    </div>
</template>
<script>
export default {
    name:"Login"
}
</script>
<style >
    
</style>