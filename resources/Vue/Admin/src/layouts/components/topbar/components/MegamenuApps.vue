<template>
  <div class="md:inline-flex hidden" id="megamenu-apps">
    <div class="topbar-item hs-dropdown relative inline-flex">
      <button class="topbar-link hs-dropdown-toggle btn px-2.5! font-medium" type="button" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        Apps
        <Icon icon="chevron-down" />
      </button>

      <div class="hs-dropdown-menu p-0 md:min-w-3xl" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-menu">
        <simplebar style="max-height: 380px" data-simplebar>
          <div class="grid md:grid-cols-3">
            <div class="p-3 space-y-2" v-for="(column, idx) in chunkedApps" :key="idx">
              <RouterLink class="dropdown-item" v-for="(item, index) in column" :key="index" :to="item.href">
                <span class="flex items-center gap-3">
                  <span class="size-9 flex items-center justify-center border border-light bg-light/50 rounded" :class="item.iconClassName">
                    <Icon :icon="item.icon" class="size-5.5" />
                  </span>
                  <span>
                    <h5 class="text-xs">{{ item.title }}</h5>
                    <span class="text-default-400 text-xs">{{ item.subtitle }}</span>
                  </span>
                </span>
              </RouterLink>
            </div>

            <div class="row-span-2 bg-light/50">
              <div class="h-full relative rounded-e overflow-hidden bg-[url(/images/stock/small-8.jpg)] bg-cover">
                <div class="p-6 absolute inset-0 bg-gradient bg-secondary/90 flex items-center justify-center">
                  <div class="text-center text-white">
                    <span class="inline-block">
                      <Icon icon="atom" class="text-4xl" />
                    </span>
                    <p class="text-white/75 mb-5 uppercase">Limited Offer</p>
                    <h3 class="font-semibold text-white mb-3 text-xl">Unlock Exclusive Savings</h3>
                    <h4 class="font-medium text-base mb-1">
                      <del class="text-opacity-75 text-white">$49.00</del>
                      /
                      <span class="font-bold text-white">$25 USD</span>
                    </h4>
                    <button type="button" class="mt-5 btn btn-sm bg-danger text-white hover:bg-danger-hover">
                      <Icon icon="shopping-cart" class="me-1.5" />
                      Buy Now
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-span-2">
              <div class="grid grid-cols-2 border-t border-light border-dashed text-center">
                <div class="p-6">
                  <p class="font-medium text-default-400 mb-1 text-2xs uppercase">-: &nbsp; Support &nbsp;:-</p>
                  <h5 class="text-md">help&#64;mydomain.com</h5>
                </div>

                <div class="p-6">
                  <p class="font-medium text-default-400 mb-1 text-2xs uppercase">-: &nbsp; Help: &nbsp;:-</p>
                  <h5 class="text-md">+(12) 3456 7890</h5>
                </div>
              </div>
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

const chunkArray = <T,>(arr: T[], size: number): T[][] => {
  return Array.from({ length: Math.ceil(arr.length / size) }, (_, i) => arr.slice(i * size, i * size + size))
}

type AppMenuItemType = {
  icon: string
  iconClassName: string
  title: string
  subtitle: string
  href: string
}

const appsMenuData: AppMenuItemType[] = [
  {
    icon: 'basket',
    iconClassName: 'text-primary',
    title: 'eCommerce',
    subtitle: 'Products, orders & etc.',
    href: '',
  },
  {
    icon: 'message',
    iconClassName: 'text-success',
    title: 'Chat',
    subtitle: 'Team conversations',
    href: '',
  },
  {
    icon: 'list-check',
    iconClassName: 'text-danger',
    title: 'Task',
    subtitle: 'Plan and track work',
    href: '',
  },
  {
    icon: 'mailbox',
    iconClassName: 'text-info',
    title: 'Email',
    subtitle: 'Messages and inbox',
    href: '',
  },
  {
    icon: 'building',
    iconClassName: 'text-secondary',
    title: 'Companies',
    subtitle: 'Business profiles',
    href: '',
  },
  {
    icon: 'id',
    iconClassName: 'text-dark',
    title: 'Contacts Diary',
    subtitle: 'People and connections',
    href: '',
  },
  {
    icon: 'calendar',
    iconClassName: 'text-warning',
    title: 'Calendar',
    subtitle: 'Events and reminders',
    href: '',
  },
  {
    icon: 'lifebuoy',
    iconClassName: 'text-success',
    title: 'Support',
    subtitle: 'Help and assistance',
    href: '',
  },
]

const chunkedApps = chunkArray(appsMenuData, 4)
</script>
