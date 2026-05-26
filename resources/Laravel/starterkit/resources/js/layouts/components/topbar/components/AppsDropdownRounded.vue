<template>
  <div id="apps-dropdown-rounded" class="topbar-item">
    <BDropdown no-caret toggle-class="topbar-link" menu-class="dropdown-menu-lg p-2" placement="bottom-end" offset="5">
      <template #button-content>
        <span class="topbar-link-icon">
          <Icon icon="apps" />
        </span>
      </template>

      <BRow class="align-items-center g-1">
        <BCol cols="4" v-for="(app, idx) in appsData" :key="idx">
          <a href="" class="rounded dropdown-item text-center py-2">
            <span class="avatar-sm d-block mx-auto mb-1">
              <span v-if="app.image" class="avatar-title text-bg-light rounded-circle">
                <img :src="app.image" alt="Google Logo" height="18" />
              </span>
              <span v-else class="avatar-title rounded-circle" :class="app.icon?.className">
                <Icon v-if="app.icon" :icon="app.icon?.name" class="fs-18" />
              </span>
            </span>
            <span class="align-middle fw-medium">{{ app.name }}</span>
          </a>
        </BCol>
      </BRow>
    </BDropdown>
  </div>
</template>

<script setup lang="ts">
import { BDropdown, BRow } from 'bootstrap-vue-next'
import Icon from '@/components/wrappers/Icon.vue'

import dropbox from '/images/logos/dropbox.svg'
import figma from '/images/logos/figma.svg'
import google from '/images/logos/google.svg'
import slack from '/images/logos/slack.svg'

type AppType = {
  name: string
  href: string
  image?: string
  icon?: { name: string; className: string }
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
    icon: {
      name: 'calendar',
      className: 'bg-primary-subtle text-primary',
    },
  },
  {
    name: 'Files',
    href: '',
    icon: {
      name: 'folder',
      className: 'bg-primary-subtle text-primary',
    },
  },
]
</script>
