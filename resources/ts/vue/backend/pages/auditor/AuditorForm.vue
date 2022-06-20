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
                        <input v-model="auditor.name" type="text" class="form-control" placeholder="Enter your Full Name"
                            required>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="mb-3">
                        <label class="form-label" for="manufacturerbrand">Email Address* </label>
                        <input v-model="auditor.email" type="text" class="form-control"
                            placeholder="Enter your Email Address" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Compnay</label>
                        <input type="text" v-model="auditor.compnay" class="form-control"
                            placeholder="Enter your compnay">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" v-model="auditor.phone" class="form-control"
                            placeholder="Enter your Phone Number">
                    </div>
                </div>
                <div class="col-lg-12">
                <div class="mb-3">
                        <label class="form-label">Location*</label>
                    <textarea  class="form-control" rows="3" placeholder="Enter auditor location"></textarea>
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
        props: ['editmode', 'editForm', 'users'],
        components: {
            VueMultiselect, Errors
        },
        data() {
            return {
                auditor: {},
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

                    return this.auditor = collection;
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
                this.auditor = {};
                this.errors = []
            },
            async onSubmit() {
                if (!this.editmode) {
                    await axios.post('/auditor', this.auditor).then((res) => {
                        this.$emit("created", this.auditor);
                        this.$root.alertNotify(res.status, 'Created Successfuly', 'success', res.data);
                        this.restForm();
                    }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);
                    })
                } else {
                    await axios.put('/auditor/' + this.editForm.id, this.auditor).then((res) => {
                        console.log(this.auditor);
                        this.$emit("updated", this.auditor);
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
