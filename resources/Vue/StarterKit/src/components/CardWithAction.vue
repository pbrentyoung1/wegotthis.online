<template>
  <div v-if="isVisible" :class="['card group relative', className, isCollapsed ? 'card-collapsed' : '']">
    <div v-if="isRefreshing" class="card-overlay absolute inset-0 z-20 flex items-center justify-center">
      <div class="size-8 animate-spin rounded-full border-3 border-primary border-t-transparent"></div>
    </div>

    <div class="card-header flex justify-between items-center">
      <h4 :class="['card-title', cardTitleClassName]">
        {{ title }}
        <slot name="badge"></slot>
      </h4>

      <div class="flex gap-1">
        <button v-if="isCollapsible" @click="toggleCollapse" data-action="card-toggle" class="size-6 flex justify-center items-center rounded-full bg-light hover:bg-primary/15 hover:text-primary">
          <Icon icon="chevron-up" :class="`text-base transition-transform ${isCollapsed ? 'rotate-180' : ''}`" />
        </button>

        <button v-if="isReloadable" @click="handleRefresh" class="size-6 flex justify-center items-center rounded-full bg-light hover:bg-primary/15 hover:text-primary">
          <Icon icon="refresh" class="text-base" />
        </button>

        <button v-if="isCloseable" @click="handleClose" class="size-6 flex justify-center items-center rounded-full bg-light hover:bg-primary/15 hover:text-primary">
          <Icon icon="x" class="text-base" />
        </button>
      </div>
    </div>
    <transition
      enter-active-class="transition-all duration-200 ease-in-out"
      leave-active-class="transition-all duration-200 ease-in-out"
      enter-from-class="max-h-0 opacity-0"
      enter-to-class="max-h-[500px] opacity-100"
      leave-from-class="max-h-[500px] opacity-100"
      leave-to-class="max-h-0 opacity-0"
    >
      <div v-if="!isCollapsed" :class="`card-body overflow-hidden ${bodyClassName}`">
        <slot />
      </div>
    </transition>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import Icon from './wrappers/Icon.vue'

defineProps<{
  title: string
  isCollapsible?: boolean
  isReloadable?: boolean
  isCloseable?: boolean
  className?: string
  cardTitleClassName?: string
  bodyClassName?: string
}>()

const isVisible = ref(true)
const isCollapsed = ref(false)
const isRefreshing = ref(false)

const handleClose = () => {
  isVisible.value = false
}

const handleRefresh = () => {
  isRefreshing.value = true
  setTimeout(() => {
    isRefreshing.value = false
  }, 1500)
}

const toggleCollapse = () => {
  isCollapsed.value = !isCollapsed.value
}
</script>
