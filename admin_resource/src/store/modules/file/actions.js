export default {
  openFileManager({ commit }) {
    commit('SET_OPENED', true)
  },

  closeFileManager({ commit }) {
    commit('SET_OPENED', false)
  },

  setFieldName({ commit }, field_name) {
    commit('SET_FIELD_NAME', field_name)
  },

  setType({ commit }, type) {
    commit('SET_TYPE', type)
  }
}
