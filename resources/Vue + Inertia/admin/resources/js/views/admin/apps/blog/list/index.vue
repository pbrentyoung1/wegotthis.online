<template>
  <PageBreadcrumb title="List" subtitle="Blog" />
  <BRow class="d-flex justify-content-center">
    <BCol xxl="10">
      <BCard no-body>
        <BCardBody class="p-4">
          <BRow class="g-5">
            <BCol lg="8">
              <Categories />
              <Paginations />
            </BCol>
            <Sidebar />
          </BRow>
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Categories from './components/Categories.vue'
import Paginations from './components/Paginations.vue'
import Sidebar from './components/Sidebar.vue'
</script>
