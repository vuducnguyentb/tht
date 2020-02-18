<template>
    <!-- Vertically Centered Block Modal -->
    <div class="modal" id="modal-add-category" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
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
                                            <input type="text" v-validate="'required|min:1'" v-model="editedItem.name" class="form-control form-control-alt" id="block-form8-username" name="name" placeholder="Nhập tên">
                                            <span class="text-danger">{{ errors.first('name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="block-form9-username">Url</label>
                                            <input type="text" v-model="slug" class="form-control form-control-alt" id="block-form9-username" name="block-form9-username" placeholder="Nhập url">
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
    import { updateApi, createApi } from '@/api/servicecategories'
    import Vue from 'vue';
    import VeeValidate from 'vee-validate';
    import { Validator } from 'vee-validate';
    import _ from 'lodash'
    var slugify = require('slugify');
    Vue.use(VeeValidate, {
        useConstraintAttrs: false
    });
    const dictionary = {
        vn: {
            custom:{
                name:{
                    required:'Vui lòng nhập Tên',
                    min:"Tên ýt nhất 1 kí tự"
                }
            }
        }
    };
    Validator.localize(dictionary);

    const validator = new Validator({ first_name: 'min',second_name:'required' });

    validator.localize('vn');

    export default {
        name: 'AddCategory',
        props: {
            editedItem: {
                type: Object,
                default: {
                    id: null,
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
            }
        },
        computed: {
            formTitle() {
                return this.editedIndex === -1 ? 'Tạo mới danh mục' : 'Sửa danh mục'
            },
            isEdit() {
                return this.editedIndex === -1 ? false : true;
            }
        },
        watch: {
            'editedItem.name': function() {
                if (!this.isEdit) {
                    this.slug = slugify(_.lowerCase(this.editedItem.name))
                }
            }
        },
        methods: {
            submitFormRequest(data) {
                return new Promise((resolve, reject) => {
                    if (this.isEdit) {
                        const id = data.id;
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
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.loading = true;
                        this.editedItem.slug = this.slug;
                        this.submitFormRequest(this.editedItem).then(() => {
                                this.loading = false;
                                Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu thành công'});
                                this.$emit('saveSuccess')
                            },
                            () => {
                                this.loading = false;
                                Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Xảy ra lỗi. Vui lòng thử lại.'})
                            })
                    }
                });
                // }
            }
        }
    }
</script>

<style scoped>

</style>
