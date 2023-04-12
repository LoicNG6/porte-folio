import { createRouter, createWebHashHistory } from 'vue-router';
import Welcome from "../js/components/Welcome.vue";
import Home from "../js/components/home/Home.vue";
import Section from "../js/components/section/Sections.vue";
import ContactMe from "../js/components/contact_me/ContactMe.vue";
import About from "../js/components/about/About.vue";
import Admin from "../js/components/admin/Admin.vue";

const routes = [
    {
        path: "/",
        redirect: { name: "Loco" },
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
                        props: true,
                    },
                ]
            },
            {
                path: "contact-me",
                name: "contact me",
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

export default router;