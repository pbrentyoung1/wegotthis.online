<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">My Social Feed</h4>
    </div>

    <div class="card-body">
      <template v-for="(item, idx) in socialFeedData" :key="idx">
        <div
          :class="`flex items-center justify-between border-default-200
          ${idx !== socialFeedData.length - 1 ? 'border-b' : 'pt-2'}
          ${idx === 0 ? 'pb-2.5' : idx !== socialFeedData.length - 1 ? 'py-2.5' : ''}`"
        >
          <div class="flex items-center gap-2.5">
            <img :src="item.image" :alt="item.name" class="size-8 rounded-md object-cover" />

            <div>
              <h5 class="text-sm font-medium text-default-800">
                {{ item.name }}
              </h5>
              <p class="text-xs text-default-400">
                {{ item.text }}
              </p>
            </div>

            <template v-if="item.badge">
              <span :class="`badge ${item.badge.className}`">
                {{ item.badge.text }}
              </span>
            </template>
          </div>

          <div class="flex items-center gap-1">
            <template v-if="item.time">
              <small class="text-[11px] text-default-400">
                {{ item.time }}
              </small>
            </template>

            <template v-if="item.actionIcons">
              <template v-for="(action, i) in item.actionIcons" :key="i">
                <RouterLink to="" :class="`btn btn-icon size-8 ${action.className}`">
                  <Icon :icon="action.icon" class="text-lg" />
                </RouterLink>
              </template>
            </template>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { socialFeedData } from './data'
</script>
