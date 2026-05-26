<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Basic DataTable</h4>
    </div>

    <div class="card-body">
      
        <component :is="DataTableComponent" :data="tableData.body" :options="options" :columns="columns" class="table table-striped">
          <thead class="thead-sm uppercase text-2xs">
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
import { type Component, onMounted, shallowRef } from 'vue'
import { columns, paginationIcons, tableData } from '../../components/data'

const DataTableComponent = shallowRef<Component | null>(null)

onMounted(async () => {
  const [{ default: DataTable }, { default: DataTablesCore }, { default: Responsive }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net'), import('datatables.net-responsive')])

  DataTable.use(DataTablesCore)
  DataTable.use(Responsive)

  DataTableComponent.value = DataTable
})

const options: Config = {
  responsive: true,
  dom: '<"flex flex-wrap justify-between items-center mb-4 gap-4"l f>' + 'rt' + '<"flex flex-wrap justify-between items-center mt-4 gap-4"i p>',
  language: {
    paginate: paginationIcons,
  },
}
</script>
