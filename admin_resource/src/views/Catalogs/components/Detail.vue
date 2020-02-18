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
                                    <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s1" aria-expanded="true" aria-controls="settings-accordion_s1">{{$t('Status')}}</a>
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
                                    <li class="breadcrumb-item"><router-link :to="'/catalogs'">Catalog</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">{{$t('Edit Catalog')}} / {{currentForm.name}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>{{$t('Create Catalog')}}</li>
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
                            <div class="form-group">
                                <input  v-validate="'required|min:3|max:254'" v-model="currentForm.name" type="text" class="form-control py-4" id="post-name" name="name" :placeholder="$t('Catalog name')">
                                <span class="text-danger">{{ errors.first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="slug" class="form-control py-4" id="post-slug" name="post-slug" placeholder="Url ...">
                            </div>
                            <div class="form-group">
                                <label>Link: </label>
                                <div class="block-content block-content-full" @click="openFile('link')">
                                    <!-- <input type="file" v-model="currentForm.link" /> -->
                                    <div v-if="currentForm.link && currentForm.link != ''">
                                        <iframe frameborder="0" :src="currentForm.link" style="width:100%; height:500px;"></iframe>
                                        <!-- <img class="img-fluid" :src="currentForm.image" alt=""> -->
                                    </div>
                                    <div v-else class="btn-add-image"> + </div>
                                </div>
                                <!-- <object data="your_url_to_pdf" type="application/pdf">
                                   <iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" v-bind:src="iframe_url" frameborder="1" scrolling="auto" height="1100" width="1100" ></iframe>
                                </object> -->
                                <!-- <input type="text" v-model="currentForm.link" class="form-control py-4" id="post-link" name="post-link" placeholder="Link ..."> -->
                            </div>
                            <div class="form-group">
                                <tinymce-tinymce v-model="currentForm.body" :key= "'vue-tinymce-' + currentForm.id"/>
                            </div>
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
    import Vue from 'vue';
    import VeeValidate from 'vee-validate';
    import { Validator } from 'vee-validate';
    import { getApi, createApi, updateApi } from '@/api/catalogs'
    import _ from 'lodash'
    import { mapMutations } from 'vuex'
    import { mapState } from 'vuex';

    var slugify = require('slugify');

    Vue.use(VeeValidate, {
        useConstraintAttrs: false
    });
    const defaultForm = {
        id: null,
        name: '',
        link: '',
        body: '',
        image: '',
        slug: '',
        order: 0,
        status: 1,
        locale: 'vi',
    };

    const dictionary = {
        vi: {
            custom:{
                name:{
                    required:'Vui lòng nhập tên catalog',
                    min:"Tên catalog quá ngắṇ",
                    max:"Tên quá quá dài"
                }
            }
        },
      en: {
        custom:{
          name:{
            required:'Name is required',
            min:"Name is too sort",
            max:"Name is too long"
          }
        }
      },
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
        data() {
            return {
                currentForm: Object.assign({}, defaultForm),
                valid: true,
                loading: false,

                slug: '',
                isAutoSlug: true,
            }
        },
        computed: {
          ...mapState(['locale']),
          nameRules: function() {
            if(this.locale == 'en') {
              return [
                v => v.length > 0 || 'Name is required'
              ]
            }else {
              return [
                v => v.length > 0 || 'Tên không được để trống'
              ]
            }
          },
          slugRules: function() {
            if(this.locale == 'en') {
              return [
                v => v.length > 0 || 'Url is required',
                v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url can\'t include space'
              ]
            }else {
              return [
                v => v.length > 0 || 'Url không được để trống',
                v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
              ]
            }
          },
          listStatus: function() {
            if(this.locale == 'en') {
              return [
                {id: 1, 'name': 'Public'},
                {id: 0, 'name': 'Draft'}
              ]
            }else {
              return [
                {id: 1, 'name': 'Xuất bản'},
                {id: 0, 'name': 'Nháp'}
              ]
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
                message: 'Không lưu được'
              }
            }else {
              return {
                type: 'danger',
                icon: 'fa fa-times mr-1',
                message: 'Failed to save'
              }
            }
          },
        },
        watch: {
            'currentForm.name': function() {
                if (this.isAutoSlug) {
                    this.slug = slugify(_.lowerCase(this.currentForm.name))
                }
            }
        },
        created() {
            if (this.isEdit) {
                const id = this.$route.params && this.$route.params.catalog;
                this.isAutoSlug = false;
                this.getData(id)
            } else {
                this.currentForm = Object.assign({}, defaultForm)
            }
            if(this.locale == 'en') {
              this.$validator.localize('en');
            }
        },
        methods: {
            ...mapMutations('app', ['setSnackbar', 'setMessage']),
            getData(id) {
                getApi(id).then(response => {
                    this.currentForm = response
                    // this.catalog_id=response.productcategories.id
                    this.slug = response.slug
                    // this.name = response.name

                }).catch(err => {
                    console.log(err)
                })
            },
            submitFormRequest(data) {
                return new Promise((resolve, reject) => {
                    if (this.isEdit) {
                        const id = this.$route.params && this.$route.params.catalog;
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
                this.submitFormRequest(this.currentForm).then((response) => {
                        this.loading = false;
                        Dashmix.helpers('notify', this.notifySuccess);
                        if (!this.isEdit) {
                            this.$router.replace('/catalogs/edit/' + response.id)
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
            openFile(file){
                var _this = this;
                window.setFileToElement = function(fileurl, filepath) {
                    _this.currentForm[file] = filepath;
                    _this.$store.dispatch('file/closeFileManager');
                    jQuery('#modal-site-file').modal('hide')
                };
                if (file == 'link') {
                    this.$store.dispatch('file/setType', 'Images')
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
    li.breadcrumb-item.active {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
