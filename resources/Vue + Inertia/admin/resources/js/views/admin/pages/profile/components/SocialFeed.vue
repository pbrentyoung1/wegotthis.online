<template>
  <BCard no-body>
    <BCardHeader>
      <BCardTitle>My Social Feed</BCardTitle>
    </BCardHeader>

    <BCardBody>
      <div v-for="(item, index) in socialFeedData" :key="index" class="d-flex justify-content-between align-items-center" :class="[index !== socialFeedData.length - 1 ? 'border-bottom' : 'pt-2', index === 0 ? 'pb-2' : index !== socialFeedData.length - 1 ? 'py-2' : '']">
        <div class="d-flex align-items-center gap-2">
          <div class="avatar avatar-sm">
            <img :src="item.image" class="img-fluid rounded" />
          </div>

          <div>
            <h5 class="fs-sm mb-0 lh-base">
              {{ item.name }}
            </h5>
            <p class="text-muted fs-xs mb-0">
              {{ item.text }}
            </p>
          </div>

          <div v-if="item.badge">
            <span :class="`badge badge-soft-${item.badge.variant}`">
              {{ item.badge.text }}
            </span>
          </div>
        </div>

        <div>
          <small v-if="item.time" class="text-muted fs-xxs">
            {{ item.time }}
          </small>

          <div class="d-flex gap-1">
            <Link v-for="(icon, i) in item.actionIcons || []" :key="i" href="#" :class="`btn btn-sm btn-icon btn-${icon.variant}`">
              <Icon :icon="icon.icon" class="fs-lg" />
            </Link>
          </div>
        </div>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import { socialFeedData } from './data'
</script>
