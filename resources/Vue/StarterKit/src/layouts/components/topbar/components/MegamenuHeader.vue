<template>
  <div id="megamenu-header" class="md:inline-flex hidden">
    <div class="topbar-item hs-dropdown relative inline-flex">
      <button class="topbar-link hs-dropdown-toggle btn px-2.5! font-medium" type="button" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        Mega Menu
        <Icon icon="chevron-down" />
      </button>

      <div class="hs-dropdown-menu p-0 md:min-w-3xl" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-menu">
        <simplebar style="max-height: 380px" data-simplebar>
          <div class="bg-light/50 px-6 py-3 text-center">
            <h4 class="text-base font-semibold">
              Welcome to
              <span class="text-primary">{{ META_DATA.name }}</span>
              Admin Theme.
            </h4>
          </div>
          <div class="grid md:grid-cols-3">
            <div class="p-6" v-for="(item, idx) in megaMenuData" :key="idx">
              <h5 class="py-2 px-3.5 font-semibold mb-2 text-sm">Dashboard & Analytics</h5>
              <ul class="list-unstyled megamenu-list">
                <li v-for="link in item.links" :key="link.href">
                  <RouterLink :to="link.href" class="dropdown-item">{{ link.label }}</RouterLink>
                </li>
              </ul>
            </div>
          </div>
        </simplebar>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import simplebar from 'simplebar-vue'
import Icon from '~/components/wrappers/Icon.vue'
import { META_DATA } from '~/config/constants'

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
