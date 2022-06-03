<template>
  <div>
      <div class="vertical-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img :src="`${url}/assets/images/logo-sm.png`" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img :src="`${url}/assets/images/logo-dark.png`" alt="" height="20">
            </span>
        </a>

        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img :src="`${url}/assets/images/logo-sm.png`" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img :src="`${url}/assets/images/logo-light.png`" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li :class="getMenuClass(item)" v-for="item in menu" :key="item.id">

                        {{item?.heading}}
                    <router-link  :to="item.single_link.route" v-if="item.single_link">
                        <i :class="item.single_link.icon"></i>
                        <!-- <span class="badge rounded-pill bg-primary float-end">01</span> -->
                        <span>{{item.single_link.title}}</span>
                    </router-link>
                     <a  href="javascript: void(0);"  class="has-arrow waves-effect"  v-if="item.menu" >
                           <i :class="item.menu.icon"></i>
                        <span>{{item.menu.title}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"  v-if="item.menu">
                        <li><a href="ecommerce-products.html">Products</a></li>
                    </ul>
                 </li>









                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-store"></i>
                        <span>Ecommerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products.html">Products</a></li>
                        <li><a href="ecommerce-product-detail.html">Product Detail</a></li>
                        <li><a href="ecommerce-orders.html">Orders</a></li>
                        <li><a href="ecommerce-customers.html">Customers</a></li>
                        <li><a href="ecommerce-cart.html">Cart</a></li>
                        <li><a href="ecommerce-checkout.html">Checkout</a></li>
                        <li><a href="ecommerce-shops.html">Shops</a></li>
                        <li><a href="ecommerce-add-product.html">Add Product</a></li>
                    </ul>
                </li> -->



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

  </div>
</template>

<script>
export default {
 data(){
        return {
            url:this.hosturl,
             menu:[],
        }
    },
    methods:{
        getMenuClass(item){

            if(item?.heading){
                return 'menu-title';
            }
            if(item?.sub_menu?.length){
                 return '';
            }
            else {
                return '';
            }
            // switch (item) {
            //     case item?.heading:
            //         console.log(item?.heading);
            //           return 'menu-title';
            //         break;
            //     case item?.sub_menu?.length:
            //           return 'has-arrow waves-effect';
            //         break;

            //     default:
            //          return '';
            //         break;
            // }

        },
        getSideBarMenu(){
            axios.get('/config/sidebar-menu').then((res)=>{
                this.menu = res.data.sidebar_menu;
                console.log("menu",this.menu)
            }).catch((e)=>{
                console.log(e);
            });
        }
    },
    mounted() {
        this.getSideBarMenu();
    },
}
</script>

<style>

</style>
