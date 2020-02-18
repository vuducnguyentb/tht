import request from '@/utils/request'

const prefix = 'ajax/';

export function listApi(query) {
  return request({
    url: prefix + 'pages',
    method: 'get',
    params: query
  })
}
export function paginateApi(query) {
  return request({
    url: prefix + 'pages/paginate',
    method: 'get',
    params: query
  })
}

export function getApi(id) {
  return request({
    url: prefix + 'pages/' + id,
    method: 'get'
  })
}

export function createApi(data) {
  return request({
    url: prefix + 'pages',
    method: 'post',
    data
  })
}

export function updateApi(id, data) {
  return request({
    url: prefix + 'pages/' + id,
    method: 'patch',
    data
  })
}

export function deleteApi(id) {
  return request({
    url: prefix + 'pages/' + id,
    method: 'delete'
  })
}
