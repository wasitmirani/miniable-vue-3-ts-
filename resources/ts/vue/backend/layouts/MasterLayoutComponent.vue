<template>

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
                  <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- <script>document.write(new Date().getFullYear())</script> © Minible. -->
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                     © {{new Date().getFullYear()   }} Halal CS. <i class="mdi mdi-heart text-danger"></i> <a href="#" target="_blank" class="text-reset">All rights reserved.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

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
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style>
.multiselect__tags {
    min-height: 40px;
    display: block;
    padding: 8px 40px 0 8px;
    border-radius: 5px;
    border: 1px solid #e8e8e8;
    background: #fff;
    width: 100% !important;
    font-size: 14px;
}
.multiselect__tag {
    position: relative;
    display: inline-block;
    padding: 4px 26px 4px 10px;
    border-radius: 5px;
    margin-right: 10px;
    color: #fff;
    line-height: 1;

    margin-bottom: 5px;
    white-space: nowrap;
    overflow: hidden;
    max-width: 100%;
    text-overflow: ellipsis;
}
</style>
