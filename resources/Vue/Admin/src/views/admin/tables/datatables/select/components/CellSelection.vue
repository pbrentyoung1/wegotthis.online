<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Cell Selection</h4>
    </div>

    <div class="card-body">
      
        <component :is="DataTableComponent" :data="tableData.body" :columns="columns" :options="options" class="dt-responsive table align-middle">
          <thead class="thead-sm text-2xs uppercase">
            <tr>
              <th v-for="(label, idx) in tableData.header" :key="idx">
                {{ label }}
              </th>
            </tr>
          </thead>
        </component>
      
    </div>
  </div>
</template>

<script setup lang="ts">
import type { Config } from 'datatables.net'
import { onMounted, shallowRef, type Component } from 'vue'
import { columns, paginationIcons, tableData } from '../../components/data'

const DataTableComponent = shallowRef<Component | null>(null)

onMounted(async () => {
  const [{ default: DataTable }, { default: DataTablesCore }, { default: DataTablesSelect }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net'), import('datatables.net-select')])

  DataTable.use(DataTablesCore)
  DataTable.use(DataTablesSelect)

  DataTableComponent.value = DataTable
})

const options: Config = {
  responsive: true,
  dom: '<"flex flex-wrap justify-between items-center mb-4 gap-4"l f>' + 'rt' + '<"flex flex-wrap justify-between items-center mt-4 gap-4"i p>',
  select: {
    style: 'os',
    items: 'cell',
  },
  pageLength: 7,
  lengthMenu: [7, 10, 25, 50, -1],
  language: {
    paginate: paginationIcons,
  },
}
</script>
