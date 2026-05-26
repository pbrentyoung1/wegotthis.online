<template>
  <CardWithAction title="Top Campaign Performance" body-class="p-0" footer-class="border-0" isCloseable isCollapsable isReloadable>
    <BTable thead-class="bg-light align-middle bg-opacity-25 thead-sm" hover :fields="fields" :items="products" :per-page="perPage" :current-page="currentPage" responsive class="table table-custom table-nowrap table-centered mb-0">
      <template #head()="data">
        <span class="text-muted text-uppercase fs-xxs">{{ data.label }}</span>
      </template>
      <template #cell(campaign)="data">
        <span class="d-flex align-items-center gap-1"> <IconifyIcon :icon="data.item.icon" :class="['fs-lg me-1', data.item.iconClass]" /> {{ data.item.name }} </span>
      </template>
    </BTable>
    <template #card-footer>
      <TablePagination :currentPage="1" :totalItems="products.length" :perPage="5" label="products" />
    </template>
  </CardWithAction>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import { BTable } from 'bootstrap-vue-next'
import { computed, ref } from 'vue'
import CardWithAction from '@/components/CardWithAction.vue'
import { campaignData, type CampaignType } from './data'

const fields = [
  { key: 'campaign', label: 'Campaign' },
  { key: 'visitors', label: 'Visitors', sortable: true },
  { key: 'newUsers', label: 'New Users', sortable: true },
  { key: 'sessions', label: 'Sessions', sortable: true },
  { key: 'bounceRate', label: 'Bounce Rate', sortable: true },
  { key: 'pageVisits', label: 'Pages/Visit', sortable: true },
  { key: 'avgDuration', label: 'Avg. Duration', sortable: true },
  { key: 'leads', label: 'Leads', sortable: true },
  { key: 'revenue', label: 'Revenue', sortable: true },
  { key: 'conversion', label: 'Conversion', sortable: true },
]

const currentPage = ref(1)
const perPage = ref(5)

const products = ref<CampaignType[]>(campaignData)

const totalItems = computed(() => products.value.length)

const start = computed(() => (totalItems.value === 0 ? 0 : (currentPage.value - 1) * perPage.value + 1))

const end = computed(() => Math.min(currentPage.value * perPage.value, totalItems.value))
</script>

<style scoped></style>
