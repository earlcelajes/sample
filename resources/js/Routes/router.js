import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../Components/Pages/LoginPage.vue";
import NotFound from "../Components/404.vue";
import RegisterPage from "../Components/Pages/RegisterPage.vue";
import HomePage from "../Components/Pages/HomePage.vue";

const routes = [
    {
        path: "/",
        name: "Login",
        component: LoginPage
    },
    {
        path: "/register",
        name: "Register",
        component: RegisterPage
    },
    {
        path: "/home",
        name: "Home",
        component: HomePage
    },

    {
        path: "/:path(.*)",
        component: NotFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
