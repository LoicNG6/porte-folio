import './bootstrap';
import { createApp } from "vue/dist/vue.esm-bundler";
import App from './components/App.vue';
import router from '../router';
import axios from 'axios';

axios.defaults.baseURL = 'http://127.0.0.1:8000';
const app = createApp(App);

//global variables
app.provide('curr_language', 'fr');

//auto register vue components
const components = import.meta.glob('../components/*.vue', { eager: true })
Object.entries(components).forEach(([path, definition]) => {
    const componentName = path.split('/').pop().replace(/\.\w+$/, '')
    vueApp.component(componentName, definition.default)
})

//Vuetify config
import '@mdi/font/css/materialdesignicons.css';
import 'vuetify/styles';
import { createVuetify } from 'vuetify';
import * as VuetifyComponents from 'vuetify/components'
import * as VuetifyDirectives from 'vuetify/directives'
const vuetify = createVuetify({
    VuetifyComponents,
    VuetifyDirectives,
    ssr: true
})

// app.use(axios,{ baseUrl: 'http://127.0.0.1:8000/api/'})
app.use(router);
app.use(vuetify);
app.mount('#app');