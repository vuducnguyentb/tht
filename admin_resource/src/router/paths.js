/**
 * Define all of your application routes here
 * for more information on routes, see the
 * official documentation https://router.vuejs.org/en/
 */
export default [
  {
    path: '/users',
    name: 'users',
    view: 'Users/List'
  },
  {
    path: '/users/create',
    name: 'users.create',
    view: 'Users/Create'
  },
  {
    path: '/users/edit/:user(\\d+)',
    name: 'users.edit',
    view: 'Users/Edit',
  },
  {
    path: '/products',
    name: 'products',
    view: 'Products/List'
  },
  {
    path: '/products/create',
    name: 'products.create',
    view: 'Products/Create'
  },
  {
    path: '/products/edit/:product(\\d+)',
    name: 'products.edit',
    view: 'Products/Edit',
  },
  {
    path: '/statisticals',
    name: 'Statisticals',
    view: 'Statisticals/List'
  },
  {
    path: '/comments',
    name: 'Comments',
    view: 'Comments/List'
  },
  {
    path: '/customercontacts',
    name: 'customercontacts',
    view: 'CustomerContacts/List'
  },
  {
    path: '/customercontacts/edit/:customercontact(\\d+)',
    name: 'customercontacts.edit',
    view: 'CustomerContacts/Edit',
  },
  {
    path: '/subscribers',
    name: 'subscribers',
    view: 'Subscribers/List'
  },
  {
    path: '/pages',
    name: 'pages',
    view: 'Pages/List'
  },
  {
    path: '/pages/create',
    name: 'pages.create',
    view: 'Pages/Create'
  },
  {
    path: '/pages/edit/:page(\\d+)',
    name: 'pages.edit',
    view: 'Pages/Edit',
  },
  {
    path: '/posts',
    name: 'posts',
    view: 'Posts/List'
  },
  {
    path: '/posts/create',
    name: 'posts.create',
    view: 'Posts/Create'
  },
  {
    path: '/posts/edit/:post(\\d+)',
    name: 'posts.edit',
    view: 'Posts/Edit',
  },
  {
    path: '/partners',
    name: 'partners',
    view: 'Partners/List'
  },
  {
    path: '/partners/create',
    name: 'partners.create',
    view: 'Partners/Create'
  },
  {
    path: '/partners/edit/:partner(\\d+)',
    name: 'partners.edit',
    view: 'Partners/Edit',
  },
  {
    path: '/projects',
    name: 'projects',
    view: 'Projects/List'
  },
  {
    path: '/projects/create',
    name: 'projects.create',
    view: 'Projects/Create'
  },
  {
    path: '/projects/edit/:project(\\d+)',
    name: 'projects.edit',
    view: 'Projects/Edit',
  },
  {
    path: '/services',
    name: 'services',
    view: 'Services/List'
  },
  {
    path: '/services/create',
    name: 'services.create',
    view: 'Services/Create'
  },
  {
    path: '/services/edit/:service(\\d+)',
    name: 'services.edit',
    view: 'Services/Edit',
  },
  {
    path: '/catalogs',
    name: 'catalogs',
    view: 'Catalogs/List'
  },
  {
    path: '/catalogs/create',
    name: 'catalogs.create',
    view: 'Catalogs/Create'
  },
  {
    path: '/catalogs/edit/:catalog(\\d+)',
    name: 'catalogs.edit',
    view: 'Catalogs/Edit',
  },
  {
    path: '/testimonials',
    name: 'Testimonials',
    view: 'Testimonials/List'
  },
  {
    path: '/testimonials/create',
    name: 'Create Testimonials',
    view: 'Testimonials/Create'
  },
  {
    path: '/testimonials/edit/:id(\\d+)',
    name: 'Edit Testimonials',
    view: 'Testimonials/Edit',
  },
  {
    path: '/slides/create',
    name: 'Create Slide',
    view: 'Slides/Create'
  },
  {
    path: '/slides/edit/:id(\\d+)',
    name: 'Edit Slide',
    view: 'Slides/Edit',
  },
  {
    path: '/list_slides',
    name: 'list_slides',
    view: 'Slides/List',
  },
  {
    path: '/list_slides/create',
    name: 'list_slides.create',
    view: 'Slides/Create',
  },
  {
    path: '/list_slides/edit/:list_slide(\\d+)',
    name: 'list_slides.edit',
    view: 'Slides/Edit',
  },
  {
    path: '/categories',
    name: 'categories',
    view: 'Categories/List'
  },
  {
    path: '/categories/create',
    name: 'categories.create',
    view: 'Categories/Create'
  },
  {
    path: '/categories/edit/:category(\\d+)',
    name: 'categories.edit',
    view: 'Categories/Edit'
  },
  {
    path: '/projectcategories',
    name: 'projectcategories',
    view: 'ProjectCategories/List'
  },
  {
    path: '/projectcategories/create',
    name: 'projectcategories.create',
    view: 'ProjectCategories/Create'
  },
  {
    path: '/projectcategories/edit/:projectcategory(\\d+)',
    name: 'projectcategories.edit',
    view: 'ProjectCategories/Edit'
  },
  {
    path: '/servicecategories',
    name: 'servicecategories',
    view: 'ServiceCategories/List'
  },
  {
    path: '/servicecategories/create',
    name: 'servicecategories.create',
    view: 'ServiceCategories/Create'
  },
  {
    path: '/servicecategories/edit/:servicecategory(\\d+)',
    name: 'servicecategories.edit',
    view: 'ServiceCategories/Edit'
  },
  {
    path: '/productcategories',
    name: 'productcategories',
    view: 'ProductCategories/List'
  },
  {
    path: '/productcategories/create',
    name: 'productcategories.create',
    view: 'ProductCategories/Create'
  },
  {
    path: '/productcategories/edit/:productcategory(\\d+)',
    name: 'productcategories.edit',
    view: 'ProductCategories/Edit'
  },
  {
    path: '/producttypes',
    name: 'producttypes',
    view: 'Products/Types/Types'
  },
  // {
  //   path: '/producttypes',
  //   name: 'Producttypes',
  //   view: 'Products/Types'
  // },
  {
    path: '/producttypes/create',
    name: 'producttypes.create',
    view: 'Products/Types/Create'
  },
  {
    path: '/producttypes/edit/:producttype(\\d+)',
    name: 'producttypes.edit',
    view: 'Products/Types/Edit'
  },
  {
    path: '/settings',
    name: 'settings',
    view: 'Settings/List'
  },
  {
    path: '/settings/create',
    name: 'settings.create',
    view: 'Settings/Create'
  },
  {
    path: '/settings/edit/:setting(\\d+)',
    name: 'settings.edit',
    view: 'Settings/Edit'
  },
  {
    path: '/media/files',
    name: 'Files',
    view: 'Media/Files'
  },
  {
    path: '/media/images',
    name: 'Images',
    view: 'Media/Images'
  },
  {
    path: '/login',
    name: 'Login',
    view: 'Login'
  },
  {
    path: '/tags',
    name: 'Tags',
    view: 'Posts/Tag'
  },
  {
    path: '/orders',
    name: 'OrderDetails',
    view: 'OrderDetails/List'
  }
  ,
  {
    path: '/menu',
    name: 'Menu',
    view: 'Menu/List'
  },
  {
    path: '/menu2',
    name: 'Menu2',
    view: 'Menu2/List'
  }

]
