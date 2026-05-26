<template>
  <PageBreadcrumb title="Preloader" subtitle="Layouts" />
  <div class="fixed inset-0 z-50 flex items-center justify-center bg-white animate-[preloader_1s_ease_forwards]" v-if="isReloading">
    <div class="size-8 animate-spin rounded-full border-3 border-primary border-t-transparent"></div>
  </div>

  <div class="card">
    <div class="card-body text-center">
      <h4 class="text-lg">Your custom content here</h4>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'

const isReloading = ref(true)

setTimeout(() => {
  isReloading.value = false
}, 1000)
</script>
