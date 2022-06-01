


require('./bootstrap');

import { createApp } from "vue";
import router from "./router";
import MasterLayout from "./vue/backend/layouts/MasterLayoutComponent.vue"


const app =createApp({
    mounted(){
        console.log("app mounted");
    }
});
app.component('master-layout',MasterLayout)
app.use(router).mount('#app');
