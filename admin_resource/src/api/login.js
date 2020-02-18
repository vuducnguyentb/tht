import request from '@/utils/request'

const prefix = 'ajax/';

export function loginByUsername(username, password) {
  const data = {
    email: username,
    password: password
  };
  return request({
    url: prefix + 'login',
    method: 'post',
    data
  })
}

export function logout() {
  let token = document.head.querySelector('meta[name="csrf-token"]');
  var data = {};
  if (token) {
      data._token = token.content
  }
  return request({
    url: prefix + 'logout',
    method: 'post',
    data
  })
}

export function getUserInfo() {
  return request({
    url: prefix + 'users/profile',
    method: 'get'
  })
}

export function checkLogin() {
  return request({
    url: prefix + 'users/checklogin',
    method: 'get'
  })
}

