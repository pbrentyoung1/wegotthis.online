<template>
  <div class="card">
    <div class="card-header items-center justify-between border-dashed">
      <h4 class="card-title mb-0">Product Inventory</h4>

      <div class="flex gap-2.5">
        <RouterLink to="" class="btn btn-sm bg-secondary/15 text-sm text-secondary hover:bg-secondary hover:text-white">
          <IconifyIcon icon="tabler:plus" />
          Add Order
        </RouterLink>

        <RouterLink to="" class="btn btn-sm bg-primary text-sm text-white hover:bg-primary-hover">
          <IconifyIcon icon="tabler:file-export" />
          Export CSV
        </RouterLink>
      </div>
    </div>

    <div class="table-wrapper whitespace-nowrap">
      <table class="table-sm table-hover table">
        <tbody>
          <tr v-for="(order, index) in orderData" :key="index">
            <td class="ps-4">
              <div class="flex items-center">
                <img :src="order.user.image" alt="" class="me-2.5 size-8 rounded-full" />
                <div>
                  <h5 class="my-1.25 text-sm">
                    <RouterLink to="" class="text-body"> #{{ order.id }} </RouterLink>
                  </h5>
                  <span class="text-xs text-default-400">
                    {{ order.user.name }}
                  </span>
                </div>
              </div>
            </td>

            <td>
              <span class="text-xs text-default-400">Product</span>
              <h5 class="mt-1.25 mb-2 text-sm font-normal">
                {{ order.product }}
              </h5>
            </td>

            <td>
              <span class="text-xs text-default-400">Date</span>
              <h5 class="mt-1.25 mb-2 text-sm font-normal">
                {{ order.date }}
              </h5>
            </td>

            <td>
              <span class="text-xs text-default-400">Amount</span>
              <h5 class="mt-1.25 mb-2 text-sm font-normal">${{ order.amount }}</h5>
            </td>

            <td>
              <span class="text-xs text-default-400">Status</span>
              <h5 class="mt-1.25 mb-2 text-sm font-normal flex items-center gap-1">
                <IconifyIcon icon="tabler:circle-filled" :class="['fs-xs', order.status === 'pending' ? 'text-warning' : order.status === 'cancelled' ? 'text-danger' : 'text-success']" />
                {{ toPascalCase(order.status) }}
              </h5>
            </td>

            <td style="width: 30px" class="pe-4.5 text-end">
              <div class="relative ms-auto">
                <div class="hs-dropdown inline-flex [--placement:bottom-right]">
                  <button type="button" class="hs-dropdown-toggle" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <IconifyIcon icon="tabler:dots-vertical" class="text-lg text-default-400" />
                  </button>

                  <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                    <div class="space-y-0.5">
                      <RouterLink to="" class="dropdown-item"> View Details </RouterLink>

                      <RouterLink to="" class="dropdown-item"> Cancel Order </RouterLink>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="card-footer">
      <TablePagination :currentPage="1" :perPageItems="5" :totalItems="5" label="orders" />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import TablePagination from '~/components/TablePagination.vue'
import { toPascalCase } from '~/utils/helpers'
import { orderData } from './data'
</script>

<style></style>
