<template>
  <main id="main-container">
    <!-- Page Content -->
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
                <li class="breadcrumb-item"><router-link :to="'/settings'">{{$t('Setting')}}</router-link></li>
                <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">{{$t('Edit')}} / {{currentForm.name}}</li>
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
        <div class="block-content">
          <form method="POST" onsubmit="return false;">
            <div class="form-group">
              <input v-validate="'required|min:2'" v-model="currentForm.name" type="text" class="form-control py-4" id="setting-name" name="name" placeholder="{{$t('Name')}}">
              <span class="text-danger">{{ errors.first('name') }}</span>
            </div>
            <div class="form-group">
              <input v-model="currentForm.key" type="text" class="form-control py-4" id="setting-key" name="key" :placeholder="$t('Identification code')">
            </div>
            <div class="form-group">
              <textarea v-model="currentForm.value" class="form-control" rows="4" id="setting-value" name="value" :placeholder="$t('Value')"></textarea>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END Main Content -->
    <!-- END Page Content -->
  </main>
  <!-- END Main Container -->
</template>

<script>
  import { getApi, createApi, updateApi } from '@/api/settings'
  import { mapMutations } from 'vuex'
  import Vue from 'vue';
  import VeeValidate from 'vee-validate';
  import { Validator } from 'vee-validate';
  import { mapState } from 'vuex';
  import _ from 'lodash'
  var slugify = require('slugify');

  Vue.use(VeeValidate, {
      useConstraintAttrs: false
  });

  const defaultForm = {
    id: null,
    key: '',
    name: '',
    value: '',
    locale: 'vi'
  }

  const dictionary = {
      vi: {
          custom:{
              name:{
                  required:'Vui lòng nhập Tên',
                  min:"Tên ít nhất 2 kí tự",
                  max:"Tên quá dài"
              }
          }
      },
      en: {
          custom:{
              name:{
                  required:'Please enter name',
                  min:"Name must be at least 2 characters",
                  max:"Name is too long"
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
    components: { },
    data() {
      return {
        currentForm: Object.assign({}, defaultForm),
        valid: true,
        loading: false,
          key:'',
          isAutoKey: true
      }
    },
    computed: {
      ...mapState(['locale']),
      nameRules: function(){
        if(this.locale == 'en'){
          return [ v => v.length > 0 || 'Name cannot be empty' ]
        }
        else{
          return [ v => v.length > 0 || 'Tên không được để trống' ]
        }
      },
      keyRules: function(){
        if(this.locale == 'en'){
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
           message: 'Lưu thành công.'
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
            if (this.isAutoKey) {
                this.key = slugify(_.lowerCase(this.currentForm.name))
            }
        }
    },
    created() {
      if (this.isEdit) {
        const id = this.$route.params && this.$route.params.setting
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
            const id = this.$route.params && this.$route.params.setting
            updateApi(id, data).then(response => {
              resolve(response)
            }).catch(err => {
              console.log(err)
              reject(err)
            })
          } else {
            createApi(data).then(response => {
              resolve(response)
            }).catch(err => {
              console.log(err)
              reject(err)
            })
          }
        })
      },
      submitForm() {
        // if(this.$refs.currentxForm.validate()) {

        this.currentForm.key = this.key;
        this.currentForm.locale= this.locale;
        this.$validator.validateAll().then((result) => {
              if (result) {
        this.loading = true
        this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false
            Dashmix.helpers('notify', this.notifySuccess)
            if (!this.isEdit) {
              this.$router.replace('/settings/edit/' + response.id)
            }
          },
          () => {
            this.loading = false
            Dashmix.helpers('notify', this.notifyUnSuccess)
          })
        // }
              }
          });
      }
    }
  }
  //  $( ".tox-dialog__body-nav-item:contains('Upload')" ).hide
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
  .tox-tinymce-aux .tox-dialog-wrap .tox-dialog .tox-dialog__content-js .tox-dialog__body .tox-dialog__body-nav[role="tablist"]{
    display: none !important;
  }
</style>
