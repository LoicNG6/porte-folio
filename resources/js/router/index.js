import { createRouter, createWebHashHistory } from 'vue-router';
import Welcome from "../components/Welcome.vue";
import Home from "../components/Home.vue";
import Section from "../components/Sections.vue";
import ContactMe from "../components/ContactMe.vue";
import About from "../components/About.vue";
import Admin from "../components/Admin.vue";

const routes = [
    {
        path: "/",
        redirect: "/NGUESSIE-Loic",
    },
    {
        path: "/NGUESSIE-Loic",
        name: "Loco",
        component: Welcome,
        meta: { title: "Loco" },
        children: [
            {
                path: "home",
                name: "home",
                component: Home,
                children: [
                    {
                        path: "section/:id",
                        name: "section",
                        component: Section,
                        props:true,
                    },
                ]
            },
            {
                path: "contact-me",
                name: "contact-me",
                component: ContactMe,
            },
            {
                path: "about",
                name: "about",
                component: About,
            },
            {
                path: "admin",
                name: "admin",
                component: Admin,
            },
        ],

    },
];
const router = new createRouter({
    history: createWebHashHistory(),
    routes: routes,
});

export default routes;