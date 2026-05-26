<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Example</h4>
    </div>

    <div class="card-body">
      
        <component :is="DataTableComponent" :data="companies" :columns="columns" :options="options" class="table table-striped align-middle mb-0 w-100"> </component>
      
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted, shallowRef } from 'vue'
import { columns, companies } from './data'

const DataTableComponent: any = shallowRef(null)

onMounted(async () => {
  const [{ default: DataTable }, { default: DataTablesCore }, { default: FixedColumns }, { default: Responsive }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net'), import('datatables.net-fixedcolumns'), import('datatables.net-responsive')])

  DataTable.use(DataTablesCore)
  DataTable.use(FixedColumns)
  DataTable.use(Responsive)

  DataTableComponent.value = DataTable

  setTimeout(() => {
    const tables = document.querySelectorAll('.dataTable')
    tables.forEach((tbl: any) => {
      if (tbl.api) tbl.api().columns.adjust().draw(false)
    })
  }, 300)
})

const options = {
  scrollX: true,
  paging: false,
  scrollY: '300px',
  scrollCollapse: true,
  pageLength: 10,
  ordering: true,
  responsive: false,
  fixedColumns: {
    leftColumns: 1,
    rightColumns: 1,
  },
  lengthChange: false,
}
</script>
