
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import JQuery from 'jquery'
window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'
import moment from 'moment';
window.$ = JQuery
import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

window.Form=Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('pagination', require('laravel-vue-pagination'));

import Dashboard from './components/Dashboard'
import Profile from './components/Profile'
import Friend_Profile from './components/Friend_Profile'
import Users from './components/Users'
import Developer from './components/Developer'
import Answer from './components/Answer'
import ExampleComponent from './components/ExampleComponent'
import question from './components/question'
import NotFound from './components/NotFound'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
  })



const router = new VueRouter({
    mode:'history',
    routes:[
        {path: '/Profile', component: Profile},
        {path: '/Friend_Profile',component: Friend_Profile},
        {path: '/Answer',component: Answer},
        {path: '/Dashboard', props:true,component: Dashboard},
        {path: '/developer', component: Developer},
        {path: '/Users', component: Users},
        {path: '/ExampleComponent', component: ExampleComponent},
        {path: '/question', component: question},
        {path: '/*', component: Dashboard}
        ] // short for `routes: routes`
  })

Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDate',function(created){
    return moment(created).format('MMMM Do YYYY');
});
var vm = new Vue()
Vue.prototype.$myFunc = function(getNameByid) {
    axios.get('api/findUserbyid?q='+getNameByid)
    .then(response=>{
       this.asmks=response.data;

    }).catch(err=>{
        console.log(err);
    });
}


let Fire = new Vue();
window.Fire = Fire;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
Vue.component(
    'not-found',
    require('./components/NotFound.vue').default
);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Friend-Profile', require('./components/Friend_Profile.vue'));

var app = new Vue({
    el:'#app',
    router,
    data:{
        search:'',
        },

    methods:{
        searchit: _.debounce(() => {
            Fire.$emit('searching');
        },1000),

        printme() {
            window.print();
        }
    }
})
