<template>
  <div class="card">
    <div class="card-body pb-2">
      <div class="mb-2.5 flex items-center gap-2.5">
        <img class="size-9 rounded-full" :src="image" alt="Generic placeholder image" />

        <div class="w-full">
          <h5>
            <RouterLink to="/apps/users/profile" class="hover:text-primary">{{ name }}</RouterLink>
          </h5>

          <p class="text-default-400">
            <small>{{ time }}</small>
          </p>
        </div>

        <div class="relative ms-auto">
          <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
              <Icon icon="dots-vertical" class="text-base text-default-400" />
            </button>

            <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
              <div class="space-y-0.5">
                <a class="dropdown-item" href="#">
                  <Icon icon="edit" />
                  Edit post
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="trash" />
                  Delete post
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="share" />
                  Share
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="pin" />
                  Pin to top
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="flag" />
                  Report post
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <p v-if="description" class="mb-4">
        {{ description }}
      </p>

      <slot />

      <div class="mt-2.5">
        <RouterLink to="" class="btn btn-sm text-sm text-default-400">
          <Icon icon="corner-up-left" class="text-sm" />
          Reply
        </RouterLink>

        <RouterLink to="" class="btn btn-sm text-sm text-default-400">
          <div class="relative">
            <span id="like-count-one"></span>
            <button type="button" :data-hs-toggle-password="JSON.stringify({ target: '#like-count-one' })">
              <div class="flex items-center gap-1.25 hs-password-active:hidden">
                <Icon icon="heart-filled" class="text-danger" />
                Liked!
              </div>

              <div class="hidden items-center gap-1.25 hs-password-active:flex">
                <Icon icon="heart" class="text-default-400" />
                Like
              </div>
            </button>
          </div>
        </RouterLink>

        <RouterLink to="" class="btn btn-sm text-sm text-default-400">
          <Icon icon="share" class="text-sm" />
          Share
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'

defineProps<{
  image: string
  name: string
  time: string
  description?: string
}>()
</script>
