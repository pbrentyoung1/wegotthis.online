<template>
  <span class="flex items-center text-warning" v-bind="$attrs">
    <IconifyIcon icon="tabler:star-filled" v-for="(_, i) in [...Array(fullStars)]" :key="`full-${i}`" :size="size" />

    <IconifyIcon icon="tabler:star-filled" v-if="halfStar" :size="size" />

    <IconifyIcon icon="tabler:star" v-for="(_, i) in [...Array(emptyStars)]" :key="`empty-${i}`" :size="size" />
  </span>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'

type PropsType = {
  rating: number
  size?: number | string
}

const props = defineProps<PropsType>()

const fullStars = Math.floor(props.rating)
const halfStar = props.rating % 1 !== 0
const emptyStars = 5 - fullStars - (halfStar ? 1 : 0)
</script>
