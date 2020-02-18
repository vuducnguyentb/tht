<template>
  <main id="main-container">
    <div class="content">
      <vue-table id="catalogs" :path= "initTableURL" :i18n="i18n" >
      <template v-slot:status="{ row, column }">
        <span
          v-if="row[column.name] == '1'">{{$t('Public')}}</span>
        <span
          v-else-if="row[column.name] == '0'">{{$t('Draft')}}</span>
        <span v-else></span>
      </template>
      </vue-table>
    </div>
  </main>
</template>

<script>
  import { VueTable } from '@enso-ui/tables/bulma';

  export default {
    name: 'CatalogsList',
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
  div#catalogs {
    border-radius: 10px;
    border: 2px solid #eee;
  }
  div#catalogss:hover {
    box-shadow: 0 0 11px rgba(33,33,33,.2);
  }
</style>
