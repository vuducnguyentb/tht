<template>
    <detail :is-edit="true"/>
</template>

<script>
    import Detail from './components/Detail'

    export default {
        name: 'Edit Catalogs',
        components: { Detail }
    }
</script>
