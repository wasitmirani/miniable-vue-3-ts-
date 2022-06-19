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
                        <label class="form-label" for="manufacturername">Role Name*</label>
                        <input v-model="role.name" type="text" class="form-control" placeholder="Enter your Full Name"
                            required>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="mb-3">
                        <label class="form-label" for="manufacturerbrand">Users* </label>
                        <VueMultiselect v-model="role.users" :options="users" :multiple="true" :taggable="true"
                            :limit="3" :close-on-select="true" tag-placeholder="Add this as new user"
                            placeholder="Type to search or add user" label="name" track-by="id" />

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
                role: {},
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

                    return this.role = collection;
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
                this.role = {};
                this.errors = []
            },
            async onSubmit() {
                if (!this.editmode) {
                    await axios.post('/role', this.role).then((res) => {
                        this.$emit("created", this.role);
                        this.$root.alertNotify(res.status, 'Created Successfuly', 'success', res.data);
                        this.restForm();
                    }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);
                    })
                } else {
                    await axios.put('/role/' + this.editForm.id, this.role).then((res) => {
                        console.log(this.role);
                        this.$emit("updated", this.role);
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
