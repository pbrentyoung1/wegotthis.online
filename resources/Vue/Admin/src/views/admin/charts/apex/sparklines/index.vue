<template>
  <PageBreadcrumb title="Sparklines Apexcharts" subtitle="Charts" />

  <div class="card">
    <div class="card-body">
      <div dir="ltr">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-base">
          <ApexChart :get-options="getSpark1Chart" :series="getSpark1Chart().series" type="area" :height="160" />
          <ApexChart :get-options="getSpark2Chart" :series="getSpark2Chart().series" type="area" :height="160" />
          <ApexChart :get-options="getSpark3Chart" :series="getSpark3Chart().series" type="area" :height="160" />
        </div>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table">
        <thead class="thead-sm bg-light/25 text-xs uppercase">
          <tr>
            <th>Total Value</th>
            <th>Percentage of Portfolio</th>
            <th>Last 10 days</th>
            <th>Volume</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>$32,554</td>
            <td>15%</td>
            <td>
              <ApexChart :get-options="getChart1" :series="getChart1().series" type="line" :height="60" :width="140" />
            </td>
            <td>
              <ApexChart :get-options="getChart5" :series="getChart5().series" type="bar" :height="60" :width="100" />
            </td>
          </tr>

          <tr>
            <td>$23,533</td>
            <td>7%</td>
            <td>
              <ApexChart :get-options="getChart2" :series="getChart2().series" type="line" :height="60" :width="140" />
            </td>
            <td>
              <ApexChart :get-options="getChart6" :series="getChart6().series" type="bar" :height="60" :width="100" />
            </td>
          </tr>

          <tr>
            <td>$54,276</td>
            <td>9%</td>
            <td>
              <ApexChart :get-options="getChart3" :series="getChart3().series" type="line" :height="60" :width="140" />
            </td>
            <td>
              <ApexChart :get-options="getChart7" :series="getChart7().series" type="bar" :height="60" :width="100" />
            </td>
          </tr>

          <tr>
            <td>$11,533</td>
            <td>2%</td>
            <td>
              <ApexChart :get-options="getChart4" :series="getChart4().series" type="line" :height="60" :width="140" />
            </td>
            <td>
              <ApexChart :get-options="getChart8" :series="getChart8().series" type="bar" :height="60" :width="100" />
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getChart1, getChart2, getChart3, getChart4, getChart5, getChart6, getChart7, getChart8, getSpark1Chart, getSpark2Chart, getSpark3Chart } from './data'
</script>
