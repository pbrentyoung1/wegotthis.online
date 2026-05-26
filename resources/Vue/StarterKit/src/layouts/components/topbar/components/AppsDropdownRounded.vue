<template>
  <div id="apps-dropdown-rounded" class="topbar-item hs-dropdown relative inline-flex [--auto-close:inside] [--placement:bottom-right]">
    <button class="topbar-link hs-dropdown-toggle relative flex items-center" type="button" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
      <Icon icon="apps" class="topbar-link-icon" />
    </button>

    <div class="hs-dropdown-menu w-80 p-3" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-menu">
      <div class="grid grid-cols-3 items-center gap-1.5">
        <RouterLink to="" class="dropdown-item flex-col gap-0 text-center py-3" v-for="(app, idx) in appsData" :key="idx">
          <span v-if="app.image" class="size-8 rounded-full bg-light flex items-center justify-center mx-auto mb-1.25">
            <img :src="app.image" alt="Google Logo" class="h-4.5" />
          </span>
          <span v-else class="size-8 rounded-full flex items-center justify-center bg-primary/15 text-primary mx-auto mb-1.25">
            <Icon :icon="app.icon" v-if="app.icon" class="text-lg" />
          </span>
          <span class="align-middle font-medium">{{ app.name }}</span>
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import dropbox from '/images/logos/dropbox.svg'
import figma from '/images/logos/figma.svg'
import google from '/images/logos/google.svg'
import slack from '/images/logos/slack.svg'

type AppType = {
  name: string
  href: string
  image?: string
  icon?: string
}

const appsData: AppType[] = [
  {
    name: 'Google',
    href: '',
    image: google,
  },
  {
    name: 'Figma',
    href: '',
    image: figma,
  },
  {
    name: 'Slack',
    href: '',
    image: slack,
  },
  {
    name: 'Dropbox',
    href: '',
    image: dropbox,
  },
  {
    name: 'Calendar',
    href: '',
    icon: 'calendar',
  },
  {
    name: 'Files',
    href: '',
    icon: 'folder',
  },
]
</script>
