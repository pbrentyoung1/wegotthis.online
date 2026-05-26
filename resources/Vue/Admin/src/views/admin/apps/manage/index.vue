<template>
  <PageBreadcrumb title="Manage Apps" subtitle="Apps" />
  <div class="container">
    <div class="mb-4">
      <h5 class="mb-1.25 text-base">Authorized Apps</h5>
      <p class="text-default-400">
        You’re currently using
        <strong>3 of 3</strong>
        free integrations. Upgrade to
        <a href="#" class="text-primary underline">PRO</a>
        to unlock more integrations and supercharge your workflow.
      </p>
    </div>

    <div class="mb-base grid grid-cols-1 gap-base md:grid-cols-2 lg:grid-cols-3">
      <AuthorizedAppCard v-for="app in authorizedAppData" :key="app.id || app.name" :app="app" />
    </div>

    <div class="py-2.5 text-center">
      <h5 class="mb-1.25 text-base">Explore More Integrations</h5>
      <p class="mb-5 text-default-400">Discover over 200 integrations to enhance your workflow</p>
    </div>

    <div class="mb-base grid grid-cols-1 gap-base md:grid-cols-2 lg:grid-cols-3">
      <IntegrationCard v-for="(integration, idx) in integrationData" :key="idx" :integration="integration" />
    </div>

    <div class="mb-4">
      <nav class="mx-auto flex items-center justify-center gap-1.5" aria-label="Pagination">
        <button type="button" class="btn btn-icon size-8.75 rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary" aria-label="Previous">
          <span>«</span>
        </button>

        <button type="button" class="btn btn-icon size-8.75 rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">1</button>

        <button type="button" class="btn btn-icon size-8.75 rounded-full bg-primary text-white">2</button>

        <button type="button" class="btn btn-icon size-8.75 rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">3</button>

        <button type="button" class="btn btn-icon size-8.75 rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">4</button>

        <button type="button" class="btn btn-icon size-8.75 rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">5</button>

        <button type="button" class="btn btn-icon size-8.75 rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary" aria-label="Next">
          <span>»</span>
        </button>
      </nav>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import AuthorizedAppCard from './components/AuthorizedAppCard.vue'
import { authorizedAppData, integrationData } from './components/data'
import IntegrationCard from './components/IntegrationCard.vue'
</script>
