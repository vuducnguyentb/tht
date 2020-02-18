<template>
  <!-- Footer -->
  <footer id="page-footer" class="bg-body-light">
      <div class="content py-0">
          <div class="row font-size-sm">
              <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                  {{ $t('Develop By') }} <a class="font-w600" href="https://motbit.com" target="_blank">Motbit JSC</a> {{ $t('by all') }} <i class="fa fa-heart text-danger"></i>
              </div>
              <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                  <a class="font-w600" href="http://tht-vietnam.com/" target="_blank">THT-VIETNAM</a> &copy; <span data-toggle="year-copy">{{ (new Date()).getFullYear() }}</span>
              </div>
          </div>
      </div>
  </footer>
</template>

<script>
export default {
}
</script>

