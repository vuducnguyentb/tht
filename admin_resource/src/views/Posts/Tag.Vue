<template>
  <main id="main-container">
  <div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Danh sách thẻ</h3>
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
                    <td>{{ item.name.en }}</td>
                    <td>{{ item.slug.en }}</td>
                    <td>{{ item.created_at }}</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</main>
</template>

<script>
import { listApi } from '@/api/tags'

export default {
  name: 'TagList',
  data() {
    return {
      headers: [
        {
          sortable: false,
          text: 'Tên thẻ',
          value: 'name'
        },
        {
          sortable: false,
          text: 'Slug',
          value: 'slug'
        },
        {
          sortable: false,
          text: 'Ngày tạo',
          value: 'created_at'
        }
      ],
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
    this.getList()
  },
  methods: {
    getList() {
      this.listLoading = true;
      listApi().then(response => {
        this.items = response
      })
    }
  }
}
</script>

<style scoped>

</style>
