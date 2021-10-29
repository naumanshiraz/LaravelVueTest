import { createWebHistory, createRouter } from "vue-router";

import Home from "./pages/Home.vue";
import About from "./pages/About.vue";
import Register from './pages/Register.vue';
import Login from './pages/Login.vue';
import Dashboard from "./pages/Dashboard.vue";
import GoodsList from "./pages/GoodsList.vue";
import GoodsAdd from "./pages/GoodsAdd.vue";
import GoodsEdit from "./pages/GoodsEdit.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
        meta: { guestOnly: true }
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
        meta: { guestOnly: true }
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
        meta: { authOnly: true }
    },
    {
        path: "/goods-list",
        name: "GoodsList",
        component: GoodsList,
        meta: { authOnly: true }
    },
    {
        path: "/goods-add",
        name: "GoodsAdd",
        component: GoodsAdd,
        meta: { authOnly: true }
    },
    {
        name: 'goods-edit',
        path: '/edit/:id',
        component: GoodsEdit,
        meta: { authOnly: true }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;

