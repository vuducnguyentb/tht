<template>
<main id="main-container">
  <div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{$t('List testimonials')}}</h3>
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
                    <td>{{ item.author }}</td>
                    <td>{{ getStatus(item.status) }}</td>
                    <td>{{  moment( item.created_at, 'YYYY-MM-DD').format('DD/MM/YYYY') }}</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <router-link :to="'/testimonials/edit/' + item.id">
                        <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled mr-1" data-toggle="tooltip" title="" data-original-title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        </router-link>
                          <a>
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
</main>
</template>

<script>
import { listApi,deleteApi } from '@/api/testimonials'

export default {
  name: 'TestimonialsList',
  data() {
    return {
      headers: [
        {
          sortable: false,
          text: 'Khách hàng',
          value: 'title'
        },
        {
          sortable: false,
          text: 'Trạng thái',
          value: 'status'
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
    getStatus(value) {
      switch(value) {
        case 1:
          return 'Xuất bản';
        default:
          return 'Bản nháp'
      }
    },
      deleteItem(id) {

          var r = confirm("Bạn có thực sự muốn xóa bài đánh giá này?");
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
