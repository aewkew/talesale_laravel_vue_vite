import { createWebHistory , createRouter} from 'vue-router';

//Pages
import Dashboard from './pages/Dashboard.vue';
import Shop from './pages/Shop.vue';
import Notifications from './pages/Notifications.vue';
import Tablelist from './pages/TableList.vue';
import Userprofile from './pages/UserProfile.vue';

import Invoice from './pages/invoice.vue';
import Inklist from './pages/Inklist.vue';
//Login&Register
import login from './pages/login.vue';
import register from './pages/register.vue';
import home from './pages/Home.vue';
import EditUser from './pages/UserProfile/EditUser.vue';
//Component
import add from './pages/shop/add.vue';
import search from './pages/shop/search.vue';
import add_customer from './pages/shop/add_customer.vue';
import add_company from './pages/shop/add_company.vue';
import editcustomer from './pages/Customer/editcustomer.vue';
//Test
import create  from './pages/create.vue';
import edit from './pages/edit.vue';
import toedit from './pages/toedit.vue';
import editProduct from './pages/editProduct.vue';

const routes = [
    {   
        path: '/',
        name: 'home',
        component: home
    },
        {
            path: '/dashboard',
            name: 'dashboard',
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
            component: Userprofile,
            children: [
                {
                    path: '/EditUser/:id?',
                    name:'EditUser',
                    component: EditUser ,
                },
               

            ]
        },
        {
            path: '/invoice',
            name: 'Invoice',
            component: Invoice
        },
        {
            path: '/Inklist',
            name: 'Inklist',
            component: Inklist
        },
        {
            path: '/create',
            name: 'create',
            component: create

        },
        {
            path: '/edit',
            name: 'edit',
            component: edit
        },
        {
            path: '/toedit/:id',
            name: 'toedit',
            component: toedit,
            props:true
        },
        {
            path: '/edit',
            name: 'edit',
            component: edit
        },

        {
            path: '/edit/editProduct/:id?',
            name: 'editProduct',
            component: editProduct ,
        },

        {
            path: '/login',
            name:'login',
            component: login ,
        },
        {
            path: '/register',
            name:'register',
            component: register ,
        },

        {
            path: '/add',
            name:'add',
            component: add ,
        },
        {
            path: '/search',
            name:'search',
            component: search ,
        },
        {
            path: '/add_customer',
            name:'add_customer',
            component: add_customer ,
        },
        {
            path: '/add_company',
            name:'add_company',
            component: add_company ,
        },
        {
            path: '/TableList/editcustomer/:id?',
            name:'editcustomer',
            component: editcustomer ,
        },
       


    ];

const router =  createRouter({
    history: createWebHistory(),
    routes

});

export default router;
