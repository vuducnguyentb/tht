<template>
    <main id="main-container">
        <div class="content">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Danh sách Thể loại</h3>
                    <div class="block-options">
                        <button type="submit" @click="createItem()" class="btn-block-option">
                            <i class="fa fa-fw fa-plus"></i> Thêm mới
                        </button>
                    </div>
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
                            <td>{{ item.name }}</td>
                            <td>{{ item.slug }}</td>
                            <td>{{ item.productcategories.name ? item.productcategories.name:'' }}</td>
                            <td>{{  moment( item.created_at, 'YYYY-MM-DD').format('DD/MM/YYYY') }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a>
                                        <button type="button" @click="editItem(item)" class="btn btn-sm btn-primary js-tooltip-enabled mr-1" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <a >
                                        <button @click.prevent="deleteItem(item.id)" type="button" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <add-type :editedIndex="editedIndex" :editedItem="editedItem" :slug="slug" @saveSuccess="saveSuccess()" />
    </main>
</template>

<script>
    import { listApi, updateApi, createApi,deleteApi } from '@/api/producttypes'
    import AddType from './components/AddType'
    import _ from 'lodash'
    var slugify = require('slugify');

    export default {
        name: 'TypesList',
        components: { AddType },
        data() {
            return {
                headers: [
                    {
                        sortable: false,
                        text: 'Tên thể loại',
                        value: 'name'
                    },
                    {
                        sortable: false,
                        text: 'Url',
                        value: 'slug'
                    },
                    {
                        sortable: false,
                        text: 'Danh mục',
                        value: 'product_category_id'
                    },
                    {
                        sortable: false,
                        text: 'Ngày tạo',
                        value: 'created_at'
                    },
                    {
                        sortable: false,
                        text: 'Action',
                        align: 'right'
                    }
                ],
                items: [],
                list: null,
                total: 0,
                listLoading: true,
                editedIndex: -1,
                editedItem: {
                    id: null,
                    product_category_id: null,
                    name: '',
                    slug: '',
                    create_at: '',
                },
                defaultItem: {
                    id: null,
                    product_category_id: null,
                    name: '',
                    slug: '',
                    create_at: ''
                },
                slug: '',
                productcategories: [],
                filtersData: {},
                listQuery: {

                        embeds: 'productcategories',
                        sorts: '-created_at'
                    }

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
            },
            createItem() {

//                 this.editedItem = Object.assign({}, this.defaultItem);
//                 this.editedIndex = -1;
//                 jQuery('#modal-add-category').modal('show')
//             },
//             editItem(item) {
//                 this.editedIndex = item.id;
//                 this.editedItem = Object.assign({}, item);
//                 this.slug = item.slug;
//                 jQuery('#modal-add-category').modal('show')

                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
                jQuery('#modal-add-type').modal('show')
            },
            editItem(item) {
                this.editedIndex = item.id
                this.editedItem = Object.assign({}, item)
                this.slug = item.slug
                // this.name = item.name
                this.productcategories = item.id
                jQuery('#modal-add-type').modal('show')

            },
            deleteItem(id) {

                var r = confirm("Bạn có thực sự muốn xóa thể loại này?");
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
//                 this.getList();
//                 jQuery('#modal-add-category').modal('hide');

                this.getList()
                jQuery('#modal-add-type').modal('hide')
                this.listTypes()
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
