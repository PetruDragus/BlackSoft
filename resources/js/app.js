
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import Vue from 'vue'
import moment from 'moment'
Vue.prototype.moment = moment

window.Vue = require('vue');

import 'fullcalendar/dist/fullcalendar.css';

import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyColJ2SXghtrn8OccREfBBwdDPePid5aus",
        libraries: "places" // necessary for places input
    }
});

import { Form, HasError, AlertError } from 'vform'
window.form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)

import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;

import FullCalendar from 'vue-full-calendar'; //Import Full-calendar
Vue.use(FullCalendar);

Vue.filter('formatMoney', (value) => {
    return Number(value)
        .toFixed(2)
        .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
})

Vue.filter('formatDate', (value) => {
    if (value) {
        return moment(String(value)).format('DD-MM-YYYY')
    }
})

Vue.filter('formatMiniDate', (value) => {
    if (value) {
        return moment(String(value)).format('DD.MM')
    }
})

let Fire = new Vue();
window.Fire = Fire;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import Bookings from './components/views/bookings/index';
import Invoices from './components/views/invoices/index';
import Reviews from './components/views/reviews/index';
import Jobs from './components/views/jobs/index';
import Applications from './components/views/jobs/jobApplication/index';
import Contacts from './components/views/contacts/index';
import Customers from './components/views/customers/index';
import Cities from './components/views/cities/index';
import Vehicles from './components/views/vehicles/index';
import Users from './components/views/users/index';
import Drivers from './components/views/drivers/index';
import Payments from './components/views/payments/index';
import Chart from './components/ChartComponent';
import GmapMap from './components/GoogleMap';

import Test from './components/ExampleComponent';

Vue.component('bookings', require('./components/views/bookings/index'));
Vue.component('invoices', require('./components/views/invoices/index'));
Vue.component('reviews', require('./components/views/reviews/index'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    components: {
        Bookings,
        Invoices,
        Reviews,
        Contacts,
        Customers,
        Cities,
        Vehicles,
        Users,
        Jobs,
        Applications,
        Drivers,
        Payments,
        Chart,
        Test,
        GmapMap
    }
}).$mount('#app');
// Now the app has started!
