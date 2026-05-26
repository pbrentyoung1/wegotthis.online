<template>
  <BCard no-body>
    <BCardHeader class="justify-content-between">
      <BCardTitle>Basic Datatable</BCardTitle>
    </BCardHeader>

    <BCardBody>
      <BDropdown text="Show/Hide Columns" variant="secondary" size="sm" auto-close="inside" class="mb-2">
        <BDropdownItem v-for="(label, index) in columnLabels" :key="index" class="px-2">
          <div class="d-flex align-items-center gap-2">
            <BFormCheckbox v-model="visibleColumns[index]" :id="'colToggle' + index" @change="toggleColumn(index)">
              {{ label }}
            </BFormCheckbox>
          </div>
        </BDropdownItem>
      </BDropdown>
      
        <component :is="DataTableComponent" ref="tableRef" :data="tableData.body" :columns="columns" :options="options" class="table table-striped dt-responsive align-middle mb-0">
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
import { BCard, BCardBody, BCardHeader, BDropdown, BDropdownItem, BFormCheckbox } from 'bootstrap-vue-next'
import type { Config } from 'datatables.net'
import { nextTick, onMounted, ref, shallowRef, type Component } from 'vue'
import { columns, paginationIcons, tableData } from '../../components/data'

const DataTableComponent = shallowRef<Component | null>(null)

const tableRef = ref()

const columnLabels = ['Company', 'Symbol', 'Price', 'Change', 'Volume', 'Market Cap', 'Rating', 'Status']

const visibleColumns = ref<boolean[]>(new Array(columnLabels.length).fill(true))
onMounted(async () => {
  const [{ default: DataTableVue }, { default: DataTableCore }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net')])

  DataTableVue.use(DataTableCore)
  DataTableComponent.value = DataTableVue
})

const toggleColumn = async (index: number) => {
  await nextTick()
  const dt = tableRef.value?.dt
  if (!dt) return

  const column = dt.column(index)
  const currentVisible = column.visible()
  column.visible(!currentVisible)

  visibleColumns.value[index] = !currentVisible
}

const options: Config = {
  dom: "<'d-md-flex justify-content-between align-items-center mb-3'<'columnToggleWrapper'>f>" + 'rt' + '<"d-flex flex-wrap justify-content-between align-items-center mt-1 gap-4"i p>',
  responsive: true,
  lengthChange: false,
  layout: {
    topEnd: 'search',
    top: 'pageLength',
  },
  language: {
    paginate: paginationIcons,
  },
}
</script>
