<template>
  <li class="menu-item hs-accordion" :class="{ 'active': isOpen }">
    <button class="hs-accordion-toggle menu-link w-full" :aria-expanded="isOpen">
      <span v-if="item.icon && isTopLevel" class="menu-icon">
        <Icon :icon="item.icon" />
      </span>
      <span class="menu-text">{{ item.label }}</span>
      <span v-if="item.badge" :class="item.badge.className" class="badge text-white">{{ item.badge.text }}</span>
      <span v-else class="menu-arrow"></span>
    </button>

    <ul class="sub-menu hs-accordion-content hs-accordion-group" :class="{ 'hidden': !isOpen }">
      <template v-for="(child, idx) in item.children">
        <MenuItemWithChildren v-if="child.children" :key="child.slug" :item="child" :level="(level ?? 0) + 1" />
        <MenuItem v-else :key="idx" :item="child" :isTopLevel="isTopLevel" />
      </template>
    </ul>
  </li>
</template>

<script setup lang="ts">
import { useRoute } from 'vue-router'; 
import { computed, ref, watchEffect } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'
import MenuItem from '~/layouts/components/sidenav/components/MenuItem.vue'
import type { MenuItemType } from '~/types'

type PropsType = {
  item: MenuItemType
  openMenuKey?: string | null
  setOpenMenuKey?: (key: string | null) => void
  level?: number
}

const props = defineProps<PropsType>()

const route = useRoute()
const pathname = computed(() => route.path)
const isTopLevel = computed(() => (props.level ?? 0) === 0)

const isActive = computed(() => {
  const isChildActive = (children: MenuItemType[]): boolean => children.some((child) => (child.url && pathname.value.includes(child.url)) || (child.children && isChildActive(child.children)))
  return isChildActive(props.item.children || [])
})

const isOpen = computed(() => {
  return isTopLevel.value ? props.openMenuKey === props.item.slug : localOpen.value
})

const localOpen = ref(false)
const didAutoOpen = ref(false)

watchEffect(() => {
  if (isActive.value && !didAutoOpen.value) {
    if (isTopLevel.value && props.setOpenMenuKey) {
      props.setOpenMenuKey(props.item.slug)
    } else {
      localOpen.value = true
    }
    didAutoOpen.value = true
  }
})
</script>
