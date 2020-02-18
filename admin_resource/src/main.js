import Vue from 'vue'
// Components
import './components'
import App from './App.vue'
import router from '@/router'
import store from '@/store'
import moment from 'moment'
//
import Toastr from '@enso-ui/toastr/bulma';
import ToastrPlugin from '@enso-ui/toastr';

//=== get and use fontawesome icon
import { library } from '@fortawesome/fontawesome-svg-core'
import { faBook } from '@fortawesome/free-solid-svg-icons'
library.add(faBook);
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
//=== end get and use fontawesome icon


import './permission'

// style for enso ui table
import 'bulma/css/bulma.css'
import '@/assets/custom.css'
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.component('fa', FontAwesomeIcon);

Vue.use(ToastrPlugin, {
  layout: Toastr,
  options: {
    duration: 3500,
    position: 'right',
  },
});


Vue.config.productionTip = false;
Vue.prototype.moment = moment;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');
