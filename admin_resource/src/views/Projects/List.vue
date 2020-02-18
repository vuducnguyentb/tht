<template>
    <main id="main-container">
      <div class="content">
        <vue-table id="projects" :path= "initTableURL" :i18n="i18n" >
        <template v-slot:status="{ row, column }">
        <span
          v-if="row[column.name] == '1'">{{$t("Public")}}</span>
        <span
          v-else-if="row[column.name] == '0'">{{$t('Draft')}}</span>
        <span v-else/>
      </template>
        </vue-table>
      </div>
    </main>
</template>
<script>
import { paginateApi,deleteApi } from '@/api/projects'
import Paginate from 'vuejs-paginate'
import { VueTable } from '@enso-ui/tables/bulma';

export default {
  name: 'ProjectsList',
  components: { VueTable },
    data() {
    return {
      originURL: '',
      initTableURL:'',
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
            embeds: 'author,projectcategories',
            sorts: '-created_at'
        }
    }
  },
  created() {
    this.getList()
    this.originURL = window.location.origin;
    this.initTableURL = this.originURL+this.$route.fullPath+'/initTable';
  },
  methods: {
    i18n(key) {
      return this.$i18n.translate(key);
    },
    getList() {
      this.listLoading = true;
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
    getStatus(value) {
      switch(value) {
        case 1:
          return 'Xuất bản';
        default:
          return 'Bản nháp'
      }
    },
    deleteItem(id) {
        var r = confirm("Bạn có thực sự muốn xóa dự án này?");
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
div#projects {
    border-radius: 10px;
    border: 2px solid #eee;
}
div#projects:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2);
}
</style>
