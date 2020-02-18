<template>

<main id="main-container">
  <div class="content">
    <vue-table id="customercontacts" :path= "initTableURL" :i18n="i18n">
      <template v-slot:email="{ row, column }">
        <span
          v-if="row['read'] == '0'"><b>{{ row[column.name] }}</b></span>
        <span v-else>{{ row[column.name] }}</span>
      </template>
      <template v-slot:phone="{ row, column }">
        <span
          v-if="row['read'] == '0'"><b>{{ row[column.name] }}</b></span>
        <span v-else>{{ row[column.name] }}</span>
      </template>
      <template v-slot:full_name="{ row, column }">
        <span
          v-if="row['read'] == '0'"><b>{{ row[column.name] }}</b></span>
        <span v-else>{{ row[column.name] }}</span>
      </template>
      <template v-slot:created_at="{ row, column }">
        <span
          v-if="row['read'] == '0'"><b>{{ row[column.name] }}</b></span>
        <span v-else>{{ row[column.name] }}</span>
      </template>
    </vue-table>
  </div>
</main>
</template>

<script>
import { VueTable } from '@enso-ui/tables/bulma';
export default {
  name: 'customercontacts',
  components: {VueTable },
  data() {
    return {
        originURL: '',
        initTableURL:'',
    }
  },
  created() {
    this.originURL = window.location.origin;
    this.initTableURL = this.originURL+this.$route.fullPath+'/initTable';
    /*
    console.log('origin Url:'+ this.originURL);
    console.log('initTableURL:'+this.initTableURL);
    console.log('current route:');
    console.log(this.$route);
     */
  },
  methods: {
    i18n(key) {
      return this.$i18n.translate(key);
    }
  }
}
</script>

<style scoped>
div#customercontacts {
    border-radius: 10px;
    border: 2px solid #eee;
}
div#customercontacts:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2); 
}
</style>
