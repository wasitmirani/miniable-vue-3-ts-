<template>
    <div>
        <bread-crumb active_name="Audits List"></bread-crumb>

          <loader-box v-if="loading_mail" message="Please wait Mail has been proccessing..."></loader-box>
                <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a @click="openModal" role="button"
                                        class="btn btn-success waves-effect waves-light">
                                        <i class="mdi mdi-plus me-2"></i> Add Audit
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <search-input label="Search audit"
                                    :apiurl="'/audit?page=' +this.page_num" v-on:query="isQuery($event)"
                                    v-on:loading="loadingStart($event)" v-on:reload="getaudits()"
                                    v-on:filterData="filterData($event)"></search-input>
                            </div>
                        </div>
                        <!-- end row -->
                        <loader-box v-if="loading"></loader-box>
                        <audit-table :audits="audits" v-on:resendMail="resendMail($event)" v-else :query="query" :getaudits="getaudits"
                            v-on:editItem="editItem($event)" v-on:deleteItem="deleteItem($event)"></audit-table>

                    </div>
                </div>
            </div>
        </div>
        <!--  Large modal example -->
        <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">
                            <strong>
                                {{editmode ? 'Update Audit' : 'Create New Audit'}}
                            </strong>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <audit-form :auditors="auditors" :editmode="editmode" :editForm="audit"
                            v-on:created="closeModal($event)" v-on:updated="closeModal($event)"></audit-form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>
<script>
    import AuditTable from "./AuditTable.vue";
    import LoaderBox from "../../components/LoaderBoxComponent.vue";
    import BreadCrumb from "../../components/BreadcrumbComponent.vue";
    import SearchInput from "../../components/SearchBoxComponent.vue";
    import AuditForm from "./AuditForm.vue";
    export default {
         components: { AuditTable, LoaderBox, AuditForm, BreadCrumb, SearchInput },
            data() {
            return {
                audits: [],
                loading: false,
                loading_mail:false,
                audit: {},
                errors: [],
                auditors: [],
                query: "",
                editmode: false,
                page_num: 1,

            }
        },
        methods: {
            resendMail(audit){
                    this.loading_mail=true;
                      this.$root.alertNotify(200, 'Mail proccessing', 'info', [{'message':'Please wait Mail has been proccessing...'}]);
                   axios.get('/audit-resendmail/'+audit.id).then(res => {
                                 this.$root.alertNotify(res.status, 'Mail Sended Successfuly', 'success', res.data);
                                                    this.getaudits();
                             this.loading_mail=false;

                    });
            },
            openModal() {
                this.editmode = false;
                this.resetForm();
                $('.modal-form').modal('show')
            },
            resetForm() {
                this.audit = {},
                 this.errors = [];
            },
            closeModal(item) {
                if (item) {
                    this.getaudits();
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
                this.audits = data.audits;
            },
            loadingStart(value) {
                this.loading = value;
            },
            editItem(item) {
                this.editmode = true;
                this.audit = item;
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
                        axios.delete(`audit/${item.id}`).then((res) => {


                            this.$root.alertNotify(res.status, 'Destroyed Successfuly', 'info', res.data);
                            this.getaudits();
                        })
                    }
                })

            },
            getaudits(page = 1) {
                this.loading = true;
                this.page_num = page;
                axios.get('/audit?page=' + page).then((res) => {
                    this.audits = res.data.audits;
                    this.auditors=res.data.auditors;
                    this.loading = false;
                }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);

                    })
            }
        },
        mounted() {
            this.getaudits();
        }

    }
</script>
<style lang="">

</style>
