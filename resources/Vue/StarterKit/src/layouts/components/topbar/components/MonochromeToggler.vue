<template>
  <div class="xl:inline-flex hidden">
    <div id="monochrome-toggler" class="topbar-item">
      <button class="topbar-link btn btn-sm size-8 rounded-full" id="monochrome-mode" type="button" aria-label="Monochrome Mode" @click="toggleMonoChromeMode">
        <Icon icon="palette" class="topbar-link-icon" />
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'

const toggleMonoChromeMode = () => {
  const html = document.documentElement
  if (html) {
    html.classList.toggle('monochrome')
  }
}
</script>
