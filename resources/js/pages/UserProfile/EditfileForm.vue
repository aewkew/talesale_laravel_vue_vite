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
                    <h1 class="modal-title" id="staticBackdropLabel">
                        Edit Profile
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
                        <label for="inputnickname" class="form-label">
                            Nickname
                        </label>
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                id="inputnickname"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputfullname" class="form-label">
                            Fullname
                        </label>
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                id="inputfullname"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputprice" class="form-label">
                            Email
                        </label>
                        <div class="input-group">
                            <input class="form-control" id="inputprice" />
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputvalue" class="form-label">
                            Tel.
                        </label>
                        <div class="input-group">
                            <input
                                type="number"
                                class="form-control"
                                id="inputvalue"
                            />
                        </div>
                    </div>

                    <div class="row subre">
                        <div class="col sub">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                        <div class="col res">
                            <button type="reset" class="btn btn-danger">
                                reset
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button
                        type="submit"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {},
    created() {
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id;
            this.name = window.Laravel.user.name;
            this.email = window.Laravel.user.email;
            this.phone = window.Laravel.user.phone;
        }
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true;
        }
    },
};
</script>
<style></style>
