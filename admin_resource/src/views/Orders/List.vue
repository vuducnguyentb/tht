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
                            <td>{{ JSON.parse(item.data).name }}</td>
                            <td>{{ JSON.parse(item.data).address  }}</td>
                            <td>{{ JSON.parse(item.data).phone }}</td>
                            <td>{{ JSON.parse(item.data).total_price }}</td>
                            <td>Đang chờ xủ lý</td>
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
<!--                <div class="block-content bg-body-light text-right">-->
<!--                    <nav>-->
<!--                        <paginate-->
<!--                                v-model="currentPage"-->
<!--                                :page-count="pageCount"-->
<!--                                :click-handler="handleCurrentChange"-->
<!--                                :prev-text="'&laquo;'"-->
<!--                                :next-text="'&raquo;'"-->
<!--                                :container-class="'pagination justify-content-end'"-->
<!--                                :page-class="'page-item'"-->
<!--                                :prev-class	="'page-item'"-->
<!--                                :next-class	="'page-item'"-->
<!--                                :page-link-class	="'page-link'"-->
<!--                                :prev-link-class="'page-link'"-->
<!--                                :next-link-class	="'page-link'">-->
<!--                        </paginate>-->
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->

            <div class="modal fade" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-popin modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Chi tiết mã đơn hàng {{bills.sku_bill}}</h3>
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
                                                <th class="text-center" >STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th class="d-none d-sm-table-cell" >Số lượng</th>
                                                <th class="d-none d-sm-table-cell" >Giá</th>
                                                <th class="d-none d-sm-table-cell" >Thành tiền</th>
                                                <th class="d-none d-sm-table-cell" >Ghi chú</th>

                                                <!--                                                <th class="text-center" >Actions</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th class="text-center" scope="row">1</th>
                                                <td class="font-w600">
                                                    <a href="">{{bills.name_product}}</a>
                                                </td>
                                                <td class="font-w600">
                                                    <a href="">{{bills.quantity}}</a>
                                                </td>
                                                <td class="font-w600">
                                                    <a href="">{{bills.price}}</a>
                                                </td>
                                                <td class="font-w600">
                                                    <a href="">{{bills.total_price}}</a>
                                                </td>
                                                <td class="font-w600">
                                                    <a href="">{{bills.note}}</a>
                                                </td>
                                                <!--                                                <td class="text-center">-->
                                                <!--                                                    <div class="btn-group">-->
                                                <!--                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">-->
                                                <!--                                                            <i class="fa fa-pencil-alt"></i>-->
                                                <!--                                                        </button>-->
                                                <!--                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">-->
                                                <!--                                                            <i class="fa fa-times"></i>-->
                                                <!--                                                        </button>-->
                                                <!--                                                    </div>-->
                                                <!--                                                </td>-->
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
        <add-category :editedIndex="editedIndex" :editedItem="editedItem" :slug="slug" @saveSuccess="saveSuccess()" />
    </main>
</template>

<script>
    import {listApi, paginateApi, updateApi, createApi,deleteApi } from '@/api/orders'
    // import Paginate from 'vuejs-paginate'
    // import Bill from './components/Bill'
    import _ from 'lodash'
    import {getApi} from "../../api/orders";
    var slugify = require('slugify');

    export default {
        name: 'OrdersList',
        // components: { Bill },
        // components: { Paginate },
        data() {
            return {
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
                        text: 'Trạng thái',
                        value: 'status'
                    },
                    {
                        sortable: false,
                        text: 'Action',
                        value: 'right'
                    }
                ],
                bills:[],
                items: [],
                data1:[],
                list: null,
                total: 0,
                listLoading: true,
                pageCount: 1,
                currentPage: 1,
                filtersData: {},
                listQuery: {
                    page_id: 0,
                    page_size: 10,
                    sorts: '-created_at'
                },
                editedIndex: -1,
                editedItem: {
                    id: null,
                    name: '',
                    slug: '',
                    create_at: '',
                },
                defaultItem: {
                    id: null,
                    name: '',
                    slug: '',
                    create_at: ''
                },
                slug: ''
            }
        },
        created() {
            this.getList()
        },
        methods: {
            getList() {
                this.listLoading = true;
                listApi().then(response => {
                    this.items = response
                })
                // paginateApi(this.listQuery).then(response => {
                //     this.items = response.result
                //     this.pageCount = response.meta.page_count
                //     this.currentPage = response.meta.page_id + 1
                //     this.listLoading = false
                // })
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
                        this.bills=response;
                        return console.log(this.bills)
                    }
                )
            },
            editItem(item) {
                this.editedIndex = item.id;
                this.editedItem = Object.assign({}, item);
                this.slug = item.slug;
                jQuery('#modal-add-category').modal('show')
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
            ,
            saveSuccess() {
                this.getList();
                jQuery('#modal-add-category').modal('hide');
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem);
                    this.editedIndex = -1;
                    this.slug = ''
                }, 300)
            },
        }
    }
</script>

<style scoped>

</style>

