import { createApp } from "vue";
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'

import App from "./components/App.vue";

const app = createApp(App).use(router).use(VueAxios, axios);
app.provide('axios', app.config.globalProperties.axios);  // provide 'axios'
app.mount('#app');
