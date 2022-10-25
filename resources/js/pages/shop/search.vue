<template>
    <div id="search" class="card">
        <div class="card-body shopCard">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <input
                            class="form-control"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                        />
                        <button class="btn but-co" type="submit">Search</button>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelect01"
                            >Color</label
                        >
                        <select class="form-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="Red">Red</option>
                            <option value="Blue">Blue</option>
                            <option value="Black">Black</option>
                            <option value="Yellow">Yellow</option>
                        </select>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelect01"
                            >Brand</label >                     
                        <select class="form-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">Canon</option>
                            <option value="2">Epson</option>
                            <option value="3">Hp</option>
                            <option value="3">Brother</option>
                        </select>
                    </div>
                </div>

                <div class="col-auto"> 
                    <div class="row">
                        <div class="col">
                            <button type="button"
                                class="btn but-co"
                                data-bs-toggle="modal"
                                data-bs-target="#CustomerModel"> 
                                <i class="bi bi-person-plus-fill"  style="font-size: 1.4rem"></i>
                            </button>
                            
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="row">
                        <div class="col">
                            <button
                                type="button"
                                class="btn but-co"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                            
                                Add
                            </button>
                           
                        </div>

                        <div class="col">
                            <button type="button" class="btn but-co"
                                data-bs-toggle="modal"
                                data-bs-target="#CompanyModel"> 
                                <i
                                    class="bi bi-building"
                                    style="font-size: 1.4rem"
                                ></i>
                            </button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn but-co">
                                <i
                                    class="bi bi-basket"
                                    style="font-size: 1.4rem"
                                ></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Add></Add>
        <Add_customer></Add_customer>
        <Add_company></Add_company>
      
    </div>
</template>
<script>
import Add from "./add.vue";
import Add_customer from "./add_customer.vue";
import Add_company from "./add_company.vue";
export default {
    name: "search",
    components: { Add, Add_customer ,Add_company},
};
</script>
<style></style>
