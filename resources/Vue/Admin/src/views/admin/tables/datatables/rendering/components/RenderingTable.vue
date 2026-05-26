<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Example</h4>
    </div>
    <div class="card-body">
      
        <table ref="tableRef" class="table table-striped">
          <thead class="text-2xs font-semibold uppercase">
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Progress</th>
              <th>Start date</th>
              <th>Salary</th>
            </tr>
          </thead>
        </table>
      
    </div>
  </div>
</template>

<script setup lang="ts">
import { onBeforeUnmount, onMounted, ref } from 'vue'
import { paginationIcons } from '../../components/data'
import arFlag from '/images/flags/ar.svg'
import auFlag from '/images/flags/au.svg'
import deFlag from '/images/flags/de.svg'
import gbFlag from '/images/flags/gb.svg'
import inFlag from '/images/flags/in.svg'
import jpFlag from '/images/flags/jp.svg'
import usFlag from '/images/flags/us.svg'

const tableRef = ref(null)
let dataTable: any = null

onMounted(async () => {
  const DataTable = (await import('datatables.net')).default

  const flagMap = {
    Argentina: arFlag,
    Gujarat: inFlag,
    Germany: deFlag,
    London: gbFlag,
    'New York': usFlag,
    'San Francisco': usFlag,
    Sydney: auFlag,
    Tokyo: jpFlag,
  }

  type OfficeKey = keyof typeof flagMap

  if (tableRef.value) {
    dataTable = new DataTable(tableRef.value, {
      ajax: (import.meta.env.VITE_BASE_URL || '') + '/data/datatables-rendering.json',
      processing: true,
      responsive: true,

      columns: [
        { data: 'name' },

        {
          data: 'position',
          render(data, type) {
            if (type === 'display') {
              let link = 'https://datatables.net'

              if (data[0] < 'H') link = 'https://cloudtables.com'
              else if (data[0] < 'S') link = 'https://editor.datatables.net'

              return `<a href="${link}" target="_blank">${data}</a>`
            }
            return data
          },
        },

        {
          data: 'office',
          className: 'flex items-center',
          render(data: OfficeKey, type: string) {
            if (type === 'display') {
              const flag = flagMap[data] || ''
              return `
                <span class="flag">
                  <img class="size-6 rounded me-3" src="${flag}" alt="${data}" />
                </span> ${data}
              `
            }
            return data
          },
        },

        {
          data: 'extn',
          render(data, type) {
            if (type === 'display') {
              const percent = (data / 9999) * 100
              return `
              <div class="flex w-full bg-default-100 h-2 rounded overflow-hidden" role="progressbar" aria-label="Basic example" aria-valuenow="${data}" aria-valuemin="0" aria-valuemax="9999">
                                  <div class="flex flex-col justify-center overflow-hidden bg-primary text-center whitespace-nowrap transition duration-500" style="width: ${percent}%"></div>
                            </div>
              `
            }
            return data
          },
        },

        { data: 'start_date' },

        {
          data: 'salary',
          render(data, type) {
            const formatted = `${'$'}${data.toLocaleString('en-US', { minimumFractionDigits: 2 })}`

            if (type === 'display') {
              let color = 'green'
              if (data < 250000) color = 'red'
              else if (data < 500000) color = 'orange'

              return `<span style="color:${color}">${formatted}</span>`
            }
            return formatted
          },
        },
      ],
      dom: '<"flex flex-wrap justify-between items-center mb-4 gap-4"l f>' + 'rt' + '<"flex flex-wrap justify-between items-center mt-4 gap-4"i p>',
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
