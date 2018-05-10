import Vue from 'vue';
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.min.css';
import * as axios from "axios";

window.Vue = require('vue');
window.VueRouter = require('vue-router').default;
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios').default;

Vue.component('car-list',        require('./components/car/CarList'));
Vue.component('bus-list',        require('./components/bus/BusList'));
Vue.component('motorcycle-list', require('./components/motorcycle/MotorcycleList'));
Vue.component('lorry-list',      require('./components/lorry/LorryList'));
Vue.component('workshop-list',   require('./components/workshop/WorkshopList'));
Vue.component('car-add',         require('./components/car/CarAdd'));
Vue.component('car-edit',        require('./components/car/CarEdit'));
Vue.component('bus-add',         require('./components/bus/BusAdd'));
Vue.component('bus-edit',        require('./components/bus/BusEdit'));
Vue.component('motorcycle-add',  require('./components/motorcycle/MotorcycleAdd'));
Vue.component('motorcycle-edit', require('./components/motorcycle/MotorcycleEdit'));
Vue.component('lorry-add',       require('./components/lorry/LorryAdd'));
Vue.component('lorry-edit',      require('./components/lorry/LorryEdit'));
Vue.component('workshop-add',    require('./components/workshop/WorkshopAdd'));
Vue.component('workshop-edit',   require('./components/workshop/WorkshopEdit'));
Vue.component('transport-test',  require('./components/TransportTest'));
Vue.component('engineer-add',    require('./components/engineers/EngineerAdd'));
Vue.component('engineer-edit',   require('./components/engineers/EngineerEdit'));
Vue.component('transport-production',   require('./components/TransportProduction'));

let AppLayout         = require('./components/App.vue');
let Transport         = require('./components/Transport.vue');
let Engineers         = require('./components/Engineers');
let Workers           = require('./components/Workers');
let TestLabs          = require('./components/TestLabs');

Vue.use(VueMaterial);
Vue.use(VueRouter, VueAxios, axios);

const routes = [
    { name: 'Transport',      path: '/app/transport',       component: Transport },
    { name: 'Engineers',      path: '/app/engineers',       component: Engineers },
    { name: 'Workers',        path: '/app/workers',         component: Workers },
    { name: 'TestLabs',       path: '/app/test-labs',       component: TestLabs },
];

const router = new VueRouter({ mode: 'history', routes: routes });

new Vue(
    Vue.util.extend(
        { router },
        AppLayout
    ),
).$mount('#app');