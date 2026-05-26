<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Example</h4>
    </div>

    <div class="card-body">
      
        <component :is="DataTableComponent" :columns="columns" :options="options" class="table-striped dt-responsive table align-middle">
          <thead class="thead-sm text-2xs uppercase">
            <tr>
              <th>Company</th>
              <th>Symbol</th>
              <th>Price</th>
              <th>Change</th>
              <th>Volume</th>
              <th>Market Cap</th>
              <th>Rating</th>
              <th>Status</th>
            </tr>
          </thead>
        </component>
      
    </div>
  </div>
</template>

<script setup lang="ts">
import type { Config } from 'datatables.net'
import { onMounted, shallowRef, type Component } from 'vue'
import { paginationIcons } from '../../components/data'
import { dataSet } from './data'

const DataTableComponent = shallowRef<Component | null>(null)

onMounted(async () => {
  const [{ default: DataTable }, { default: DataTablesCore }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net')])

  DataTable.use(DataTablesCore)

  DataTableComponent.value = DataTable
})

const columns = [
  { title: 'company' },
  { title: 'symbol' },
  {
    title: 'price',
    className: 'text-start',
    render: (data: number) => `${'$'}${data}`,
  },
  {
    title: 'change',
    className: 'text-start',
  },
  {
    title: 'volume',
    className: 'text-start',
  },
  {
    title: 'market cap',
    render: (data: string) => `${'$'}${data}`,
  },
  { title: 'rating' },
  {
    title: 'status',
    render: (data: string) => {
      const badgeClass = data === 'Bullish' ? 'success' : 'danger'
      return `<span class="badge badge-label badge-soft-${badgeClass}">${data}</span>`
    },
  },
]

const options: Config = {
  dom: '<"flex flex-wrap justify-between items-center mb-4 gap-4"l f>' + 'rt' + '<"flex flex-wrap justify-between items-center mt-4 gap-4"i p>',
  data: dataSet,
  responsive: true,
  language: {
    paginate: paginationIcons,
  },
}
</script>
