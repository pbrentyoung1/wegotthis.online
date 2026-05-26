<template>
  <PageBreadcrumb title="Sales Reports" subtitle="Ecommerce" />
  <div class="container">
    <div class="card">
      <div class="card-header flex items-center justify-between">
        <h5 class="card-title">Products - 2025</h5>

        <div class="flex gap-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="search" placeholder="Search reports..." class="form-input" />
          </div>

          <div class="input-icon-group">
            <Icon icon="calendar" class="input-icon" />

            <Flatpickr
              class="form-input"
              v-model="dateRange"
              :config="{
                mode: 'range',
                defaultDate: getCurrentMonthRange(),
              }"
            />
          </div>

          <button type="submit" class="btn bg-secondary text-white hover:bg-secondary-hover">
            <Icon icon="download" />
            Export Report
          </button>
        </div>
      </div>

      <div class="card-body">
        <div style="min-height: 415px">
          <ApexChart :getOptions="getSalesChartOptions" />
        </div>
      </div>

      <div class="table-wrapper">
        <table class="table-hover table">
          <thead class="thead-sm">
            <tr class="bg-light/25 text-2xs uppercase">
              <th class="w-[1%]">
                <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" id="select-all-products" />
              </th>

              <th>Date</th>
              <th>Order</th>
              <th>Refunds</th>
              <th>Avr. Revenue per Order</th>
              <th>Tax</th>
              <th>Revenue</th>
              <th>Balance</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="sale in saleData.slice(0, 8)" :key="sale.date">
              <td>
                <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
              </td>

              <td>{{ sale.date }}</td>

              <td>{{ sale.orders }}</td>

              <td>{{ sale.refunds }}</td>

              <td>{{ sale.averageRevenue }}</td>

              <td>{{ sale.tax }}</td>

              <td>{{ sale.revenue }}</td>

              <td>{{ sale.balance }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer">
        <TablePagination :currentPage="1" :perPageItems="8" :totalItems="saleData.length" label="entries" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Flatpickr from 'vue-flatpickr-component'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import Icon from '~/components/wrappers/Icon.vue'

import { ref } from 'vue'
import { getSalesChartOptions, saleData } from './components/data'

const dateRange = ref('')

const getCurrentMonthRange = () => {
  const start = new Date()
  start.setDate(1)
  start.setHours(0, 0, 0, 0)

  const end = new Date()
  end.setMonth(end.getMonth() + 1)
  end.setDate(0)
  end.setHours(23, 59, 59, 999)

  return [start, end]
}
</script>
