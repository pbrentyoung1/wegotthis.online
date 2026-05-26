<template>
  <div class="card h-full">
    <div
      id="fileSidebaroffcanvas"
      class="hs-overlay fixed start-0 top-0 bottom-0 z-50 h-full w-62.5 -translate-x-full transform rounded bg-card transition-all duration-300 [--auto-close:lg] lg:static lg:end-auto lg:bottom-0 lg:block! lg:translate-x-0 hs-overlay-open:translate-x-0"
      role="dialog"
      tabindex="-1"
      aria-label="Sidebar"
    >
      <Simplebar class="card-body h-full" data-simplebar>
        <RouterLink to="" class="btn w-full bg-danger text-white hover:bg-danger-hover"> Upload Files </RouterLink>

        <div class="mt-5">
          <div class="flex flex-col">
            <a v-for="(item, idx) in sidebarMenuItemData" :key="idx" :href="item.href" :class="['flex items-center gap-2 rounded px-3 py-2 font-medium transition', { 'bg-default-100': idx === 0 }]">
              <Icon :icon="item.icon" class="align-middle text-default-700 text-base" />
              <span class="align-middle">{{ item.name }}</span>

              <span v-if="item.badge" :class="['badge ms-auto text-2xs font-semibold', item.badge.className]">
                {{ item.badge.label }}
              </span>
            </a>
          </div>

          <div class="mt-2.5">
            <div class="px-3 py-2 text-sm font-medium tracking-wider text-default-800">Categories</div>

            <a v-for="(item, idx) in categoryData" :key="idx" href="#" class="flex items-center gap-2 rounded px-3 py-2 font-medium transition hover:bg-default-100">
              <Icon :icon="item.icon" :class="['align-middle text-sm', item.iconClassName]" />
              <span class="align-middle">{{ item.name }}</span>
            </a>
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
import { categoryData, sidebarMenuItemData } from './data'
</script>

<style></style>
