<template>
<main id="main-container">
  <!-- Page Content -->
  <div class="row no-gutters flex-md-10-auto">
      <div class="col-md-12 col-lg-12 col-xl-12 order-md-0 bg-body-dark">
          <!-- Main Content -->
          <div class="content content-full">
              <div class="block block-fx-pop">
                  <div class="block-content block-content-full d-flex justify-content-between border-bottom">
                      <div>
                          <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
<!--                                      <li style="margin-top: -4px; margin-right: 5px;">-->
<!--                                        <button type="button" class="btn btn-sm btn-light">-->
<!--                                            <i class="fa fa-plus"></i>-->
<!--                                        </button>-->
<!--                                    </li>-->
                                    <li class="breadcrumb-item"><router-link :to="'/customercontacts'">{{$t('Customercontacts')}}</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit"> {{currentForm.full_name}}</li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                                    </ol>
                                </nav>
                      </div>
                      <div>
                          <!-- <a class="btn btn-sm btn-secondary" href="javascript:void(0)">Preview</a> -->
                      </div>
                  </div>
                  <div class="block-content">
                      <form method="POST" onsubmit="return false;">
                          <div class="form-group">
                              <input  v-model="currentForm.full_name" type="text" class="form-control py-4" id="full_name-title" name="full_name" readonly>
                          </div>
                        <div class="form-group">
                          <input  v-model="currentForm.email" type="text" class="form-control py-4" id="email-title" name="email" readonly>
                        </div>
                        <div class="form-group">
                          <input  v-model="currentForm.phone" type="text" class="form-control py-4" id="phone-title" name="phone" readonly>
                        </div>
                        <div class="form-group">
                          <label for="txt-content">Content</label>
                          <textarea v-model="currentForm.body" class="form-control" id="txt-content" name="txt-body" rows="4" readonly></textarea>
                        </div>
                      </form>
                  </div>
              </div>
          </div>
          <!-- END Main Content -->
      </div>
  </div>
  <!-- END Page Content -->
</main>
<!-- END Main Container -->
</template>

<script>
import { getApi, createApi, updateApi } from '@/api/customercontacts'
import Vue from 'vue';

import _ from 'lodash'
import { mapMutations } from 'vuex'

import { mapState } from 'vuex';

var slugify = require('slugify');


const defaultForm = {
  id: null,
  full_name: '',
  email :'',
  phone: '',
    body:''
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
      panel: [
        false
      ],
        full_name: '',
        email :'',
        phone: '',
        body:''
    }
  },
  computed: {
      ...mapState(['locale']),
  },
    watch: {
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.customercontact;
      this.isAutoSlug = false;
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
  },
  methods: {
    ...mapMutations('app', ['setSnackbar', 'setMessage']),
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response;
      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.customercontact;
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
          this.currentForm.full_name = this.full_name;
          this.currentForm.email = this.email;
          this.currentForm.phone = this.phone;
          this.currentForm.body = this.body;
          this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false;
            Dashmix.helpers('notify', this.notifySuccess);
            if (!this.isEdit) {
              this.$router.replace('/customercontacts/edit/' + response.id)
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
