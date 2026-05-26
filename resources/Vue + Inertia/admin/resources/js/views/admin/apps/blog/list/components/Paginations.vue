<template>
  <BPagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" first-number last-number class="pagination-rounded pagination-boxed justify-content-center mb-0 mt-4">
    <template #prev-text>
      <Icon icon="chevron-left" />
    </template>

    <template #next-text>
      <Icon icon="chevron-right" />
    </template>
  </BPagination>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'

const currentPage = ref(1)
const perPage = 10
const totalRows = 60
</script>
