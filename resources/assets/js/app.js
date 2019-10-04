
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import dashboardPortlet from './components/dashboard-porlet';
import notifications from './components/notification';
import dashboardArticle from './components/dashboard-article';
window.Swal = require('sweetalert2');
require('./bootstrap');
window.PerfectScrollbar = require('perfect-scrollbar').default;
require('jquery-validation');
require('select2');
require('lodash');
window.Vue = require('vue');

/*
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('notification',notifications);
Vue.component('dashboard-portlet',dashboardPortlet);
Vue.component('dashboardArticle',dashboardArticle);

const app = new Vue({
    el: '#app',
    data:{
        notifications:'',
        unreadnotifications: ''
    },
    methods: {
        btcTrkAPICall: function () {
            axios.post('/user/notification/get').then(response => {
                this.notifications = response.data;
            }).catch(error => console.log(error));

            axios.post('/user/notification/unread/get').then(response => {
                this.unreadnotifications = response.data;
            }).catch(error => console.log(error));

        },
        intervalFetchData: function () {
            setInterval(() => {
                this.btcTrkAPICall();
            }, 3000);
        }
    },
    mounted () {
        // Run the functions once when mounted
        this.btcTrkAPICall();
        this.intervalFetchData();
    }
});


$(document).ready(function () {
   $('.alertflash').delay(2500).slideUp(200); 
});