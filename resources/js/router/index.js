import Vue from "vue";
import Router from "vue-router";

import DefaultContainer from "@/components/containers/DefaultContainer.vue";
import AdminContainer from "@/components/containers/AdminContainer.vue";
import RegisterPage from "@/components/pages/RegisterPage.vue";
import LoginPage from "@/components/pages/LoginPage.vue";
import AdminDashboard from "@/components/pages/AdminDashboard.vue";
import Participants from "@/components/pages/Participants.vue";
import CreateParticipants from "@/components/pages/CreateParticipants.vue";
import Campaigns from "@/components/pages/Campaigns.vue";
import CreateCampaign from "@/components/pages/CreateCampaign.vue";
import JoinCampaign from "@/components/pages/JoinCampaign.vue";

Vue.use(Router);

function configRoutes() {
    return [
        {
            path: "/",
            redirect: "/admin/dashboard",
            name: "Home",
            component: DefaultContainer,
            children: [
                {
                    path: "/register",
                    name: "register",
                    component: RegisterPage
                },
                {
                    path: "/login",
                    name: "login",
                    component: LoginPage
                },
                {
                    path: "/participate/:id",
                    name: "join-campaign",
                    component: JoinCampaign
                },                
            ]
        },
        {
            path: "/admin",
            redirect: "/admin/dashboard",
            name: "admin",
            component: AdminContainer,
            children: [
                {
                    path: "/admin/dashboard",
                    name: "admin-dashboard",
                    meta: {
                        auth: true
                    },
                    component: AdminDashboard
                },
                {
                    path: "/admin/participants",
                    name: "admin-participants",
                    meta: {
                        auth: true
                    },
                    component: Participants
                },
                {
                    path: "/admin/participants/create",
                    name: "admin-participants-create",
                    meta: {
                        auth: true
                    },
                    component: CreateParticipants
                },                
                {
                    path: "/admin/campaigns",
                    name: "admin-campaigns",
                    meta: {
                        auth: true
                    },
                    component: Campaigns
                },
                {
                    path: "/admin/campaigns/create",
                    name: "admin-campaigns-create",
                    meta: {
                        auth: true
                    },
                    component: CreateCampaign
                },                
                // {
                //     path: "/admin/raffles/:id",
                //     name: "edit-raffle",
                //     meta: {
                //         auth: true,
                //         admin: true
                //     },
                //     component: CreateRaffle
                // },                
                // {
                //     path: "/admin/raffles/:id",
                //     name: "edit-raffle",
                //     meta: {
                //         auth: true,
                //         admin: true
                //     },
                //     component: CreateRaffle
                // },
                // {
                //     path: "/admin/users",
                //     name: "users",
                //     meta: {
                //         auth: true,
                //         admin: true
                //     },
                //     component: UsersPage
                // }
            ]
        },        
    ];
}

const router = new Router({
    mode: "history",
    linkExactActiveClass: "bg-gray-100",
    scrollBehavior: () => ({ y: 0 }),
    routes: configRoutes()
});

// router.beforeEach((to, from, next) => {

//     let isAuthUser = window.auth_user ? true : false;
//     let auth_required = false;
    
//     if (to && to.meta && to.meta.auth) auth_required = true;    

//     if (isAuthUser) 
//     {
//         next();
//     } 
//     else 
//     {
//         window.location.href = "/login";
//         return true;
//     }

//     next();    
// });

export default router;
