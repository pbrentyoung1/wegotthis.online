<template>
  <PageBreadcrumb title="Sidebar With Lines" subtitle="Layouts" />

  <div class="container-fluid">
    <div class="bg-info/10 text-info border-s-3 border-info rounded-md flex items-start gap-3 py-3 px-4 mb-4">
      <div>
        <Icon icon="info-circle" class="text-xl" />
      </div>
      <div>
        If you want to display a line with each menu item, add the class
        <code>"sidebar-with-line"</code>
        to the
        <code>&lt;html&gt;</code>
        tag.
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
import { onMounted } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toggleAttribute } from '~/utils/helpers'

onMounted(() => {
  toggleAttribute('class', 'sidebar-with-line')
})
</script>
