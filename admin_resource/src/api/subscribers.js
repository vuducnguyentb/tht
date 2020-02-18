import request from '@/utils/request'

const prefix = 'ajax/';

export function listApi(query) {
    return request({
        url: prefix + 'subscribers',
        method: 'get',
        params: query
    })
}

export function getApi(id) {
    return request({
        url: prefix + 'subscribers/' + id,
        method: 'get'
    })
}

export function paginateApi(query) {
    return request({
        url: prefix + 'subscribers/paginate',
        method: 'get',
        params: query
    })
}

export function createApi(data) {
    return request({
        url: prefix + 'subscribers',
        method: 'post',
        data
    })
}

export function updateApi(id, data) {
    return request({
        url: prefix + 'subscribers/' + id,
        method: 'patch',
        data
    })
}
