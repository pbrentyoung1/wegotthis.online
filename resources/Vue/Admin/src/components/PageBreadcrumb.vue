<template>
  <div class="page-title-head">
    <h4 class="page-main-title">{{ title }}</h4>

    <div class="hidden items-center gap-1.25 text-sm md:flex">
      <RouterLink to="/" class="text-sm">{{ META_DATA.name }}</RouterLink>

      <IconifyIcon icon="tabler:chevron-right" class="text-sm rtl:rotate-180" />

      <RouterLink v-if="subtitle" :to="subtitleUrl ?? ''" class="text-sm">{{ subtitle }}</RouterLink>

      <IconifyIcon icon="tabler:chevron-right" class="text-sm rtl:rotate-180" />
      <RouterLink to="" class="text-sm text-default-400" aria-current="page">{{ title }}</RouterLink>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import { META_DATA } from '~/config/constants'

type PropsType = {
  title: string
  subtitle?: string
  subtitleUrl?: string
}

const props = defineProps<PropsType>()
</script>
