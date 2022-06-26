<template>
    <div>
        <form v-on:submit.prevent="onSubmit">
            <div class="row">
                <errors :errors="errors"></errors>
            </div>
            <div class="row">


                <!-- end row -->

                <div class="col-lg-12">

                    <div class="mb-3">
                        <label class="form-label" for="manufacturername">Title*</label>
                        <input v-model="audit.title" type="text" class="form-control" placeholder="Enter audit title"
                            required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">company</label>
                        <input type="text" v-model="audit.company" class="form-control"
                            placeholder="Enter your company">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Auditors</label>
                              <VueMultiselect v-model="audit.auditors" :options="auditors" :multiple="true" :taggable="true"
                            :limit="3" :close-on-select="true" tag-placeholder="Add this as new auditor"
                            placeholder="Type to search or add auditor" label="name" track-by="id" />
                    </div>
                </div>
                  <div class="col-lg-6">
                <div class="mb-3">
                        <label class="form-label">Location*</label>
                    <textarea  class="form-control" v-model="audit.location" rows="3" placeholder="Enter audit location"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="mb-3">
                        <label class="form-label">Description*</label>
                    <textarea  class="form-control" v-model="audit.description" rows="3" placeholder="Enter audit description"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                <div class="mb-3">
                        <label class="form-label">Audit Dates*</label>
                           <Datepicker required="true" v-model="audit.dates" multiDates   />
                    </div>
                </div>
                <hr/>
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
        props: ['editmode', 'editForm', 'auditors'],
        components: {
            VueMultiselect, Errors
        },

        data() {
            return {
                audit: {},
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
                    return this.audit = collection;
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
                this.audit = {};
                this.errors = []
            },
            async onSubmit() {
                this.audit.dates=this.audit.dates.map(x=>moment(x).format());
                if (!this.editmode) {
                    await axios.post('/audit', this.audit).then((res) => {
                        this.$emit("created", this.audit);
                        this.$root.alertNotify(res.status, 'Created Successfuly', 'success', res.data);
                        this.restForm();
                    }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);
                    })
                } else {
                    await axios.put('/audit/' + this.editForm.id, this.audit).then((res) => {
                        console.log(this.audit);
                        this.$emit("updated", this.audit);
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
