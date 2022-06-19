<template>
  <div>
      <div class="table-responsive mb-4">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                  <tr>
                                                    <!-- <th scope="col" style="width: 50px;">
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" @click="selectAllItems" v-model="selected_roles" id="contacrolecheck">
                                                            <label class="form-check-label" for="contacrolecheck"></label>
                                                        </div>
                                                    </th> -->
                                                    <th scope="col">Role Name</th>
                                                    <th scope="col">Users</th>
                                                    <th scope="col">Created</th>
                                                    <th scope="col" style="width: 200px;">Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-if="roles.data?.length < 1">
                                                     <th colspan="4">
                                                            <date-empty message="Roles data not found" />
                                                      </th>
                                                    </tr>
                                                    <tr v-for="role in roles.data" :key="role.id" v-else>

                                                        <!-- <th scope="row">
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" :value="role.id" v-model="selected_roles" class="form-check-input" id="contacrolecheck1">
                                                                <label class="form-check-label" for="contacrolecheck1"></label>
                                                            </div>
                                                        </th> -->
                                                        <td>
                                                            <name-avatar :name="role.name" class="avatar-xs rounded-circle me-2"></name-avatar>
                                                            <a href="#" class="text-body">{{role.name}}</a>
                                                        </td>



                                                        <td>Admin</td>
                                                        <td><div class="badge bg-pill bg-soft-success font-size-12">
                                                            active</div></td>
                                                              <td>{{role.created_at}}</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a role="button"  @click="editItem(role)" class="px-2 text-primary">
                                                                    <i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a role="button"  @click="deleteItem(role)" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>

                                                            </ul>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                      <table-footer :rows="roles" :getData="getRoles"></table-footer>
  </div>
</template>

<script>
import NameAvatar from "../../components/NameAvatarComponent.vue";
import TableFooter from "../../components/TableFooterComponent.vue";
import DateEmpty from "../../components/DataEmptyComponent.vue";
export default {
    props:{
        roles: {
            type: Array,
            required: true
        },
        getRoles: {
            type: Function,
            required: true
        },

    },
    components:{NameAvatar,TableFooter,DateEmpty},
    data(){
        return{
            selected_roles:[],
        }

    },

    methods:{
        selectAllItems(){
         if(this.selected_items.length>0)
         {
             this.selected_items=[];
         }
         else {
              this.selected_items=this.roles.data.map(x=>x.id);
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
