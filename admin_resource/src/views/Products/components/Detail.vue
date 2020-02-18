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
                                <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h5">
                                    <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s5" aria-expanded="true" aria-controls="settings-accordion_s5">{{$t('Excerpt')}}</a>
                                </div>
                                <div id="settings-accordion_s5" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h5" data-parent="#settings-accordion">
                                    <div class="block-content">
                                        <div class="form-group">
                                            <label for="example-wp-excerpt">{{$t('Content excerpt')}}</label>
                                            <textarea v-model="currentForm.excerpt" class="form-control" id="example-wp-excerpt" name="example-wp-excerpt" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="block mb-0">
                                <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h2">
                                    <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s2" aria-expanded="true" aria-controls="settings-accordion_s2">{{$t('Type')}}
                                        <span class="text-danger"><br>{{ errors.first('producttypes') }}</span>
                                    </a>
                                </div>
                                <div id="settings-accordion_s2" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h2" data-parent="#settings-accordion">
                                    <div class="block-content block-content-full">
                                        <div class="form-group">
                                            <div v-for="(type, cidx) in producttypes" :key="cidx" class="custom-control custom-radio custom-control-primary mb-1">
                                                <input v-validate="'required'" type="radio" v-model="selectedTypes" class="custom-control-input" :id="'input-type-' + type.id" name="producttypes" :value="type.id">
                                                <label class="custom-control-label" :for="'input-type-' + type.id">{{ type.name }}</label>
                                            </div>
                                        </div>
                                        <!-- <a class="link-fx font-size-sm" href="javascript:void(0)" @click.prevent="createDirectory()">Thêm thể loại mới</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="block mb-0">
                                <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h3">
                                    <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s3" aria-expanded="true" aria-controls="settings-accordion_s2">{{$t('Category')}}
                                        <span class="text-danger"><br>{{ errors.first('productcategories') }}</span>
                                    </a>
                                </div>
                                <div id="settings-accordion_s3" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h3" data-parent="#settings-accordion">
                                    <div class="block-content block-content-full">
                                        <div class="form-group">
                                            <div v-for="(category, cidx) in productcategories" :key="cidx" class="custom-control custom-radio custom-control-primary mb-1">
                                                <input type="radio" v-model="selectedCategories" class="custom-control-input" :id="'input-cate-' + category.id" name="productcategories" :value="category.id">
                                                <label class="custom-control-label" :for="'input-cate-' + category.id">{{ category.name }}</label>
                                            </div>
                                        </div>
                                        <!-- <a class="link-fx font-size-sm" href="javascript:void(0)" @click.prevent="createDirectory()">Thêm thể loại mới</a> -->
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
                                            <div class="font-size-sm text-muted mb-2">{{$t('Display meta description tags for product')}}</div>
                                            <textarea v-model="currentForm.meta_description" class="form-control" id="txt-description" name="txt-description" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="txt-keywords">Meta Keywords</label>
                                            <div class="font-size-sm text-muted mb-2">{{$t('Keywords for the product')}}</div>
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
                    <div class="block block-fx-pop ">
                        <div class="block-content block-content-full d-flex justify-content-between border-bottom">
                            <div >
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                    <li style="margin-top: -4px; margin-right: 5px;">
                                        <button type="button" class="btn btn-sm btn-light">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </li>
                                    <li class="breadcrumb-item"><router-link :to="'/products'">{{$t('Product')}}</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">{{$t('Edit product')}} / {{currentForm.name}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>{{$t('Create product')}}</li>
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
                            <div class="form-group">
                                <input v-validate="'required|min:1|max:200'" v-model="currentForm.name" type="text" class="form-control py-4" id="post-name" name="name" :placeholder="$t('Name')">
                                <span class="text-danger">{{ errors.first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="slug" class="form-control py-4" id="post-slug" name="post-slug" placeholder="Url ...">
                            </div>
                            <div style="display:none" class="form-group">
                                <input type="text" v-model="sku" class="form-control py-4" id="post-sku" name="post-sku" placeholder="SKU">
                            </div>
                            <div class="form-group">
                                <label for="example-wp-body">{{$t('Description')}}</label>
                                <tinymce-tinymce v-model="currentForm.body" :key= "'vue-tinymce-' + currentForm.id" />
                            </div>
                            <div class="form-group">
                                <label for="example-wp-description">{{$t('Specifications')}}</label>
                                <tinymce-tinymce v-model="currentForm.description" :key= "'vue-tinymce-' + currentForm.id" id="example-wp-description" name="example-wp-description"/>
                            </div>
                        </div>
                        <div class="block-content block-content-full border-top">
                            <div class="mb-2">
                                <button type="button" class="btn btn-sm btn-light">
                                    <i class="fa fa-plus"></i>
                                </button>
                                {{$t("Product's image")}}
                            </div>
                            <div class="row gutters-tiny js-gallery img-fluid-100 js-gallery-enabled">
                                <div class="col-md-6 col-lg-4 animated fadeIn push project-image" v-for="(image, index) in images" :key="index" >
                                    <div v-if="image && image.image  && image.image != ''">
                                        <img class="img-fluid" :src="image.image" alt="">
                                    </div>
                                    <div v-else class="btn-add-image bg-grey"></div>
                                    <div class="image-action">
                                        <a class="btn btn-sm btn-info add-image mr-1" href="javascript:void(0)" @click.prevent="openFileManager(index)">{{$t('Select picture')}}</a>
                                        <a class="btn btn-sm btn-danger remove-image" href="javascript:void(0)" @click.prevent="removeImage(index)">{{$t('Delete picture')}}</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 animated fadeIn push project-image">
                                    <div class="btn-add-image plus-button" @click.prevent="addNewImage()"> + </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full border-top">
                            <div class="mb-2">
                                <button type="button" class="btn btn-sm btn-light">
                                    <i class="fa fa-plus"></i>
                                </button>
                                {{$t('Product document')}}
                            </div>
                            <div class="row gutters-tiny js-gallery img-fluid-100 js-gallery-enabled">
                                <div class="col-md-6 col-lg-4 animated fadeIn push project-image" v-for="(catalog, index) in catalogs" :key="index" >
                                    <div v-if="catalog && catalog.catalog  && catalog.catalog != ''">
                                        <img class="img-fluid" :src="catalog.catalog" alt="">
                                    </div>
                                    <div v-else class="btn-add-image bg-grey"></div>
                                    <div class="image-action">
                                        <a class="btn btn-sm btn-info add-image mr-1" href="javascript:void(0)" @click.prevent="openFile(index)">{{$t('Select document')}}</a>
                                        <a class="btn btn-sm btn-danger remove-image" href="javascript:void(0)" @click.prevent="removeCatalog(index)">{{$t('Delete document')}}</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 animated fadeIn push project-image">
                                    <div class="btn-add-image plus-button" @click.prevent="addNewCatalog()"> + </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <add-type :editedIndex="editedIndex" :editedItem="editedItem" :slug="slug" @saveSuccess="saveSuccess()" /> -->
                <add-type :editedIndex="editedIndex" :editedItem="editedItem" :slug="slug" @saveSuccess="saveSuccess()" />
                <file-manager-popup />
            </div>
        </div>
    </main>
    <!-- END Main Container -->
</template>

<script>
    import { getApi, createApi, updateApi } from '@/api/products'
    import {listApi as typesListApi } from '@/api/producttypes'
    import {listApi as categoryListApi } from '@/api/productcategories'
    import Vue from 'vue';
    import VeeValidate from 'vee-validate';
    import { Validator } from 'vee-validate';
    import AddType from './AddType'
    import _ from 'lodash'
    import { mapMutations } from 'vuex'
    import { mapState } from 'vuex';

    var slugify = require('slugify');
    Vue.use(VeeValidate, {
        useConstraintAttrs: false
    });

    const defaultForm = {
        id: null,
        product_type_id: null,
        product_cate_id: null,
        sku:'',
        name: '',
        price:'',
        description: '',
        excerpt:'',
        slug: '',
        body: '',
        meta_description: '',
        meta_keywords: '',
        status: 1,
        producttypes: [],
        productcategories: [],
        images: [],
        catalogs: [],
        locale: 'vi'
    };
    const dictionary = {
        vi: {
            custom:{
                name:{
                    required:'Vui lòng nhập Tên sản phẩm',
                    min:"Tên ít nhất 1 kí tự",
                    max:"Tên quá dài"
                },
                producttypes:{
                    required:'Vui lòng chọn Thể loại',
                },
                // productcategories:{
                //     required:'Vui lòng chọn Danh mục',
                // }
            }
        },
        en: {
            custom:{
                name:{
                    required:"Please enter product's name",
                    min: "Name must be at least 1 character",
                    max: "The name is too long"
                },
                producttypes:{
                    required: "Please select product's type",
                },
                // productcategories: {
                //     required: "Please select product's category",
                // }
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
        components: { AddType },
        data() {
            return {
                currentForm: Object.assign({}, defaultForm),
                valid: true,
                loading: false,
                panel: [
                    false
                ],
                slug: '',
                isAutoSlug: true,
                selectedTypes: '',
                selectedCategories: '',
                editedItem: {},
                editedIndex: -1,
                images: [],
                catalogs: [],
                producttypes: [],
                productcategories: [],
            }
        },
        computed: {
            ...mapState(['locale']),
            nameRules: function(){
                if(this.locale == 'en'){
                    return [  v => v.length > 0 || "Product's name must not be blank" ]
                }else{
                    return [  v => v.length > 0 || 'Tên sản phẩm không được để trống' ]
                }
            },
            slugRules: function(){
                if(this.locale == 'en'){
                    return [  v => v.length > 0 || "Url must not be blank" ],
                        v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'The url does not contain spaces'
                }else{
                    return [
                        v => v.length > 0 || 'Url không được để trống',
                        v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
                    ]
                }
            },

            // skuRules: [
            //     v => v.length > 0 || 'Mã không được để trống',
            //     v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Mã không chứa khoảng trắng'
            // ],
            // priceRules: [
            //     v => v.length > 0 || 'Giá không được để trống',
            //     v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Giá không chứa khoảng trắng'
            // ],

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
                        message: 'Lưu sản phẩm thành công.'
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
                const id = this.$route.params && this.$route.params.product;
                this.isAutoSlug = false;
                this.getData(id)
            } else {
                this.currentForm = Object.assign({}, defaultForm)
            }
            this.listTypes()
            this.listCategories()
            if(this.locale == 'en') {
                this.$validator.localize('en');
            }
        },
        methods: {
            ...mapMutations('app', ['setSnackbar', 'setMessage']),
            listTypes() {
                typesListApi().then(response => {
                    this.producttypes = response
                }).catch(err => {
                    console.log(err)
                })
            },
            listCategories() {
                categoryListApi().then(response => {
                    this.productcategories = response
                }).catch(err => {
                    console.log(err)
                })
            },
            addNewImage() {
                this.images.push({ image: '',locale:this.locale})
            },
            removeImage(idx) {
                this.images.splice(idx, 1)
            },
            addNewCatalog() {
                this.catalogs.push({ catalog: ''})
            },
            removeCatalog(idx) {
                this.catalogs.splice(idx, 1)
            },
            getData(id) {
                getApi(id).then(response => {
                    this.currentForm = response;
                    // this.catalog_id=response.productcategories.id
                    this.slug = response.slug;
                    // this.sku = response.sku;
                    // this.name = response.name;
                    // this.price = response.price;
                    this.images = response.images;
                    this.catalogs = response.catalogs;
                    this.selectedTypes = response.producttypes.id
                    this.selectedCategories = response.productcategories.id
                }).catch(err => {
                    console.log(err)
                })
            },
            submitFormRequest(data) {
                return new Promise((resolve, reject) => {
                    if (this.isEdit) {
                        const id = this.$route.params && this.$route.params.product;
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
                // this.currentForm.sku = this.sku;
                // this.currentForm.price = this.price;
                this.currentForm.producttypes = this.selectedTypes;
                this.currentForm.productcategories = this.selectedCategories;
                this.currentForm.images = this.images;
                this.currentForm.catalogs = this.catalogs;
                this.currentForm.locale = this.locale;
                this.submitFormRequest(this.currentForm).then((response) => {
                        this.loading = false;
                        Dashmix.helpers('notify', this.notifySuccess);
                        if (!this.isEdit) {
                            this.$router.replace('/products/edit/' + response.id)
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
            openFileManager(index) {
                var _this = this;
                window.setFileToElement = function(fileurl, filepath) {
                    _this.images[index].image = filepath;
                    _this.$store.dispatch('file/closeFileManager');
                    jQuery('#modal-site-file').modal('hide')
                };
                this.$store.dispatch('file/openFileManager');
                jQuery('#modal-site-file').modal('show')
            },
            openFile(index){
                var _this = this;
                window.setFileToElement = function(fileurl, filepath) {
                    _this.catalogs[index].catalog = filepath;
                    _this.$store.dispatch('file/closeFileManager');
                    jQuery('#modal-site-file').modal('hide')
                };
                this.$store.dispatch('file/openFileManager');
                jQuery('#modal-site-file').modal('show')
            },
            createDirectory() {
                this.editedItem = {
                    id: null,
                    name: '',
                    slug: '',
                    product_category_id: null,
                    productcategories: [],
                    create_at: ''
                };
                this.editedIndex = -1;
                this.slug = '';
                jQuery('#modal-add-type').modal('show')
            },
            saveSuccess() {
                jQuery('#modal-add-type').modal('hide');
                this.listTypes();
                this.listCategories();
            }
        }
    }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
    button.btn.btn-sm.btn-light.btn-create {
        height: 30px;
    }
    select.example-select-custom {
        margin-top: -5px;
        margin-left: 10px;
    }
    span.title-kind {
        margin-top: 4px;
    }
    .btn-add-image {
        color: #7c7a7a;
        font-size: 79px;
        line-height: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #ccc;
        height: 100px;
        &.plus-button {
            cursor: pointer;
        }
        &.bg-grey {
            background: #ccc;
        }
    }

    .project-image {
        height: 100px;
        position: relative;
        img {
            width: 100%;
            height: 100px;
            object-fit: cover;
        }
        .image-action {
            position: absolute;
            right: 10px;
            top: 10px;
        }
    }
    li.breadcrumb-item.active {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .tox-dialog .tox-dialog__content-js .tox-dialog__body .tox-dialog__body-nav .tox-dialog__body-nav-item ~ div{
        display: none;
    }
</style>
