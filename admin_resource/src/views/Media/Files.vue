<template>
<main id="main-container">
  <div class="content">
    <iframe style="width:100%" src="/filemanager?type=Files"></iframe>
  </div>
</main>
</template>

<script>
import { listApi } from '@/api/users'

export default {
  name: 'MediaFiles',
}
</script>

<style scoped>
  .content {
    flex: 1 0 auto;
    position: relative;
  }

  iframe {
    border: 0;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: 100%;
  }
</style>
