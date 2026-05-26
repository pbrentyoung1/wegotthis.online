<template>
  <BCard no-body>
    <BCardHeader class="justify-content-between">
      <BCardTitle>AJAX DataTable</BCardTitle>
    </BCardHeader>

    <BCardBody>
      
        <component :is="DataTableComponent" :ajax="data" :columns="columns" :options="options" class="table table-striped dt-responsive align-middle mb-0">
          <thead class="thead-sm text-uppercase fs-xxs">
            <tr>
              <th v-for="(label, idx) in tableData.header" :key="idx">
                {{ label }}
              </th>
            </tr>
          </thead>
        </component>
      
    </BCardBody>
  </BCard>
</template>
<script setup lang="ts">
import type { Config } from 'datatables.net'
import { onMounted, shallowRef, type Component } from 'vue'
import { columns, paginationIcons, tableData } from '../../components/data'

const DataTableComponent = shallowRef<Component | null>(null)

onMounted(async () => {
  const [{ default: DataTable }, { default: DataTablesCore }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net-bs5')])

  DataTable.use(DataTablesCore)

  DataTableComponent.value = DataTable
})

const data = (import.meta.env.VITE_BASE_URL || '') + '/data/datatables.json'

const options: Config = {
  processing: true,
  responsive: true,
  language: {
    paginate: paginationIcons,
  },
}
</script>
