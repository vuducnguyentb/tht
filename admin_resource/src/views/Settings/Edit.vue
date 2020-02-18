<template>
  <detail :is-edit="true"/>
</template>

<script>
import Detail from './components/Detail'

export default {
  name: 'SettingsEdit',
  created() {
    console.log('Settings.Edit.Route.Params:');
    console.log(this.$route.params);
  },
  components: { Detail }
}
</script>
