<template>
  <main id="main-container">
    <div class="content">
      <vue-table id="subscribers" :path= "initTableURL" :i18n="i18n" >
      <template v-slot:email="{ row, column }">
        <span
          v-if="row['read'] == '0'"><b>{{ row[column.name] }}</b></span>
        <span v-else>{{ row[column.name] }}</span>
      </template>
      <template v-slot:name="{ row, column }">
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
        name: 'SubscribersList',
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
div#subscribers {
    border-radius: 10px;
    border: 2px solid #eee;
}
div#subscribers:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2); 
}
</style>
