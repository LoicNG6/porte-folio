import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler";
import App from "./components/App.vue";
import router from "../router";
import axios from "axios";
import i18n from "./i18n";
import "@/sass/app.scss";

import.meta.glob(["../images/**"]);

//create app
const app = createApp(App);

// api with axios
axios.defaults.baseURL = "http://127.0.0.1:8000";

//make translation variable globale
app.config.globalProperties.$i18n = i18n;

// console.log(useDisplay);
// app.config.globalProperties.$display = useDisplay;

//auto register vue components
const components = import.meta.glob("../components/*.vue", { eager: true });
Object.entries(components).forEach(([path, definition]) => {
    const componentName = path
        .split("/")
        .pop()
        .replace(/\.\w+$/, "");
    vueApp.component(componentName, definition.default);
});

//Vuetify config
import "@mdi/font/css/materialdesignicons.css";
import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as VuetifyComponents from "vuetify/components";
import * as VuetifyDirectives from "vuetify/directives";
const vuetify = createVuetify({
    VuetifyComponents,
    VuetifyDirectives,
    ssr: true,
});

app.use(i18n);
app.use(router);
app.use(vuetify);
app.mount("#app");
