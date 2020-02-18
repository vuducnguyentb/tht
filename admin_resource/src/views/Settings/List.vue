<template>
<main id="main-container">
  <div class="content">
    <vue-table id="settings" :path= "initTableURL" :i18n="i18n"/>
  </div>
</main>
</template>

<script>
import Vue from 'vue'
import { paginateApi, updateApi, createApi ,deleteApi} from '@/api/settings'
import { mapMutations } from 'vuex'
import Paginate from 'vuejs-paginate'
import { VueTable } from '@enso-ui/tables/bulma';
import _ from 'lodash'

var slugify = require('slugify')
Vue.filter('truncate', function (value, limit) {
    if (value && limit && value.length > limit) {
        value = value.substring(0, (limit - 3)) + '...';
    }

    return value
})

export default {
  name: 'SettingsList',
  components: { VueTable, Paginate },
    data() {
    return {
        originURL: '',
        initTableURL:'',
        loading: false,
        headers: [
        {
          sortable: false,
          text: 'STT',
          value: 'id'
        },
        {
          sortable: false,
          text: 'Key',
          value: 'key'
        },
        {
          sortable: false,
          text: 'Tên',
          value: 'name'
        },
        {
          sortable: false,
          text: 'Giá trị',
          value: 'value'
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
      pageCount: 1,
      currentPage: 1,
      filtersData: {},
      listQuery: {
            page_id: 0,
            page_size: 10,
            sorts: '-created_at'
        },
      keyRules: [
        v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'key không chứa khoảng trắng'
      ],
      editedIndex: -1,
      editedItem: {
        id: null,
        key: '',
        name: '',
        value: '',
        create_at: '',
      },
      defaultItem: {
        id: null,
        key: '',
        name: '',
        name: '',
        create_at: ''
      },
      dialog: false,
      valid: true,
      keyValue: ''
    }
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'Tạo mới' : 'Chỉnh sửa'
    },
    isEdit() {
      return this.editedIndex === -1 ? false : true;
    }
  },
  watch: {
    'editedItem.name': function() {
      if (!this.isEdit) {
        this.keyValue = slugify(_.lowerCase(this.editedItem.name))
      }
    }
  },
  created() {
    var _that = this;
    this.getList()
    this.originURL = window.location.origin;
    this.initTableURL = this.originURL+this.$route.fullPath+'/initTable';
    console.log('origin Url:'+ this.originURL);
    console.log('initTableURL:'+this.initTableURL);
    console.log('current route:');
    console.log(this.$route);
    jQuery('#modal-id').on('hidden.bs.modal', function (e) {
      setTimeout(() => {
        _that.editedItem = Object.assign({}, _that.defaultItem)
        _that.editedIndex = -1
      }, 300)
    })
  },
  methods: {
    i18n(key) {
      return this.$i18n.translate(key);
    },
    getList() {
      this.listLoading = true
        paginateApi(this.listQuery).then(response => {
            this.items = response.result
            this.pageCount = response.meta.page_count
            this.currentPage = response.meta.page_id + 1
            this.listLoading = false
        })
    },
      handleSizeChange(val) {
          this.listQuery.page_size = val
          this.getList()
      },
      handleCurrentChange(val) {
          this.listQuery.page_id = val - 1
          this.getList()
      },
    createItem() {
      this.editedItem = Object.assign({}, this.defaultItem)
      this.editedIndex = -1
      jQuery('#modal-add-settings').modal('show')
    },
    editItem(item) {
      this.editedIndex = item.id
      this.editedItem = Object.assign({}, item)
      this.keyValue = item.key
      jQuery('#modal-add-settings').modal('show')
    },
    deleteItem(id) {

        var r = confirm("Bạn có thực sự muốn xóa cấu hình này?");
        if (r == true) {
            deleteApi(id).then(response => {
                Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Xóa thành công.'})
                this.getList()
            }, err => {
                Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Không xóa được. Vui lòng thử lại.'})
            })
        }

    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = data.id
          updateApi(id, data).then(response => {
            resolve(response)
          }).catch(err => {
            reject(err)
          })
        } else {
          createApi(data).then(response => {
            resolve(response)
          }).catch(err => {
            reject(err)
          })
        }
      })
    },
    submitForm() {
      // if(this.$refs.currentxForm.validate()) {
          this.loading = true
          this.editedItem.key = this.keyValue
          this.submitFormRequest(this.editedItem).then(() => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu thành công'})
            this.getList()
            this.close()
          },
          () => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Xảy ra lỗi. Vui lòng thử lại.'})
          })
      // }
    }
  }
}

</script>

<style scoped>
div#settings {
    border-radius: 10px;
    border: 2px solid #eee;
}
div#settings:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2); 
}

</style>
