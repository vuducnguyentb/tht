<template>
    <main id="main-container">
        <div class="content">
            <form ref="currentxForm">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li style="margin-top: -4px; margin-right: 5px;">
                                    <button type="button" class="btn btn-sm btn-light">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </li>
                                <li class="breadcrumb-item"><router-link :to="'/list-slides'">{{$t("List Slides")}}</router-link></li>
                                <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">{{$t("Edit List Slides")}} / {{currentForm.name}}</li>
                                <li class="breadcrumb-item active" aria-current="page" v-else>{{$t("Create List Slides")}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center py-sm-3 py-md-5">
                            <div class="col-sm-10 col-md-8">
                                <div class="form-group">
                                    <label >{{$t("Name")}}</label>
                                    <input  v-validate="'required|min:6'" type="text" v-model="currentForm.name" class="form-control form-control-alt"  name="name">
                                    <span class="text-danger">{{ errors.first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label >{{$t("Key")}}</label>
                                    <input  v-validate="'required|min:6'" type="text" v-model="currentForm.key" class="form-control form-control-alt"  name="key">
                                    <span class="text-danger">{{ errors.first('key') }}</span>
                                </div>
<!--                                <div class="form-group">-->
<!--                                    <label >{{$t("Category Slug")}}</label>-->
<!--                                    <input v-validate="'required'" type="text" v-model="slug" class="form-control form-control-alt" name="slug">-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light text-right">
                        <button type="submit" class="btn btn-sm btn-success" @click.prevent="submitForm">
                            <i class="fa fa-check"></i> {{$t('Save')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</template>

<script>
    import { getApi, createApi, updateApi } from '@/api/categories';
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
        name: '',
        slug: '',
        locale: 'vi'
    };
    const dictionary = {
        vi: {
            custom:{
                name:{
                    required:'Vui lòng nhập Tên chuyên mục',
                    min:"Chủ đề ít nhất 6 kí tự",
                    max:"Chủ đề quá quá dài"
                }
            }
        },
        en: {
            custom:{
                name:{
                    required:"Please enter category's name",
                    min: "Category's name at least 6 characters",
                    max:"Category's name is too long"
                }
            }
        }

    };
    Validator.localize(dictionary);

    const validator = new Validator({ name: 'required|min' });

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
                snackbar: false,
                txtError: '',
                slug: '',
                isAutoSlug: true
            }
        },
        computed: {
            ...mapState(['locale']),
            nameRules: function(){
                if(this.locale == 'en'){
                    return [ v => v.length > 0 || 'Title cannot be empty' ]
                }
                else{
                    return [ v => v.length > 0 || 'Tiêu đề không được để trống' ]
                }
            },
            slugRules: function(){
                if(this.locale == 'en'){
                    return [
                        v => v.length > 0 || 'Slug cannot be empty',
                        v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Slug does not contain spaces'
                    ]
                }
                else{
                    return [
                        v => v.length > 0 || 'Slug không được để trống',
                        v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Slug không chứa khoảng trắng'
                    ]
                }

            },
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
                        message: 'Lưu slide thành công.'
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
                const id = this.$route.params && this.$route.params.category;
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

                }).catch(err => {
                    console.log(err)
                })
            },
            submitFormRequest(data) {
                return new Promise((resolve, reject) => {
                    if (this.isEdit) {
                        const id = this.$route.params && this.$route.params.category;
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
                this.currentForm.slug = this.slug;
                this.currentForm.locale= this.locale;

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.loading = true;
                        this.submitFormRequest(this.currentForm).then((response) => {
                            /*
                            console.log('Categories submitFormRequest->respone id:');
                            console.log(response.id);
                             */
                                this.loading = false;
                                Dashmix.helpers('notify', this.notifySuccess);
                                if (!this.isEdit) {
                                    // this.$router.push({path: '/users'})
                                    this.$router.replace('/categories/edit/' + response.id)
                                }
                            },
                            () => {
                                this.loading = false;
                                Dashmix.helpers('notify', this.notifyUnSuccess)
                            })
                    }
                });
            },
            openFileManager(model) {
                var _this = this;
                window.setFileToElement = function(fileurl, filepath) {
                    _this.currentForm[model] = fileurl;
                    _this.$store.dispatch('file/closeFileManager')
                };
                this.$store.dispatch('file/openFileManager')
            }
        }
    }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>

</style>
