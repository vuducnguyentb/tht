import request from '@/utils/request'

const prefix = 'ajax/';

export function listApi(query) {
    return request({
        url: prefix + 'comments',
        method: 'get',
        params: query
    })
}

export function getApi(id) {
    return request({
        url: prefix + 'comments/' + id,
        method: 'get'
    })
}

export function paginateApi(query) {
    return request({
        url: prefix + 'comments/paginate',
        method: 'get',
        params: query
    })
}

export function createApi(data) {
    return request({
        url: prefix + 'comments',
        method: 'post',
        data
    })
}

export function updateApi(id, data) {
    return request({
        url: prefix + 'comments/' + id,
        method: 'patch',
        data
    })
}
export function deleteApi(id) {
    return request({
        url: prefix + 'comments/' + id,
        method: 'delete'
    })
}
