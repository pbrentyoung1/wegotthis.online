<template>
  <PageBreadcrumb title="Forum Post" subtitle="Forum" />
  <BRow class="d-flex justify-content-center">
    <BCol xxl="10">
      <BRow>
        <BCol xl="9">
          <BCard no-body>
            <BCardBody>
              <ForumPost />

              <Paginations />
            </BCardBody>
          </BCard>
        </BCol>
        <Sidebar />
      </BRow>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import ForumPost from './components/ForumPost.vue'
import Paginations from './components/Paginations.vue'
import Sidebar from './components/Sidebar.vue'
</script>
