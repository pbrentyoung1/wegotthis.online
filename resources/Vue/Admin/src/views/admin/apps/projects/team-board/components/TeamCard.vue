<template>
  <div class="card h-full">
    <!-- CARD HEADER -->
    <div class="card-header">
      <h4 class="card-title">
        IT-{{ (index + 1).toString().padStart(2, '0') }} - {{ team.name }}

        <!-- Angular @if → Vue v-if -->
        <span v-if="team.isNew" class="badge badge-label ms-2.5 text-white bg-primary"> New </span>
      </h4>

      <div class="relative ms-auto">
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
          <button type="button" class="hs-dropdown-toggle text-default-400">
            <Icon icon="dots-vertical" class="size-4.5" />
          </button>

          <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-44 px-0 py-1">
            <div class="space-y-0.5">
              <a class="dropdown-item">
                <Icon icon="eye" />
                View
              </a>

              <a class="dropdown-item">
                <Icon icon="edit" />
                Edit
              </a>

              <a class="dropdown-item text-danger">
                <Icon icon="trash" />
                Remove
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD BODY -->
    <div class="card-body">
      <p class="mb-2.5 text-default-400 text-sm">Total {{ team.members?.length ?? 0 }} members</p>

      <!-- MEMBERS LOOP (Angular @for → Vue v-for) -->
      <div class="flex mb-5">
        <div v-for="(m, i) in team.members" :key="i" :class="i !== 0 ? '-ms-2' : ''">
          <img :src="m" alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" />
        </div>
      </div>

      <!-- ABOUT -->
      <div class="pb-5">
        <h5 class="mb-2.5">About Team:</h5>
        <p class="text-default-400 mb-4">
          {{ team.description }}
        </p>
      </div>

      <!-- STATS LOOP -->
      <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base">
        <div v-for="(stat, i) in team.stats" :key="i" class="flex gap-2.5">
          <div>
            <span class="flex justify-center items-center size-8 bg-light rounded-full">
              <Icon :icon="stat.icon" class="text-primary size-4" />
            </span>
          </div>

          <div>
            <h6 class="mb-1.25 text-default-400 text-xs uppercase">
              {{ stat.name }}
            </h6>

            <p class="font-medium">{{ stat.count?.prefix }}{{ stat.count?.value }}{{ stat.count?.suffix }}</p>
          </div>
        </div>
      </div>

      <!-- PROGRESS -->
      <div class="my-5">
        <div class="flex items-center justify-between mb-2.5">
          <p class="text-default-400 font-semibold text-xs">
            {{ team.progressTitle }}
          </p>
          <p class="font-semibold">{{ team.progress }}%</p>
        </div>

        <div class="w-full h-2 bg-default-100 rounded-full overflow-hidden">
          <div class="bg-primary h-full" :style="{ width: team.progress + '%' }"></div>
        </div>
      </div>

      <!-- FOOTER -->
      <div class="flex justify-between items-center">
        <span class="text-default-400 text-xs flex items-center">
          <Icon icon="clock" class="me-1.25" />
          Updated {{ team.updatedTime }}
        </span>

        <a href="#" class="btn btn-sm bg-primary text-white rounded-full"> Details </a>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import type { TeamType } from './data'

defineProps<{
  team: TeamType
  index: number
}>()
</script>
