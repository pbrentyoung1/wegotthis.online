<template>
  <CardWithAction title="Transactions Worldwide" body-class="pt-2" is-collapsable is-reloadable is-closeable>
    <BRow class="align-items-center">
      <BCol xl="6">
        <BTable hover :fields="fields" :items="transactions" :per-page="perPage" :current-page="currentPage" responsive thead-class="bg-light align-middle bg-opacity-25 thead-sm text-uppercase fs-xxs" class="table table-centered table-custom table-nowrap mb-0">
          <template #cell(id)="data">
            <Link href="#" class="link-reset fw-semibold">{{ data.item.id }}</Link>
          </template>

          <template #cell(datetime)="data">
            {{ data.item.date }} <small class="text-muted">{{ data.item.time }}</small>
          </template>

          <template #cell(amount)="data">
            <span class="fw-semibold">${{ data.item.amount }}</span>
          </template>

          <template #cell(statusvariant)="{ item }">
            <span :class="['badge  fs-xxs', item.status === 'failed' ? 'badge-soft-danger' : item.status === 'pending' ? 'badge-soft-warning' : 'badge-soft-success']"> <IconifyIcon icon="tabler:point-filled" /> {{ toTitleCase(item.status) }} </span>
          </template>

          <template #cell(paymentMethodlastFour)="data">
            <img :src="data.item.image" class="me-2" height="28" />
            xxxx {{ data.item.lastFour }}
          </template>
        </BTable>

        <div class="text-center mt-3">
          <Link href="#" class="link-reset text-decoration-underline fw-semibold link-offset-3">
            View All Transactions
            <IconifyIcon icon="tabler:send-2" />
          </Link>
        </div>
      </BCol>
      <BCol xl="6">
        <JsVectorMap id="world-map" :options="worldTransactionMapOptions" class="w-100 mt-4 mt-xl-0" :style="{ height: '297px' }" />
      </BCol>
    </BRow>
  </CardWithAction>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import { ref } from 'vue'
import CardWithAction from '@/components/CardWithAction.vue'
import JsVectorMap from '@/components/JsVectorMap.vue'
import { toTitleCase } from '@/utils/helpers'
import { transactionData, worldTransactionMapOptions, type TransactionsType } from './data'

const fields = [
  { key: 'id', label: 'Tran. No.', thClass: 'text-muted' },
  { key: 'order', label: 'Order', thClass: 'text-muted' },
  { key: 'datetime', label: 'Date', thClass: 'text-muted' },
  { key: 'amount', label: 'Amount', thClass: 'text-muted' },
  { key: 'statusvariant', label: 'Status', thClass: 'text-muted' },
  { key: 'paymentMethodlastFour', label: 'Payment Method', thClass: 'text-muted' },
]

const currentPage = ref(1)
const perPage = ref(5)

const transactions = ref<TransactionsType[]>(transactionData)
</script>
