<template>
  <div class="container">
    <div class="bg-info/10 text-info border-s-3 border-info rounded-md flex items-start gap-3 py-3 px-4 mb-4">
      <div>
        <Icon icon="info-circle" class="fs-xxl" />
      </div>
      <div>
        To enable this layout, use <code>updateLayout</code> from <code>layout</code> store and pass <code>{ {{ option }} : "{{ value }}" }</code>. eg.
        <code>updateLayout({ {{ option }}: "{{ value }}" })</code>
      </div>
    </div>

    <div class="card">
      <div class="card-body text-center">
        <h4 class="text-lg">Your custom content here</h4>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'

type LayoutInfoProps = {
  option: string
  value: string
}

defineProps<LayoutInfoProps>()
</script>
