<template>
  <CardWithAction title="Transactions Worldwide" isCollapsible isReloadable isCloseable>
    <div class="grid grid-cols-1 gap-base xl:grid-cols-2">
      <div>
        <div class="overflow-x-auto">
          <table class="table-custom table-nowrap table-hover table-centered table min-w-full whitespace-nowrap">
            <thead class="thead-sm bg-light/25 align-middle">
              <tr class="text-2xs uppercase">
                <th class="text-default-400">Tran. No.</th>
                <th class="text-default-400">Order</th>
                <th class="text-default-400">Date</th>
                <th class="text-default-400">Amount</th>
                <th class="text-default-400">Status</th>
                <th class="text-default-400">Payment Method</th>
              </tr>
            </thead>

            <tbody class="border-b border-default-300">
              <tr v-for="(transaction, index) in transactionData" :key="index">
                <td>
                  <RouterLink to="" class="font-semibold hover:text-primary">
                    {{ transaction.id }}
                  </RouterLink>
                </td>

                <td>{{ transaction.order }}</td>

                <td>
                  {{ transaction.date }}
                  <small class="text-default-400">
                    {{ transaction.time }}
                  </small>
                </td>

                <td class="font-semibold">${{ transaction.amount }}</td>

                <td>
                  <span :class="['badge text-2xs', transaction.status === 'failed' ? 'bg-danger/15 text-danger' : transaction.status === 'pending' ? 'bg-warning/15 text-warning' : 'bg-success/15 text-success']">
                    <IconifyIcon icon="tabler:point-filled" />
                    {{ toTitleCase(transaction.status) }}
                  </span>
                </td>

                <td class="flex items-center">
                  <img :src="transaction.payment.image" alt="" class="me-2.5 h-7" />
                  xxxx {{ transaction.payment.lastDigit }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="mt-5 text-center">
          <RouterLink to="" class="flex items-center justify-center gap-1 font-semibold underline hover:text-primary">
            View All Transactions
            <IconifyIcon icon="tabler:send-2" />
          </RouterLink>
        </div>
      </div>

      <div>
        <div id="map_1" class="mt-7.5 w-full xl:mt-0" style="height: 297px">
          <VectorMap id="map_transaction" :options="worldTransactionMapOptions" :height="297" />
        </div>
      </div>
    </div>
  </CardWithAction>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import CardWithAction from '~/components/CardWithAction.vue'
import VectorMap from '~/components/JsVectorMap.vue'
import { toTitleCase } from '~/utils/helpers'
import { transactionData, worldTransactionMapOptions } from './data'
</script>

<style></style>
