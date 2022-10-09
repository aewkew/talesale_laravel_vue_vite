<template>
    <div
        class="modal fade add"
        id="staticBackdrop"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        Modal title
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">

                  
                

                    <div class="row">
                        <div class="input-group">
                            <select
                                class="form-select"
                                id="staticBackdropLabel"
                            >
                                <option selected>Brand</option>
                                <option value="canon">Canon</option>
                                <option value="epson">Epson</option>
                                <option value="Hp">Hp</option>
                                <option value="Brother">Brother</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group">
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Color</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Blue">Blue</option>
                                <option value="Black">Black</option>
                                <option value="Red">Red</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Understood
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style></style>
