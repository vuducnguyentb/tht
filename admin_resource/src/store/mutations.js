// https://vuex.vuejs.org/en/mutations.html

export default {
    setLocale(state, payload) {
        state.locale = payload.locale;
    }
}
