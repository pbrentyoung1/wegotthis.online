<template>
  <PageBreadcrumb title="Timeline" subtitle="Pages" />

  <div class="grid grid-cols-1 gap-base lg:grid-cols-2">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Timeline</h4>
      </div>
      <div class="card-body">
        <div>
          <div v-for="(item, idx) in basicTimelineData" :key="idx" class="flex gap-x-base">
            <div class="w-15 text-end md:w-25">
              <span class="text-default-400">{{ item.time }}</span>
            </div>

            <div :class="['relative -ms-px after:absolute after:start-1/2 after:top-3 after:bottom-0 after:w-px after:border-e after:border-dashed after:border-default-300', idx === basicTimelineData.length - 1 && 'after:hidden']">
              <div class="relative z-10 flex items-center justify-center">
                <div :class="['ms-0.5 size-3.25 rounded-full', item.className]" />
              </div>
            </div>

            <div :class="['flex-1', idx !== basicTimelineData.length - 1 && 'pb-7.5']">
              <h5 class="mb-1.25">{{ item.title }}</h5>
              <p class="mb-1.25 text-default-400">{{ item.description }}</p>
              <span class="font-semibold text-primary">By {{ item.author }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Timeline with Icons</h4>
      </div>
      <div class="card-body">
        <div>
          <div v-for="(item, idx) in iconTimelineData" :key="idx" class="flex gap-x-base">
            <div class="w-15 text-end md:w-25">
              <span class="text-default-400">{{ item.time }}</span>
            </div>

            <div :class="['relative -ms-px after:absolute after:start-1/2 after:top-3 after:bottom-0 after:w-px after:border-e after:border-dashed after:border-default-300', idx === iconTimelineData.length - 1 && 'after:hidden']">
              <div class="relative z-10 flex items-center justify-center">
                <div v-if="item.className && item.icon" :class="['flex size-7.5 items-center justify-center rounded-full', item.className]">
                  <Icon :icon="item.icon" :class="['text-lg', item.iconTextClassName ? item.iconTextClassName : 'text-white']" />
                </div>
              </div>
            </div>

            <div :class="['flex-1', idx !== iconTimelineData.length - 1 && 'pb-7.5']">
              <h5 class="mb-1.25">{{ item.title }}</h5>
              <p class="mb-1.25 text-default-400">{{ item.description }}</p>
              <span class="font-semibold text-primary">By {{ item.author }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Timeline with Border</h4>
      </div>
      <div class="card-body">
        <div>
          <div v-for="(item, idx) in userTimelineData" :key="idx" class="flex gap-x-base">
            <div class="w-15 text-end md:w-25">
              <span class="text-default-400">{{ item.time }}</span>
            </div>

            <div :class="['relative -ms-px after:absolute after:start-1/2 after:top-3 after:bottom-0 after:w-px after:border-e after:border-dashed after:border-default-300', idx === userTimelineData.length - 1 && 'after:hidden']">
              <div class="relative z-10 flex items-center justify-center">
                <div v-if="item.icon" class="flex size-7.5 items-center justify-center rounded-full border border-dashed border-default-300">
                  <Icon :icon="item.icon" class="text-lg text-default-400" />
                </div>
              </div>
            </div>

            <div :class="['flex-1', idx !== userTimelineData.length - 1 && 'pb-7.5']">
              <h5 class="mb-1.25">{{ item.title }}</h5>
              <p class="mb-1.25 text-default-400">{{ item.description }}</p>
              <span class="font-semibold text-primary">By {{ item.author }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Timeline with Users</h4>
      </div>
      <div class="card-body">
        <div>
          <div v-for="(item, idx) in borderTimelineData" :key="idx" class="flex gap-x-base">
            <div :class="['relative -ms-px after:absolute after:start-1/2 after:top-3 after:bottom-0 after:w-px after:border-e after:border-dashed after:border-default-300', idx === borderTimelineData.length - 1 && 'after:hidden']">
              <div v-if="item.image" class="relative z-10">
                <img :src="item.image" alt="avatar-1" class="size-7.5 rounded-full" />
              </div>
            </div>

            <div :class="['flex-1', idx !== borderTimelineData.length - 1 && 'pb-7.5']">
              <h5 class="mb-1.25">{{ item.title }}</h5>
              <p class="mb-1.25 text-default-400">{{ item.description }}</p>
              <span class="font-semibold text-primary">By {{ item.author }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { basicTimelineData, borderTimelineData, iconTimelineData, userTimelineData } from './components/data'
</script>
