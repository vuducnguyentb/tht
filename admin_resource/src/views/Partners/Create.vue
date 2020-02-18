<template>
    <detail :is-edit="false"/>
</template>

<script>
    import Detail from './components/Detail'

    export default {
        name: 'Create Partner',
        components: { Detail }
    }
</script>
