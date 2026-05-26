<template>
  <PageBreadcrumb title="Sales Reports" subtitle="Ecommerce" />

  <BRow class="justify-content-center">
    <BCol xxl="10">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <h5 class="card-title mb-0">Products - 2025</h5>
          <div class="d-flex align-items-center gap-2">
            <div class="app-search">
              <BFormInput v-model="searchQuery" type="search" placeholder="Search reports..." />
              <Icon icon="search" class="app-search-icon text-muted" />
            </div>

            <div class="app-search">
              <FlatPickr v-model="date" :config="{ dateFormat: 'd M, Y', mode: 'range', defaultDate: getCurrentMonthRange() }" type="text" style="min-width: 250px" class="form-control" />
              <Icon icon="calendar" class="app-search-icon text-muted" />
            </div>

            <button type="submit" class="btn btn-secondary">
              <Icon icon="download" class="me-2" />
              Export Report
            </button>
          </div>
        </BCardHeader>

        <BCardBody>
          <ApexChart :get-options="getSalesChartOptions" :series="getSalesChartOptions().series" />
        </BCardBody>

        <BTable
          show-empty
          :filter="searchQuery"
          empty-text="Nothing found."
          v-model:selected-rows="selected"
          thead-class="bg-light align-middle bg-opacity-25 thead-sm"
          hover
          :fields="fields"
          :items="sales"
          :per-page="perPage"
          :current-page="currentPage"
          @filtered="onFiltered"
          responsive
          class="table table-custom table-nowrap table-centered mb-0 w-100"
        >
          <template #head()="data">
            <span class="text-uppercase fs-xxs">{{ data.label }}</span>
          </template>
          <template #head(id)>
            <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" id="select-all-products" value="option" :checked="allSelected" :indeterminate="isIndeterminate" @change="toggleSelectAll" />
          </template>
          <template #head(action)>
            <span class="text-uppercase d-flex justify-content-center fs-xxs">Actions</span>
          </template>
          <template #cell(id)="data">
            <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" :value="data.item" :checked="selected.includes(data.item)" @change="onToggleRow(data.item, $event)" />
          </template>
        </BTable>
        <BCardFooter class="border-0">
          <TablePagination v-model:currentPage="currentPage" :per-page="perPage" :total-items="totalRows" label="entries" />
        </BCardFooter>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardFooter, BCardHeader, BCol, BRow, BTable, type TableFieldRaw } from 'bootstrap-vue-next'
import { ref } from 'vue'
import FlatPickr from 'vue-flatpickr-component'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import ApexChart from '@/components/wrappers/ApexChart.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { getSalesChartOptions, saleData, type SaleType } from './components/data'

const date = ref('')

const getCurrentMonthRange = () => {
  const start = new Date()
  start.setDate(1)
  start.setHours(0, 0, 0, 0)

  const end = new Date()
  end.setMonth(end.getMonth() + 1)
  end.setDate(0)
  end.setHours(23, 59, 59, 999)

  return [start, end]
}

const fields: Exclude<TableFieldRaw<SaleType>, string>[] = [
  { key: 'id', label: 'Id' },
  { key: 'date', label: 'Date', sortable: true },
  { key: 'orders', label: 'Orders', sortable: true },
  { key: 'refunds', label: 'Refunds', sortable: true },
  { key: 'averageRevenue', label: 'Avr. Revenue per Order', sortable: true },
  { key: 'tax', label: 'Tax', sortable: true },
  { key: 'revenue', label: 'Revenue', sortable: true },
  { key: 'balance', label: 'Balance', sortable: true },
]

const searchQuery = ref('')

const currentPage = ref(1)
const perPage = ref(8)
const totalRows = ref(saleData.length)
const sales = ref<SaleType[]>(saleData)

function onFiltered(filteredItems: SaleType[]) {
  totalRows.value = filteredItems.length
  currentPage.value = 1
}

const { selected, toggleSelectAll, onToggleRow, allSelected, isIndeterminate } = useTableActions(sales)
</script>

<style scoped></style>
