// https://vuex.vuejs.org/en/getters.html

export default {
  i18n: (state) => (key) => {
    if(state.i18nData[key]) {
      //return state.i18nData[key];
      return this.$i18n.translate(key);
    }
    return key;
  }
}
