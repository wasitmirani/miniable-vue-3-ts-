<template>
    <div>
        <div class="table-responsive mb-4">
            <table class="table table-centered table-nowrap mb-0">
                <thead>
                    <tr>
                        <!-- <th scope="col" style="width: 50px;">
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" @click="selectAllItems" v-model="selected_auditors" id="contacauditorcheck">
                                                            <label class="form-check-label" for="contacauditorcheck"></label>
                                                        </div>
                                                    </th> -->
                        <th scope="col">Auditor Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th scope="col">Location</th>
                        <th scope="col">Created</th>
                        <th scope="col" style="width: 200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="auditors.data?.length < 1">
                        <th colspan="7">
                            <date-empty message="auditors data not found" />
                        </th>
                    </tr>
                    <tr v-for="auditor in auditors.data" :key="auditor.id" v-else>


                        <td>
                            <name-avatar :name="auditor.name" class="avatar-xs rounded-circle me-2"></name-avatar>
                            <a href="#" class="text-body">{{auditor.name}}</a>
                        </td>


                         <td>{{auditor.email}}</td>

                         <td>{{auditor.phone}}</td>
                        <td><span class="badge bg-soft-primary font-size-12">{{auditor.company}}</span></td>
                           <td><p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> {{auditor.location}}</p></td>
                        <td>{{auditor.created_at}}</td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a auditor="button" @click="editItem(auditor)" class="px-2 text-primary">
                                        <i class="uil uil-pen font-size-18"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a auditor="button" @click="deleteItem(auditor)" class="px-2 text-danger"><i
                                            class="uil uil-trash-alt font-size-18"></i></a>
                                </li>

                            </ul>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
        <table-footer :rows="auditors" :getData="getauditors"></table-footer>
    </div>
</template>

<script>
    import NameAvatar from "../../components/NameAvatarComponent.vue";
    import TableFooter from "../../components/TableFooterComponent.vue";
    import DateEmpty from "../../components/DataEmptyComponent.vue";
    export default {
        props: {
            auditors: {
                type: Array,
                required: true
            },
            getauditors: {
                type: Function,
                required: true
            },

        },
        components: { NameAvatar, TableFooter, DateEmpty },
        data() {
            return {
                selected_auditors: [],
            }

        },

        methods: {
            selectAllItems() {
                if (this.selected_items.length > 0) {
                    this.selected_items = [];
                }
                else {
                    this.selected_items = this.auditors.data.map(x => x.id);
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
