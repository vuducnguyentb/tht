<template>
    <main id="main-container">
        <div class="content">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Danh sách đơn hàng</h3>
                </div>
                <div class="block-content">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th v-for="(header, hidx) in headers" :key="hidx"> {{ header.text }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, index) in items" :key="index">
                            <td>{{ JSON.parse(item.order.data).name }}</td>
                            <td>{{ JSON.parse(item.order.data).address }}</td>
                            <td>{{ JSON.parse(item.order.data).phone }}</td>
                            <td>{{ formatPrice(JSON.parse(item.order.data).total_price) }}</td>
                            <td>{{ JSON.parse(item.order.data).note }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <!--                                    <a>-->
                                    <!--                                        <button type="button" @click="getItem(item)" class="btn btn-sm btn-primary js-tooltip-enabled mr-1" data-toggle="tooltip" title="" data-original-title="Detail">-->
                                    <!--                                            <i class="fa fa-eye"></i>-->
                                    <!--                                        </button>-->
                                    <!--                                    </a>-->
                                    <a >
                                        <button @click.prevent="getItem(item.id)" type="button" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="modal" data-target="#modal-block-vcenter">
                                            <!--                                        <button @click.prevent="getItem(item.id)" type="button" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">-->
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                                <div class="block-content bg-body-light text-right">
                                    <nav>
                                        <paginate
                                                v-model="currentPage"
                                                :page-count="pageCount"
                                                :click-handler="handleCurrentChange"
                                                :prev-text="'&laquo;'"
                                                :next-text="'&raquo;'"
                                                :container-class="'pagination justify-content-end'"
                                                :page-class="'page-item'"
                                                :prev-class	="'page-item'"
                                                :next-class	="'page-item'"
                                                :page-link-class	="'page-link'"
                                                :prev-link-class="'page-link'"
                                                :next-link-class	="'page-link'">
                                        </paginate>
                                    </nav>
                                </div>

            </div>

            <div class="modal fade" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-popin modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Chi tiết mã đơn hàng {{ sku_order }}</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">

                                <div class="block block-rounded block-bordered">
                                    <div class="block-content">
                                        <table class="table table-vcenter">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="text-center" >Mã SP</th>
                                                <th>Tên sản phẩm</th>
                                                <th class="d-none d-sm-table-cell" >Số lượng</th>
                                                <th class="d-none d-sm-table-cell" >Giá</th>
                                                <!--                                                <th class="text-center" >Actions</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(item, index) in bills" :key="index">
                                                <th class="text-center" scope="row">{{index}}</th>
                                                <td class="font-w600">
                                                    {{ item.name }}
                                                </td>
                                                <td class="font-w600">
                                                    {{ item.quantity }}
                                                </td>
                                                <td class="font-w600">
                                                    {{ formatPrice(item.price) }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>



                            </div>
                            <div class="block-content block-content-full text-right bg-light">
                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
</template>

<script>
    import { getApi,listApi, paginateApi, updateApi, createApi,deleteApi } from '@/api/orders'
    import Paginate from 'vuejs-paginate'

    import _ from 'lodash'
    // import {getApi} from "../../api/orderdetails";
    var slugify = require('slugify');

    export default {
        name: 'OrderDetailsList',
        // components: { Bill },
        components: { Paginate },
        data() {
            return {
                loading: false,
                headers: [
                    {
                        sortable: false,
                        text: 'Tên KH',
                        value: 'name_customer'
                    },
                    {
                        sortable: false,
                        text: 'Địa chỉ',
                        value: 'adsress'
                    },
                    {
                        sortable: false,
                        text: 'Số điện thoại',
                        value: 'phone'
                    },
                    {
                        sortable: false,
                        text: 'Tổng tiền',
                        value: 'total_price'
                    },
                    {
                        sortable: false,
                        text: 'Ghi chú',
                        value: 'note'
                    },
                    {
                        sortable: false,
                        text: 'Action',
                        value: 'right'
                    }
                ],
                sku_order:'',
                orders:[],
                bills:'',
                items: [],
                list: null,
                total: 0,
                listLoading: true,
                pageCount: 1,
                currentPage: 1,
                filtersData: {},
                listQuery: {
                    page_id: 0,
                    page_size: 10,
                    embeds: 'order',
                    sorts: '-created_at'
                },
            }
        },
        created() {
            this.getList()
        },
        methods: {
            formatPrice(value) {
                let val = (value/1).toFixed(0).replace('.', ',');
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+' đ'
            },
            getList() {
                this.listLoading = true;
                // listApi().then(response => {
                //     this.items = response
                // })
                paginateApi(this.listQuery).then(response => {
                    this.items = response.result;
                    this.pageCount = response.meta.page_count;
                    this.currentPage = response.meta.page_id + 1;
                    this.listLoading = false
                })
            },
            handleSizeChange(val) {
                this.listQuery.page_size = val;
                this.getList()
            },
            handleCurrentChange(val) {
                this.listQuery.page_id = val - 1;
                this.getList()
            },
            getItem(id) {
                // this.getedIndex = item.id
                // this.gettedItem = Object.assign({}, item)
                // this.slug = item.slug
                // jQuery('#modal-add-category').modal('show')
                getApi(id).then(
                    response =>{
                        this.bills=JSON.parse(response.data);
                        this.sku_order=response.sku_order;
                    }
                )
            },
            getStatus(value) {
                switch(value) {
                    case 1:
                        return 'Đã xử lý';
                    default:
                        return 'Đang chờ xử lý'
                }
            },
            deleteItem(id) {

                var r = confirm("Bạn có thực sự muốn xóa danh mục này?");
                if (r == true) {
                    deleteApi(id).then(response => {
                        Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Xóa thành công.'});
                        this.getList()
                    }, err => {
                        Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Không xóa được. Vui lòng thử lại.'})
                    })
                }

            }
        }
    }
</script>

<style scoped>

</style>

