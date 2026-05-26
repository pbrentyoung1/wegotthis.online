<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Example</h4>
    </div>
    <div class="card-body">
      
        <component :is="DataTableComponent" ref="tableRef" :data="tableRows" :columns="columns" :options="options" class="table-striped table">
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
import type { Api, Config } from 'datatables.net'
import { nextTick, onMounted, ref, shallowRef, type Component, type ComponentPublicInstance, type Ref } from 'vue'
import { columns, paginationIcons, tableData } from '../../components/data'

/* ---------------- Types ---------------- */
type DataTableComponentInstance = ComponentPublicInstance & {
  dt(): Api
}

/* ---------------- Refs ---------------- */
const DataTableComponent = shallowRef<Component | null>(null)
const tableRef: Ref<DataTableComponentInstance | null> = ref(null)
const tableRows = ref(tableData.body.slice(0, 5))

/* ---------------- Add Row Logic ---------------- */
const addRow = () => {
  const next = tableData.body[tableRows.value.length]
  if (!next) return

  tableRows.value.push(next)

  const dt = tableRef.value?.dt()
  if (dt) {
    dt.row.add(next).draw(false)
  }
}

/* ---------------- DataTables Top Button ---------------- */
const renderTopStart = () => {
  const container = document.createElement('div')
  container.className = 'addRowBtn'
  return container
}

/* ---------------- DataTable Options ---------------- */
const options: Config = {
  dom: "<'md:flex justify-between items-center mb-3'<'btn-toolbar'<'addRowBtn me-3'>><'dropdown'B>f>" + "<'row'<'col-sm-12'tr>>" + "<'md:flex justify-between items-center mt-base'ip>",
  responsive: true,
  lengthChange: false,
  language: {
    paginate: paginationIcons,
  },
  layout: {
    topStart: renderTopStart,
  },
}

/* ---------------- Load DataTables (Client Only) ---------------- */
onMounted(async () => {
  const [{ default: DataTableVue }, { default: DataTableCore }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net')])

  DataTableVue.use(DataTableCore)
  DataTableComponent.value = DataTableVue

  // Wait for next tick to ensure DOM is ready
  await nextTick()

  // Wait a bit more for DataTable to fully render
  setTimeout(() => {
    // Find the button container and populate it
    const btnContainer = document.querySelector('.addRowBtn')
    if (btnContainer) {
      const button = document.createElement('button')
      button.className = 'btn bg-primary text-white btn-sm hover:bg-primary-hover'
      button.innerText = 'Add Row'

      button.onclick = () => {
        addRow()
      }

      btnContainer.appendChild(button)
    }
  }, 100)
})
</script>
