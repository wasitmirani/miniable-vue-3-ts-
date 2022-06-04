<template>
  <div>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">{{active_name}}</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><router-link  to="/portal/dashboard"  >Dashboard</router-link></li>
                                             <li class="breadcrumb-item" v-for="item in previous" :key="item.id" >
                                                <router-link :to="item.link">{{item.name}}</router-link>
                                            </li>
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Minible</a></li> -->
                                            <li class="breadcrumb-item active">{{active_name}}</li>
                                        </ol>
                                    </div>
                                </div>
                        </div>
             </div>
  </div>
</template>

<script>
export default {
 props: {
     active_name:{
         type: String,
          required: true
     },
     previous:{
         type:Array,
         required: false,
     }

 }
}
</script>

<style>

</style>
