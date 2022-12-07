import './bootstrap';
import { createApp } from "vue/dist/vue.esm-bundler";
import App from './components/App.vue';
import routes from './router/index.js';

const app = createApp(App);

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

app.use(routes);
app.use(vuetify);
app.mount('#app');