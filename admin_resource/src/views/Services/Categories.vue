<template>
  <main id="main-container">
    <div class="content">
      <vue-table id="servicecategories" :path= "initTableURL" :i18n="i18n" />
    </div>
  </main>
</template>

<script>
    import { VueTable } from '@enso-ui/tables/bulma';

    export default {
        name: 'ServiceCategoryList',
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
                return this.$store.getters.i18n(key);
            }
        }
    }
</script>

<style scoped>

</style>
