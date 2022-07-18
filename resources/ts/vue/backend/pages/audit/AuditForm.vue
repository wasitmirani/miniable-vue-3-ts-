<template>
    <div>
        <form v-on:submit.prevent="onSubmit">
            <div class="row">
                <errors :errors="errors"></errors>
            </div>
            <loader-box v-if="loading" message="Please wait audit data has been proccessing"></loader-box>
            <div class="row" v-else>


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
                        <label class="form-label">phone</label>
                        <input type="text" v-model="audit.phone" class="form-control"
                            placeholder="Enter your phone">
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
                           <Datepicker required="true" v-model="this.audit.dates"  multiDates    />
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
    import LoaderBox from "../../components/LoaderBoxComponent.vue";

    export default {
        props: ['editmode', 'editForm', 'auditors'],
        components: {
            VueMultiselect, Errors,LoaderBox,
        },

        data() {
            return {
                audit: {
 // dates:['Tue June 28 2022 19:06:00 GMT+0500 (Pakistan Standard Time)','Tue June 29 2022 19:06:00 GMT+0500 (Pakistan Standard Time)']
                },
                errors: [],
                loading:false,
            }
        },
        watch: {

            editForm(collection) {
                this.errors = [];
                this.restForm();
                if (collection == null || !collection) {

                    return this.restForm();
                }
                if (collection) {
                    // this.errors = "";
                    if(this.editmode){
                          this.audit = collection
                    const dates=this.audit.auditdates.map(x=> moment.utc(moment(x.audit_date)).format('ddd MMMM D YYYY H:MM:ss'))
                    this.audit.auditors=collection.auditors.map(x=>x.auditor);
                    console.log("date",dates);
                    this.audit.dates=dates;
                    }


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
                 this.errors = [];
                this.loading=true;
                this.audit.dates=this.audit.dates.map(x=>moment(x).format());
                if (!this.editmode) {
                    await axios.post('/audit', this.audit).then((res) => {
                        this.$emit("created", this.audit);
                        this.$root.alertNotify(res.status, 'Created Successfuly', 'success', res.data);
                        this.loading=false;
                        this.restForm();
                    }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);
                        this.loading=false;
                    })
                } else {
                    await axios.put('/audit/' + this.editForm.id, this.audit).then((res) => {
                        console.log(this.audit);
                        this.$emit("updated", this.audit);
                        this.$root.alertNotify(res.status, 'Updated Successfuly', 'success', res.data);
                             this.loading=false;
                        //   this.restForm();
                    }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);
                             this.loading=false;

                    })
                }
            }
        },
    }
</script>

<style>
</style>
