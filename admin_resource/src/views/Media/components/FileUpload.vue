<template>
  <div id="app">
    <vue-dropzone id="drop1" :options="config" @vdropzone-complete="afterComplete"></vue-dropzone>
  </div>
</template>


<script>
import vueDropzone from "vue2-dropzone";

export default {
 data: () => ({
dropOptions: {
     url: "http://localhost:8000/api/image",
     maxFilesize: 5, // MB
     maxFiles: 5,
     chunking: true,
     chunkSize: 400, // Bytes
     thumbnailWidth: 100, // px
     thumbnailHeight: 100,
     addRemoveLinks: true
   }
 }),
 components: {
   vueDropzone
 },
 methods: {
   afterComplete(file) {
     console.log(file);
   }
 }
};
</script>