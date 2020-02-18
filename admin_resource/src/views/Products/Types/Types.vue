<template>
    <main id="main-container">
      <div class="content">
        <vue-table id="producttypes" :path= "initTableURL" :i18n="i18n" />
      </div>
    </main>
</template>

<script>
    import { listApi, paginateApi, updateApi, createApi,deleteApi } from '@/api/producttypes'
    // import AddType from './components/AddType'
    import Paginate from 'vuejs-paginate'
    // import _ from 'lodash'
    // var slugify = require('slugify');

     import { VueTable } from '@enso-ui/tables/bulma';

    export default {
        name: 'TypesList',
        components: { VueTable },
        data() {
            return {
                originURL: '',
                initTableURL:'',
                loading: false,
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
                pageCount: 1,
                currentPage: 1,
                filtersData: {},
                listQuery: {
                    page_id: 0,
                    page_size: 10,
                        embeds: 'productcategories',
                        sorts: '-created_at'
                    }
            }
        },
        created() {
            this.originURL = window.location.origin;
            this.initTableURL = this.originURL+this.$route.fullPath+'/initTable';
        },
        methods: {
            i18n(key) {
                return this.$i18n.translate(key);
            },
            getList() {
                this.listLoading = true;
                listApi().then(response => {
                    this.items = response
                });
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
            // getList() {
            //     this.listLoading = true;
                
            // },
            createItem() {

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
div#producttypes {
    border-radius: 10px;
    border: 2px solid #eee;
}
div#producttypes:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2); 
}
</style>
