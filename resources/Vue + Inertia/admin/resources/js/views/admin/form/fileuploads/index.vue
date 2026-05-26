<template>
  <PageBreadcrumb title="File Uploads" subtitle="Forms" />
  <BContainer fluid="xxl">
    <BRow>
      <BCol cols="12">
        <Dropzone />

        <FilePond />
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Dropzone from './components/Dropzone.vue'
import FilePond from './components/FilePond.vue'
</script>
