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
    { path: "/unauthorized/user", component: () => getComponent("errors/401"),name: "unauthorized" },
    {
        path: setPerfixRoute('/dashboard'),
        redirect: { name: 'master_dashboard' }
    },
    {
        path: setPerfixRoute('/dashboard'), component:()=>getComponent("dashboard/MasterDashboard"), name: "master_dashboard",
        meta: { permissions: "dashboard-view" }
    },
    {
        path: setPerfixRoute('/users'), component:()=>getComponent("user/Users"), name: "users",
        meta: { permissions: "users-list-view" }
    },
    {
        path: setPerfixRoute('/roles'), component:()=>getComponent("role/Roles"), name: "roles",
        meta: { permissions: "roles-list-view" }
    },
    {
        path: setPerfixRoute('/permissions'), component:()=>getComponent("permission/Permissions"), name: "permissions",
        meta: { permissions: "permissions-list-view" }
    },

];

const router= createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            return {
                selector: to.hash,
                behavior: 'smooth',
            }
        }
    },
})

let permissions=JSON.parse(`${localStorage.getItem('permissions')}`);

router.beforeEach((to, from, next) => {
    console.log(to.meta.permissions)

    if (to.meta.permissions) {
        if (permissions.indexOf(to.meta.permissions) !== -1) {

            next()

        }
        else {
            next({ path: '/unauthorized/user' })

        }
    }
    next()

});

export default router;
