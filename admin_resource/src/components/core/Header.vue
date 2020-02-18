<template>
  <!-- Header -->
  <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
          <!-- Left Section -->
          <div>
              <!-- Toggle Sidebar -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
              <button type="button" class="btn btn-dual mr-1 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                  <i class="fa fa-fw fa-bars"></i>
              </button>
              <!-- END Toggle Sidebar -->

              <!-- Website Dropdown -->
              <div class="dropdown d-inline-block">
                  <button type="button" class="btn btn-dual" id="page-header-website-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-fw fa-home"></i>
                      <span class="d-none d-sm-inline ml-1">Website</span>
                  </button>
                  <div class="dropdown-menu p-0" aria-labelledby="page-header-website-dropdown">
                      <div class="p-2">
                          <a class="dropdown-item mb-0" href="/">
                              <i class="fa fa-fw fa-globe mr-1"></i> {{ $t('Watch website') }}
                          </a>
                      </div>
                  </div>
              </div>
              <!-- END Website Dropdown -->

              <!-- New Dropdown -->
              <div class="dropdown d-inline-block">
                  <button type="button" class="btn btn-dual" id="page-header-new-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-fw fa-plus"></i>
                      <span class="d-none d-sm-inline ml-1">{{ $t('Add new') }}</span>
                  </button>
                  <div class="dropdown-menu p-0" aria-labelledby="page-header-new-dropdown">
                      <div class="p-2">
                        <router-link :to="'/posts/create'">
                          <a class="dropdown-item" href="javascript:void(0)">
                              <i class="fa fa-fw fa-thumbtack mr-1"></i> {{ $t('Post') }}
                          </a>
                        </router-link>
                        <router-link :to="'/products/create'">
                              <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fas fa-gavel mr-2"></i> {{ $t('Product') }}
                              </a>
                        </router-link>
                          <router-link :to="'/projects/create'">
                              <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fab fa-elementor mr-2"></i> {{ $t('Project') }}
                              </a>
                          </router-link>
                        <router-link :to="'/pages/create'">
                          <a class="dropdown-item" href="javascript:void(0)">
                              <i class="fa fa-fw fa-file mr-1"></i> {{ $t('Page') }}
                          </a>
                        </router-link>
                        <router-link :to="'/users/create'">
                          <a class="dropdown-item" href="javascript:void(0)">
                              <i class="fa fa-fw fa-user mr-1"></i> {{ $t('User') }}
                          </a>
                       </router-link>
                       <router-link :to="'/services/create'">
                              <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fab fa-servicestack mr-2"></i> {{ $t('Solution') }}
                              </a>
                        </router-link>
                      </div>
                  </div>
              </div>
              <!-- END New Dropdown -->

              <div class=" d-inline-block">
                  <router-link :to="'/statisticals'">
                  <button type="button" class="btn btn-dual" >
                      <i class="fas fa-chart-pie"></i>
                      <span class="d-none d-sm-inline ml-1">{{ $t('Overview') }}</span>
                  </button>
                  </router-link>
              </div>
              <div class=" d-inline-block">
                  <languages-dropdown
                          btn-bg-color="#f5f5f5"
                          btn-font-color="#363636"
                          :selected="locale"
                          :show-search-input="showSearchInput"
                          display-text="native"
                          :selected-languages="selectedList"
                          v-on:change="optionSelected">
                  </languages-dropdown>
              </div>

          </div>
          <!-- END Left Section -->

          <!-- Right Section -->
          <div>
              <!-- User Dropdown -->
              <div class="dropdown d-inline-block">
                  <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="d-none d-lg-inline mr-2">{{ $t('Hello Administrator') }}</span>
                      <img class="img-avatar img-avatar32" src="/admin-resources/media/avatars/avatar10.jpg" alt="">
                  </button>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 overflow-hidden" aria-labelledby="page-header-user-dropdown">
                      <div class="row no-gutters">
                          <div class="col-12 p-2">
                              <a @click.prevent="handleLogout()" class="dropdown-item">
                                  {{ $t('Log out') }}
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- END User Dropdown -->

          </div>
          <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-sidebar-dark">
          <div class="content-header">
              <form class="w-100" action="be_pages_generic_search.html" method="POST">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                          <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                              <i class="fa fa-fw fa-times-circle"></i>
                          </button>
                      </div>
                      <input type="text" class="form-control border-0" placeholder="Search WP Post.." id="page-header-search-input" name="page-header-search-input">
                  </div>
              </form>
          </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-primary-darker">
          <div class="content-header">
              <div class="w-100 text-center">
                  <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
              </div>
          </div>
      </div>
      <!-- END Header Loader -->
  </header>

</template>

<script>
import LanguagesDropdown from 'vue-languages-dropdown'
import { mapState } from 'vuex';
import {
  mapMutations,
  mapActions
} from 'vuex'

import {setLangue} from "@/api/language";

export default {
    data: () => ({
        showSearchInput: false,
        selectedLang: "vi",
        selectedList: ['en', 'vi']
    }),
    components: {
        'languages-dropdown': LanguagesDropdown
    },
    computed: mapState(['locale']),
    methods: {
        ...mapActions('user', ['Logout']),
        ...mapMutations('app', ['setDrawer']),
        handleLogout() {
            this.Logout().then(() => {
                location.reload()
            }).catch(() => {
                location.reload()
            })
        },
        onClickDrawer() {
            this.setDrawer(!this.$store.state.app.drawer)
        },
        optionSelected: function (data) {
            //console.log(data)
            if (!window.location.host.includes('en') && data.code == 'en') {
              // set language backend here
              setLangue('en').then(response => {
                //console.log(response);
                //resolve(response)
              }).catch(err => {
                //console.log(err);
                //reject(err)
              });
              // Redirect Url
                let redirectUrl = "https://" + data.code + ".tht-vietnam.com" + window.location.pathname;
                // alert(redirectUrl);
                window.location.replace(redirectUrl);
                //console.log(data.code);
                // change window.location
                // case english
            } else {
              setLangue('vi').then(response => {
                //console.log(response);
                //resolve(response)
              }).catch(err => {
                //console.log(err);
                //reject(err)
              });
                // redirect
                window.location.replace("https://tht-vietnam.com" + window.location.pathname);
            }
        }
    }
}
</script>

<style>
  #core-toolbar a {
    text-decoration: none;
  }
</style>
