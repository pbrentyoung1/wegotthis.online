<template>
  <BCard no-body class="d-flex flex-row p-3">
    <img :src="company.logo" alt="" class="avatar-xl me-3" />

    <div class="flex-grow-1">
      <div class="d-flex justify-content-between align-items-start">
        <div>
          <h4 class="mb-1 fw-bold">{{ company.name }}</h4>
          <Link :href="`https://${company.website}`" class="text-muted text-decoration-none" target="_blank"> www.{{ company.name?.split(' ')[0]?.toLowerCase() }}.com </Link>
        </div>
        <BButton size="sm" variant="outline-danger" class="rounded-pill"> <Icon icon="heart" class="me-1" /> Follow </BButton>
      </div>

      <div class="mt-2 mb-3 d-flex flex-wrap gap-2">
        <span class="badge bg-light text-primary p-1 fs-xxs d-flex align-items-center">
          <Icon icon="map-pin" class="me-1" />
          {{ company.location }}
        </span>
        <span class="badge bg-light text-success p-1 fs-xxs d-flex align-items-center">
          {{ company.category.label }}
        </span>
      </div>

      <p class="text-muted mb-3">
        {{ company.description }}
      </p>

      <div class="d-flex justify-content-between flex-wrap mt-2 gap-3">
        <div>
          <h6 class="text-muted">Employees</h6>
          <span class="fw-semibold fs-lg">{{ company.employees.prefix || '' }} {{ company.employees.count }}{{ company.employees.suffix || '' }}</span>
        </div>
        <div>
          <h6 class="text-muted">Revenue</h6>
          <span class="fw-semibold fs-lg">{{ company.revenue.prefix || '' }}{{ company.revenue.count }}{{ company.revenue.suffix || '' }}</span>
        </div>
        <Rating :rating="company.rating" class="d-flex gap-1 align-self-center fs-lg" />
      </div>
    </div>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BButton, BCard } from 'bootstrap-vue-next'
import Rating from '@/components/Rating.vue'
import Icon from '@/components/wrappers/Icon.vue'
import type { CompanyProfileType } from '../data'

defineProps<{
  company: CompanyProfileType
}>()
</script>
