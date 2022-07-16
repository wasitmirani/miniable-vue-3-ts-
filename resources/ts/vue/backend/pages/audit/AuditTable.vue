<template>
    <div>
        <div class="table-responsive mb-4">
            <table class="table table-centered table-nowrap mb-0">
                <thead>
                    <tr>

                        <th scope="col">Title</th>

                        <!-- <th scope="col">Auditors</th> -->
                        <th scope="col">phone</th>
                        <th scope="col">Status</th>
                        <!-- <th scope="col">Location</th> -->
                        <th scope="col">Responses</th>
                        <th scope="col">Created</th>
                        <th scope="col" style="width: 200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="audits.data?.length < 1">
                        <th colspan="8">
                            <date-empty message="audits data not found" />
                        </th>
                    </tr>
                    <tr v-for="audit in audits?.data" :key="audit.id" v-else>
                        <td>
                            <name-avatar :name="audit.title" class="avatar-xs rounded-circle me-2"></name-avatar>
                            <a role="button" class="text-body" @click="auditDetails(audit)" >{{audit.title}}</a>
                        </td>
                        <!-- <td><span class="badge rounded-pill bg-primary">{{audit.auditors.length}}</span></td> -->
                         <td>{{audit.phone}}</td>
                           <td><span :class="`badge rounded-pill bg-${setStatus(audit.status.name)}`">{{audit.status.name}}</span></td>
                 <!-- <td><p class="text-muted font-size-13 mb-0"><location :location="audit.location"></location> </p></td> -->

                        <!-- <td><small ><description :value="audit.description"></description>  </small></td> -->
                            <td > <span  style="font-size: 14px;" class="badge bg-dark">{{audit.response}}/{{audit?.auditors.length}}</span> |
                            <button v-tooltip="'Resend Mail'" v-if="audit.response<audit?.auditors.length" @click="resendMail(audit)"  type="button" class="btn btn-outline-dark btn-sm waves-effect waves-light"> <i  style="font-size: 14px;" class="uil-fast-mail-alt "></i></button>

                                        </td>
                        <td>{{$filters.DateTimeFormat(audit.created_at)}}</td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                 <a role="button"  v-tooltip="'View Audit Details'" @click="auditDetails(audit)" class="px-2 text-primary">
                                        <i class="uil uil-eye  font-size-18"></i></a> |
                                    <a v-tooltip="'Edit Audit'" role="button" @click="editItem(audit)" class="px-2 text-primary">
                                        <i class="uil uil-pen font-size-18"></i></a>

                                </li>
                                |
                                <li class="list-inline-item">
                                    <a v-tooltip="'Delete Audit'" role="button" @click="deleteItem(audit)" class="px-2 text-danger"><i
                                            class="uil uil-trash-alt font-size-18"></i></a>
                                </li>

                            </ul>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
        <table-footer :rows="audits" :getData="getaudits"></table-footer>
    </div>
</template>

<script>
    import NameAvatar from "../../components/NameAvatarComponent.vue";
    import TableFooter from "../../components/TableFooterComponent.vue";
    import DateEmpty from "../../components/DataEmptyComponent.vue";
    import Location from "../../components/LocationComponent.vue";
    import Description from "../../components/DescriptionComponent.vue";
    export default {
        props: {
            audits: {
                type: Array,
                required: true
            },
            getaudits: {
                type: Function,
                required: true
            },

        },
        components: { NameAvatar, TableFooter, DateEmpty,Location ,Description},
        data() {
            return {
                selected_audits: [],
            }

        },

        methods: {
            resendMail(audit){
                 return this.$emit("resendMail", audit);
            },
            auditDetails(audit){
                this.$router.push({
                    name: 'audit-details',
                    params: {
                        id: audit.id
                    }
                })
            },
            setStatus(name){
                switch (name) {
                    case 'created':
                            return "primary";
                        break;
                    case "process":
                       return "warning";
                    break;
                    case "completed":
                        return "success";
                    break;
                    case "canceled":
                        return "danger";
                    break


                    default:
                        return "primary";
                        break;
                }
            },
            dateformat(date){
            return  moment.utc(String(date)).local().format("DD MMM YYYY h:mm a");
            },
            selectAllItems() {
                if (this.selected_items.length > 0) {
                    this.selected_items = [];
                }
                else {
                    this.selected_items = this.audits.data.map(x => x.id);
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
