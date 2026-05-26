<template>
  <PageBreadcrumb title="Tabler" subtitle="Icons" />

  <div class="container-fluid">
    <div class="card">
      <div class="card-header block">
        <h4 class="card-title mb-1.25">Overview</h4>
        <p class="text-default-400">Free and open source icons designed to make your website or app attractive, visually consistent and simply beautiful.</p>
      </div>

      <div class="card-body">
        <h4 class="mb-2 text-sm">Usage</h4>

        <div class="mt-3 flex items-center gap-3">
          <IconifyIcon icon="tabler:phone" class="text-2xl" />
          <IconifyIcon icon="tabler:ad-2" class="text-2xl" />
          <IconifyIcon icon="tabler:device-desktop" class="text-2xl" />
          <IconifyIcon icon="tabler:device-tablet" class="text-2xl" />
          <IconifyIcon icon="tabler:device-gamepad" class="text-2xl" />
          <IconifyIcon icon="tabler:device-watch" class="text-2xl" />
        </div>
      </div>

      <div class="card-body border-default-300 border-t border-dashed">
        <h4 class="mb-2 text-sm">Colors</h4>

        <div class="mt-3 flex items-center gap-3">
          <IconifyIcon icon="tabler:camera" class="text-primary text-2xl" />
          <IconifyIcon icon="tabler:chart-pie-2" class="text-secondary text-2xl" />
          <IconifyIcon icon="tabler:bell" class="text-success text-2xl" />
          <IconifyIcon icon="tabler:credit-card" class="text-info text-2xl" />
          <IconifyIcon icon="tabler:cloud" class="text-warning text-2xl" />
          <IconifyIcon icon="tabler:mail" class="text-danger text-2xl" />
          <IconifyIcon icon="tabler:lock" class="text-dark text-2xl" />
          <IconifyIcon icon="tabler:user" class="text-purple text-2xl" />
          <IconifyIcon icon="tabler:star" class="text-light text-2xl" />
        </div>
      </div>
      <div class="card-body border-default-300 border-t border-dashed">
        <h4 class="mb-2 text-sm">Sizes</h4>

        <div class="mt-3 flex items-center gap-3">
          <IconifyIcon icon="tabler:phone" class="text-xs" />
          <IconifyIcon icon="tabler:ad-2" class="text-sm" />
          <IconifyIcon icon="tabler:device-desktop" class="text-base" />
          <IconifyIcon icon="tabler:device-tablet" class="text-lg" />
          <IconifyIcon icon="tabler:device-watch" class="text-xl" />
          <IconifyIcon icon="tabler:device-watch" class="text-2xl" />
          <IconifyIcon icon="tabler:device-watch" class="text-3xl" />
          <IconifyIcon icon="tabler:device-watch" class="text-4xl" />
          <IconifyIcon icon="tabler:device-watch" class="text-5xl" />
          <IconifyIcon icon="tabler:device-watch" class="text-6xl" />
          <IconifyIcon icon="tabler:device-watch" class="text-7xl" />
          <IconifyIcon icon="tabler:device-watch" class="text-8xl" />
          <IconifyIcon icon="tabler:device-watch" class="text-9xl" />
        </div>
        <div class="mt-3 flex items-center gap-3">
          <IconifyIcon icon="tabler:device-watch" />
          <IconifyIcon icon="tabler:device-watch" class="size-3.25" />
          <IconifyIcon icon="tabler:device-watch" class="size-3.75" />
          <IconifyIcon icon="tabler:device-watch" class="text-base" />
          <IconifyIcon icon="tabler:device-watch" class="text-lg" />
          <IconifyIcon icon="tabler:device-watch" class="size-6" />
          <IconifyIcon icon="tabler:device-watch" class="size-8" />
          <IconifyIcon icon="tabler:device-watch" class="size-9" />
          <IconifyIcon icon="tabler:device-watch" class="size-10.5" />
          <IconifyIcon icon="tabler:device-watch" class="size-15" />
        </div>
      </div>

      <div class="card-body border-default-300 border-t border-dashed">
        <h4 class="mt-0 mb-3">Icons</h4>
        <div class="align-items-center flex flex-wrap gap-3 text-center">
          <div v-for="(item, idx) in tablerIconData" :key="idx" class="border-default-300 flex size-20 flex-col items-center justify-center gap-3 truncate rounded border border-dashed">
            <IconifyIcon :icon="`tabler:${item.iconName}`" class="text-2xl" />
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

type TablerIconType = {
  iconName: string
  name: string
}

const tablerIconData: TablerIconType[] = [
  { iconName: 'phone', name: 'Phone' },
  { iconName: 'ad-2', name: 'Ad 2' },
  { iconName: 'headphones', name: 'Headphones' },
  { iconName: 'camera', name: 'Camera' },
  { iconName: 'device-watch', name: 'Watch' },
  { iconName: 'microphone', name: 'Microphone' },
  { iconName: 'headset', name: 'Headset' },
  { iconName: 'device-tablet', name: 'Tablet' },
  { iconName: 'device-gamepad', name: 'Gamepad' },
  { iconName: 'printer', name: 'Printer' },
  { iconName: 'device-speaker', name: 'Speaker' },
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
  { iconName: 'phone-call', name: 'Phone Call' },
  { iconName: 'music', name: 'Music' },
  { iconName: 'movie', name: 'Movie' },
  { iconName: 'file-upload', name: 'Upload' },
  { iconName: 'cloud-upload', name: 'Cloud Upload' },
  { iconName: 'share', name: 'Share' },
  { iconName: 'arrow-right', name: 'Arrow Right' },
  { iconName: 'arrow-left', name: 'Arrow Left' },
  { iconName: 'arrow-up', name: 'Arrow Up' },
  { iconName: 'arrow-down', name: 'Arrow Down' },
  { iconName: 'search', name: 'Search' },
  { iconName: 'refresh', name: 'Refresh' },
]
</script>
