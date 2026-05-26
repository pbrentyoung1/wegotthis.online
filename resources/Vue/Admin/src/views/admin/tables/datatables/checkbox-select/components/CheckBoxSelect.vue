<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Example</h4>
    </div>

    <div class="card-body">
      
        <DataTableComponent v-if="DataTableComponent" :data="tableData.body" :columns="columns" :options="dtOptions" class="table-striped table align-middle" />
      
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted, shallowRef, type Component } from 'vue'
import { toPascalCase } from '~/utils/helpers'
import { paginationIcons, tableData } from '../../components/data'

const DataTableComponent = shallowRef<Component | null>(null)
const columns = shallowRef<object[]>([])

const dtOptions = {
  dom: '<"flex flex-wrap justify-between items-center mb-4 gap-4"l f>' + 'rt' + '<"flex flex-wrap justify-between items-center mt-4 gap-4"i p>',
  responsive: true,
  order: [[1, 'asc']],
  select: {
    style: 'multi',
    items: 'row',
    headerCheckbox: 'select-all',
    className: 'selected',
  },
  language: {
    select: {
      rows: {
        _: '%d rows selected',
        1: '1 row selected',
      },
    },
    paginate: paginationIcons,
  },
  columnDefs: [{ orderable: false, targets: 0 }],
}

onMounted(async () => {
  const [{ default: DataTable }, { default: DataTablesCore }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net')])

  await import('datatables.net-select')

  DataTable.use(DataTablesCore)

  DataTableComponent.value = DataTable

  columns.value = [
    {
      data: null,
      title: '',
      orderable: false,
      className: 'select-checkbox',
      render: DataTablesCore.render.select(),
    },
    { data: 'company', title: 'Company' },
    { data: 'symbol', title: 'Symbol' },
    {
      data: 'price',
      title: 'Price',
      render: (d: number) => `${d.toLocaleString()}`,
    },
    {
      data: 'change',
      title: 'Change',
      render: (d: number) => `${d}%`,
    },
    { data: 'volume', title: 'Volume' },
    {
      data: 'marketCap',
      title: 'Market Cap',
      render: (d: number) => `${d.toLocaleString()}`,
    },
    {
      data: 'rating',
      title: 'Rating',
      render: (d: number) => `${d.toFixed(1)}★`,
    },
    {
      data: 'status',
      title: 'Status',
      render: (d: string) => `<span class="badge badge-label ${d.toLowerCase() === 'bullish' ? 'bg-success/15 text-success' : 'bg-danger/15 text-danger'}">${toPascalCase(d)}</span>`,
    },
  ]
})
</script>
