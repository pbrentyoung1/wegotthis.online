<template>
  <ul class="side-nav hs-accordion-group px-2.5 pb-16.5">
    <template v-for="item in menuItems">
      <li v-if="item.isTitle" :key="item.slug" class="menu-title">{{ item.label }}</li>
      <template v-for="(child, idx) in item.children || [item]">
        <MenuItemWithChildren v-if="child.children" :item="child" :open-menu-key="openMenuKey" :set-open-menu-key="setOpenMenuKey" :key="idx" />
        <MenuItem v-else :item="child" :key="child.slug" />
      </template>
    </template>
  </ul>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { menuItems } from '~/layouts/components/data'
import MenuItem from '~/layouts/components/sidenav/components/MenuItem.vue'
import MenuItemWithChildren from '~/layouts/components/sidenav/components/MenuItemWithChildren.vue'
import { scrollToElement } from '~/utils/helpers'

const openMenuKey = ref<string | null>(null)

const setOpenMenuKey = (key: string | null) => {
  openMenuKey.value = key
}

const scrollToActiveLink = () => {
  const activeItem: HTMLAnchorElement | null = document.querySelector('.menu-link.active')
  if (activeItem) {
    const simpleBarContent = document.querySelector('#sidenav-menu .simplebar-content-wrapper')
    if (simpleBarContent) {
      const containerRect = simpleBarContent.getBoundingClientRect()
      const itemRect = activeItem.getBoundingClientRect()

      const offset = itemRect.top - containerRect.top - window.innerHeight * 0.4

      scrollToElement(simpleBarContent, simpleBarContent.scrollTop + offset, 500)
    }
  }
}

onMounted(() => {
  setTimeout(() => scrollToActiveLink(), 100)
})
</script>
