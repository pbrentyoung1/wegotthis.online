<template>
  <div class="card flex flex-row p-5">
    <div class="flex items-center items-start">
      <img :src="company.image" :alt="company.name" class="me-5 size-12" />
      <div class="grow">
        <div class="flex items-start justify-between">
          <div>
            <h4 class="mb-1.25 text-lg font-bold">{{ company.name }}</h4>
            <a :href="`https://${company.website}`" class="text-default-400"> www.{{ company.name?.split(' ')[0]?.toLowerCase() }}.com </a>
          </div>

          <a href="#" class="btn btn-sm rounded-full border border-danger text-danger hover:bg-danger hover:text-white">
            <Icon icon="heart" class="me-1.25" />
            Follow
          </a>
        </div>

        <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
          <span class="badge bg-light text-2xs text-primary">
            <Icon icon="map-pin" class="me-1.25" />
            {{ company.location }}
          </span>

          <span class="badge bg-light text-2xs text-success">
            {{ company.industry }}
          </span>
        </div>

        <p class="mb-5 text-default-400">
          {{ company.description }}
        </p>

        <div class="mt-2.5 flex flex-wrap justify-between gap-5">
          <div>
            <h6 class="mb-2 text-xs text-default-400">Employees</h6>
            <span class="text-base font-semibold">{{ company.employees }}</span>
          </div>

          <div>
            <h6 class="mb-2 text-xs text-default-400">Revenue</h6>
            <span class="text-base font-semibold">{{ company.revenue }}</span>
          </div>

          <Rating :rating="company.rating" class="flex items-start fs-lg gap-1" />
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import Rating from '~/components/Rating.vue'
import Icon from '~/components/wrappers/Icon.vue'
import type { CompanyType } from './data'

defineProps<{
  company: CompanyType
}>()
</script>
