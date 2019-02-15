
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
Vue.use(require('vue-moment'));

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
          name:'/titulares-index',
          component: require ('./centroc/titulares/Index')
        },
        {
          path:'/suscripciones-index',
          name:'/suscripciones-index',
          component: require ('./centroc/suscripcion/Index')
        },
        {
          path:'/suscripcion/:id',
          name:'/suscripcion',
          component: require ('./centroc/suscripcion/Show')
        },
        {
          path:'/titular-index/:id',
          name:'/titular-index',
          component: require ('./centroc/titulares/Show')
        },
        {
          path:'/titular-create',
          component: require ('./centroc/titulares/Create')
        },
        {
          path:'/notas/:id',
          name:'/notas',
          component: require ('./centroc/titulares/Notas')
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
Vue.component('datatable-suscripcion', require('./components/DatatableSuscripcion.vue'));
Vue.component('suscripcion-show', require('./centroc/suscripcion/Show.vue'));
Vue.component('suscripcion-index', require('./centroc/suscripcion/Index.vue'));
Vue.component('modal-nota', require('./centroc/titulares/Modal.vue'));
Vue.component('component-notas', require('./centroc/titulares/Notas.vue'));

/*Componentes Centro de contacto

*/
Vue.component('centroc-index', require('./centroc/IndexComponent.vue'));



const app = new Vue({
    el: '#app',
    router
});
