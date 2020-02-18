<template>
<!-- Extra Large Default Modal -->
<div class="modal" id="modal-site-file" tabindex="-1" role="dialog" aria-labelledby="modal-site-file" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $t('File manager') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-1">
                <iframe style="width:100%" :src="'/filemanager?type=' + type + '&callback=' + field_name + '&lang=' + locale"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END Extra Large Default Modal -->
</template>

<script>
import {
  mapActions,
  mapGetters
} from 'vuex';

import { mapState } from 'vuex';

export default {
  name: 'FileManagerPopup',
  data() {
    return {
    }
  },
  computed: {
    ...mapGetters('file', ['opened', 'field_name', 'type']),
    ...mapState(['locale']),
    dialog: {
      get () {
        return this.opened
      },
      set (value) {
      }
    }
  },
  methods: {
    closeFileManager () {
      this.$store.dispatch('file/closeFileManager')
    }
  }
}
</script>
<style scoped>
iframe {
  border: none;
  height: 100%;
}

.modal {
  z-index: 9999;
}

.modal-dialog {
  position: fixed;
  margin: 0;
  width: 100%;
  height: 100%;
  padding: 0;
  max-width: 100% !important;
}

.modal-content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  border-radius: 0;
}

.modal-header {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  height: 50px;
  padding: 10px;
}

.modal-body {
  position: absolute;
  top: 50px;
  bottom: 60px;
  width: 100%;
  font-weight: 300;
  overflow: hidden;
  padding: 0;
}

.modal-footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  height: 60px;
  padding: 10px;
}
</style>
