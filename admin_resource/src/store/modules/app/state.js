export default {
  drawer: null,
  snackbar: false,
  message: '',
  menuItems: [
    {
      icon: 'keyboard_arrow_up',
      'icon-alt': 'content_copy',
      text: 'Quản lý bài viết',
      model: false,
      children: [
        { icon: 'list', text: 'Danh sách', to: '/posts' },
        { icon: 'add', text: 'Thêm mới', to: '/posts/create'},
        { icon: 'tag', text: 'Chuyên mục', to: '/categories'},
      ]
    },
    {
      icon: 'keyboard_arrow_up',
      'icon-alt': 'edit',
      text: 'Quản lý trang',
      model: false,
      children: [
        { icon: 'list', text: 'Danh sách', to: '/pages' },
        { icon: 'add', text: 'Thêm mới', to: '/pages/create'}
      ]
    },
    {
      icon: 'keyboard_arrow_up',
      'icon-alt': 'contacts',
      text: 'Quản lý người dùng',
      model: false,
      children: [
        { icon: 'list', text: 'Danh sách', to: '/users' },
        { icon: 'add', text: 'Thêm mới', to: '/users/create'}
      ]
    },
    {
      icon: 'settings',
      text: 'Quản lý cấu hình',
      to: '/settings'
    },
    /*
    {
      icon: 'keyboard_arrow_up',
      'icon-alt': 'category',
      text: 'Quản dự án',
      model: false,
      children: [
        { icon: 'list', text: 'Danh sách', to: '/projects' },
        { icon: 'add', text: 'Thêm mới', to: '/projects/create'}
      ]
    }, */
    /* { icon: 'chat_bubble', text: 'Quản lý liên hệ' },
    { icon: 'help', text: 'Help' } */
  ]
}
