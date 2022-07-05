<template>
    <div>
        <form v-on:submit.prevent="onSubmit">
            <div class="row">
                <errors :errors="errors"></errors>
            </div>
            <div class="row">


                <!-- end row -->

                <div class="col-lg-6">

                    <div class="mb-3">
                        <label class="form-label" for="manufacturername">Full Name*</label>
                        <input v-model="user.name" type="text" class="form-control" placeholder="Enter your Full Name"
                            required>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="mb-3">
                        <label class="form-label" for="manufacturerbrand">Email Address* </label>
                        <input v-model="user.email" type="text" class="form-control"
                            placeholder="Enter your Email Address" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" v-model="user.username" class="form-control"
                            placeholder="Enter your Username">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" v-model="user.phone" class="form-control"
                            placeholder="Enter your Phone Number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="price">Password*</label>
                        <input type="password" v-model="user.password" class="form-control"
                            placeholder="Enter your Password">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="price">Confirmed Password*</label>
                        <input type="password" v-model="user.password_confirmation" class="form-control"
                            placeholder="Enter your Password Confirmation">
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="mb-0">
                        <p class="fw-bolder">Password requirements:</p>
                        <ul class="ps-1 ms-25">
                            <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                            <li class="mb-50">At least one lowercase character</li>
                            <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                    </div>
                </div>

                <div class="row mb-4 mt-2">
                    <div class="col ms-auto ">
                        <div class="d-flex flex-reverse flex-wrap gap-2" style="float:right;">
                            <a role="button" class="btn btn-danger" data-bs-dismiss="modal"> <i
                                    class="uil uil-times"></i> Cancel </a>
                                    <button type="submit" :class="!editmode ? 'btn btn-primary' : 'btn btn-success' "> <i class="uil uil-file-alt"></i>
                                        {{editmode ? 'Update' : 'Submit'}}
                                        </button>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div>
        </form>
    </div>
</template>

<script>
    import VueMultiselect from 'vue-multiselect'
    import Errors from "../../components/ErrorsComponent.vue";
    export default {
        props: ['editmode', 'editForm', 'roles'],
        components: {
            VueMultiselect, Errors
        },
        data() {
            return {
                user: {},
                errors: [],
            }
        },
        watch: {

            editForm(collection) {
                this.errors = [];
                if (collection == null) {
                    return this.restForm();
                }
                if (collection) {
                    // this.errors = "";

                    return this.user = collection;
                } else {

                    this.restForm();
                }
            }
        },
        created() {
            console.log("test c");
        },
        mounted() {
            console.log("test m");
        },
        methods: {
            restForm() {
                this.user = {};
                this.errors = []
            },
            async onSubmit() {
                if (!this.editmode) {
                    await axios.post('/user', this.user).then((res) => {
                        this.$emit("created", this.user);
                        this.$root.alertNotify(res.status, 'Created Successfuly', 'success', res.data);
                        this.restForm();
                    }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);
                    })
                } else {
                    await axios.put('/user/' + this.editForm.id, this.user).then((res) => {
                        console.log(this.user);
                        this.$emit("updated", this.user);
                        this.$root.alertNotify(res.status, 'Updated Successfuly', 'success', res.data);
                        //   this.restForm();
                    }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);

                    })
                }
            }
        },
    }
</script>

<style>
</style>
