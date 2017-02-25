/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

var Vue = require('vue');
Vue.use(require('vue-resource'));
var VueRouter = require('vue-router');
require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*Vue.component('example', require('./components/Example.vue'));*/
/*Vue.$http.headers.common['X-CSRF-TOKEN'] = Laravel.csrfToken;*/

const Sidebar = require('./components/admin/includes/Sidebar.vue');
const Alert = require('./components/admin/common/Alert.vue');
Vue.component('sidebar', Sidebar);
Vue.component('alert', Alert);

Vue.use(VueRouter);

import Layout     from './components/admin/master/Layout.vue';
import Dashboard  from './components/admin/dashboard/Index.vue';

//user imort
import IndexUser  from './components/admin/user/Index.vue';
import CreateUser from './components/admin/user/Create.vue';
import EditUser   from './components/admin/user/Edit.vue';
//category import
import IndexCategory  from './components/admin/category/Index.vue';
import CreateCategory from './components/admin/category/Create.vue';
import EditCategory   from './components/admin/category/Edit.vue';

const router = new VueRouter({
    hashbang: false,
    base: __dirname,
    linkActiveClass: 'active',
    routes:
        [
            { path:'/',          name: 'admin.dashboard',          components:{default: Dashboard, a: Sidebar}  },
            //user routeing
            { path:'/admin/user/index',         name: 'admin.user.index',         component: IndexUser },
            { path:'/admin/user/create',        name: 'admin.user.create',        component: CreateUser },
            { path:'/admin/user/:id/edit',      name: 'admin.user.edit',          component: EditUser },
            //category routing
            { path:'/admin/category/index',     name: 'admin.category.index',     component: IndexCategory },
            { path:'/admin/category/create',    name: 'admin.category.create',    component: CreateCategory },
            { path:'/admin/category/:id/edit',  name: 'admin.category.edit',      component: EditCategory },
        ]
});

new Vue(Vue.util.extend({router}, Layout)).$mount('#backend')
