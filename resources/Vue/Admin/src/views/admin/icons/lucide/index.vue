<template>
  <PageBreadcrumb title="Lucide" subtitle="Icons" />

  <div class="container-fluid">
    <div class="card">
      <div class="card-header block">
        <h4 class="card-title mb-1.25">Overview</h4>
        <p class="text-default-400">Lucide is an open-source library of clean, scalable SVG icons for web and app development, offering easy integration and customization.</p>
      </div>

      <div class="card-body">
        <h4 class="mb-2 text-sm">Usage</h4>

        <div class="mt-3 flex items-center gap-3">
          <IconifyIcon icon="lucide:camera" class="text-2xl" />
          <IconifyIcon icon="lucide:heart" class="text-2xl" />
          <IconifyIcon icon="lucide:star" class="text-2xl" />
          <IconifyIcon icon="lucide:check" class="text-2xl" />
          <IconifyIcon icon="lucide:bell" class="text-2xl" />
          <IconifyIcon icon="lucide:cloud" class="text-2xl" />
          <IconifyIcon icon="lucide:user" class="text-2xl" />
        </div>
      </div>

      <div class="card-body border-default-300 border-t border-dashed">
        <h4 class="mb-2 text-sm">Colors</h4>

        <div class="mt-3 flex items-center gap-3">
          <IconifyIcon icon="lucide:house" class="text-primary text-2xl" />
          <IconifyIcon icon="lucide:settings" class="text-secondary text-2xl" />
          <IconifyIcon icon="lucide:calendar" class="text-success text-2xl" />
          <IconifyIcon icon="lucide:message-circle" class="text-info text-2xl" />
          <IconifyIcon icon="lucide:flag" class="text-warning text-2xl" />
          <IconifyIcon icon="lucide:folder" class="text-danger text-2xl" />
          <IconifyIcon icon="lucide:globe" class="text-light text-2xl" />
          <IconifyIcon icon="lucide:key" class="text-dark text-2xl" />
          <IconifyIcon icon="lucide:layers" class="text-purple text-2xl" />
        </div>
      </div>

      <div class="card-body border-default-300 border-t border-dashed">
        <h4 class="mb-2 text-sm">Sizes</h4>

        <div class="mt-3 flex items-center gap-3">
          <IconifyIcon icon="lucide:phone" class="size-8.75" />
          <IconifyIcon icon="lucide:badge-dollar-sign" class="size-7.5" />
          <IconifyIcon icon="lucide:monitor" class="size-6" />
          <IconifyIcon icon="lucide:tablet" class="size-4.25" />
          <IconifyIcon icon="lucide:gamepad-2" class="size-3.5" />
          <IconifyIcon icon="lucide:watch" class="size-2.75" />
        </div>
        <div class="mt-3 flex items-center gap-3">
          <IconifyIcon icon="lucide:watch" class="size-3" />
          <IconifyIcon icon="lucide:watch" class="size-3.25" />
          <IconifyIcon icon="lucide:watch" class="text-base" />
          <IconifyIcon icon="lucide:watch" class="text-lg" />
          <IconifyIcon icon="lucide:watch" class="size-5" />
          <IconifyIcon icon="lucide:watch" class="size-6" />
          <IconifyIcon icon="lucide:watch" class="size-8" />
          <IconifyIcon icon="lucide:watch" class="size-9" />
          <IconifyIcon icon="lucide:watch" class="size-10.5" />
          <IconifyIcon icon="lucide:watch" class="size-15" />
        </div>
      </div>

      <div class="card-body border-default-300 border-t border-dashed">
        <h4 class="mt-0 mb-3">Icons</h4>
        <div class="align-items-center flex flex-wrap gap-3 text-center">
          <div v-for="(item, idx) in lucideIconData" :key="idx" class="border-default-300 flex size-20 flex-col items-center justify-center gap-3 truncate rounded border border-dashed">
            <IconifyIcon :icon="`lucide:${item.iconName}`" class="text-xl" />
            <span class="block w-full truncate text-center font-semibold">
              {{ item.name }}
            </span>
          </div>
        </div>

        <div class="mt-3 text-center">
          <a href="https://tabler.io/icons" target="_blank" class="btn bg-danger text-white hover:bg-danger-hover"> View All Icons </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'

type LucideIconType = {
  iconName: string
  name: string
}

const lucideIconData: LucideIconType[] = [
  { iconName: 'phone', name: 'Phone' },
  { iconName: 'badge-percent', name: 'Ad 2' },
  { iconName: 'headphones', name: 'Headphones' },
  { iconName: 'camera', name: 'Camera' },
  { iconName: 'watch', name: 'Watch' },
  { iconName: 'mic', name: 'Microphone' },
  { iconName: 'headset', name: 'Headset' },
  { iconName: 'tablet', name: 'Tablet' },
  { iconName: 'gamepad-2', name: 'Gamepad' },
  { iconName: 'printer', name: 'Printer' },
  { iconName: 'speaker', name: 'Speaker' },
  { iconName: 'database', name: 'Database' },
  { iconName: 'cloud', name: 'Cloud' },
  { iconName: 'wifi', name: 'Wi-Fi' },
  { iconName: 'bluetooth', name: 'Bluetooth' },
  { iconName: 'usb', name: 'USB' },
  { iconName: 'folder', name: 'Folder' },
  { iconName: 'lock', name: 'Lock' },
  { iconName: 'key', name: 'Key' },
  { iconName: 'shield', name: 'Shield' },
  { iconName: 'paperclip', name: 'Paperclip' },
  { iconName: 'bell', name: 'Bell' },
  { iconName: 'search', name: 'Search' },
  { iconName: 'briefcase', name: 'Briefcase' },
  { iconName: 'shopping-cart', name: 'Cart' },
  { iconName: 'file', name: 'File' },
  { iconName: 'book', name: 'Book' },
  { iconName: 'mail', name: 'Mail' },
  { iconName: 'user', name: 'User' },
  { iconName: 'user-circle', name: 'User Circle' },
  { iconName: 'phone', name: 'Phone Call' },
  { iconName: 'music', name: 'Music' },
  { iconName: 'film', name: 'Movie' },
  { iconName: 'upload', name: 'Upload' },
  { iconName: 'cloud-upload', name: 'Cloud Upload' },
  { iconName: 'share', name: 'Share' },
  { iconName: 'arrow-right', name: 'Arrow Right' },
  { iconName: 'arrow-left', name: 'Arrow Left' },
  { iconName: 'arrow-up', name: 'Arrow Up' },
  { iconName: 'arrow-down', name: 'Arrow Down' },
  { iconName: 'search', name: 'Search' },
  { iconName: 'refresh-ccw', name: 'Refresh' },
]
</script>
