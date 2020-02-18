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
                                    <li class="breadcrumb-item"><router-link :to="'/producttypes'">{{$t('Type')}}</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">{{$t('Edit Type')}} / {{currentForm.name}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>{{$t('Create Type')}}</li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                                    </ol>
                                </nav>
          </div>
          <div class="block-content">
                        <form ref="currentxForm">
                                <div class="row justify-content-center py-sm-3">
                                    <div class="col-sm-10 col-md-8">
                                        <div class="form-group">
                                            <label for="block-form8-username">{{$t('Name')}}</label>
                                            <input type="text" v-validate="'required|min:1'" v-model="currentForm.name" class="form-control form-control-alt" id="block-form8-username" name="name">
                                            <span class="text-danger">{{ errors.first('name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="block-form9-username">Url</label>
                                            <input type="text" v-model="slug" class="form-control form-control-alt" id="block-form9-username" name="block-form9-username">
                                        </div>
                                         <div class="form-group">
                                             <label for="block-form9-username">{{$t('Category')}}</label>
                                             <span class="text-danger"><br>{{ errors.first('productcategories') }}</span>
                                             <div v-for="(category, cidx) in productcategories" :key="cidx" class="custom-control custom-radio custom-control-primary mb-1">
                                                <input v-validate="'required'" type="radio" v-model="selectedCategories"  class="custom-control-input" :id="'input-cate-' + category.id" name="productcategories" :value="category.id" >
                                                <label class="custom-control-label" :for="'input-cate-' + category.id">{{ category.name }}</label>
                                            </div>
                                         </div>
                                    </div>
                                </div>

                        </form>
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

import { getApi, updateApi, createApi } from '@/api/producttypes'
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import { Validator } from 'vee-validate';
import {getApi as getApiProductCategories,listApi as categoriesListApi } from '@/api/productcategories'
import _ from 'lodash'
import { mapMutations } from 'vuex'
import { mapState } from 'vuex';

var slugify = require('slugify');
Vue.use(VeeValidate, {
    useConstraintAttrs: false
});
 const defaultForm = {
        id: null,
        product_category_id:null,
        name: '',
        slug: '',
        productcategories: [],
        locale: 'vi',
    };
const dictionary = {
    vi: {
        custom:{
            name:{
                required:'Vui lòng nhập Tiêu đề',
                // min:"Tiêu đề ít nhất 1 kí tự"
            },
            productcategories:{
                required:'Vui lòng chọn thể loại'
            }
        }
    },
    en: {
        custom:{
            name:{
                required:'Please enter title',
                // min:"Tiêu đề ít nhất 1 kí tự"
            },
            productcategories:{
                required: "Please select product's type"
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
                productcategories: [],
                panel: [
                    false
                ],
                slug: '',
                isAutoSlug: true,
                selectedCategories: [],
                // editedItem: {},
                // editedIndex: -1,
            }
        },
          computed: {
              ...mapState(['locale']),
              nameRules: function(){
                  if(this.locale == 'en'){
                      return [  v => v.length > 0 || 'Name cannot be empty' ]
                  }
                  else{
                      return [  v => v.length > 0 || 'Tên không được để trống' ]
                  }
              },
              slugRules: function(){
                  if(this.locale == 'en')
                  {
                      return [
                          v => v.length > 0 || 'Url cannot be empty',
                          v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url does not contain spaces'
                      ]
                  }
                  else{
                      return [
                          v => v.length > 0 || 'Url không được để trống',
                          v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
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
                          message: 'Lưu thể loại sản phẩm thành công.'
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
                const id = this.$route.params && this.$route.params.producttype;
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
                    this.productcategories = response
                }).catch(err => {
                    console.log(err)
                })
            },
            getData(id) {
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
                        const id = this.$route.params && this.$route.params.producttype;
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
                this.currentForm.productcategories = this.selectedCategories;
                this.currentForm.locale = this.locale;
                this.submitFormRequest(this.currentForm).then((response) => {
                        this.loading = false;
                        Dashmix.helpers('notify', this.notifySuccess);
                        this.$emit('saveSuccess')
                    },
                    () => {
                        this.loading = false;
                        Dashmix.helpers('notify', this.notifyUnSuccess)
                    })
                    }
                });
                // }
            }
  }
}
</script>
