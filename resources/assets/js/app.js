
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)
let router = new Router({
      routes:[
        {
          path:'/ixtus-admin',
          component: require ('./centroc/IndexComponent')
        },
        {
          path:'/titulares-index',
          component: require ('./centroc/titulares/Index')
        },
        {
          path:'/titular-index/:id',
          name:'/titular-index',
          component: require ('./centroc/titulares/Show')
        },
        {
          path:'/titular-create',
          component: require ('./centroc/titulares/Create')
        }
      ]
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('suscripcion-component', require('./components/SuscripcionComponent.vue'));
Vue.component('titular-index', require('./centroc/titulares/Index.vue'));
Vue.component('titular-create', require('./centroc/titulares/Create.vue'));
Vue.component('datatable-titular', require('./components/DatatableTitular.vue'));

/*Componentes Centro de contacto

*/
Vue.component('centroc-index', require('./centroc/IndexComponent.vue'));



const app = new Vue({
    el: '#app',
    router
});
