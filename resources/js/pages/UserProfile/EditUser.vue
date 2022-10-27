<template lang="">
   <div>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger mt-4" v-if="errors.length" > 
                            <ul class="mb-0">
                                <li v-for="(error,index) in errors" :key="index"> 
                                    {{ error}}
                                </li>
                            </ul>
                        </div>

                     <form @submit.prevent="updateProduct">
                        <div class="row">
                            <label  class="form-label text-white fs-3"> product</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    v-model="product.name"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <label  class="form-label text-white fs-3"> Brand</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    v-model="product.brand"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label  class="form-label text-white fs-3" > Color </label>
                            <div class="form-group">
                                <input  type="text" class="form-control"
                                    v-model="product.color"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <label  class="form-label text-white fs-3"> price </label>
                            <div class="form-group">
                                <input class="form-control" 
                                    v-model="product.price"
                                />
                            </div>
                        </div>

                        <div class="row subre">
                            <div class="col sub">
                                <button type="submit" class="btn btn-primary" >
                                    Submit
                                </button>
                            </div>
                            <div class="col res">
                                <button type="reset" class="btn btn-danger">
                                    reset
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"EditUser",
    
}
</script>
<style lang="">
    
</style>