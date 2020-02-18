<template>
    <!-- Vertically Centered Block Modal -->
    <div class="modal" id="modal-add-type" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">{{ formTitle }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form ref="currentxForm">
                            <div class="block-content">
                                <div class="row justify-content-center py-sm-3 py-md-5">
                                    <div class="col-sm-10 col-md-8">
                                        <div class="form-group">
                                            <label for="block-form8-username">Tên</label>
                                            <input type="text"  v-model="currentForm.name" class="form-control form-control-alt" id="block-form8-username" name="block-form8-username" placeholder="Nhập tên">
                                        </div>
                                        <div class="form-group">
                                            <label for="block-form9-username">Url</label>
                                            <input type="text" v-model="slug" class="form-control form-control-alt" id="block-form9-username" name="block-form9-username" placeholder="Nhập url">
                                        </div>
                                        <div class="form-group">
                                            <label for="block-form9-username">Danh mục</label>
                                            <div v-for="(category, cidx) in productcategories" :key="cidx" class="custom-control custom-radio custom-control-primary mb-1">
                                                <input type="radio" v-model="selectedCategories" class="custom-control-input" :id="'input-cate-' + category.id" name="productcategories[]" :value="category.id">
                                                <label class="custom-control-label" :for="'input-cate-' + category.id">{{ category.name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Huỷ bỏ</button>
                        <button type="button" class="btn btn-sm btn-primary" @click="submitForm">Lưu lại</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Vertically Centered Block Modal -->
</template>

<script>
    import { getApi, updateApi, createApi } from '@/api/producttypes'
    import {getApi as getApiProductCategories,listApi as categoriesListApi } from '@/api/productcategories'
    import _ from 'lodash'
    import { mapMutations } from 'vuex'
    var slugify = require('slugify');

    const defaultForm = {
        id: null,
        product_category_id:null,
        name: '',
        slug: '',
        productcategories: [],
    };

    export default {
        name: 'AddType',
        props: {
            isEdit: {
                type: Boolean,
                default: false
            },
            editedItem: {
                type: Object,
                default: {
                    id: null,
                    product_category_id: null,
                    productcategories:[],
                    name: '',
                    slug: '',
                    create_at: ''
                }
            },
            editedIndex: {
                type: Number,
                default: -1
            },
            slug: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
                currentForm: Object.assign({}, defaultForm),
                valid: true,
                loading: false,
                nameRules: [
                    v => v.length > 0 || 'Tên không được để trống'
                ],
                slugRules: [
                    v => v.length > 0 || 'Url không được để trống',
                    v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
                ],
                productcategories: [],
                panel: [
                    false
                ],
                slug: '',
                isAutoSlug: true,
                selectedCategories: [],
                editedItem: {},
                editedIndex: -1,
            }
        },
        computed: {
            formTitle() {
                return this.editedIndex === -1 ? 'Tạo mới thể loại' : 'Sửa thể loại'
            },
            isEdit() {
                return this.editedIndex === -1 ? false : true;
            }
        },
        watch: {
            'currentForm.name': function() {
                if (!this.isEdit) {
                    this.slug = slugify(_.lowerCase(this.currentForm.name))
                }
            }
        },
        created() {
            if (this.isEdit) {
                const id = this.$route.params && this.$route.params.id;
                this.isAutoSlug = false;
                this.getData(id)
            } else {
                this.currentForm = Object.assign({}, defaultForm)
            }
            this.listCategories()
        },
        methods: {
            ...mapMutations('app', ['setSnackbar', 'setMessage']),
            listCategories() {
                categoriesListApi().then(response => {
                    this.productcategories = response
                }).catch(err => {
                    console.log(err)
                })
            },
            getData(id) {
//                 getApiProductCategories(id).then(response => {
//                     this.currentForm = response;
//                     this.slug = response.slug;

                getApi(id).then(response => {
                    this.currentForm = response
                    this.slug = response.slug
                    this.selectedCategories = response.productcategories.id
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
                this.currentForm.slug = this.slug;
                this.currentForm.productcategories = this.selectedCategories;
                this.submitFormRequest(this.currentForm).then((response) => {
                        this.loading = false;
                        Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu thành công'});
                        this.$emit('saveSuccess')
                    },
                    () => {
                        this.loading = false;
                        Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Xảy ra lỗi. Vui lòng thử lại.'})
                    })
                // }
            }

            // createDirectory() {
            //     this.editedItem = {
            //         id: null,
            //         name: '',
            //         slug: '',
            //         create_at: ''
            //     };
            //     this.editedIndex = -1;
            //     this.slug = '';
            //     jQuery('#modal-add-type').modal('show')
            // },
            // saveNewDirectorySuccess() {
            //     jQuery('#modal-add-category').modal('hide');
            //     this.listCategories()
            // }

            // createDirectory() {
            //     this.newDirectoryItem = {
            //         id: null,
            //         name: '',
            //         slug: '',
            //         create_at: ''
            //     }
            //     this.newDirectoryIndex = -1
            //     this.newDirectorySlug = ''
            //     jQuery('#modal-add-type').modal('show')
            // },
            // saveNewDirectorySuccess() {
            //     jQuery('#modal-add-type').modal('hide')
            //     this.listCategories()
            // }

        }
    }
















    // export default {
    //     name: 'AddType',
    //     props: {
    //         editedItem: {
    //             type: Object,
    //             defaultForm: {
    //                 id: null,
    //                 // product_category_id: null,
    //                 name: '',
    //                 slug: '',
    //                 productcategories: [],
    //                 selectedCategories:'',
    //                 create_at: ''
    //             }
    //         },
    //         editedIndex: {
    //             type: Number,
    //             default: -1
    //         },
    //         slug: {
    //             type: String,
    //             default: ''
    //         },
    //     },
    //     data() {
    //         return {
    //             // slug: '',
    //             // name: '',
    //             // selectedCategories: '',
    //             editedItem: Object.assign({}, defaultForm),
    //             valid: true,
    //             loading: false,
    //             nameRules: [
    //                 v => v.length > 0 || 'Tên không được để trống'
    //             ],
    //             projectcategories: [],
    //             panel: [
    //                 false
    //             ],
    //             slug: '',
    //             isAutoSlug: true,
    //             selectedCategories: [],
    //             newDirectoryItem: {},
    //             newDirectoryIndex: -1,
    //             newDirectorySlug: '',
    //         }
    //     },
    //     computed: {
    //         formTitle() {
    //             return this.editedIndex === -1 ? 'Tạo mới thể loại' : 'Sửa thể loại'
    //         },
    //         isEdit() {
    //             return this.editedIndex === -1 ? false : true;
    //         },
    //         // 'currentForm.title': function() {
    //         //     if (this.isAutoSlug) {
    //         //         this.slug = slugify(_.lowerCase(this.currentForm.title))
    //         //     }
    //         // }
    //     },
    //     watch: {
    //         'editedItem.name': function() {
    //             if (!this.isEdit) {
    //                 this.slug = slugify(_.lowerCase(this.editedItem.name))
    //             }
    //         }
    //     },
    //     methods: {
    //         getData(id) {
    //             getApi(id).then(response => {
    //                 this.editedItem = response
    //                 this.slug = response.slug
    //                 this.selectedCategories = response.productcategories.id
    //             }).catch(err => {
    //                 console.log(err)
    //             })
    //         },
    //         submitFormRequest(data) {
    //             return new Promise((resolve, reject) => {
    //                 if (this.isEdit) {
    //                     const id = data.id
    //                     updateApi(id, data).then(response => {
    //                         resolve(response)
    //                     }).catch(err => {
    //                         reject(err)
    //                     })
    //                 } else {
    //                     createApi(data).then(response => {
    //                         resolve(response)
    //                     }).catch(err => {
    //                         reject(err)
    //                     })
    //                 }
    //             })
    //         },
    //         submitForm() {
    //             // if(this.$refs.currentxForm.validate()) {
    //             this.loading = true
    //             this.editedItem.slug = this.slug
    //             this.editedItem.productcategories = this.selectedCategories
    //             this.submitFormRequest(this.editedItem).then(() => {
    //                     this.loading = false
    //                     Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu thành công'})
    //                     this.$emit('saveSuccess')
    //                 },
    //                 () => {
    //                     this.loading = false
    //                     Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Xảy ra lỗi. Vui lòng thử lại.'})
    //                 })
    //             // }
    //         }
    //     }
    // }
</script>

<style scoped>

</style>
