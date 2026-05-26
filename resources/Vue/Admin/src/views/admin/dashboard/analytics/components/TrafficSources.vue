<template>
  <CardWithAction title="Traffic Sources" collapse-id="traffic" isCloseable isCollapsible isReloadable>
    <div class="mb-2.5 flex justify-between gap-base">
      <div>
        <h3 class="mb-2.5 text-xl font-bold">
          <CountUp :endVal="8975" />
        </h3>
        <p class="mb-2.5 font-semibold text-default-400">Right Now</p>
      </div>

      <div class="self-center">
        <ul class="leading-6">
          <li class="flex items-center gap-1.25">
            <IconifyIcon icon="tabler:caret-right-filled" class="align-middle text-lg text-primary" />
            <span class="text-default-400">Organic</span>
          </li>

          <li class="flex items-center gap-1.25">
            <IconifyIcon icon="tabler:caret-right-filled" class="align-middle text-lg text-success" />
            <span class="text-default-400">Direct</span>
          </li>

          <li class="flex items-center gap-1.25">
            <IconifyIcon icon="tabler:caret-right-filled" class="align-middle text-lg" />
            <span class="text-default-400">Campaign</span>
          </li>
        </ul>
      </div>
    </div>

    <div class="mb-5 flex h-5 w-full overflow-hidden rounded bg-default-200">
      <div class="h-full bg-primary" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      <div class="h-full bg-success" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
      <div class="h-full bg-info" style="width: 15%" role="progressbar" aria-valuenow="25" aria-valuemin="100" aria-valuemax="100"></div>
    </div>

    <div class="table-wrapper whitespace-nowrap">
      <table class="table-sm table-hover mb-0 table">
        <thead class="thead-sm bg-light/25">
          <tr class="text-2xs uppercase">
            <th class="text-default-400">URL</th>
            <th class="text-end text-default-400">Views</th>
            <th class="text-end text-default-400">Uniques</th>
          </tr>
        </thead>

        <tbody class="thead-sm border-b border-default-300">
          <tr v-for="(source, index) in trafficData" :key="index">
            <td class="underline">{{ source.pageLink }}</td>
            <td class="text-end">{{ source.views }}k</td>
            <td class="text-end">{{ source.unique }}k</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="mt-5 text-center">
      <RouterLink to="" class="flex items-center justify-end gap-1.25 font-semibold underline underline-offset-4 hover:text-primary">
        View all Links
        <IconifyIcon icon="tabler:link" />
      </RouterLink>
    </div>
  </CardWithAction>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import CountUp from 'vue-countup-v3'
import CardWithAction from '~/components/CardWithAction.vue'
import { trafficData } from './data'
</script>
