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
                        <label class="form-label" for="manufacturername">Permission Name*</label>
                        <input v-model="permission.name" type="text" class="form-control" placeholder="Enter your Full Name"
                            required>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="mb-3">
                        <label class="form-label" for="manufacturerbrand">Users* </label>
                        <VueMultiselect v-model="permission.users" :options="users" :multiple="true" :taggable="true"
                            :limit="3" :close-on-select="true" tag-placeholder="Add this as new user"
                            placeholder="Type to search or add user" label="name" track-by="id" />

                    </div>
                </div>
                <div class="row">


                                                <h5 class="font-size-14 mb-3">
                                                   Roles  <i class="mdi mdi-arrow-right text-primary me-1"></i>

                                                </h5>
                                                <div class="row">

                                                  <div class="col-2 vstack gap-2"  v-for="role in roles" :key="role.id">
                                                        <div class="form-check form-check-left">
                                                            <input class="form-check-input" type="checkbox" :value="role.id" v-model="selected_roles" :id="`formCheckRight${role.id}`">
                                                            <label class="form-check-label" :for="`formCheckRight${role.id}`">
                                                                {{role.name.toUpperCase()}}
                                                            </label>
                                                        </div>
                                                </div>

                                                </div>

                </div>

                <div class="row mb-4 mt-2">
                    <hr/>
                    <div class="col ms-auto ">
                        <div class="d-flex flex-reverse flex-wrap gap-2" style="float:right;">
                            <a permission="button" class="btn btn-danger" data-bs-dismiss="modal"> <i
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
        props: ['editmode', 'editForm', 'users','roles'],
        components: {
            VueMultiselect, Errors
        },
        data() {
            return {
                permission: {},
                errors: [],
                selected_roles:[],
            }
        },
        watch: {

            editForm(collection) {
                this.errors = [];
                 this.selected_roles=[];
                if (collection == null) {
                    return this.restForm();
                }
                if (collection) {
                    // this.errors = "";
                    // console.log('tag',this.permission);
                    if(this.editmode)
                      this.selected_roles=collection?.roles?.map((role)=>role.id);
                    return this.permission = collection;
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
                this.permission = {};
                this.selected_roles=[];
                this.errors = []
            },
            async onSubmit() {
               this.permission.roles=this.selected_roles;
               console.log('tag', this.permission);
                if (!this.editmode) {

                    console.log(this.permission);
                    await axios.post('/permission', this.permission).then((res) => {
                        this.$emit("created", this.permission);
                        this.$root.alertNotify(res.status, 'Created Successfuly', 'success', res.data);
                        this.restForm();
                    }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);
                    })
                } else {
                    await axios.put('/permission/' + this.editForm.id, this.permission).then((res) => {
                        console.log(this.permission);
                        this.$emit("updated", this.permission);
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
