<template>
  <div v-if="loading" class="fixed inset-0 z-50 flex items-center justify-center bg-white animate-[preloader_1s_ease_forwards]">
    <div class="size-8 animate-spin rounded-full border-3 border-primary border-t-transparent"></div>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'; 

import { ref } from 'vue'

const loading = ref(true)

onMounted(() => {
  loading.value = false
})
</script>
