<template>
  <main id="main-container">
    <div class="content">
      <vue-table :path= "initTableURL" :i18n="i18n" >
      </vue-table>
    </div>
  </main>
</template>

<script>
  import { VueTable } from '@enso-ui/tables/bulma';
  import { mapState } from 'vuex';

  export default {
    name: 'ListSlides',
    components: { VueTable },
    data() {
      return {
        originURL: '',
        initTableURL:'',
      }
    },
    computed: {
      ...mapState(['locale']),
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
  div#catalogs {
    border-radius: 10px;
    border: 2px solid #eee;
  }
  div#catalogss:hover {
    box-shadow: 0 0 11px rgba(33,33,33,.2);
  }
</style>
