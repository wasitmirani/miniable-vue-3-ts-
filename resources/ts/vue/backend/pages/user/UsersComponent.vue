<template>
   <div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <div class="mb-3">
                           <a href="javascript:void(0);" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus me-2"></i> Add New</a>
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
   </div>
</template>
<script>
   import UserTable from "./UserTable.vue";
   import LoaderBox from "../../components/LoaderBoxComponent.vue";
   export default {
       components:{UserTable,LoaderBox},
       data(){
           return{
               users:[],
               loading:false,
           }
       },
     methods:{
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
