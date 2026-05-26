<template>
  <div class="text-default-400">
    Showing <span class="font-semibold">{{ start }}</span> to
    <span class="font-semibold">{{ end }}</span>
    of
    <span class="font-semibold">{{ totalItems }}</span>
    {{ label }}
  </div>
  <div>
    <ul class="pagination justify-center">
      <li :class="['page-item', currentPage === 1 && 'disabled']">
        <button class="page-link" @click="goToPage(currentPage - 1)">
          <Icon icon="chevron-left" />
        </button>
      </li>
      <li v-for="page in pages" :key="page" :class="['page-item', page === currentPage && 'active']">
        <button class="page-link" @click="goToPage(page)">
          {{ page }}
        </button>
      </li>
      <li :class="['page-item', currentPage === totalPages && 'disabled']">
        <button class="page-link" @click="goToPage(currentPage + 1)">
          <Icon icon="chevron-right" />
        </button>
      </li>
    </ul>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'

type Props = {
  currentPage: number
  perPageItems: number
  totalItems: number
  label?: string
}

const props = withDefaults(defineProps<Props>(), {
  label: 'items',
})

const emit = defineEmits<{
  (e: 'update:currentPage', page: number): void
}>()

const pageProxy = computed({
  get: () => props.currentPage,
  set: (val) => emit('update:currentPage', val),
})

const totalPages = computed(() => Math.ceil(props.totalItems / props.perPageItems))

const pages = computed(() => {
  const range = 2
  const startPage = Math.max(1, props.currentPage - range)
  const endPage = Math.min(totalPages.value, props.currentPage + range)
  const pages = []
  for (let i = startPage; i <= endPage; i++) {
    pages.push(i)
  }
  return pages
})

const goToPage = (page: number) => {
  if (page >= 1 && page <= totalPages.value) {
    pageProxy.value = page
  }
}

const start = computed(() => (props.totalItems === 0 ? 0 : (props.currentPage - 1) * props.perPageItems + 1))
const end = computed(() => Math.min(props.currentPage * props.perPageItems, props.totalItems))
</script>
