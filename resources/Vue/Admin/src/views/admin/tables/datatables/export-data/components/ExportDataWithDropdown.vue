<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Export Data with Dropdowns</h4>
    </div>

    <div class="card-body">
      
        <component :is="DataTableComponent" :data="tableData.body" :columns="columns" :options="options" class="table table-striped">
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
  const [{ default: DataTable }, { default: DataTablesCore }, { default: jszip }, { default: pdfmake }] = await Promise.all([
    import('datatables.net-vue3'),
    import('datatables.net'),
    import('datatables.net-buttons'),
    import('datatables.net-buttons/js/buttons.html5'),
    import('jszip'),
    import('pdfmake'),
  ])

  DataTable.use(DataTablesCore)
  DataTablesCore.Buttons.jszip(jszip)
  DataTablesCore.Buttons.pdfMake(pdfmake)

  DataTableComponent.value = DataTable
})

const options: Config = {
  responsive: true,
  dom: "<'md:flex justify-between items-center mb-3'<'hs-dropdown relative'B>f>" + 'rt' + "<'md:flex justify-between align-center mt-4'ip>",
  buttons: [
    {
      extend: 'collection',
      text: '<svg  xmlns="http://www.w3.org/2000/svg"  width="14"  height="14"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="me-1 align-baseline"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg> Export',
      buttons: ['copy', 'csv', 'excel', 'pdf'],
      className: 'btn btn-sm bg-secondary text-white *:flex hs-dropdown-toggle',
    },
  ],
  language: {
    paginate: paginationIcons,
  },
}
</script>
