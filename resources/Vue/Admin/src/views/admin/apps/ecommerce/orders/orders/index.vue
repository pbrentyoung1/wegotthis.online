<template>
  <PageBreadcrumb title="Orders" subtitle="Ecommerce" />

  <div class="mb-1.25 grid grid-cols-1 gap-1.25 md:grid-cols-2 lg:grid-cols-5">
    <OrderStatisticWidget v-for="(order, idx) in orderStatData" :key="idx" :item="order" />
  </div>

  <div class="card">
    <div class="card-header">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="text" class="form-input" placeholder="Search order..." />
        </div>
      </div>

      <div class="flex flex-wrap items-center gap-2.5 lg:flex-nowrap">
        <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
          <div class="items-center gap-2.5 md:flex">
            <span class="font-semibold text-nowrap me-2.5">Filter By:</span>

            <div class="input-icon-group">
              <Icon icon="credit-card" class="input-icon" />
              <select class="form-select">
                <option value="All">Payment Status</option>
                <option value="Paid">Paid</option>
                <option value="Pending">Pending</option>
                <option value="Failed">Failed</option>
                <option value="Refunded">Refunded</option>
              </select>
            </div>
          </div>

          <div class="input-icon-group">
            <Icon icon="truck" class="input-icon" />
            <select class="form-select">
              <option value="All">Delivery Status</option>
              <option value="Processing">Processing</option>
              <option value="Shipped">Shipped</option>
              <option value="Delivered">Delivered</option>
              <option value="Cancelled">Cancelled</option>
            </select>
          </div>

          <div class="input-icon-group">
            <Icon icon="calendar" class="input-icon" />
            <select class="form-select">
              <option value="All">Date Range</option>
              <option value="Today">Today</option>
              <option value="Last 7 Days">Last 7 Days</option>
              <option value="Last 30 Days">Last 30 Days</option>
              <option value="This Year">This Year</option>
            </select>
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
      </div>

      <div class="flex items-center gap-2">
        <RouterLink to="/apps/ecommerce/order-add" class="btn bg-danger text-white hover:bg-danger-hover">
          <Icon icon="plus" />
          Add Order
        </RouterLink>
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
            <th>Date</th>
            <th>Customer</th>
            <th>Amount</th>
            <th>Payment Status</th>
            <th>Order Status</th>
            <th>Payment Method</th>
            <th class="text-center w-[1%]">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(order, idx) in orderData.slice(0, 8)" :key="idx">
            <td>
              <input class="form-checkbox form-checkbox-light size-4.5 align-middle" type="checkbox" value="option" />
            </td>
            <td>
              <h5 class="text-sm font-medium">
                <RouterLink to="/apps/ecommerce/order-details" class="hover:text-primary">#{{ order.id }} </RouterLink>
              </h5>
            </td>
            <td>
              {{ order.date }}
              <small class="text-default-400">{{ order.time }}</small>
            </td>
            <td>
              <div class="flex items-center gap-2.5">
                <div>
                  <img :src="order.customer.image" alt="avatar-2" class="size-8 rounded-full" />
                </div>
                <div>
                  <h5>{{ order.customer.name }}</h5>
                  <p class="text-default-400 text-xs">
                    {{ order.customer.email }}
                  </p>
                </div>
              </div>
            </td>
            <td>{{ order.amount }}</td>
            <td>
              <div :class="['flex items-center gap-1 font-semibold', order.paymentStatus === 'paid' ? 'text-success' : order.paymentStatus === 'pending' ? 'text-warning' : 'text-danger']">
                <Icon icon="circle-filled" :class="[order.paymentStatus === 'paid' ? 'text-success' : order.paymentStatus === 'pending' ? 'text-warning' : 'text-danger']" />
                {{ toPascalCase(order.paymentStatus) }}
              </div>
            </td>
            <td>
              <span :class="['badge', order.orderStatus === 'cancelled' ? 'bg-danger/15 text-danger' : order.orderStatus === 'processing' ? 'bg-warning/15 text-warning' : order.orderStatus === 'shipped' ? 'bg-info/15 text-info' : 'bg-success/15 text-success']">{{
                toPascalCase(order.orderStatus)
              }}</span>
            </td>
            <td>
              <div class="flex items-center gap-2">
                <img :src="order.paymentMethod.image" alt="visa" class="h-7" />
                {{ order.paymentMethod.type === 'card' ? order.paymentMethod.cardNumber : order.paymentMethod.type === 'upi' ? order.paymentMethod.upiId : order.paymentMethod.email }}
              </div>
            </td>
            <td>
              <div class="flex justify-center gap-1.25">
                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="eye" class="text-base" />
                </a>
                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="edit" class="text-base" />
                </a>
                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="trash" class="text-base" />
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="card-footer">
        <TablePagination :currentPage="1" :per-page-items="8" :total-items="orderData.length" label="orders" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import OrderStatisticWidget from './components/OrderStatisticWidget.vue'
import { orderData, orderStatData } from './components/data'
</script>

<style scoped></style>
