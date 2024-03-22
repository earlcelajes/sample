import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../Components/Pages/LoginPage.vue";
import NotFound from "../Components/404.vue";
import RegisterPage from "../Components/Pages/RegisterPage.vue";
import HomePage from "../Components/Pages/HomePage.vue";
import AddAuthorPage from "../Components/Pages/AddAuthorPage.vue";
import AddBookPage from "../Components/Pages/AddBookPage.vue";

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
        path: "/add-author",
        name: "AddAuthor",
        component: AddAuthorPage
    },
    {
        path: "/add-book",
        name: "AddBook",
        component: AddBookPage
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
