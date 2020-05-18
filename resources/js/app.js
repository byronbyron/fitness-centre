require('./bootstrap');

import { InertiaApp } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import moment from 'moment'

Vue.use(InertiaApp)
Vue.prototype.$route = (...args) => route(...args).url();
Vue.prototype.moment = moment;

const app = document.getElementById('app')

if (app) {
  new Vue({
    render: h => h(InertiaApp, {
      props: {
        initialPage: JSON.parse(app.dataset.page),
        resolveComponent: name => require(`./Pages/${name}`).default,
      },
    }),
  }).$mount(app)
}
