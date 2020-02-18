<template>
    <main id="main-container">
      <div class="content">
        <vue-table id="productcategories" :path= "initTableURL" :i18n="i18n" />
      </div>
    </main>
</template>

<script>
    import { listApi, updateApi, createApi,deleteApi } from '@/api/productcategories'
    import { VueTable } from '@enso-ui/tables/bulma';
    import AddCategory from './components/AddCategory'
    import _ from 'lodash'
    var slugify = require('slugify');

    export default {
        name: 'CategoriesList',
        components: { VueTable },
        data() {
            return {
                originURL: '',
                initTableURL:'',
                items: [],
                list: null,
                total: 0,
                listLoading: true,
                editedIndex: -1,
                editedItem: {
                    id: null,
                    name: '',
                    slug: '',
                    order: '',
                    create_at: '',
                },
                defaultItem: {
                    id: null,
                    name: '',
                    slug: '',
                    order: '',
                    create_at: ''
                },
                slug: ''
            }
        },
        created() {
            this.originURL = window.location.origin;
          this.initTableURL = this.originURL+this.$route.fullPath+'/initTable';
        },
        methods: {
            i18n(key) {
            return this.$store.getters.i18n(key);
          },
            getList() {
                this.listLoading = true;
                listApi().then(response => {
                    this.items = response
                    console.log('Danh sách product category',this.items)
                })
            },
            createItem() {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
                jQuery('#modal-add-category').modal('show')
            },
            editItem(item) {
                this.editedIndex = item.id;
                this.editedItem = Object.assign({}, item);
                this.slug = item.slug;
                jQuery('#modal-add-category').modal('show')
                console.log('Chỉnh sửa danh mục',this.editedItem)
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
div#productcategories {
    border-radius: 10px;
    border: 2px solid #eee;
}
div#productcategories:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2); 
}
</style>
