<template>
   <div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <div class="mb-3">
                           <a @click="openModal" role="button" class="btn btn-success waves-effect waves-light">
                               <i class="mdi mdi-plus me-2"></i> Add New
                            </a>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-inline float-md-end mb-3">
                           <div class="search-box ms-2">
                              <div class="position-relative">
                                 <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                 <i class="mdi mdi-magnify search-icon"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
                  <loader-box v-if="loading"></loader-box>
                  <user-table :users="users" v-else></user-table>

               </div>
            </div>
         </div>
      </div>
       <!--  Large modal example -->
                                                <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel"><strong>Create New User</strong></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <user-form></user-form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
   </div>
</template>
<script>
   import UserTable from "./UserTable.vue";
   import LoaderBox from "../../components/LoaderBoxComponent.vue";
   import UserForm from "./UserForm.vue";
   export default {
       components:{UserTable,LoaderBox,UserForm},
       data(){
           return{
               users:[],
               loading:false,
           }
       },
     methods:{
         openModal(){
             $('.modal-form').modal('show')
         },
         getUsers(){
             this.loading=true;
             axios.get('/user').then((res)=>{
                 this.users=res.data.users;
                 this.loading=false;
             }).catch((err)=>{

             })
         }
     },
     mounted() {
         this.getUsers();
     }
   }
</script>
