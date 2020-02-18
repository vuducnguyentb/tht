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
                              <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s1" aria-expanded="true" aria-controls="settings-accordion_s1">{{$t('Post status')}}</a>
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
                                  <!-- <div class="form-group row">
                                      <label class="col-sm-4 col-form-label" for="example-wp-format">Post Format</label>
                                      <div class="col-sm-8">
                                          <select class="custom-select" id="example-wp-format" name="example-wp-format">
                                              <option value="1">Gallery</option>
                                              <option value="2">Link</option>
                                              <option value="3">Image</option>
                                              <option value="4">Quote</option>
                                              <option value="5" selected>Standard</option>
                                              <option value="6">Video</option>
                                              <option value="7">Audio</option>
                                          </select>
                                      </div>
                                  </div> -->

                                  <!-- <div class="form-group row">
                                      <label class="col-sm-4 col-form-label" for="example-wp-author">Author</label>
                                      <div class="col-sm-8">
                                          <select class="custom-select" id="example-wp-author" name="example-wp-author">
                                              <option value="1" selected>Admin</option>
                                              <option value="2">Author #1</option>
                                              <option value="3">Author #2</option>
                                          </select>
                                      </div>
                                  </div> -->
                              </div>
                          </div>
                      </div>
                      <div class="block mb-0">
                          <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h5">
                              <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s5" aria-expanded="true" aria-controls="settings-accordion_s5">{{$t('Excerpt')}}</a>
                          </div>
                          <div id="settings-accordion_s5" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h5" data-parent="#settings-accordion">
                              <div class="block-content">
                                  <div class="form-group">
                                      <label for="example-wp-excerpt">{{$t('Summary content')}}</label>
                                      <textarea v-model="currentForm.excerpt" class="form-control" id="example-wp-excerpt" name="example-wp-excerpt" rows="4"></textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="block mb-0">
                          <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h2">
                              <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s2" aria-expanded="true" aria-controls="settings-accordion_s2">{{$t('Category')}}
                                  <span class="text-danger"> <br>   {{ errors.first('categories') }}</span>
                              </a>
                          </div>
                          <div id="settings-accordion_s2" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h2" data-parent="#settings-accordion">
                              <div class="block-content block-content-full">
                                  <div class="form-group">
                                      <div v-for="(category, cidx) in categories" :key="cidx" class="custom-control custom-checkbox custom-control-primary mb-1">
                                          <input v-validate="'required'" type="checkbox" v-model="selectedCategories" class="custom-control-input" :id="'input-cate-' + category.id" name="categories" :value="category.id">
                                          <label class="custom-control-label" :for="'input-cate-' + category.id">{{ category.name }}</label>
                                      </div>
                                  </div>
<!--                                  <a class="link-fx font-size-sm" href="javascript:void(0)" @click.prevent="createDirectory()">Thêm chuyên mục mới</a>-->
                              </div>
                          </div>
                      </div>
<!--                      <div class="block mb-0">-->
<!--                          <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h3">-->
<!--                              <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s3" aria-expanded="true" aria-controls="settings-accordion_s3">Tags</a>-->
<!--                          </div>-->
<!--                          <div id="settings-accordion_s3" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h3" data-parent="#settings-accordion">-->
<!--                              <div class="block-content">-->
<!--                                  <div class="form-group">-->
<!--                                      &lt;!&ndash; Select2 (.js-select2 class is initialized in Helpers.select2()) &ndash;&gt;-->
<!--                                      &lt;!&ndash; For more info and examples you can check out https://github.com/select2/select2 &ndash;&gt;-->
<!--                                      <label for="example-wp-tags">Gắn Tags bài viết</label>-->
<!--                                      <select class="js-select2 form-control" id="example-wp-tags" name="example-wp-tags" style="width: 100%;" multiple>-->
<!--                                          <option value="1" selected>tutorial</option>-->
<!--                                          <option value="2">css</option>-->
<!--                                          <option value="3">javascript</option>-->
<!--                                          <option value="4">php</option>-->
<!--                                          <option value="5">python</option>-->
<!--                                          <option value="6">ruby</option>-->
<!--                                          <option value="7">angular</option>-->
<!--                                          <option value="8">react</option>-->
<!--                                          <option value="9">vuejs</option>-->
<!--                                      </select>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                      </div>-->
                      <div class="block mb-0">
                      <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h4">
                          <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s4" aria-expanded="true" aria-controls="settings-accordion_s4">{{$t('Avatar')}}</a>
                      </div>
                      <div id="settings-accordion_s4" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h4" data-parent="#settings-accordion">
                          <div class="block-content block-content-full" @click="openFileManager('image')">
                              <input type="hidden" v-model="currentForm.image" />
                              <div v-if="currentForm.image && currentForm.image != ''">
                                  <img class="img-fluid" :src="currentForm.image" alt="">
                              </div>
                              <div v-else class="btn-add-image"> + </div>
                          </div>
                      </div>
                  </div>
                      <div class="block mb-0">
                          <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h7">
                              <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s7" aria-expanded="true" aria-controls="settings-accordion_s7">SEO</a>
                          </div>
                          <div id="settings-accordion_s7" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h7" data-parent="#settings-accordion">
                              <div class="block-content">
                                  <div class="form-group">
                                      <label for="txt-description">Meta Description</label>
                                      <div class="font-size-sm text-muted mb-2">{{$t('Display meta description tags for post')}}</div>
                                      <textarea v-model="currentForm.meta_description" class="form-control" id="txt-description" name="txt-description" rows="4"></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="txt-keywords">Meta Keywords</label>
                                      <div class="font-size-sm text-muted mb-2">{{$t('Keywords for the post')}}</div>
                                      <textarea v-model="currentForm.meta_keywords" class="form-control" id="txt-keywords" name="txt-keywords" rows="4"></textarea>
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
                                    <li class="breadcrumb-item"><router-link :to="'/posts'">{{$t('Post')}}</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">{{$t('Edit post')}} / {{currentForm.title}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>{{$t('Create post')}}</li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                                    </ol>
                                </nav>
                      </div>
                      <div>
                          <!-- <a class="btn btn-sm btn-secondary" href="javascript:void(0)">Preview</a> -->
                          <a class="btn btn-sm btn-info" href="javascript:void(0)" @click.prevent="submitForm">{{$t('Save')}}</a>
                      </div>
                  </div>
                  <div class="block-content">
                      <form method="POST" onsubmit="return false;">
                          <div class="form-group">
                              <input v-validate="'required|min:1|max:254'" v-model="currentForm.title" type="text" class="form-control py-4" id="post-title" name="title" :placeholder="$t('Title')">
                              <span class="text-danger">{{ errors.first('title') }}</span>
                          </div>
                          <div class="form-group">
                            <input type="text" v-model="slug" class="form-control py-4" id="post-slug" name="post-slug" placeholder="Url ...">
                          </div>
                          <div class="form-group">
                              <tinymce-tinymce v-model="currentForm.body" :key= "'vue-tinymce-' + currentForm.id"/>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <!-- END Main Content -->
      </div>
  </div>
  <!-- END Page Content -->
  <add-category :editedIndex="newDirectoryIndex" :editedItem="newDirectoryItem" :slug="newDirectorySlug" @saveSuccess="saveNewDirectorySuccess()" />
  <file-manager-popup />
</main>
<!-- END Main Container -->
</template>

<script>
import { getApi, createApi, updateApi } from '@/api/posts'
import { createApi as categoriesCreateApi, listApi as categoriesListApi } from '@/api/categories'
import AddCategory from './AddCategory'
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import { Validator } from 'vee-validate';
import _ from 'lodash'
import { mapMutations } from 'vuex'

import { mapState } from 'vuex';

var slugify = require('slugify');
Vue.use(VeeValidate, {
    useConstraintAttrs: false
});

const defaultForm = {
  id: null,
  title: '',
  slug: '',
  excerpt: '',
  body: '',
  image: '',
  meta_description: '',
  meta_keywords: '',
  status: 1,
  categories: [],
    locale: 'vi'
};
const dictionary = {
    vi: {
        custom:{
            title:{
                required:'Vui lòng nhập Tiêu đề',
                min:"Tiêu đề ít nhất 1 kí tự",
                max:"Tiêu đề quá dài"
            },
            categories:{
                required:'Vui lòng chọn Chuyên mục',
            }
        }
    },
    en: {
      custom:{
        title:{
          required:'Title is required',
          min:"Title at least 1 characteṛ",
          max:"Title too long"
        },
        categories:{
          required:'Category is required',
        }
      }
    }
};
Validator.localize(dictionary);

const validator = new Validator({ first_name: 'min',second_name:'required' });

validator.localize('vi');

export default {
  name: 'Detail',
  props: {
    isEdit: {
      type: Boolean,
      default: false
    }
  },
  components: { AddCategory },
  data() {
    return {
      currentForm: Object.assign({}, defaultForm),
      valid: true,
      loading: false,
      categories: [],
      panel: [
        false
      ],
      slug: '',
      isAutoSlug: true,
      selectedCategories: [],
      newDirectoryItem: {},
      newDirectoryIndex: -1,
      newDirectorySlug: ''
    }
  },
  computed: {
      ...mapState(['locale']),
    listStatus: function() {
        if(this.locale =='en') {
          return [
            {id: 1, 'name': 'Publish'},
            {id: 0, 'name': 'Draft'}
          ];
        }else{
          return [
            {id: 1, 'name': 'Xuất bản'},
            {id: 0, 'name': 'Bản nháp'}
          ];
        }
    },
    titleRules: function() {
        if(this.locale == 'en') {
          return [  v => v.length > 0 || 'Title is required'];
        }else {
          return [  v => v.length > 0 || 'Tiêu đề không được để trống'];
        }
    },
    notifySuccess: function() {
       if(this.locale == 'en') {
         return {
           type: 'success',
           icon: 'fa fa-success mr-1',
           message: 'Save successfully'
         }
       }else {
         return {
           type: 'success',
           icon: 'fa fa-success mr-1',
           message: 'Lưu bài viết thành công.'
         }
       }
    },
    notifyUnSuccess: function() {
      if(this.locale == 'en') {
        return {
          type: 'danger',
          icon: 'fa fa-times mr-1',
          message: 'Failed to save'
        }
      }else {
        return {
          type: 'danger',
          icon: 'fa fa-times mr-1',
          message: 'Không lưu được'
        }
      }
    },
    slugRules: function() {
        if(this.locale == 'en') {
          return [
            v => v.length > 0 || 'Url is required',
            v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url can not include space'
          ];
        }else {
          return [
            v => v.length > 0 || 'Url không được để trống',
            v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
          ];
        }
    }
  },
    watch: {
    'currentForm.title': function() {
      if (this.isAutoSlug) {
        this.slug = slugify(_.lowerCase(this.currentForm.title))
      }
    }
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.post;
      this.isAutoSlug = false;
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
    this.listCategories()
    if(this.locale == 'en') {
      this.$validator.localize('en');
    }
  },
  methods: {
    ...mapMutations('app', ['setSnackbar', 'setMessage']),
    listCategories() {
      categoriesListApi().then(response => {
        this.categories = response
      }).catch(err => {
        console.log(err)
      })
    },
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response;
        this.slug = response.slug;
        this.selectedCategories = response.categories.map(el => el.id)
      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.post;
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
        this.$validator.validateAll().then((result) => {
            if (result) {
          this.loading = true;
          this.currentForm.slug = this.slug;
          this.currentForm.locale = this.locale;
          this.currentForm.categories = this.selectedCategories;
          this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false;
            Dashmix.helpers('notify', this.notifySuccess);
            if (!this.isEdit) {
              this.$router.replace('/posts/edit/' + response.id)
            }
          },
          () => {
            this.loading = false;
            Dashmix.helpers('notify', this.notifyUnSuccess)
          })
            }
        });
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
    },
    createDirectory() {
      this.newDirectoryItem = {
        id: null,
        name: '',
        slug: '',
        create_at: ''
      };
      this.newDirectoryIndex = -1;
      this.newDirectorySlug = '';
      jQuery('#modal-add-category').modal('show')
    },
    saveNewDirectorySuccess() {
      jQuery('#modal-add-category').modal('hide');
      this.listCategories()
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
  li.breadcrumb-item.active {
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
  }
</style>
