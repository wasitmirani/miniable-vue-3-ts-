<template>
    <div>
        <div class="table-responsive mb-4">
            <table class="table table-centered table-nowrap mb-0">
                <thead>
                    <tr>
                        <!-- <th scope="col" style="width: 50px;">
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" @click="selectAllItems" v-model="selected_permissions" id="contacpermissioncheck">
                                                            <label class="form-check-label" for="contacpermissioncheck"></label>
                                                        </div>
                                                    </th> -->
                        <th scope="col">permission Name</th>
                        <th scope="col">Users</th>
                        <th scope="col">Assigned to Roles </th>

                        <th scope="col">Created</th>
                        <th scope="col" style="width: 200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="permissions.data?.length < 1">
                        <th colspan="5">
                            <date-empty message="permissions data not found" />
                        </th>
                    </tr>
                    <tr v-for="permission in permissions.data" :key="permission.id" v-else>

                        <!-- <th scope="row">
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" :value="permission.id" v-model="selected_permissions" class="form-check-input" id="contacpermissioncheck1">
                                                                <label class="form-check-label" for="contacpermissioncheck1"></label>
                                                            </div>
                                                        </th> -->
                        <td>
                            <name-avatar :name="permission.name" class="avatar-xs rounded-circle me-2"></name-avatar>
                            <a href="#" class="text-body">{{permission.name}}</a>
                        </td>



                        <td><span class="badge bg-soft-primary font-size-12">{{permission?.users?.length}}</span></td>
                         <td>
                        <div>
                            <span class="badge rounded-pill bg-primary ml-2 mr-2" v-for="role in permission?.roles" style="margin-right:5px;">{{role.name}}</span>
                        </div>

                        </td>
                        <td>{{permission.created_at}}</td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a permission="button" @click="editItem(permission)" class="px-2 text-primary">
                                        <i class="uil uil-pen font-size-18"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a permission="button" @click="deleteItem(permission)" class="px-2 text-danger"><i
                                            class="uil uil-trash-alt font-size-18"></i></a>
                                </li>

                            </ul>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
        <table-footer :rows="permissions" :getData="getPermissions"></table-footer>
    </div>
</template>

<script>
    import NameAvatar from "../../components/NameAvatarComponent.vue";
    import TableFooter from "../../components/TableFooterComponent.vue";
    import DateEmpty from "../../components/DataEmptyComponent.vue";
    export default {
        props: {
            permissions: {
                type: Array,
                required: true
            },
            getPermissions: {
                type: Function,
                required: true
            },

        },
        components: { NameAvatar, TableFooter, DateEmpty },
        data() {
            return {
                selected_permissions: [],
            }

        },

        methods: {
            selectAllItems() {
                if (this.selected_items.length > 0) {
                    this.selected_items = [];
                }
                else {
                    this.selected_items = this.permissions.data.map(x => x.id);
                }
            },

            deleteItem: function (item) {
                return this.$emit("deleteItem", item);
            },
            editItem: function (item) {
                console.log(item);
                return this.$emit("editItem", item);
            }

        }

    }
</script>

<style>

</style>
