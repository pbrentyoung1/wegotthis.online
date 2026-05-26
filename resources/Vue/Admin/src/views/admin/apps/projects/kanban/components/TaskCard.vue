<template>
  <div class="card border border-light hover:shadow-lg! mb-2.5">
    <div class="card-body">
      <div class="mb-2.5 flex items-center justify-between">
        <div>
          <span class="badge" :class="item.category?.badgeClassName">
            <Icon icon="circle-filled" />
            {{ item.category?.name }}
          </span>
        </div>

        <div class="relative ms-auto">
          <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100">
              <Icon icon="dots-vertical" class="text-xl" />
            </button>

            <div class="hs-dropdown-menu">
              <div class="space-y-0.5">
                <a class="dropdown-item">
                  <Icon icon="share" class="me-2" />
                  Share
                </a>

                <a class="dropdown-item">
                  <Icon icon="edit" class="me-2" />
                  Edit
                </a>

                <a class="dropdown-item">
                  <Icon icon="ban" class="me-2" />
                  Block
                </a>

                <a class="dropdown-item text-danger">
                  <Icon icon="trash" class="me-2" />
                  Delete
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <h5 class="mb-5">
        <RouterLink to="" class="hover:text-primary">
          {{ item.title }}
        </RouterLink>
      </h5>

      <div v-if="item.image" class="mb-5">
        <img :src="item.image" alt="" class="rounded" draggable="false" />
      </div>

      <div class="flex justify-between items-center">
        <div class="flex items-center -space-x-1.5">
          <div v-for="(user, i) in item.users" :key="i">
            <img :src="user" alt="" class="transition-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" />
          </div>
        </div>

        <div class="flex items-center gap-2.5">
          <Icon icon="calendar-clock" class="text-default-400 text-lg" />
          <h5 class="text-sm font-medium">{{ item.date }}</h5>
        </div>
      </div>

      <div v-if="item.progress" class="mt-5">
        <div class="flex items-center justify-between mb-2.5">
          <p class="text-default-400 font-semibold text-2xs">Progress</p>
          <p class="font-semibold mb-0">{{ item.progress }}%</p>
        </div>

        <div class="w-full bg-default-200 rounded-full h-1.25">
          <div class="h-1.25 rounded-full" :class="item.className" :style="{ width: item.progress + '%' }"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import type { KanbanTaskType } from './data'

defineProps<{
  item: KanbanTaskType
}>()
</script>
