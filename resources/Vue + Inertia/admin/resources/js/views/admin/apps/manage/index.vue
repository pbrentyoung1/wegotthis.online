<template>
  <PageBreadcrumb title="Manage Apps" subtitle="Apps" />
  <BContainer fluid="xxl">
    <BRow>
      <BCol cols="12">
        <h5 class="mb-1 fs-lg">Authorized Apps</h5>
        <p class="text-muted">
          You’re currently using&nbsp;
          <strong>3 of 3</strong>&nbsp; free integrations. Upgrade to&nbsp; <Link href="#" class="text-decoration-underline"> PRO </Link>&nbsp; to unlock more integrations and supercharge your workflow.
        </p>
      </BCol>
    </BRow>

    <BRow>
      <BCol v-for="(app, idx) in authorizedAppData" :key="idx" md="4">
        <AuthorizedAppCard :app="app" />
      </BCol>
    </BRow>

    <BRow class="my-3">
      <BCol cols="12" class="text-start">
        <h5 class="mb-1 fs-lg">Explore More Integrations</h5>
        <p class="text-muted mb-3">Discover over 200 integrations to enhance your workflow</p>
      </BCol>
    </BRow>

    <BRow>
      <BCol v-for="(item, idx) in integrationData" :key="idx" md="4">
        <IntegrationCard :integration="item" />
      </BCol>

      <BCol cols="12" class="mb-3">
        <nav>
          <ul class="pagination pagination-boxed pagination-rounded justify-content-center">
            <BPagination first-number last-number hide-ellipsis :total-rows="50" :per-page="10" class="pagination-boxed">
              <template #prev-text>
                <Icon icon="chevron-left" />
              </template>
              <template #next-text>
                <Icon icon="chevron-right" class="align-middle" />
              </template>
            </BPagination>
          </ul>
        </nav>
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BContainer } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import AuthorizedAppCard from './components/AuthorizedAppCard.vue'
import IntegrationCard from './components/IntegrationCard.vue'
import { authorizedAppData, integrationData } from './components/data'
</script>
