<template>
<main id="main-container">
  <!-- Page Content -->
  <div class="row no-gutters flex-md-10-auto">
      <div class="col-md-4 col-lg-5 col-xl-3 order-md-1 bg-white">
          <div class="content p-0">
              <!-- Toggle Settings -->
              <div class="d-md-none p-3">
                  <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                  <button type="button" class="btn btn-block btn-hero-primary" data-toggle="class-toggle" data-target="#side-content" data-class="d-none">
                       {{$t('Setting')}}
                  </button>
              </div>
              <!-- END Toggle Settings -->

              <!-- Settings -->
              <div id="side-content" class="d-none d-md-block push">
                  <div id="settings-accordion" role="tablist" aria-multiselectable="true">
                      <div class="block mb-0">
                          <div class="block-header block-header-default p-0" role="tab" id="settings-accordion_h1">
                              <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s1" aria-expanded="true" aria-controls="settings-accordion_s1"> {{$t('Status')}}</a>
                          </div>
                          <div id="settings-accordion_s1" class="collapse show" role="tabpanel" aria-labelledby="settings-accordion_h1" data-parent="#settings-accordion">
                              <div class="block-content">
                                  <div class="form-group row">
                                      <div class="col-12">
                                          <select v-model="currentForm.status" class="custom-select" id="example-wp-visibility" name="example-wp-visibility">
                                              <option v-for="(status, oidx) in listStatus" :value="status.id" :key="oidx"> {{ status.name}}</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- END Settings -->
          </div>
      </div>
      <div class="col-md-8 col-lg-7 col-xl-9 order-md-0 bg-body-dark">
          <!-- Main Content -->
          <div class="content content-full">
              <div class="block block-fx-pop">
                  <div class="block-content block-content-full d-flex justify-content-between border-bottom">
                      <div>
                          <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li style="margin-top: -4px; margin-right: 5px;">
                                        <button type="button" class="btn btn-sm btn-light">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </li>
                                    <li class="breadcrumb-item">{{$t('Customer reviews')}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">{{$t('Edit')}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>{{$t('Add')}}</li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                                    </ol>
                                </nav>
                      </div>
                      <div>
                          <!-- <a class="btn btn-sm btn-secondary" href="javascript:void(0)">Preview</a> -->
                          <a class="btn btn-sm btn-info" href="javascript:void(0)" @click.prevent="submitForm">{{$t('Save')}}</a>
                      </div>
                  </div>
                  <div class="block-content block-content-full">
                    <div class="row">
                      <div class="col-md-6 col-xl-4">
                        <div class="block block-link-pop text-right border p-1">
                          <div class="avatar-box">
                              <input type="hidden" v-model="currentForm.avatar" />
                              <a href="#" @click.prevent="openFileManager('avatar')">
                                <img v-if="currentForm.avatar && currentForm.avatar != ''" class="img-avatar img-avatar-thumb img-avatar-rounded" :src="currentForm.avatar"  alt="">
                                <img v-else class="img-avatar img-avatar-thumb img-avatar-rounded" src="/admin-resources/media/avatars/avatar9.jpg"  alt="">
                              </a>
                          </div>
                          <div class="author-box">
                              <div class="form-group">
                                  <input v-model="currentForm.author" type="text" class="form-control" placeholder="Tên khách hàng...">
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-xl-8">
                        <div class="form-group">
                          <textarea v-model="currentForm.content" class="form-control" rows="4" placeholder="Đánh giá của khách hàng"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <!-- END Main Content -->
      </div>
  </div>
  <!-- END Page Content -->
  <file-manager-popup />
</main>
<!-- END Main Container -->
</template>

<script>
import { getApi, createApi, updateApi } from '@/api/testimonials'
import _ from 'lodash'
import { mapMutations } from 'vuex'
const defaultForm = {
  id: null,
  avatar: '',
  author: '',
  content: '',
  status: 1,
  order: 0

};

export default {
  name: 'Detail',
  props: {
    isEdit: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      currentForm: Object.assign({}, defaultForm),
      valid: true,
      loading: false,
      titleRules: [
        v => v.length > 0 || 'Tiêu đề không được để trống'
      ],
      slugRules: [
        v => v.length > 0 || 'Url không được để trống',
        v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
      ],
      listStatus: [
        {id: 1, 'name': 'Xuất bản'},
        {id: 0, 'name': 'Bản nháp'}
      ],
    }
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.id;
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
  },
  methods: {
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response
      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.id;
          updateApi(id, data).then(response => {
            resolve(response)
          }).catch(err => {
            console.log(err);
            reject(err)
          })
        } else {
          createApi(data).then(response => {
            resolve(response)
          }).catch(err => {
            console.log(err);
            reject(err)
          })
        }
      })
    },
    submitForm() {
      // if(this.$refs.currentxForm.validate()) {
          this.loading = true;
          this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false;
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu dữ liệu thành công.'});
            if (!this.isEdit) {
              this.$router.replace('/testimonials/edit/' + response.id)
            }
          },
          () => {
            this.loading = false;
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Không lưu được. Vui lòng lưu lại bài viết bằng công cụ khác. Reload và thử lại.'})
          })
      // }
    },
    openFileManager(model) {
      var _this = this;
      window.setFileToElement = function(fileurl, filepath) {
        _this.currentForm[model] = filepath;
        _this.$store.dispatch('file/closeFileManager');
        jQuery('#modal-site-file').modal('hide')
      };
      if (model == 'video') {
        this.$store.dispatch('file/setType', 'Files')
      }
      this.$store.dispatch('file/openFileManager');
      jQuery('#modal-site-file').modal('show')
    }
  }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
  .btn-add-image {
    color: #7c7a7a;
    font-size: 79px;
    line-height: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #ccc;
  }
</style>
