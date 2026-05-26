<template>
  <CardWithAction title="Top Campaign Performance" bodyClassName="p-0" isCloseable isCollapsible isReloadable>
    <div class="table-wrapper whitespace-nowrap">
      <table class="table-hover mb-0 table">
        <thead class="thead-sm bg-light/25">
          <tr class="text-2xs uppercase">
            <th class="text-default-400">Campaign</th>
            <th class="text-default-400">Visitors</th>
            <th class="text-default-400">New Users</th>
            <th class="text-default-400">Sessions</th>
            <th class="text-default-400">Bounce Rate</th>
            <th class="text-default-400">Pages/Visit</th>
            <th class="text-default-400">Avg. Duration</th>
            <th class="text-default-400">Leads</th>
            <th class="text-default-400">Revenue</th>
            <th class="text-default-400">Conversion</th>
          </tr>
        </thead>

        <tbody class="text-sm">
          <tr v-for="item in campaignData" :key="item.name">
            <td>
              <div class="flex items-center gap-2">
                <IconifyIcon :icon="item.icon" :class="['text-base', item.className]" />
                <span>{{ item.name }}</span>
              </div>
            </td>
            <td>{{ item.visitors }}</td>
            <td>{{ item.newUsers }}</td>
            <td>{{ item.sessions }}</td>
            <td>
              <span :class="item.isPositive ? 'text-success' : ''"> {{ item.bounceRate }}% </span>
            </td>
            <td>{{ item.pageVisits }}</td>
            <td>{{ item.avgDuration }}</td>
            <td>{{ item.leads }}</td>
            <td>
              <span :class="item.isPositive ? 'text-success' : ''"> ${{ item.revenue }}M </span>
            </td>
            <td>{{ item.conversion }}%</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="card-footer">
      <TablePagination :currentPage="1" label="entries" :totalItems="campaignData.length" :perPageItems="5" />
    </div>
  </CardWithAction>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import CardWithAction from '~/components/CardWithAction.vue'
import TablePagination from '~/components/TablePagination.vue'
import { campaignData } from './data'
</script>

<style></style>
