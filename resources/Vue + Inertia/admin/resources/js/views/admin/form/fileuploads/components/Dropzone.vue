<template>
  <BCard no-body>
    <BCardHeader class="d-block">
      <BCardTitle as="h4" class="mb-1">Dropzone</BCardTitle>
    </BCardHeader>

    <BCardBody>
      <p class="text-muted mb-2">DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.</p>

      <Link class="btn btn-link p-0 fw-semibold" href="https://www.dropzone.dev/" target="_blank">
        Dropzone on View Official Website
        <Icon icon="chevron-right" class="ms-1" />
      </Link>
    </BCardBody>

    <BCardBody class="pt-0">
      <FileUploader />
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody, BCardHeader, BCardTitle } from 'bootstrap-vue-next'
import FileUploader from '@/components/FileUploader.vue'
import Icon from '@/components/wrappers/Icon.vue'
</script>
