<template>
  <CardWithAction title="Quarterly Reports" bodyClassName="p-0" isCollapsible isReloadable isCloseable>
    <template #badge>
      <span class="badge bg-primary text-white">IN+</span>
    </template>

    <div class="table-wrapper whitespace-nowrap">
      <table class="table-hover table">
        <thead class="thead-sm bg-light/25">
          <tr class="text-2xs uppercase">
            <th class="text-default-400">Quarter</th>
            <th class="text-default-400">Revenue</th>
            <th class="text-default-400">Expense</th>
            <th class="text-default-400">Margin</th>
            <th class="text-default-400">•••</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(report, idx) in quarterlyReportData" :key="idx">
            <td>
              <h5 class="mb-1.25 text-sm font-normal">
                {{ report.quarter }}
              </h5>
              <span class="text-xs text-default-400">
                {{ report.period }}
              </span>
            </td>

            <td>{{ report.revenue }}</td>
            <td>{{ report.expense }}</td>
            <td>{{ report.margin }}</td>

            <td style="width: 60px">
              <div dir="ltr">
                <EChart v-if="report.chartOptions" :getOptions="report.chartOptions" :extensions="extensions" style="min-height: 30px; width: 30px" />
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </CardWithAction>
</template>

<script lang="ts" setup>
import { PieChart } from 'echarts/charts'
import { GridComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import CardWithAction from '~/components/CardWithAction.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { quarterlyReportData } from './data'

const extensions = [PieChart, TooltipComponent, GridComponent, CanvasRenderer]
</script>
