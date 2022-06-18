<template>
  <div>
      <div class="table-responsive mb-4">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                  <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" @click="selectAllItems" v-model="selected_users" id="contacusercheck">
                                                            <label class="form-check-label" for="contacusercheck"></label>
                                                        </div>
                                                    </th>
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
                                                    <tr v-for="user in users.data" :key="user.id">
                                                        <th scope="row">
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" :value="user.id" v-model="selected_users" class="form-check-input" id="contacusercheck1">
                                                                <label class="form-check-label" for="contacusercheck1"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <name-avatar :name="user.name" class="avatar-xs rounded-circle me-2"></name-avatar>
                                                            <a href="#" class="text-body">{{user.name}}</a>
                                                        </td>
                                                         <td>{{user.name}}</td>
                                                        <td>{{user.email}}</td>

                                                        <td>Admin</td>
                                                        <td><div class="badge bg-pill bg-soft-success font-size-12">
                                                            active</div></td>
                                                              <td>{{user.created_at}}</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="uil uil-ellipsis-v"></i>
                                                                    </a>

                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <div>
                                                    <p class="mb-sm-0">Showing 1 to 10 of 12 entries</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="float-sm-end">
                                                    <ul class="pagination mb-sm-0">
                                                        <li class="page-item disabled">
                                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="#" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
  </div>
</template>

<script>
import NameAvatar from "../../components/NameAvatarComponent.vue";
export default {
    props:['users'],
    components:{NameAvatar},
    data(){
        return{
            selected_users:[],
        }

    },

    methods:{
        selectAllItems(){
         if(this.selected_items.length>0)
         {
             this.selected_items=[];
         }
         else {
              this.selected_items=this.users.data.map(x=>x.id);
         }
     },
    }

}
</script>

<style>

</style>
