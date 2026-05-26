<template>
  <CardWithAction bodyClassName="p-0" title="Quarterly Reports" isCloseable isCollapsible isReloadable>
    <template #extraText>
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
          <tr v-for="report in quarterlyReports" :key="report.quarter">
            <td>
              <h5 class="mb-1.25 text-sm">{{ report.quarter }}</h5>
              <span class="text-xs text-default-400">{{ report.period }}</span>
            </td>

            <td>{{ report.revenue }}</td>
            <td>{{ report.expense }}</td>
            <td>{{ report.margin }}</td>

            <td style="width: 60px">
              <div dir="ltr">
                <EChart :extensions="[PieChart, TooltipComponent, CanvasRenderer]" :getOptions="getPieEchartOptions" style="height: 30px; width: 30px" />
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </CardWithAction>
</template>

<script setup lang="ts">
import CardWithAction from '~/components/CardWithAction.vue'
import EChart from '~/components/wrappers/EChart.vue'

import { PieChart } from 'echarts/charts'
import { TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'

import { getPieEchartOptions, quarterlyReports } from './data'
</script>
