<template>
  <div v-for="(task, idx) in taskData" :key="idx" class="card mb-1.25">
    <div class="card-body p-2.5">
      <div class="grid grid-cols-1 items-center justify-between gap-base lg:grid-cols-2">
        <div class="col-span-1">
          <div class="flex items-center gap-2.5">
            <input type="checkbox" class="form-checkbox size-5.5! rounded-full" />

            <RouterLink to="" class="font-medium hover:text-primary">
              {{ task.title }}
            </RouterLink>
          </div>
        </div>

        <div class="col-span-1">
          <div class="flex flex-wrap items-center justify-start gap-base lg:justify-end">
            <div class="flex items-center gap-1.5">
              <div>
                <img :src="task.user.image" alt="avatar" class="size-6 rounded-full" />
              </div>

              <div>
                <h5 class="text-nowrap">
                  <RouterLink to="" class="hover:text-primary">
                    {{ task.user.name }}
                  </RouterLink>
                </h5>
              </div>
            </div>

            <div class="shrink-0">
              <span :class="['badge badge-label text-white', getStatusVariant(task.status)]">
                {{ toPascalCase(task.status) }}
              </span>
            </div>

            <ul class="flex shrink-0 flex-wrap items-center gap-3.5 text-end">
              <li class="flex items-center gap-1.5">
                <Icon icon="calendar" class="me-1.25 align-middle text-base text-default-400" />
                <span class="font-semibold">{{ task.time }}</span>
              </li>

              <li class="flex items-center gap-1.5">
                <Icon icon="list-details" class="me-1.25 align-middle text-base text-default-400" />
                <span class="font-medium"> {{ task.tasks.completed }}/{{ task.tasks.total }} </span>
              </li>

              <li class="flex items-center gap-1.5">
                <Icon icon="message" class="me-1.25 align-middle text-base text-default-400" />
                <span class="font-medium">
                  {{ task.comments }}
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { taskData } from './data'

const getStatusVariant = (status: string) => (status === 'in-progress' ? 'bg-warning' : status === 'review' ? 'bg-info' : status === 'delayed' ? 'bg-danger' : status === 'pending' ? 'bg-primary' : status === 'planned' ? 'bg-secondary' : 'bg-success')
</script>
