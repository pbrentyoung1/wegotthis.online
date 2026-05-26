<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Complex Header</h4>
    </div>

    <div class="card-body">
      
        <component :is="DataTableComponent" :data="tableData.body" :columns="columns" :options="options" class="table table-bordered">
          <thead class="thead-sm text-2xs uppercase">
            <tr>
              <th colspan="2">Company Info</th>
              <th colspan="2">Rate</th>
              <th colspan="2">More</th>
              <th colspan="2">Other</th>
            </tr>
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
  const [{ default: DataTableVue }, { default: DataTablesCore }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net')])

  DataTableVue.use(DataTablesCore)
  DataTableComponent.value = DataTableVue
})

const options: Config = {
  responsive: true,
  dom: '<"flex flex-wrap justify-between items-center mb-4 gap-4"l f>' + 'rt' + '<"flex flex-wrap justify-between items-center mt-4 gap-4"i p>',
  language: {
    paginate: paginationIcons,
  },
}
</script>
