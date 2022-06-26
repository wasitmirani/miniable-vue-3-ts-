<template>
   <div>
      <div class="vertical-menu">
         <!-- LOGO -->
         <div class="navbar-brand-box">
            <router-link to="/portal/dashboard"  class="logo logo-dark">
            <span class="logo-sm">
            <img :src="`${url}/assets/images/logo-sm.png`" alt="" height="22">
            </span>
            <span class="logo-lg">
            <img :src="`${url}/assets/images/logo-dark.png`" alt="" height="70">
            </span>
            </router-link>
            <router-link to="/portal/dashboard"  class="logo logo-light">
            <span class="logo-sm">
            <img :src="`${url}/assets/images/logo-sm.png`" alt="" height="22">
            </span>
            <span class="logo-lg">
            <img :src="`${url}/assets/images/logo-light.png`" alt="" height="70">
            </span>
            </router-link>
         </div>
         <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
         <i class="fa fa-fw fa-bars"></i>
         </button>
         <div data-simplebar class="sidebar-menu-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
               <!-- Left Menu Start -->
               <loader-box v-if="loading"/>
               <ul class="metismenu list-unstyled" id="side-menu">
                  <!-- :class="getMenuClass(item) ?  getMenuClass(item) : null" -->
                  <li  :class="getMenuClass(item) ?  getMenuClass(item) : null"  v-for="item in sidebar_menu" :key="item.id">
                     {{item?.heading ? item?.heading : null  }}
                     <router-link  :to="item.route" v-if="item.type=='single_link'">
                        <i :class="item.icon"></i>
                        <span>{{item.title}}</span>
                     </router-link>
                     <a href="javascript: void(0);"  class="has-arrow waves-effect" v-if="item.type=='multi'">
                     <i :class="item.icon"></i>
                     <span>{{item.title}}</span>
                     </a>
                     <ul class="sub-menu mm-collapse"  aria-expanded="false"   v-if="item.type=='multi'">
                        <li v-for="subitem in item.sub_menu" :key="subitem.id">
                           <router-link  :to="subitem.route" v-if="subitem.title">
                              <i :class="subitem.icon"></i>
                              <span>{{subitem.title}}</span>
                           </router-link>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
            <!-- Sidebar -->
         </div>
      </div>
   </div>
</template>
<script>
   import LoaderBox from "../../components/LoaderBoxComponent.vue";
    import sidebarmenu from "./sidebarmenu";
   export default {
    components:{LoaderBox},
    data(){
           return {
               url:this.hosturl,
                sidebar_menu:sidebarmenu,
                index:0,
                loading:false,
           }
       },
       methods:{
           getMenuClass(item){
               if(item?.heading)
                   return 'menu-title';
                else
                   return '';
           },

       },
       mounted() {
        //    console.log("mounted",sidebarmenu);

       },
       created(){
            //    this.getSideBarMenu();
       }
   }
</script>
<style>
</style>
