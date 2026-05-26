<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-5 flex items-center justify-between">
        <h5>Activity</h5>
        <a href="#" class="text-sm hover:text-primary">See all</a>
      </div>

      <div class="mb-5">
        <small class="text-default-400 uppercase">Stories About You</small>
        <div class="mt-2.5 flex items-center">
          <img :src="user7" class="me-2.5 size-8 rounded-full" />
          <div>
            <strong>Mentions</strong>
            <br />
            <span class="text-2xs text-default-400">3 stories mention you</span>
          </div>
        </div>
      </div>

      <span class="text-xs font-bold text-default-400 uppercase">New</span>

      <ul class="mt-2.5">
        <li v-for="(item, idx) in activityData" :key="idx" class="flex items-center py-1.25">
          <img :src="item.user.image" class="me-2.5 size-9 rounded-full" />

          <div class="grow">
            <strong>{{ item.user.name }}</strong>
            {{ item.message }}
            <br />
            <span class="text-xs text-default-400">{{ item.time }}</span>
          </div>

          <div v-if="item.image">
            <img :src="item.image" class="h-8 w-8 rounded" />
          </div>

          <div v-else class="text-base text-primary">
            <Icon icon="user-plus" />
          </div>
        </li>
      </ul>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Trending</h4>

      <div class="relative ms-auto">
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
          <button class="hs-dropdown-toggle">
            <Icon icon="dots-vertical" class="text-base text-default-400" />
          </button>

          <div class="hs-dropdown-menu">
            <div class="space-y-0.5">
              <a class="dropdown-item" href="#">
                <Icon icon="refresh" />
                Refresh Feed
              </a>

              <a class="dropdown-item" href="#">
                <Icon icon="settings" />
                Manage Topics
              </a>

              <a class="dropdown-item" href="#">
                <Icon icon="alert-circle" />
                Report issue
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
      <div v-for="(item, idx) in trendingData" :key="idx" :class="['flex', idx !== trendingData.length - 1 && 'mb-5']">
        <div>
          <Icon icon="trending-up" class="me-2.5 mt-1.25 text-sm text-primary" />
        </div>

        <RouterLink :to="item.href || ''" class="hover:text-primary">
          <strong>{{ item.title }}</strong>
          {{ item.description }}
        </RouterLink>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Requests</h4>

      <div class="relative ms-auto">
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
          <button class="hs-dropdown-toggle">
            <Icon icon="dots-vertical" class="text-base text-default-400" />
          </button>

          <div class="hs-dropdown-menu">
            <div class="space-y-0.5">
              <a class="dropdown-item" href="#">
                <Icon icon="check" />
                Mark All as Read
              </a>

              <a class="dropdown-item" href="#">
                <Icon icon="trash" />
                Clear All
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
      <div v-for="(item, idx) in requestData" :key="idx" :class="['flex items-center justify-between', idx !== requestData.length - 1 && 'mb-3']">
        <div class="flex items-start">
          <img v-if="item.image" :src="item.image" class="me-2.5 size-6 rounded-full" />

          <div v-else>
            <div :class="['me-2.5 flex size-6 items-center justify-center rounded-full text-white', item.iconClassName]">
              <Icon :icon="item.icon || 'user'" />
            </div>
          </div>

          <div>
            <p class="mb-1.25">
              <strong>{{ item.title }}</strong>
              {{ item.description }}
              <span :class="['badge ms-1.25 font-semibold text-white', item.badge.className]">
                {{ item.badge.label }}
              </span>
            </p>

            <small class="text-xs text-default-400">{{ item.time }}</small>
          </div>
        </div>

        <button class="btn btn-sm border-default-300 px-1.25 py-0 hover:border-primary hover:text-primary">
          {{ item.action }}
        </button>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Featured Video For You</h4>

      <div class="relative ms-auto">
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
          <button class="hs-dropdown-toggle">
            <Icon icon="dots-vertical" class="text-base text-default-400" />
          </button>

          <div class="hs-dropdown-menu">
            <div class="space-y-0.5">
              <a class="dropdown-item" href="#">Watch leter</a>

              <a class="dropdown-item" href="#">
                <Icon icon="trash" />
                Report video
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
      <div class="relative w-full overflow-hidden rounded pt-[56.25%]">
        <iframe src="https://player.vimeo.com/video/357274789" class="absolute start-0 top-0 h-full w-full rounded" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { activityData, requestData, trendingData } from './data'
import user7 from '/images/users/user-7.jpg'
</script>
