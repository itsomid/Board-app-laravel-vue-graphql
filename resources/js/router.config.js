import Vue from "vue";
import VueRouter from "vue-router"
import Board from "./Board";
import Login from "./Login";


Vue.use(VueRouter)

const routes = [
    {path: "/", component: Board},
    {path: "/login", component: Login}
]

export default new VueRouter({
    routes,
    mode: "history"
})

