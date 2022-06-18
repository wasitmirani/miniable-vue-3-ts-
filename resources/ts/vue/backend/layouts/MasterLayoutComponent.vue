<template>
    <div>
        <headermenu />
        <sidebar/>
         <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                          <router-view></router-view>
                           <notifications   class="mt-1 mr-1"/>  
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <footer></footer>
            </div>
    </div>
</template>

<script>
import headermenu from './components/HeaderComponent.vue';
import sidebar from './components/SidebarMenuComponent.vue';
import footer from './components/FooterComponent.vue';
export default {
    components: {headermenu,sidebar,footer},

}
</script>

<style>

</style>
