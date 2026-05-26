<template>
  <BCard no-body>
    <BCardBody class="card-body">
      <Link href="#" class="text-muted float-end mt-n1 fs-xl">
        <Icon icon="external-link" />
      </Link>

      <h5 :title="item.title">
        {{ item.title }}
      </h5>

      <div class="d-flex align-items-center gap-2 my-3">
        <div class="avatar-md flex-shrink-0">
          <span :class="`avatar-title text-bg-${item.variant} rounded-circle fs-22`">
            <Icon :icon="item.icon" />
          </span>
        </div>

        <h3 class="mb-0">{{ item.count.prefix }}{{ item.count.value }}{{ item.count.suffix }}</h3>

        <span :class="`badge badge-soft-${item.variant} fw-medium ms-2 fs-xs ms-auto`">
          {{ item.badge }}
        </span>
      </div>

      <p class="mb-0">
        <span class="d-inline-flex gap-1 align-items-center">
          <span :class="`text-${item.variant}`">
            <Icon icon="circle" class="align-middle" />
          </span>

          <span class="text-nowrap text-muted">
            {{ item.description }}
          </span>
        </span>

        <span class="float-end">
          <b> {{ item.totalCount.prefix }}{{ item.totalCount.value }}{{ item.totalCount.suffix }} </b>
        </span>
      </p>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import type { StatisticsCardType } from './data'

defineProps<{
  item: StatisticsCardType
}>()
</script>
