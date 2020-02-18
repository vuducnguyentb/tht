<template>
    <main id="main-container">
        <div class="content">
            <div class="block block-rounded block-bordered" :class="{ 'block-mode-loading': listLoading }">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{$t('List comment')}}</h3>
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
                            <td>{{ item.content }}</td>
                            <td>{{ item.created_at }}</td>
                            <td class="text-center">
                                <div class="btn-group">
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
        </div>
    </main>
</template>

<script>
    import { paginateApi,deleteApi } from '@/api/comments'
    import Paginate from 'vuejs-paginate'

    export default {
        name: 'Comments',
        components: { Paginate },
        data() {
            return {
                headers: [
                    {
                        sortable: false,
                        text: 'Tên',
                        value: 'name'
                    },
                    {
                        sortable: false,
                        text: 'Nội dung',
                        value: 'content'
                    },
                    {
                        sortable: false,
                        text: 'Ngày',
                        value: 'created_at'
                    },
                    {
                        sortable: false,
                        text: 'Action',
                        value: 'action'
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
                }
            }
        },
        created() {
            this.getList()
        },
        methods: {
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

                var r = confirm("Bạn có thực sự muốn xóa bình luận này?");
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
