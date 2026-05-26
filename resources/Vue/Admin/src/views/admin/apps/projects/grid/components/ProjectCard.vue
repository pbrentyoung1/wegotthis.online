<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-5 flex border-b border-default-300 pb-6">
        <div class="me-6">
          <span :class="['flex size-12 items-center justify-center rounded text-white', project.iconClassName]">
            <Icon :icon="project.icon" class="text-2xl" />
          </span>
        </div>

        <div class="flex-1">
          <div class="flex items-start gap-3">
            <h5 class="mb-1.25 flex items-center text-md hover:text-primary">
              <RouterLink to="/apps/projects/details" class="leading-tight hover:text-primary">
                {{ project.title }}
              </RouterLink>
            </h5>

            <span
              :class="[
                'badge badge-label whitespace-nowrap',
                project.status === 'critical'
                  ? 'bg-danger/15 text-danger'
                  : project.status === 'pending'
                    ? 'bg-warning/15 text-warning'
                    : project.status === 'review'
                      ? 'bg-info/15 text-info'
                      : project.status === 'on-hold'
                        ? 'bg-secondary/15 text-secondary'
                        : project.status === 'monitoring'
                          ? 'bg-dark/15 text-dark'
                          : 'bg-success/15 text-success',
              ]"
            >
              {{ toPascalCase(project.status) }}
            </span>
          </div>

          <p class="text-2xs text-default-400">Updated {{ project.updatedTime }}</p>
        </div>

        <div class="relative ms-3">
          <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle btn btn-icon text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
              <Icon icon="dots-vertical" class="text-lg" />
            </button>

            <div class="hs-dropdown-menu" role="menu">
              <div class="space-y-0.5">
                <a class="dropdown-item" href="#">
                  <Icon icon="share" />
                  Share
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="edit" />
                  Edit
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="ban" />
                  Block
                </a>

                <a class="dropdown-item text-danger" href="#">
                  <Icon icon="trash" />
                  Delete
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-5 grid gap-base md:grid-cols-2">
        <div>
          <div class="flex items-center gap-2.5">
            <Icon icon="list-check" class="text-base text-default-400" />
            <div>
              <div class="font-medium">{{ project.task.completed }}/{{ project.task.total }}</div>
              <small class="text-xs text-default-400">
                {{ project.task.label }}
              </small>
            </div>
          </div>
        </div>

        <div>
          <div class="flex items-center gap-2.5">
            <Icon icon="paperclip" class="text-base text-default-400" />
            <div>
              <div class="font-medium">{{ project.files.count }} {{ project.files.type || 'Files' }}</div>
              <small class="text-xs text-default-400">
                {{ project.files.description }}
              </small>
            </div>
          </div>
        </div>

        <div>
          <div class="flex items-center gap-2.5">
            <Icon icon="message" class="text-base text-default-400" />
            <div>
              <div class="font-medium">{{ project.comments.count }} Comments</div>
              <small class="text-xs text-default-400">
                {{ project.comments.description }}
              </small>
            </div>
          </div>
        </div>

        <div>
          <div class="flex items-center gap-2.5">
            <Icon icon="calendar-clock" class="text-base text-default-400" />
            <div>
              <div class="font-medium">{{ project.dueDate.date }}</div>
              <small class="text-xs text-default-400">
                {{ project.dueDate.description }}
              </small>
            </div>
          </div>
        </div>
      </div>

      <p class="mb-2.5 pt-2.5 text-xs font-semibold text-default-400">Team Members:</p>

      <div class="mb-5 flex">
        <div v-for="(member, idx) in project.members" :key="idx" :class="idx !== 0 ? '-ms-1.5' : ''">
          <img :src="member.image" alt="" class="size-6 rounded-full transition-all duration-200 hover:-translate-y-0.5" />
        </div>
      </div>

      <div>
        <div class="mb-2.5 flex items-center justify-between">
          <p class="text-xs font-semibold text-default-400">Progress</p>
          <p class="font-semibold">{{ project.progress }}%</p>
        </div>

        <div class="h-1.25 w-full overflow-hidden rounded-full bg-default-100">
          <div :class="['h-full', project.iconClassName]" :style="{ width: project.progress + '%' }"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import type { ProjectType } from './data'

defineProps<{
  project: ProjectType
}>()
</script>
