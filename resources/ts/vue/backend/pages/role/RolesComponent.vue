<template>
    <div>
        <bread-crumb active_name="Roles List" :previous="[{name:'Users',link:'/portal/users'}]"></bread-crumb>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a @click="openModal" role="button"
                                        class="btn btn-success waves-effect waves-light">
                                        <i class="mdi mdi-plus me-2"></i> Add Role
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <search-input label="Search By Name" :apiurl="'/role?page=' +this.page_num"
                                    v-on:query="isQuery($event)" v-on:loading="loadingStart($event)"
                                    v-on:reload="getRoles()" v-on:filterData="filterData($event)"></search-input>
                            </div>
                        </div>
                        <!-- end row -->
                        <loader-box v-if="loading"></loader-box>
                        <role-table :roles="roles" v-else :query="query" :getRoles="getRoles"
                            v-on:editItem="editItem($event)" v-on:deleteItem="deleteItem($event)"></role-table>

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
                                {{editmode ? 'Update Role' : 'Create New Role'}}
                            </strong>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <role-form :users="users" :editmode="editmode" :editForm="role"
                            v-on:created="closeModal($event)" v-on:updated="closeModal($event)"></role-form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>
<script>
    import RoleTable from "./RoleTable.vue";
    import LoaderBox from "../../components/LoaderBoxComponent.vue";
    import BreadCrumb from "../../components/BreadcrumbComponent.vue";
    import SearchInput from "../../components/SearchBoxComponent.vue";
    import RoleForm from "./RoleForm.vue";
    export default {
        components: { RoleTable, LoaderBox, RoleForm, BreadCrumb, SearchInput },
        data() {
            return {
                roles: [],
                loading: false,
                role: {},
                errors: [],
                users: [],
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
                this.role = {},
                    this.errors = [];
            },
            closeModal(item) {
                if (item) {
                    this.getRoles();
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
                this.roles = data.roles;
            },
            loadingStart(value) {
                this.loading = value;
            },
            editItem(item) {
                this.editmode = true;
                this.role = item;
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
                        axios.delete(`role/${item.id}`).then((res) => {


                            this.$root.alertNotify(res.status, 'Destroyed Successfuly', 'info', res.data);
                            this.getRoles();
                        })
                    }
                })

            },
            getRoles(page = 1) {
                this.loading = true;
                this.page_num = page;
                axios.get('/role?page=' + page).then((res) => {
                    this.roles = res.data.roles;
                    this.users = res.data.users;
                    this.loading = false;
                }).catch((err) => {

                })
            }
        },
        mounted() {
            this.getRoles();
        }
    }
</script>
