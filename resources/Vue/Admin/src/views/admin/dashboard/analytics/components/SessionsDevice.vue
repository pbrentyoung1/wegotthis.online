<template>
  <CardWithAction title="Sessions Device" bodyClassName="p-0" isCloseable isCollapsible isReloadable>
    <div class="card-body pb-0">
      <div class="apex-chart" style="min-height: 223px">
        <ApexChart :getOptions="deviceSessionsChartOptions" />
      </div>
    </div>

    <div class="table-wrapper whitespace-nowrap">
      <table class="table-hover mb-0 table">
        <thead class="thead-sm bg-light/25">
          <tr class="text-2xs uppercase">
            <th class="text-default-400">Device</th>
            <th class="text-default-400">Sessions</th>
            <th class="text-default-400">Change</th>
            <th class="text-end text-default-400">Traffic %</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <h5 class="text-sm">Mobile</h5>
              <p class="text-2xs text-default-400">- Android / iOS</p>
            </td>
            <td>4620</td>
            <td class="text-success">+3.4%</td>
            <td class="text-end">58%</td>
          </tr>

          <tr>
            <td>
              <h5 class="text-sm">Desktop</h5>
              <p class="text-2xs text-default-400">- Windows / Mac</p>
            </td>
            <td>2510</td>
            <td class="text-success">+1.9%</td>
            <td class="text-end">32%</td>
          </tr>

          <tr>
            <td>
              <h5 class="text-sm">Tablet</h5>
              <p class="text-2xs text-default-400">- iPad / Android Tabs</p>
            </td>
            <td>820</td>
            <td class="text-danger">-0.8%</td>
            <td class="text-end">10%</td>
          </tr>
        </tbody>
      </table>
    </div>
  </CardWithAction>
</template>

<script setup lang="ts">
import CardWithAction from '~/components/CardWithAction.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { deviceSessionsChartOptions } from './data'
</script>

<style></style>
