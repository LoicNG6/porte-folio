import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import { createVuetify } from 'vuetify/lib/framework.mjs';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';


const app = createApp({});
const vuetify = createVuetify({ components, directives });

app.use(vuetify);
app.component('example-component', ExampleComponent);
app.mount('#app');
