/**
 * Vuex
 *
 * @library
 *
 * https://vuex.vuejs.org/en/
 */

// Lib imports
import Vue from 'vue'
import Vuex from 'vuex'

// load vuex i18n module
import vuexI18n from 'vuex-i18n';
// Store functionality
import actions from './actions'
import getters from './getters'
import modules from './modules'
import mutations from './mutations'
import state from './state'
import vi from '../resources/i18n/vi'
//import en from '../resources/i18n/en'
Vue.use(Vuex);

// Create a new store
const store = new Vuex.Store({
  actions,
  getters,
  modules,
  mutations,
  state
});
// initialize the internationalization plugin on the vue instance
Vue.use(vuexI18n.plugin, store);
Vue.i18n.add('vi', vi);
//Vue.i18n.add('en', en);
Vue.i18n.set('en');
export default store
