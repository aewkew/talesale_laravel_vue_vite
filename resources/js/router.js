import { createWebHistory , createRouter} from 'vue-router';

//Pages
import Dashboard from './pages/Dashboard.vue';
import Shop from './pages/Shop.vue';
import Notifications from './pages/Notifications.vue';
import Tablelist from './pages/TableList.vue';
import Userprofile from './pages/UserProfile.vue';
import customer from './pages/customer.vue';
import Admin from './pages/Admin.vue';

//customer 
import detail_customer from './pages/Customer/detail_customer.vue';
import invoice_customer from './pages/Customer/invoice_customer.vue';

import Invoice from './pages/invoice.vue';
import Inklist from './pages/Inklist.vue';
import fornotify from './pages/fornotify.vue';

//Login&Register
import login from './pages/Login.vue';
import register from './pages/register.vue';
import home from './pages/Home.vue';
import EditUser from './pages/UserProfile/EditUser.vue';
//Component
import add from './pages/shop/add.vue';
import search from './pages/shop/search.vue';
import add_customer from './pages/shop/add_customer.vue';
import editcustomer from './pages/Customer/editcustomer.vue';
//Test
import create  from './pages/create.vue';
import edit from './pages/edit.vue';
import toedit from './pages/toedit.vue';
import editProduct from './pages/editProduct.vue';
import invoiceTs from './pages/invoiceTs.vue';

import Bar from './pages/Bar/Bar.vue'; 
import Doughnut from './pages/Bar/Doughtnut.vue';
const routes = [
    {   
        path: '/',
        name: 'home',
        component: home
    },
    {
        path: '/Admin',
        name: 'Admin',
        component: Admin
     
    },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            children:[{
                path:'/Bar/Bar',
                name: 'BarChart',
                component:Bar,
                  },
           {
            path:'/Bar/Doughnut',
            name: 'BarDoughnut',
            component: Doughnut,
           }    
        ]
        },
        {
            path: '/Shop',
            name: 'Shop',
            component: Shop,
            
        },

     

        {
            name: 'Notifications',
            path: '/Notifications',
            component: Notifications
        },
        {
            path: '/TableList',
            name: 'TableList',
            component: Tablelist,
           
        },
        
          //Customer
        {
            path: '/customer',
            name: 'customer',
            component: customer,
           
        },
        {
            path: '/customer/editcustomer/:id?',
            name:'editcustomer',
            component: editcustomer ,
        },
        {
            path: '/customer/detail_customer/:id?',
            name:'detail_customer',
            component: detail_customer ,
        },
        {
            path: '/customer/detail_customer/:id?/invoice_customer/:id?',
            name:'invoice_customer',
            component:  invoice_customer ,
        },

       
            //Invoice
        {
            path: '/TableList/invoiceTs/:id?',
            name:'invoiceTs',
            component: invoiceTs ,
        } ,  
        {
            path: '/TableList/invoiceTs/:id?/fornotify/:id?',
            name:'fornotify',
            component: fornotify ,
        } ,

        {
          
            path: '/Shop/invoice',
            name: 'invoice',
            component: Invoice,
            
        },


        
         //Profile
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
            path: '/Login',
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
    
       

       
       
    ];

const router =  createRouter({
    history: createWebHistory(),
    routes

});

export default router;
