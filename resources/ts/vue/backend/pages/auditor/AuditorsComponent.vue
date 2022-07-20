<template>
    <div>
        <bread-crumb active_name="Auditors List"></bread-crumb>
           <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a @click="openModal" role="button"
                                        class="btn btn-success waves-effect waves-light">
                                        <i class="mdi mdi-plus me-2"></i> Add Auditor
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <search-input label="Search Auditor"
                                    :apiurl="'/auditor?page=' +this.page_num" v-on:query="isQuery($event)"
                                    v-on:loading="loadingStart($event)" v-on:reload="getAuditors()"
                                    v-on:filterData="filterData($event)"></search-input>
                            </div>
                        </div>
                        <!-- end row -->
                        <loader-box v-if="loading"></loader-box>
                        <auditor-table :auditors="auditors" v-else :query="query" :getAuditors="getAuditors"
                            v-on:editItem="editItem($event)" v-on:deleteItem="deleteItem($event)"></auditor-table>

                    </div>
                </div>
            </div>
        </div>
        <!--  Large modal example -->
        <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">
                            <strong>
                                {{editmode ? 'Update Auditor' : 'Create New Auditor'}}
                            </strong>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <auditor-form :roles="roles" :editmode="editmode" :editForm="auditor"
                            v-on:created="closeModal($event)" v-on:updated="closeModal($event)"></auditor-form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>
<script>
    import AuditorTable from "./AuditorTable.vue";
    import LoaderBox from "../../components/LoaderBoxComponent.vue";
    import BreadCrumb from "../../components/BreadcrumbComponent.vue";
    import SearchInput from "../../components/SearchBoxComponent.vue";
    import AuditorForm from "./AuditorForm.vue";
    export default {
         components: { AuditorTable, LoaderBox, AuditorForm, BreadCrumb, SearchInput },
            data() {
            return {
                auditors: [],
                loading: false,
                auditor: {},
                errors: [],
                roles: [],
                query: "",
                editmode: false,
                page_num: 1,

            }
        },
        methods: {
            openModal() {
                this.editmode = false;
                this.resetForm();
                $('.modal-form').modal('show')
            },
            resetForm() {
                this.auditor = {},
                    this.errors = [];
            },
            closeModal(item) {
                if (item) {
                    this.getAuditors();
                    $('.modal-form').modal("hide");
                }
                else {
                    $('.modal-form').modal("hide");
                }
                this.resetForm();
            },
            isQuery(query) {
                return (this.query = query);
            },
            filterData(data) {
                this.auditors = data.auditors;
            },
            loadingStart(value) {
                this.loading = value;
            },
            editItem(item) {
                this.editmode = true;
                this.auditor = item;
                $('.modal-form').modal('show')
            },
            deleteItem(item) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`auditor/${item.id}`).then((res) => {


                            this.$root.alertNotify(res.status, 'Destroyed Successfuly', 'info', res.data);
                            this.getAuditors();
                        })
                    }
                })

            },
            getAuditors(page = 1) {
                this.loading = true;
                this.page_num = page;
                axios.get('/auditor?page=' + page).then((res) => {
                    this.auditors = res.data.auditors;
                    this.loading = false;
                }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);

                    })
            }
        },
        mounted() {
            this.getAuditors();
        }

    }
</script>
<style lang="">

</style>
