<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Example</h4>
    </div>
    <div class="card-body">
      
        <component :is="DataTableComponent" :data="tableData.body" :columns="columns" :options="options" class="table">
          <thead class="text-2xs font-semibold uppercase">
            <tr>
              <th v-for="(label, idx) in tableData.header" :key="idx">
                {{ label }}
              </th>
            </tr>
            <tr id="column-search-inputs" class="column-search-input-bar">
              <th v-for="(label, index) in tableData.header" :key="'search-' + index">
                <input :placeholder="label" type="text" class="form-input form-input-sm bg-default-50! border-light" />
              </th>
            </tr>
          </thead>
        </component>
      
    </div>
  </div>
</template>

<script setup lang="ts">
import type { Config } from 'datatables.net'
import type { Component } from 'vue'
import { onMounted, shallowRef } from 'vue'
import { columns, paginationIcons, tableData } from '../../components/data'

const DataTableComponent = shallowRef<Component | null>(null)

onMounted(async () => {
  const [{ default: DataTable }, { default: DataTablesCore }] = await Promise.all([import('datatables.net-vue3'), import('datatables.net')])

  DataTable.use(DataTablesCore)

  DataTableComponent.value = DataTable
})

const options: Config = {
  dom: '<"flex flex-wrap justify-between items-center mb-4 gap-4"l f>' + 'rt' + '<"flex flex-wrap justify-between items-center mt-4 gap-4"i p>',
  responsive: true,
  language: {
    paginate: paginationIcons,
  },

  initComplete: function () {
    const api = this.api()

    document.querySelectorAll('#column-search-inputs th').forEach((th) => {
      th.addEventListener('click', (e) => e.stopPropagation())
    })

    document.querySelectorAll('#column-search-inputs th input').forEach((input, index) => {
      input.addEventListener('click', (e) => e.stopPropagation())

      input.addEventListener('keyup', function (this: HTMLInputElement) {
        if (api.column(index).search() !== this.value) {
          api.column(index).search(this.value).draw()
        }
      })
    })
  },
}
</script>
