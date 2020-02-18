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
                                    <li class="breadcrumb-item"><router-link :to="'/producttypes'">Danh mục</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa Danh mục / {{currentForm.name}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>Thêm Danh mục mới</li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                                    </ol>
                                </nav>
          </div>
          <div class="block-content">
                        <form ref="currentxForm">
                                <div class="row justify-content-center py-sm-3">
                                    <div class="col-sm-10 col-md-8">
                                        <div class="form-group">
                                            <label for="block-form8-username">Tên danh mục</label>
                                            <input type="text" v-validate="'required|min:1'" v-model="currentForm.name" class="form-control form-control-alt" id="block-form8-username" name="name" placeholder="Nhập tên">
                                            <span class="text-danger">{{ errors.first('name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="block-form9-username">Url</label>
                                            <input type="text" v-model="slug" class="form-control form-control-alt" id="block-form9-username" name="block-form9-username" placeholder="Nhập url">
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
          <div class="block-content block-content-full block-content-sm bg-body-light text-right">
              <button type="submit" class="btn btn-sm btn-success" @click.prevent="submitForm">
                  <i class="fa fa-check"></i> Lưu lại
              </button>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>

<script>

import { updateApi, createApi } from '@/api/projectcategories'
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import { Validator } from 'vee-validate';
    import _ from 'lodash'
    import { mapMutations } from 'vuex'
    var slugify = require('slugify');
Vue.use(VeeValidate, {
    useConstraintAttrs: false
});
 const defaultForm = {
        id: null,
        name: '',
        slug: ''
    };
const dictionary = {
    vn: {
        custom:{
            name:{
                required:'Vui lòng nhập Tên danh mục',
                min:"Tiêu đề ít nhất 1 kí tự"
            }
        }
    }
};
Validator.localize(dictionary);

const validator = new Validator({ first_name: 'min',second_name:'required' });

validator.localize('vn');
export default {
  name: 'DetailCate',
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
                nameRules: [
                    v => v.length > 0 || 'Tên không được để trống'
                ],
                slugRules: [
                    v => v.length > 0 || 'Url không được để trống',
                    v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
                ],
                panel: [
                    false
                ],
                slug: '',
                isAutoSlug: true
                // editedItem: {},
                // editedIndex: -1,
            }
        },
  computed: {
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
                const id = this.$route.params && this.$route.params.projectcategorie;
                this.isAutoSlug = false;
                this.getData(id)
            } else {
                this.currentForm = Object.assign({}, defaultForm)
            }
        },
  methods: {
    
            getData(id) {
                getApi(id).then(response => {
                    this.currentForm = response
                    this.slug = response.slug
                }).catch(err => {
                    console.log(err)
                })
            },
            submitFormRequest(data) {
                return new Promise((resolve, reject) => {
                    if (this.isEdit) {
                        const id = this.$route.params && this.$route.params.projectcategorie;
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
                this.submitFormRequest(this.currentForm).then((response) => {
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