<template>
    <div class="bg-image" style="background-image: url('{{ asset('admin/media/photos/photo19@2x.jpg')}}');">
        <div class="row no-gutters justify-content-center bg-primary-dark-op">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                <!-- Sign In Block -->
                <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                    <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                        <!-- Header -->
                        <div class="mb-2 text-center">
                            <a class="link-fx font-w700 font-size-h1" href="{{route('home')}}">
                                <span class="text-dark">THT-VIETNAM</span><span class="text-primary"></span>
                            </a>
                            <p class="text-uppercase font-w700 font-size-sm text-muted">{{$t('Login')}}</p>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <form ref="loginForm">
                            <div class="form-group">
                                <div class="input-group">
                                    <input v-validate="'required|email'" type="text" v-model="login.email" class="form-control" id="login-username" name="email" placeholder="Email">
                                  <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-circle"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="text-danger">{{ errors.first('email') }}</span>
                            </div>
                          <div class="form-group">
                                <div class="input-group">
                                    <input v-validate="'required'" type="password" v-model="login.password" @keyup.enter="handleLogin" class="form-control" id="login-password" name="password" :placeholder="$t('Password')">
                                  <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-asterisk"></i>
                                        </span>
                                    </div>
                                </div>

                              <span class="text-danger">{{ errors.first('password') }}</span>
                          </div>
                          <div class="form-group text-center">

                              <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="/password/reset">
                                  <i class="fa fa-exclamation-triangle text-muted mr-1"></i> {{$t('Forgot password')}}
                                </a>
                              </p>

                                <button type="submit" @click.prevent="handleLogin" class="btn btn-hero-primary">
                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> {{$t('Login')}}
                                </button>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
                <!-- END Sign In Block -->
            </div>
        </div>
    </div>
</template>

<script>
  import {
    mapActions
  } from 'vuex'
  import Vue from 'vue';
  import VeeValidate from 'vee-validate';
  import { Validator } from 'vee-validate';

  import { mapState } from 'vuex';

  Vue.use(VeeValidate, {
    useConstraintAttrs: false
  });
  const dictionary = {
    vi: {
      custom:{
        email:{
          required:'Vui lòng nhập Email̀',
          email: 'Không đúng định dạng Email'
        },
        password:{
          required:'Vui lòng chọn Mật khẩu',
        }
      }
    },
    en: {
      custom:{
        title:{
          required:'Email is required',
        },
        password:{
          required:'Password is required',
        }
      }
    }
  };

  Validator.localize(dictionary);

  const validator = new Validator({ email: 'required|email', password:'required' });

  validator.localize('vi');

  export default {
    data: () => ({
      valid: true,
      showError: false,
      login: {
        email: '',
        password: '',
      },
      redirect: undefined,
      loading: false
    }),

    watch: {
      $route: {
        handler: function(route) {
          this.redirect = route.query && route.query.redirect
        },
        immediate: true
      }
    },
    computed: {
      ...mapState(['locale']),
      notifyUnSuccess: function() {
        if(this.locale == 'en') {
          return {
            type: 'danger',
            icon: 'fa fa-times mr-1',
            message: 'Login info incorrect. Please try again.'
          }
        }else {
          return {
            type: 'danger',
            icon: 'fa fa-times mr-1',
            message: 'Thông tin đăng nhập không đúng. Vui lòng thử lại.'
          }
        }
      },
    },
    created() {
      if(this.locale == 'en') {
        this.$validator.localize('en');
      }
    },
    methods: {
      ...mapActions('user', ['LoginByUsername']),
      handleLogin() {
        this.$validator.validateAll().then((result) => {
          if (result) {
            // if(this.$refs.loginForm.validate()) {
            this.loading = true;
            this.showError = false;
            this.LoginByUsername(this.login).then(() => {
              this.loading = false;
              location.reload()
            }).catch(() => {
              this.loading = false;
              this.showError = true;
              Dashmix.helpers('notify', this.notifyUnSuccess);
              //this.$message.error('Thông tin đăng nhập không đúng')
            })
          }
        })
      },
      handleLogin_bk() {
        // if(this.$refs.loginForm.validate()) {
          this.loading = true;
          this.showError = false;
          this.LoginByUsername(this.login).then(() => {
            this.loading = false;
            location.reload()
          }).catch(() => {
            this.loading = false;
            this.showError = true;
            Dashmix.helpers('notify', this.notifyUnSuccess);
            //this.$message.error('Thông tin đăng nhập không đúng')
          })
      }
    }
  }
</script>
