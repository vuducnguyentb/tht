<template>
    <main id="main-container">
      <div class="content">
        <vue-table id="categories" :path= "initTableURL" :i18n="i18n" />
      </div>
    </main>
</template>

<script>
    import { VueTable } from '@enso-ui/tables/bulma';
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
div#categories {
    border-radius: 10px;
    border: 2px solid #eee;
}
div#categories:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2); 
}
</style>
