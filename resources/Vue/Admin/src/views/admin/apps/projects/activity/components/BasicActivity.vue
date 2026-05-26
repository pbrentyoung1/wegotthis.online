<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Basic Activity Stream</h4>
    </div>

    <div class="card-body">
      <div v-for="(activity, idx) in basicActivityData" :key="idx" :class="['flex items-center gap-base', idx === 0 ? 'pb-2.5' : 'py-2.5']">
        <span :class="`badge badge-label ${activity.className} text-white`">
          {{ activity.status }}
        </span>

        <span class="text-default-400">
          {{ activity.time }}
        </span>

        <a href="#" class="flex items-center gap-1.5 font-semibold hover:text-primary">
          <img :src="activity.user.image" :alt="activity.user.name" class="size-4 rounded-full" />
          {{ activity.user.name }}
        </a>

        <span>
          {{ activity.action }}
        </span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { basicActivityData } from './data'
</script>
