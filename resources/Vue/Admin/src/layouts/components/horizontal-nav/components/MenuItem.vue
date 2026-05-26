<template>
  <RouterLink v-if="menuLevel > 1" :to="item.url ?? ''" :class="`${linkClass} ${item.isDisabled ? 'disabled' : ''}`">
    {{ item.label }}
    <span v-if="item.badge" class="badge opacity-50" :class="item.badge.className">{{ item.badge.text }}</span>
  </RouterLink>

  <li v-else :class="`${wrapperClass} ${isActive ? 'active' : ''}`">
    <RouterLink :to="item.url ?? ''" :class="`${linkClass} ${item.isDisabled ? 'disabled' : ''}`">
      <span v-if="item.icon" class="menu-icon"><Icon :icon="item.icon" /></span>
      {{ item.label }}
      <span v-if="item.badge" :class="item.badge.className" class="badge opacity-50">{{ item.badge.text }}</span>
    </RouterLink>
  </li>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { useRoute } from 'vue-router'; 
import { computed } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'
import type { MenuItemType } from '~/types'

type PropsType = {
  item: MenuItemType
  linkClass?: string
  wrapperClass?: string
  level?: number
}

const props = defineProps<PropsType>()

const menuLevel = props.level ?? 1

const route = useRoute()
const pathname = computed(() => route.path)

const isActive = props.item.url && pathname.value.endsWith(props.item.url)
</script>
