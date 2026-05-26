<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-7.5 flex items-center">
        <div class="relative me-5">
          <template v-if="contact.image">
            <img :src="contact.image" class="size-18 rounded-full" />
          </template>
          <template v-else>
            <div class="flex size-18 shrink-0 items-center justify-center overflow-hidden rounded-full bg-primary text-white">
              <span class="text-[22px] font-semibold">{{ generateInitials(contact.name) }} </span>
            </div>
          </template>

          <span :class="`badge ${contact.className} absolute inset-e-0 bottom-0 rounded-full p-1.25 text-white`">
            <Icon icon="star" class="text-white" />
          </span>
        </div>

        <div>
          <h5 class="mb-1.25 flex items-center">
            {{ contact.name }}
            <img :src="contact.flag" class="ms-2.5 size-4 rounded-full" />
          </h5>

          <p class="mb-1.25 text-default-400">{{ contact.position }}</p>
          <span class="badge badge-label bg-light">{{ contact.role }}</span>
        </div>

        <div class="relative ms-auto">
          <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle btn size-9.25 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
              <Icon icon="dots-vertical" class="text-xl" />
            </button>

            <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
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

      <ul class="mb-7.5 text-default-400">
        <li class="mb-2.5">
          <div class="flex items-center gap-2.5">
            <div>
              <span class="flex size-6 items-center justify-center rounded-full bg-light text-default-800">
                <Icon icon="mail" />
              </span>
            </div>
            <h5 class="text-sm font-medium">
              <RouterLink to="" class="hover:text-primary">
                {{ contact.email }}
              </RouterLink>
            </h5>
          </div>
        </li>

        <li class="mb-2.5">
          <div class="flex items-center gap-2.5">
            <div>
              <span class="flex size-6 items-center justify-center rounded-full bg-light text-default-800">
                <Icon icon="phone" />
              </span>
            </div>
            <h5 class="text-sm font-medium">
              <RouterLink to="" class="hover:text-primary">
                {{ contact.contact }}
              </RouterLink>
            </h5>
          </div>
        </li>

        <li class="mb-2.5">
          <div class="flex items-center gap-2.5">
            <div>
              <span class="flex size-6 items-center justify-center rounded-full bg-light text-default-800">
                <Icon icon="map-pin" />
              </span>
            </div>
            <h5 class="text-sm font-medium">
              <RouterLink to="" class="hover:text-primary">
                {{ contact.location }}
              </RouterLink>
            </h5>
          </div>
        </li>

        <li>
          <div class="flex items-center gap-2.5">
            <div>
              <span class="flex size-6 items-center justify-center rounded-full bg-light text-default-800">
                <Icon icon="link" />
              </span>
            </div>
            <h5 class="text-sm font-medium">
              <RouterLink to="" class="text-primary hover:text-primary-hover">
                {{ contact.website }}
              </RouterLink>
            </h5>
          </div>
        </li>
      </ul>

      <div class="flex items-center justify-between">
        <span class="flex items-center text-xs text-default-400">
          <Icon icon="refresh" class="me-1.25" />
          {{ contact.updatedTime }}
        </span>

        <button class="btn btn-sm rounded-full bg-primary/15 text-primary hover:bg-primary hover:text-white">View Profile</button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { generateInitials } from '~/utils/helpers'
import type { ContactType } from './data'

defineProps<{
  contact: ContactType
}>()
</script>
