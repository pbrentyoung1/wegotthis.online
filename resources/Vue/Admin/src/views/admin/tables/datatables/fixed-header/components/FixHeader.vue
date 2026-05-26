<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Example</h4>
    </div>
    <div class="card-body">
      
        <component :is="DataTableComponent" :data="tableData.body" :columns="columns" :options="options" class="table table-striped">
          <thead class="text-2xs font-semibold uppercase">
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
import { onMounted, shallowRef } from 'vue'
import { columns, paginationIcons, tableData } from '../../components/data'

const DataTableComponent: any = shallowRef(null)

onMounted(async () => {
  const [{ default: DataTable }, { default: DataTablesCore }, { default: FixedHeader }, { default: Responsive }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net'), import('datatables.net-fixedheader'), import('datatables.net-responsive')])

  DataTable.use(DataTablesCore)
  DataTable.use(FixedHeader)
  DataTable.use(Responsive)

  DataTableComponent.value = DataTable
})

const options = {
  dom: '<"flex flex-wrap justify-between items-center mb-4 gap-4"l f>' + 'rt' + '<"flex flex-wrap justify-between items-center mt-4 gap-4"i p>',
  fixedHeader: {
    header: true,
    headerOffset: 65,
  },
  pageLength: 25,
  responsive: true,
  language: {
    paginate: paginationIcons,
  },
}
</script>
