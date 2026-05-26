<template>
  <PageBreadcrumb title="Article" subtitle="Blog" />
  <BRow class="d-flex justify-content-center">
    <BCol xxl="10">
      <BCard no-body>
        <BCardBody class="p-lg-5">
          <BRow class="g-5">
            <Articles />
            <BCol lg="4">
              <Sidebar />
            </BCol>
          </BRow>
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Articles from './components/Articles.vue'
import Sidebar from './components/Sidebar.vue'
</script>
