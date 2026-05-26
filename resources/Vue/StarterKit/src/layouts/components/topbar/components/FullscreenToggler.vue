<template>
  <div id="fullscreen-toggler" class="md:inline-flex hidden">
    <div class="topbar-item">
      <button :class="['topbar-link btn group size-8 rounded-full', { 'fullscreen-active': isFullscreen }]" aria-label="Full Screen" @click="toggleFullscreen">
        <Icon icon="maximize" class="topbar-link-icon group-[.fullscreen-active]:hidden" />
        <Icon icon="minimize" class="hidden topbar-link-icon group-[.fullscreen-active]:inline-block" />
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import { onBeforeUnmount, onMounted, ref } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'

const isFullscreen = ref(false)

const toggleFullscreen = async () => {
  if (!document.fullscreenElement) {
    await document.documentElement.requestFullscreen()
    isFullscreen.value = true
  } else {
    await document.exitFullscreen()
    isFullscreen.value = false
  }
}

const handleFullscreenChange = () => {
  isFullscreen.value = !!document.fullscreenElement
}

onMounted(() => {
  document.addEventListener('fullscreenchange', handleFullscreenChange)
})

onBeforeUnmount(() => {
  document.removeEventListener('fullscreenchange', handleFullscreenChange)
})
</script>
