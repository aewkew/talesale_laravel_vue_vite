import { createWebHistory , createRouter} from 'vue-router';

import Dashboard from './pages/Dashboard.vue';
import Shop from './pages/Shop.vue';
import Notifications from './pages/Notifications.vue';
import Tablelist from './pages/TableList.vue';
import Userprofile from './pages/UserProfile.vue';
import Invoice from './pages/invoice.vue'; 

const routes = [
        {
            path: '/',
            name: 'Dashboard',
            component: Dashboard
        },
        {
            path: '/Shop',
            name: 'Shop',
            component: Shop
        },
        {
            name: 'Notifications',
            path: '/Notifications',
            component: Notifications
        },
        {
            path: '/TableList',
            name: 'TableList',
            component: Tablelist
        },
         {
            path: '/UserProfile',
            name: 'Userprofile',
            component: Userprofile
        }, 
        {
            path: '/invoice',
            name: 'Invoice',
            component: Invoice
        }
    ];

const router =  createRouter({ 
    history: createWebHistory(),
    routes
      
});

export default router;

    
    

