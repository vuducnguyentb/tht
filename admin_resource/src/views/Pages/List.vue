<template>
  <main id="main-container">
    <div class="content">
      <vue-table id="pages" :path= "initTableURL" :i18n="i18n" />
    </div>
  </main>
</template>

<script>
  import { VueTable } from '@enso-ui/tables/bulma';

  export default {
    name: 'PagesList',
    components: { VueTable },
    data() {
      return {
        originURL: '',
        initTableURL:'',
      }
    },
    created() {
      this.originURL = window.location.origin;
      this.initTableURL = this.originURL+this.$route.fullPath+'/initTable';
    },
    methods: {
      i18n(key) {
        return this.$i18n.translate(key);
      }
    }
  }
</script>

<style scoped>

</style>
