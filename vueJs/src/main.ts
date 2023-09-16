
import { createApp } from 'vue'
import App from '@/App.vue'
import ElementPlus from 'element-plus'
import router from '@/plugins/router'
import { createPinia } from 'pinia';

import './assets/style.css' 

const app = createApp(App)
const pinia = createPinia();

app.use(router)
app.use(pinia);
app.use(ElementPlus)
app.mount('#app')
