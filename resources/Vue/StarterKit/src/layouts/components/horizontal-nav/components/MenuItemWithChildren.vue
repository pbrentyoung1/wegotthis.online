<template>
  
    <component :is="menuLevel > 1 ? 'div' : 'li'" :class="` ${wrapperClass} ${isActive ? 'active' : ''}`">
      <div
        :class="[
          'hs-dropdown ',
          menuLevel > 1
            ? '[--adaptive:none] [--is-collapse:true] [--strategy:static] lg:[--is-collapse:false] lg:[--strategy:absolute] lg:[--trigger:hover] relative'
            : '[--trigger:hover] [--adaptive:none] [--is-collapse:true] [--strategy:static] lg:[--adaptive:adaptive] lg:[--is-collapse:false] lg:[--strategy:fixed]',
        ]"
      >
        <button :class="`hs-dropdown-toggle ${togglerClass} ${isActive ? 'active' : ''}`" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span v-if="item.icon && menuLevel < 2" class="menu-icon">
            <Icon :icon="item.icon" />
          </span>
          <span class="menu-text">{{ item.label }}</span>
          <span v-if="item.badge" class="badge ms-auto" :class="item.badge.className">{{ item.badge.text }}</span>
          <span v-else class="menu-arrow" />
        </button>
        <div class="hs-dropdown-menu">
          <template v-for="(child, idx) in item.children">
            <MenuItemWithChildren v-if="child.children" :key="child.slug" :item="child" toggler-class="dropdown-item" :level="menuLevel + 1" />
            <MenuItem v-else :key="idx" :item="child" link-class="dropdown-item" :level="menuLevel + 1" />
          </template>
        </div>
      </div>
    </component>
  
</template>

<script setup lang="ts">
import { useRoute } from 'vue-router'; 
import { computed } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'
import MenuItem from '~/layouts/components/horizontal-nav/components/MenuItem.vue'
import MenuItemWithChildren from '~/layouts/components/horizontal-nav/components/MenuItemWithChildren.vue'
import type { MenuItemType } from '~/types'

type PropsType = {
  item: MenuItemType
  wrapperClass?: string
  togglerClass?: string
  level?: number
}

const props = defineProps<PropsType>()

const menuLevel = props.level ?? 1

const route = useRoute()
const pathname = computed(() => route.path)

const isActive = computed(() => {
  const isChildActive = (children: MenuItemType[]): boolean => children.some((child) => (child.url && pathname.value.includes(child.url)) || (child.children && isChildActive(child.children)))
  return isChildActive(props.item.children || [])
})
</script>
