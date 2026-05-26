<template>
  <PageBreadcrumb title="Forum" subtitle="Apps" />
  <BRow class="d-flex justify-content-center">
    <BCol xxl="10">
      <BRow>
        <BCol xl="9">
          <FourmView />
          <Paginations />
        </BCol>
        <Sidebar />
      </BRow>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import FourmView from './components/FourmView.vue'
import Paginations from './components/Paginations.vue'
import Sidebar from './components/Sidebar.vue'
</script>
