<template>
  <div class="card border border-dashed border-default-300">
    <div class="card-body p-2.5">
      <div class="flex items-center justify-between gap-3">
        <div class="flex size-9 items-center justify-center rounded-md bg-light/50 text-default-400">
          <Icon icon="folder" class="text-2xl" />
        </div>

        <div>
          <h5 class="mb-1.25 text-xs">
            <a href="#" class="hover:text-primary">{{ folder.name }}</a>
          </h5>
          <p class="text-xs text-default-400">{{ formatBytes(folder.size) }}</p>
        </div>

        <div class="relative ms-auto">
          <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle text-xl text-default-400" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
              <Icon icon="dots-vertical" class="text-xl" />
            </button>

            <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
              <div class="space-y-0.5">
                <a class="dropdown-item" href="#">
                  <Icon icon="share" />
                  Share
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="link" />
                  Get Sharable Link
                </a>

                <a class="dropdown-item" href="/images/users/user-1.jpg" download>
                  <Icon icon="download" />
                  Download
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="pin" />
                  Pin
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="edit" />
                  Edit
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="trash" />
                  Delete
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import { formatBytes } from '~/utils/helpers'
import type { FolderType } from './data'

defineProps<{
  folder: FolderType
}>()
</script>

<style></style>
