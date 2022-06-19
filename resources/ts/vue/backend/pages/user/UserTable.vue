<template>
    <div>
        <div class="table-responsive mb-4">
            <table class="table table-centered table-nowrap mb-0">
                <thead>
                    <tr>
                        <!-- <th scope="col" style="width: 50px;">
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" @click="selectAllItems" v-model="selected_users" id="contacusercheck">
                                                            <label class="form-check-label" for="contacusercheck"></label>
                                                        </div>
                                                    </th> -->
                        <th scope="col">Name</th>
                        <th scope="col">UserName</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created</th>
                        <th scope="col" style="width: 200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="users.data?.length < 1">
                        <th colspan="7">
                            <date-empty message="Users data not found" />
                        </th>
                    </tr>
                    <tr v-for="user in users.data" :key="user.id" v-else>

                        <!-- <th scope="row">
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" :value="user.id" v-model="selected_users" class="form-check-input" id="contacusercheck1">
                                                                <label class="form-check-label" for="contacusercheck1"></label>
                                                            </div>
                                                        </th> -->
                        <td>
                            <name-avatar :name="user.name" class="avatar-xs rounded-circle me-2"></name-avatar>
                            <a href="#" class="text-body">{{user.name}}</a>
                        </td>
                        <td>{{user?.username}}</td>
                        <td>{{user.email}}</td>

                        <td>Admin</td>
                        <td>
                            <div class="badge bg-pill bg-soft-success font-size-12">
                                active</div>
                        </td>
                        <td>{{user.created_at}}</td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a role="button" @click="editItem(user)" class="px-2 text-primary">
                                        <i class="uil uil-pen font-size-18"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a role="button" @click="deleteItem(user)" class="px-2 text-danger"><i
                                            class="uil uil-trash-alt font-size-18"></i></a>
                                </li>

                            </ul>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
        <table-footer :rows="users" :getData="getUsers"></table-footer>
    </div>
</template>

<script>
    import NameAvatar from "../../components/NameAvatarComponent.vue";
    import TableFooter from "../../components/TableFooterComponent.vue";
    import DateEmpty from "../../components/DataEmptyComponent.vue";
    export default {
        props: {
            users: {
                type: Array,
                required: true
            },
            getUsers: {
                type: Function,
                required: true
            },

        },
        components: { NameAvatar, TableFooter, DateEmpty },
        data() {
            return {
                selected_users: [],
            }

        },

        methods: {
            selectAllItems() {
                if (this.selected_items.length > 0) {
                    this.selected_items = [];
                }
                else {
                    this.selected_items = this.users.data.map(x => x.id);
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
