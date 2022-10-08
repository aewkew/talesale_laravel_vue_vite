import { createApp } from 'vue';
import './bootstrap';
import '../sass/app.scss';
import App from './App.vue';
import sidebar from './components/Sidebar/sidebar.vue'
import router from './router.js';
import * as bootstrap from 'bootstrap';



createApp(App).use(router).mount('#app')
createApp(sidebar).use(router).mount('#sidebar')