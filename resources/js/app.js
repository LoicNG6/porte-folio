import './bootstrap';
import { createApp } from "vue/dist/vue.esm-bundler";
import App from './components/App.vue';
import router from '../router';
import axios from 'axios';
import { createI18n } from 'vue-i18n';
import fr from './translation/fr';
import en from './translation/en.json';
// import { useDisplay } from 'vuetify'

//create app
const app = createApp(App);

// api with axios
axios.defaults.baseURL = 'http://127.0.0.1:8000';


// translation of app
const i18n = createI18n({
    locale: 'fr',
    messages: {
        en: en,
        fr: fr,
    },
});
app.config.globalProperties.$i18n = i18n;


// console.log(useDisplay);
// app.config.globalProperties.$display = useDisplay;

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
app.use(i18n);
app.use(router);
app.use(vuetify);
app.mount('#app');