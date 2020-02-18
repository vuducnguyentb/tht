import { set, toggle } from '@/utils/vuex'

export default {
  setDrawer: set('drawer'),
  toggleDrawer: toggle('drawer'),
  setSnackbar: set('snackbar'),
  setMessage: set('message'),
}
