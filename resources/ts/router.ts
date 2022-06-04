// require('./helper');
import { createRouter, createWebHistory } from 'vue-router'



let getComponent=(file_name:String)=>{
    const route=import(`./vue/backend/pages/${file_name}Component.vue`);
    return route;
}
const per_fix="/portal";

let setPerfixRoute=(url:String)=>{
return per_fix+url;
}




const routes = [
    // { path: "/:catchAll(.*)",
    // name: "NotFound",
    // component: () => getComponent("error/404") },
    // { path: "/unauthorized/user", component: () => setComponent("error/401"),name: "unauthorized" },
    {
        path: setPerfixRoute('/dashboard'),
        redirect: { name: 'master_dashboard' }
    },
    {
        path: setPerfixRoute('/dashboard'), component:()=>getComponent("dashboard/MasterDashboard"), name: "master_dashboard",
        meta: { permissions: "dashboard-view" }
    },



];


export default createRouter({
    history: createWebHistory(),
    routes,
    linkExactActiveClass: "mm-active" ,
})
