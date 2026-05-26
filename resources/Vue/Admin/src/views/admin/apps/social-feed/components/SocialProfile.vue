<template>
  <div class="card overflow-hidden lg:sticky lg:top-22">
    <div
      id="outlookSidebaroffcanvas"
      class="hs-overlay fixed start-0 top-0 bottom-0 z-50 hidden h-full min-w-75 -translate-x-full transform bg-card transition-all duration-300 [--auto-close:lg] lg:static lg:end-auto lg:bottom-0 lg:z-10 lg:block! lg:min-w-auto lg:translate-x-0 hs-overlay-open:translate-x-0"
      role="dialog"
      tabindex="-1"
      aria-label="Sidebar"
    >
      <div class="card-body h-full" data-simplebar>
        <div class="mb-5 flex items-center justify-between">
          <div class="flex items-center gap-2.5">
            <img :src="user3" class="size-10.5 rounded" />

            <div>
              <h5 class="flex items-center">
                <RouterLink to="" class="hover:text-primary">
                  {{ META_DATA.username }}
                </RouterLink>

                <img :src="usFlag" class="ms-2.5 size-4 rounded-full" />
              </h5>

              <p class="text-default-400">Content Creator</p>
            </div>
          </div>

          <div class="relative ms-auto">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
              <button class="hs-dropdown-toggle">
                <Icon icon="dots-vertical" class="text-2xl text-default-400" />
              </button>

              <div class="hs-dropdown-menu">
                <a class="dropdown-item" href="#">View Profile</a>
                <a class="dropdown-item" href="#">Send message</a>
                <a class="dropdown-item" href="#">Copy Profile Link</a>

                <div class="my-3 border-t border-default-300"></div>

                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item text-danger" href="#">Block user</a>
                <a class="dropdown-item text-danger" href="#">Report user</a>
              </div>
            </div>
          </div>
        </div>

        <div>
          <RouterLink v-for="(item, idx) in profileMainMenuData" :key="idx" to="" :class="['flex w-full items-center gap-2.25 rounded px-3 py-2 font-semibold hover:bg-default-100', idx === 0 && 'active bg-default-100']">
            <Icon :icon="item.icon" class="text-base text-default-700" />

            {{ item.label }}

            <span v-if="item.badge" :class="['badge ms-auto font-semibold', item.badge.className]">
              {{ item.badge.label }}
            </span>
          </RouterLink>

          <div class="list-group-item mt-2.5 px-3.5 py-2.25">
            <span class="align-middle font-semibold">Categories</span>
          </div>

          <RouterLink v-for="(item, idx) in categoryData" :key="idx" to="" class="flex w-full items-center gap-2.25 rounded px-3 py-2 font-semibold hover:bg-default-100 focus:bg-default-100">
            <Icon :icon="'tag'" :class="`text-base ${item.className}`" />
            {{ item.label }}
          </RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { META_DATA } from '~/config/constants'
import { categoryData, profileMainMenuData } from './data'
import usFlag from '/images/flags/us.svg'
import user3 from '/images/users/user-3.jpg'
</script>
