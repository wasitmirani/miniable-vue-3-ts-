


require('./bootstrap');

import { createApp } from "vue";
import router from "./router";
import MasterLayout from "./vue/backend/layouts/MasterLayoutComponent.vue"
// import {VueProgressBar}  from 'vue-progressbar'
import Notifications from '@kyvg/vue3-notification'
const app =createApp({
    data(){
        return {
            host_url:'test/',
        }
    },
    methods:{
        alertNotify( status:any, title:String, type:String, response:any){
            switch (status) {

                case 200:
                    this.$notify({title: title,type:type,text: response.message});
                break;
                case 201:
                    this.$notify({title: title,type:type,text: response.message});
                break;
                case 422:
                    this.$notify({title: `Oops, Unprocessable Entity ${status} Error! `,type:type,text: response.message});
                break;
                case 500:
                    this.$notify({title: `Oops, Something Went Wrong ${status} Error! `,type:type,text: response.message});

                    break;
            }
        },
    },
    mounted(){
        console.log("app mounted");
    }
});
// app.use(VueProgressBar, {
//     color: 'rgb(143, 255, 199)',
//     failedColor: 'red',
//     height: '2px'
//   })
app.config.globalProperties.hosturl = window.location.origin ;
app.component('master-layout',MasterLayout)
app.use(Notifications)
app.use(router).mount('#app');
