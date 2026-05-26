<template>
  <PageBreadcrumb title="File Uploads" subtitle="Forms" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.25">Dropzone</h4>
          <p class="text-default-400">DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.</p>
        </div>

        <div class="card-body">
          <FileUploader title="Drop files here or click to upload." subtitle="You can drag images here, or browse files via the button below." />
        </div>
      </div>

      <FilePond />
    </div>
  </div>
</template>

<script setup lang="ts">
import FileUploader from '~/components/FileUploader.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import FilePond from './components/FilePond.vue'
</script>

<style></style>
