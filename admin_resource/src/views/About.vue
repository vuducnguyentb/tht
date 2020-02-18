<template>
  <div class="about">
    <h1>Hi me me</h1>
    <tinymce-tinymce v-model="content" />
    </div>
</template>
<script>
// import tinymce from 'tinymce/tinymce'
// import Editor from '@tinymce/tinymce-vue'
// import 'tinymce/themes/silver'
//import Tinymce from '@/components/Tinymce'
export default {
  data: () => ({
    content: 'aaa',
    init: {
      skin_url: 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.4/skins/ui/oxide'
    }
  })
}
</script>
