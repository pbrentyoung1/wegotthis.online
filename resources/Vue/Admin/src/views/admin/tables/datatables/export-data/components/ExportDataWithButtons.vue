<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Export Data with Buttons</h4>
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
import { onMounted, shallowRef, type Component } from 'vue'

import { columns, paginationIcons, tableData } from '../../components/data'

const DataTableComponent = shallowRef<Component | null>(null)

onMounted(async () => {
  const [{ default: DataTableVue }, { default: DataTablesCore }, { default: Buttons }, { default: ButtonsHTML5 }, jszip, pdfmake] = await Promise.all([
    import('datatables.net-vue3'),
    import('datatables.net'),
    import('datatables.net-buttons'),
    import('datatables.net-buttons/js/buttons.html5'),
    import('jszip'),
    import('pdfmake'),
  ])

  DataTableVue.use(DataTablesCore)
  DataTableVue.use(Buttons)
  DataTableVue.use(ButtonsHTML5)

  DataTablesCore.Buttons.jszip(jszip.default)
  DataTablesCore.Buttons.pdfMake(pdfmake.default)

  DataTableComponent.value = DataTableVue
})

const options: Config = {
  responsive: true,
  dom: "<'md:flex justify-between items-center mb-3'Bf>" + 'rt' + "<'md:flex justify-between items-center mt-4'ip>",
  layout: {
    topStart: 'buttons',
  },
  buttons: [
    { extend: 'copy', className: 'btn btn-sm bg-secondary text-white hover:bg-secondary-hover' },
    { extend: 'csv', className: 'btn btn-sm bg-secondary text-white active' },
    { extend: 'excel', className: 'btn btn-sm bg-secondary text-white hover:bg-secondary-hover' },
    { extend: 'pdf', className: 'btn btn-sm bg-secondary text-white hover:bg-secondary-hover' },
  ],
  language: {
    paginate: paginationIcons,
  },
}
</script>
