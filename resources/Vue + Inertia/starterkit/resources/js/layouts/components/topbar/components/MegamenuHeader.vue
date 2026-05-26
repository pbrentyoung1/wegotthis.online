<template>
  <div id="megamenu-header" class="topbar-item d-none d-md-flex">
    <BDropdown :variant="null" toggle-class="topbar-link btn fw-medium btn-link drop-arrow-none" menu-class="dropdown-menu-xxl p-0">
      <template #button-content>
        Mega Menu
        <Icon icon="chevron-down" class="ms-1" />
      </template>

      <simplebar class="h-100" style="max-height: 380px">
        <BRow class="g-0">
          <BCol cols="12">
            <div class="px-3 py-2 text-center bg-light bg-opacity-50">
              <h4 class="mb-0 fs-lg fw-semibold">
                Welcome to <span class="text-primary">{{ META_DATA.name }}</span> Admin Theme.
              </h4>
            </div>
          </BCol>
        </BRow>
        <BRow class="g-0">
          <BCol v-for="(item, idx) in megaMenuData" :key="idx" md="4">
            <div class="p-3">
              <h5 class="mb-2 fw-semibold fs-sm dropdown-header">{{ item.title }}</h5>
              <ul class="list-unstyled megamenu-list">
                <li v-for="link in item.links" :key="link.href">
                  <Link :href="link.href" class="dropdown-item">{{ link.label }}</Link>
                </li>
              </ul>
            </div>
          </BCol>
        </BRow>
      </simplebar>
    </BDropdown>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import simplebar from 'simplebar-vue'
import Icon from '@/components/wrappers/Icon.vue'
import { META_DATA } from '@/config/constants'

type MegaMenuType = {
  title: string
  links: {
    label: string
    href: string
  }[]
}

const megaMenuData: MegaMenuType[] = [
  {
    title: 'Dashboard & Analytics',
    links: [
      { label: 'Sales Dashboard', href: '#' },
      { label: 'Marketing Dashboard', href: '#' },
      { label: 'Finance Overview', href: '#' },
      { label: 'User Analytics', href: '#' },
      { label: 'Traffic Insights', href: '#' },
    ],
  },
  {
    title: 'Project Management',
    links: [
      { label: 'Task Overview', href: '#' },
      { label: 'Kanban Board', href: '#' },
      { label: 'Gantt Chart', href: '#' },
      { label: 'Team Collaboration', href: '#' },
      { label: 'Project Milestones', href: '#' },
    ],
  },
  {
    title: 'User Management',
    links: [
      { label: 'User Profiles', href: '#' },
      { label: 'Access Control', href: '#' },
      { label: 'Role Permissions', href: '#' },
      { label: 'Activity Logs', href: '#' },
      { label: 'Security Settings', href: '#' },
    ],
  },
]
</script>
