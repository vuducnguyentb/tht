import request from '@/utils/request'

const prefix = 'ajax/';



export function getApi() {
    return request({
        url: prefix + 'statisticals/',
        method: 'get'
    })
}
