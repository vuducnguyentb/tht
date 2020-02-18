import { loginByUsername, logout, getUserInfo, checkLogin } from '@/api/login'
export default {
  LoginByUsername({ commit }, userInfo) {
    const email = userInfo.email.trim();
    return new Promise((resolve, reject) => {
      loginByUsername(email, userInfo.password).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },

  GetUserInfo({ commit, state }) {
    return new Promise((resolve, reject) => {
      getUserInfo().then(response => {
        if (!response.id) {
          reject('error')
        }
        const data = response.data;

        if (data.roles && data.roles.length > 0) {
          commit('SET_ROLES', data.roles)
        } else {
          reject('getInfo: roles must be a non-null array !')
        }
        commit('SET_ID', data.id);
        commit('SET_NAME', data.name);
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },

  Logout({ commit, state }) {
    return new Promise((resolve, reject) => {
      logout().then(() => {
        resolve()
      }).catch(error => {
        reject(error)
      })
    })
  },

  CheckLogin({ commit, state }) {
    return new Promise((resolve, reject) => {
      checkLogin().then((response) => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  }
}
