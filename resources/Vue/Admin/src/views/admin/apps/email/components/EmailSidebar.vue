<template>
  <div class="card h-full">
    <div
      id="emailSidebaroffcanvas"
      class="hs-overlay fixed start-0 top-0 bottom-0 z-50 hidden h-full w-56.5 -translate-x-full transform rounded bg-card transition-all duration-300 [--auto-close:lg] lg:static lg:end-auto lg:bottom-0 lg:block! lg:translate-x-0 hs-overlay-open:translate-x-0"
      role="dialog"
      tabindex="-1"
      aria-label="Sidebar"
    >
      <Simplebar class="card-body h-full" data-simplebar>
        <RouterLink to="/apps/email/compose" class="btn w-full bg-danger text-white hover:bg-danger-hover"> Compose </RouterLink>

        <div class="mt-5">
          <div class="flex flex-col">
            <RouterLink v-for="(item, idx) in emailSidebarMenuData" :key="idx" :to="item.link" :class="['flex items-center gap-2 rounded  px-3 py-2 font-medium transition', idx === 0 && 'bg-default-100']">
              <Icon :icon="item.icon" :class="['align-middle text-base', idx != 0 && 'text-base text-default-700']" />

              <span class="align-middle">
                {{ item.label }}
              </span>

              <span v-if="item.badge" :class="['badge ms-auto  text-2xs font-semibold', item.badge.className]">
                {{ item.badge.text }}
              </span>
            </RouterLink>
          </div>

          <div class="mt-2.5">
            <div class="px-3 py-2 text-sm font-medium tracking-wider text-default-800">Labels</div>

            <RouterLink v-for="(item, idx) in labels" :key="idx" to="" class="flex items-center gap-2 rounded px-3 py-2 font-medium transition hover:bg-default-100">
              <Icon icon="chart-donut" :class="['align-middle text-sm', item.iconClassName]" />

              <span class="align-middle">
                {{ item.name }}
              </span>
            </RouterLink>
          </div>
        </div>
      </Simplebar>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Simplebar from 'simplebar-vue'
import Icon from '~/components/wrappers/Icon.vue'
import { emailSidebarMenuData, labels } from './data'
</script>
