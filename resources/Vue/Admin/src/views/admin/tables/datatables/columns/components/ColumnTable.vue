<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Example</h4>
    </div>
    <div class="card-body">
      <div class="hs-dropdown [--auto-close:inside] relative inline-flex" data-hs-dropdown>
        <button type="button" class="hs-dropdown-toggle btn btn-sm bg-secondary text-white">Show/Hide Columns</button>

        <div class="hs-dropdown-menu">
          <li v-for="(label, index) in columnLabels" :key="index" class="dropdown-item">
            <div class="flex items-center gap-2">
              <input type="checkbox" :id="'colToggle' + index" v-model="visibleColumns[index]" @change="toggleColumn(index)" class="form-checkbox form-checkbox-light mt-0 toggle-vis" />

              <label :for="'colToggle' + index" class="form-check-label font-medium cursor-pointer">
                {{ label }}
              </label>
            </div>
          </li>
        </div>
      </div>
      
        <component :is="DataTableComponent" ref="tableRef" :data="tableData.body" :columns="columns" :options="options" class="table table-striped dt-responsive align-middle mb-0">
          <thead class="thead-sm text-uppercase fs-xxs">
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
  dom: "<'md:flex justify-between items-center mb-3'<'columnToggleWrapper'>f>" + 'rt' + '<"flex flex-wrap justify-between items-center mt-base gap-4"i p>',
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
