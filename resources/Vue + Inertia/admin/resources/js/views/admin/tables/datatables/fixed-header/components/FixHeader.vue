<template>
  <BCard no-body>
    <BCardBody>
      
        <component :is="DataTableComponent" :data="tableData.body" :columns="columns" :options="options" class="table table-striped dt-responsive align-middle mb-0">
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
import { onMounted, shallowRef } from 'vue'
import { columns, paginationIcons, tableData } from '../../components/data'

const DataTableComponent: any = shallowRef(null)

onMounted(async () => {
  const [{ default: DataTable }, { default: DataTablesCore }, { default: FixedHeader }, { default: Responsive }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net-bs5'), import('datatables.net-fixedheader'), import('datatables.net-responsive')])

  DataTable.use(DataTablesCore)
  DataTable.use(FixedHeader)
  DataTable.use(Responsive)

  DataTableComponent.value = DataTable
})

const options = {
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
