


require('./bootstrap');

import { createApp } from "vue";
import router from "./router";
import MasterLayout from "./vue/backend/layouts/MasterLayoutComponent.vue"


const app =createApp({
    data(){
        return {
            host_url:'test/',
        }
    },
    mounted(){
        console.log("app mounted");
    }
});
app.config.globalProperties.hosturl = window.location.origin ;
app.component('master-layout',MasterLayout)
app.use(router).mount('#app');
