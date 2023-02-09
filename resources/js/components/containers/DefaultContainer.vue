<template>
    <div class="app">
        <router-view></router-view>
        <!-- <DefaultFooter /> -->
    </div>
</template>

<script>
import DefaultFooter from "../partials/DefaultFooter.vue";
// import authService from "@/services/AuthService.js";

export default {
    name: "DefaultContainer",
    data: () => {
        return {
            showMenu: false,
            profileDropdownShow: false,
            authUser: null
        };
    },
    components: {
        DefaultFooter
    },
    mounted() {
        if (window.auth_user) this.authUser = window.auth_user;
    },
    watch: {
        $route(to, from) {
            this.showMenu = false;
            this.profileDropdownShow = false;
        }
    },
    methods: {
        logout() {
            authService
                .logout()
                .then(
                    res => {
                        console.log(res);
                    },
                    error => {
                        console.log("error", error);
                    }
                )
                .finally(() => {
                    window.location.href = "/login";
                });
        }
    }
};
</script>
