require('./bootstrap');
 
window.Vue = require('vue');
import VueRouter from 'vue-router';
 
window.Vue.use(VueRouter);
 
import PeopleIndex from './components/people/PeopleIndex.vue';
import PeopleCreate from './components/people/PeopleCreate.vue';
import PeopleEdit from './components/people/PeopleEdit.vue';
import PeopleShow from './components/people/PeopleShow.vue';

import ProductsCreate from './components/products/ProductsCreate';
import ProductsEdit from './components/products/ProductsEdit';

const routes = [
    {
        path: '/',
        components: {
            indexPeople: PeopleIndex
        }
    },
    {path: '/people/create', component: PeopleCreate, name: 'createPeople'},
    {path: '/people/:id/edit', component: PeopleEdit, name: 'editPeople'},
    {path: '/people/:id', component: PeopleShow, name: 'showPeople'},

    {path: '/people/:id/products/create', component: ProductsCreate, name: 'createProducts'},
    {path: '/people/:id/products/:product/edit', component: ProductsEdit, name: 'editProducts'},
]
 
const router = new VueRouter({ routes })
 
const app = new Vue({ router }).$mount('#app')