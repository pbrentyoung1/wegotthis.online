<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-7.5 flex items-start">
        <div>
          <div class="flex size-12 items-center justify-center rounded-full bg-primary/15 text-primary">
            <Icon :icon="props.member.icon" class="text-2xl" />
          </div>
        </div>

        <div class="ms-6">
          <h5 class="mb-1.25 text-sm">{{ props.member.title }}</h5>
          <p class="text-default-400">{{ props.member.description }}</p>
        </div>

        <div class="relative ms-auto">
          <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle text-lg text-default-400" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
              <Icon icon="dots-vertical" class="text-xl" />
            </button>

            <div class="hs-dropdown-menu" role="menu">
              <div class="space-y-0.5">
                <a class="dropdown-item" href="#">
                  <Icon icon="eye" />
                  View
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="edit" />
                  Edit
                </a>

                <a class="dropdown-item text-danger" href="#">
                  <Icon icon="trash" />
                  Remove
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <ul class="mb-5 flex flex-col gap-y-3">
        <li v-for="(feature, idx) in props.member.features" :key="idx" class="flex items-center gap-3">
          <Icon icon="check" class="text-base text-success" />
          {{ feature }}
        </li>
      </ul>

      <p class="mb-3 text-sm text-default-400">Total {{ props.member.users.length }} users</p>

      <div class="mb-5 flex items-center -space-x-2">
        <!-- Users -->
        <img v-for="(user, index) in props.member.users.length <= 5 ? props.member.users : props.member.users.slice(0, 4)" :key="index" :src="user.image" class="transitio-all size-8 rounded-full duration-200 hover:-translate-y-1" />

        <!-- +More -->
        <div v-if="props.member.users.length > 5" class="hs-tooltip transitio-all inline-block duration-200 [--placement:top] hover:-translate-y-1">
          <button type="button" class="hs-tooltip-toggle flex size-8 items-center justify-center rounded-full bg-primary text-white">
            <span class="font-bold"> +{{ props.member.users.length - 4 }} </span>

            <!-- Tooltip -->
            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible bg-default-900 text-default-100 invisible absolute z-10 inline-block w-14 rounded-md px-2 py-1 text-xs font-medium opacity-0 shadow-2xs transition-opacity" role="tooltip">
              {{ props.member.users.length - 4 }} More
            </span>
          </button>
        </div>
      </div>

      <div class="flex justify-between">
        <span class="flex items-center gap-1.5 text-xs text-default-400">
          <Icon icon="clock" />
          Updated {{ props.member.time }}
        </span>

        <div>
          <RouterLink to="/apps/users/role-details" class="btn btn-sm rounded-full border border-primary text-primary hover:bg-primary hover:text-white"> Details </RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import type { MemberRoleType } from './data'

const props = defineProps<{
  member: MemberRoleType
}>()
</script>
