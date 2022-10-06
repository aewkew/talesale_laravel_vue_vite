<template>
    <div class="card shopCard">
        <div class="card-body">
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
                            <option value="1">Red</option>
                            <option value="2">Blue</option>
                            <option value="3">Black</option>
                            <option value="3">Yellow</option>
                        </select>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelect01"
                            >Brand</label
                        >
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
                            <button type="button" class="btn but-co">
                                Add
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
    </div>
</template>
<script>
import Add from "./add.vue";
export default { components: { Add } };
</script>
<style></style>
