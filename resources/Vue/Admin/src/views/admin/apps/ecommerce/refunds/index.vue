<template>
  <PageBreadcrumb title="Refunds" subtitle="Ecommerce" />

  <div class="mb-1.25 grid grid-cols-1 gap-1.25 md:grid-cols-2 lg:grid-cols-5">
    <RefundStatisticCard v-for="(stat, idx) in refundStatData" :key="idx" :item="stat" />
  </div>

  <div class="card">
    <div class="card-header">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="search" class="form-input" placeholder="Search refunds..." />
        </div>
        <button class="btn bg-danger text-white hover:bg-danger-hover hidden">Delete</button>
      </div>

      <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
        <div class="items-center gap-2.5 md:flex">
          <span class="font-semibold me-2.5">Filter By:</span>
          <div class="input-icon-group">
            <Icon icon="credit-card-refund" class="input-icon" />
            <select class="form-select">
              <option value="All">Refund Status</option>
              <option value="Pending">Pending</option>
              <option value="Approved">Approved</option>
              <option value="Rejected">Rejected</option>
              <option value="Refunded">Refunded</option>
            </select>
          </div>
        </div>

        <div>
          <select class="form-select">
            <option value="5">5</option>
            <option value="8" selected>8</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
        </div>
      </div>

      <div class="flex items-center gap-3">
        <a href="#" class="btn bg-primary text-white hover:bg-primary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="createRefundModal" data-hs-overlay="#createRefundModal">
          <Icon icon="plus" />
          Create Refund
        </a>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table table-hover">
        <thead class="thead-sm">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" id="select-all-products" />
            </th>
            <th>Order ID</th>
            <th>Product</th>
            <th>Customer</th>
            <th>Reason</th>
            <th>Payment</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Requested</th>
            <th>Processed</th>
            <th class="text-center w-[1%]">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(refund, idx) in refundData.slice(0, 8)" :key="idx">
            <td>
              <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
            </td>
            <td>
              <h5 class="text-sm">
                <RouterLink to="/apps/ecommerce/order-details" class="hover:text-primary">#INV-10423 </RouterLink>
              </h5>
            </td>
            <td>
              <div class="flex items-center gap-2.5">
                <div>
                  <img :src="refund.product.image" alt="" class="size-8 rounded-full" />
                </div>
                <div>
                  <p class="font-medium">{{ refund.product.name }}</p>
                  <p class="text-default-400 text-xs">SKU: {{ refund.product.sku }}</p>
                </div>
              </div>
            </td>
            <td>
              <div class="flex items-center gap-2.5">
                <div>
                  <img :src="refund.customer.image" alt="avatar-2" class="size-8 rounded-full" />
                </div>
                <div>
                  <h5 data-sort="customer" class="font-medium">{{ refund.customer.name }}</h5>
                  <p class="text-default-400 text-xs">{{ refund.customer.email }}</p>
                </div>
              </div>
            </td>
            <td>{{ refund.reason }}</td>
            <td>
              <div class="flex items-center gap-3">
                <img :src="refund.payment.image" alt="" class="h-7" />
                {{ refund.payment.type === 'card' ? refund.payment.number : refund.payment.name }}
              </div>
            </td>

            <td>{{ refund.amount }}</td>
            <td>
              <span
                :class="['badge font-semibold badge-label ', refund.status === 'rejected' ? 'bg-danger/15 text-danger' : refund.status === 'pending' ? 'bg-warning/15 text-warning' : refund.status === 'refunded' ? 'bg-secondary/15 text-secondary' : 'bg-success/15 text-success']"
              >
                {{ toPascalCase(refund.status) }}</span
              >
            </td>
            <td>{{ refund.requestedDate }}</td>
            <td>{{ refund.processedDate ? refund.processedDate : '-' }}</td>
            <td>
              <div class="flex justify-center gap-1.5">
                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="check" class="text-base" />
                </a>
                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="x" class="text-base" />
                </a>
                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="trash" class="text-base" />
                </a>
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                  <button type="button" class="hs-dropdown-toggle btn btn-icon btn-sm border border-default-300 hover:border-default-400" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <Icon icon="dots-vertical" class="text-base" />
                  </button>

                  <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                    <div class="space-y-0.5">
                      <a class="dropdown-item" href="#">View order</a>
                      <a class="dropdown-item" href="#">Contact customer</a>
                      <hr class="dropdown-divider" />
                      <a class="dropdown-item" href="#">Add note</a>
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
      <TablePagination :currentPage="1" :perPageItems="8" :totalItems="refundData.length" label="refunds" />
    </div>
  </div>

  <AddRefundModal />
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import AddRefundModal from './components/AddRefundModal.vue'
import { refundData, refundStatData } from './components/data'
import RefundStatisticCard from './components/RefundStatisticCard.vue'
</script>
<style scoped></style>
