<template>
  <nav id="sidebar" aria-label="Main Navigation" data-simplebar="init">

          <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <!-- Logo -->
            <a class="link-fx font-w700 font-size-lg text-white" href="index.html">
                <span class="smini-visible">
                    <span class="text-white-75">
                        T
                    </span>
                </span>
                <span class="smini-hidden">
                    <span class="text-white">THT-VietNam</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
<!--            <li class="nav-main-item">-->
<!--                <router-link class="nav-main-link" :to="'/statisticals'">-->
<!--                    <i class="nav-main-link-icon fas fa-chart-pie"></i>-->
<!--                    <span class="nav-main-link-name">Tổng quan</span>-->
<!--                </router-link>-->
<!--            </li>-->
<!--             <li class="nav-main-item">-->
<!--                <router-link class="nav-main-link" :to="'/menu'">-->
<!--                    <i class="nav-main-link-icon fas fa-chart-pie"></i>-->
<!--                    <span class="nav-main-link-name">Quản lí Menu</span>-->
<!--                </router-link>-->
<!--            </li>-->
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-thumbtack"></i>
                    <span class="nav-main-link-name">{{ $t('Post') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/posts'">
                        <span class="nav-main-link-name">{{ $t('List') }}</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/posts/create'">
                        <span class="nav-main-link-name">{{ $t('New post') }}</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/categories'">
                        <span class="nav-main-link-name">{{ $t('Category') }}</span>
                      </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fab fa-product-hunt"></i>
                    <span class="nav-main-link-name">{{ $t('Product') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/products'">
                            <span class="nav-main-link-name">{{ $t('List') }}</span>
                        </router-link>
                    </li>
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/productcategories'">
                            <span class="nav-main-link-name">{{ $t('Category') }}</span>
                        </router-link>
                    </li>
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/producttypes'">
                            <span class="nav-main-link-name">{{ $t('Type') }}</span>
                        </router-link>
                    </li>
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/products/create'">
                            <span class="nav-main-link-name">{{ $t('New product') }}</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-grid"></i>
                    <span class="nav-main-link-name">{{ $t('Project') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/projects'">
                            <span class="nav-main-link-name">{{ $t('List') }}</span>
                        </router-link>
                    </li>
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/projects/create'">
                            <span class="nav-main-link-name">{{ $t('New project') }}</span>
                        </router-link>
                    </li>
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/projectcategories'">
                            <span class="nav-main-link-name">{{ $t('Category') }}</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-user-friends "></i>
                    <span class="nav-main-link-name">{{ $t('Partner') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/partners'">
                            <span class="nav-main-link-name">{{ $t('List') }}</span>
                        </router-link>
                    </li>
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/partners/create'">
                            <span class="nav-main-link-name">{{ $t('Add partner') }}</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-puzzle"></i>
                    <span class="nav-main-link-name">{{ $t('Solution') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/services'">
                            <span class="nav-main-link-name">{{ $t('List') }}</span>
                        </router-link>
                    </li>
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/services/create'">
                            <span class="nav-main-link-name">{{ $t('Create new') }}</span>
                        </router-link>
                    </li>
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/servicecategories'">
                            <span class="nav-main-link-name">{{ $t('Category') }}</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-print"></i>
                    <span class="nav-main-link-name">{{ $t('Product Catalog') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/catalogs'">
                            <span class="nav-main-link-name">{{ $t('List') }}</span>
                        </router-link>
                    </li>
                    <li class="nav-main-item">
                        <router-link class="nav-main-link" :to="'/catalogs/create'">
                            <span class="nav-main-link-name">{{ $t('Create new') }}</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <router-link class="nav-main-link" :to="'/customercontacts'">
                    <i class="nav-main-link-icon fas fa-address-card"></i>
                    <span class="nav-main-link-name">{{ $t('Custommer contact') }}</span>
                </router-link>
            </li>
               <li class="nav-main-item">
                <router-link class="nav-main-link" :to="'/subscribers'">
                    <i class="nav-main-link-icon fa fa-registered "></i>
                    <span class="nav-main-link-name">{{ $t('Registered customers') }}</span>
                </router-link>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-camera"></i>
                    <span class="nav-main-link-name">{{ $t('Media') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/media/images'">
                        <span class="nav-main-link-name">{{ $t('Images') }}</span>
                      </router-link>
                    </li>
<!--                    <li class="nav-main-item">-->
<!--                      <router-link class="nav-main-link" :to="'/media/files'">-->
<!--                          <span class="nav-main-link-name">Files</span>-->
<!--                      </router-link>-->
<!--                    </li>-->
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-file"></i>
                    <span class="nav-main-link-name">{{ $t('Page') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/pages'">
                        <span class="nav-main-link-name">{{ $t('List') }}</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link :to="'/pages/create'">
                        <a class="nav-main-link" href="">
                            <span class="nav-main-link-name">{{ $t('New page') }}</span>
                        </a>
                      </router-link>
                    </li>
                </ul>
            </li>


            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">{{ $t('User') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/users'">
                        <span class="nav-main-link-name">{{ $t('List') }}</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/users/create'">
                        <span class="nav-main-link-name">{{ $t('New User') }}</span>
                      </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
              <router-link class="nav-main-link" :to="'/settings'">
                <i class="nav-main-link-icon si si-settings"></i>
                <span class="nav-main-link-name">{{ $t('Setting') }}</span>
              </router-link>
            </li>
<!--            <li class="nav-main-item">-->
<!--              <router-link class="nav-main-link" :to="'/slides/edit/1'">-->
<!--                <i class="nav-main-link-icon si si-notebook"></i>-->
<!--                <span class="nav-main-link-name">{{ $t('Manage slides') }}</span>-->
<!--              </router-link>-->
<!--            </li>-->
            <li class="nav-main-item">
                <router-link class="nav-main-link" :to="'/list_slides'">
                    <i class="nav-main-link-icon si si-notebook"></i>
                    <span class="nav-main-link-name">{{ $t('Manage slides') }}</span>
                </router-link>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="javascript:void(0)" data-toggle="layout" data-action="sidebar_mini_toggle">
                    <i class="nav-main-link-icon fa fa-arrows-alt-h"></i>
                    <span class="nav-main-link-name">{{ $t('Show/Hide Toolbar') }}</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
  </nav>
<!-- END Sidebar -->
</template>
<script>
export default {
  data: () => ({
  })
}
</script>
