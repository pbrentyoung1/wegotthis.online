<template>
  <div class="card dt-b-none">
    <div class="card-header justify-content-between">
      <h4 class="card-title mb-0">Vertical Scroll</h4>
    </div>

    <div class="card-body">
      
        <table ref="tableRef" class="table table-striped dt-responsive align-middle mb-0 w-100">
          <thead class="thead-sm text-uppercase fs-xxs">
            <tr>
              <th v-for="(label, idx) in tableHeader" :key="idx">
                {{ label }}
              </th>
            </tr>
          </thead>
        </table>
      
    </div>
  </div>
</template>

<script setup lang="ts">
import { onBeforeUnmount, onMounted, ref } from 'vue'
import { columns, paginationIcons, tableData } from '../../components/data'

const tableHeader = tableData.header
const tableRef = ref(null)
let dataTable: any = null

onMounted(async () => {
  const DataTable = (await import('datatables.net-bs5')).default

  if (tableRef.value) {
    dataTable = new DataTable(tableRef.value, {
      data: tableData.body,
      columns: columns,
      paging: false,
      scrollCollapse: true,
      scrollY: '250px',
      responsive: true,

      language: {
        paginate: paginationIcons,
      },
    })
  }
})

onBeforeUnmount(() => {
  if (dataTable) dataTable.destroy(true)
})
</script>
