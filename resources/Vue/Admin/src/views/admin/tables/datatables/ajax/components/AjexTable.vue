<template>
  <div class="card">
    <div class="card-header justify-between">
      <h4 class="card-title">Example</h4>
    </div>

    <div class="card-body">
      
        <component :is="DataTableComponent" :ajax="data" :columns="columns" :options="options" class="table-striped dt-responsive table align-middle">
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
  const [{ default: DataTable }, { default: DataTablesCore }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net')])

  DataTable.use(DataTablesCore)

  DataTableComponent.value = DataTable
})

const data = (import.meta.env.VITE_BASE_URL || '') + '/data/datatables.json'

const options: Config = {
  dom: '<"flex flex-wrap justify-between items-center mb-4 gap-4"l f>' + 'rt' + '<"flex flex-wrap justify-between items-center mt-4 gap-4"i p>',
  processing: true,
  responsive: true,
  language: {
    paginate: paginationIcons,
  },
}
</script>
