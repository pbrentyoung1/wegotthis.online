<template>
  <PageBreadcrumb title="Purchased Orders" subtitle="Ecommerce" />

  <div class="card">
    <div class="card-header">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="search" class="form-input" placeholder="Search..." />
        </div>

        <button class="btn hidden bg-danger text-white hover:bg-danger-hover">Delete</button>
      </div>

      <div class="flex flex-wrap items-center gap-2.5 lg:flex-nowrap">
        <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
          <div class="items-center gap-2.5 md:flex">
            <span class="me-2.5 font-semibold">Filter By:</span>

            <div class="input-icon-group">
              <Icon icon="credit-card" class="input-icon" />
              <select class="form-select">
                <option value="All">Payment Status</option>
                <option value="Paid">Paid</option>
                <option value="Pending">Pending</option>
                <option value="Unpaid">Unpaid</option>
                <option value="Overdue">Overdue</option>
              </select>
            </div>
          </div>

          <div class="input-icon-group">
            <Icon icon="truck" class="input-icon" />
            <select class="form-select">
              <option value="All">Order Status</option>
              <option value="Completed">Completed</option>
              <option value="Processing">Processing</option>
              <option value="Partially Received">Partially Received</option>
              <option value="Pending Delivery">Pending Delivery</option>
              <option value="Awaiting Delivery">Awaiting Delivery</option>
              <option value="Awaiting Shipment">Awaiting Shipment</option>
              <option value="Cancelled">Cancelled</option>
              <option value="In Progress">In Progress</option>
            </select>
          </div>

          <div class="relative">
            <select class="form-select">
              <option value="5">5</option>
              <option value="10" selected>10</option>
              <option value="15">15</option>
              <option value="20">20</option>
            </select>
          </div>
        </div>
      </div>

      <a href="#addPurchaseOrderModal" class="btn bg-danger text-white hover:bg-danger-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addPurchaseOrderModal" data-hs-overlay="#addPurchaseOrderModal">
        <Icon icon="plus" />
        Add New
      </a>
    </div>

    <div class="table-wrapper">
      <table class="table-select table-hover table">
        <thead class="thead-sm">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" id="select-all-orders" />
            </th>
            <th>PO Number</th>
            <th>Supplier</th>
            <th>Items</th>
            <th>Order Date</th>
            <th>Delivery Date</th>
            <th>Total Amount</th>
            <th>Payment Status</th>
            <th>Order Status</th>
            <th class="w-[1%] text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="order in purchasedOrderData.slice(0, 10)" :key="order.id">
            <td>
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
            </td>

            <td>
              <a href="#" class="font-semibold hover:text-primary">
                {{ order.id }}
              </a>
            </td>

            <td>
              <div>
                <h6>{{ order.supplier.name }}</h6>
                <p class="text-xs text-default-400">
                  {{ order.supplier.email }}
                </p>
              </div>
            </td>

            <td>{{ order.items }} Items</td>

            <td>
              {{ order.orderDate }}
              <small class="text-2xs text-default-400">
                {{ order.orderTime }}
              </small>
            </td>

            <td>
              {{ order.delivery.date }}
              <small class="text-2xs text-default-400">
                {{ toPascalCase(order.delivery.status) }}
              </small>
            </td>

            <td>
              <h5>{{ order.amount }}</h5>
            </td>

            <td>
              <span :class="['badge badge-label py-0.5 text-2xs font-semibold', order.paymentStatus === 'pending' ? 'bg-warning/15 text-warning' : order.paymentStatus === 'paid' ? 'bg-success/15 text-success' : 'bg-danger/15 text-danger']">
                {{ toPascalCase(order.paymentStatus) }}
              </span>
            </td>

            <td>
              <span
                :class="[
                  'badge badge-label py-0.5 text-2xs font-semibold',
                  order.orderStatus === 'cancelled' ? 'bg-danger/15 text-danger' : order.orderStatus === 'in-progress' ? 'bg-warning/15 text-warning' : order.orderStatus === 'partially-received' ? 'bg-info/15 text-info' : 'bg-success/15 text-success',
                ]"
              >
                {{ toPascalCase(order.orderStatus) }}
              </span>
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
    </div>

    <div class="card-footer">
      <TablePagination :currentPage="1" :perPageItems="10" :totalItems="purchasedOrderData.length" label="orders" />
    </div>
  </div>

  <div id="addPurchaseOrderModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="addPurchaseOrderModalLabel">
    <div class="hs-overlay-animation-target m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl hs-overlay-open:scale-100 hs-overlay-open:opacity-100">
      <div class="card pointer-events-auto flex w-full flex-col">
        <div class="card-header p-5">
          <h3 id="addPurchaseOrderModalLabel" class="flex items-center font-semibold">
            <Icon icon="file-text" class="me-2.5 text-danger" />
            Add New Purchase Order
          </h3>

          <button type="button" aria-label="Close" data-hs-overlay="#addPurchaseOrderModal">
            <Icon icon="x" class="align-middle text-2xl text-default-600" />
          </button>
        </div>

        <div class="card-body">
          <div class="grid grid-cols-1 gap-base md:grid-cols-2">
            <div>
              <label class="form-label">PO Number</label>
              <input type="text" class="form-input" placeholder="PO-2025-0149" />
            </div>

            <div>
              <label class="form-label">Supplier Name</label>
              <input type="text" class="form-input" placeholder="Global Tech Supplies" />
            </div>

            <div>
              <label class="form-label">Supplier Email</label>
              <input type="email" class="form-input" placeholder="globaltech@email.com" />
            </div>

            <div>
              <label class="form-label">Items Count</label>
              <input type="number" class="form-input" placeholder="10" />
            </div>

            <div>
              <label class="form-label">Order Date</label>
              <FlatPickr
                class="form-input"
                v-model="orderDate"
                :config="{
                  dateFormat: 'd M, Y',
                  defaultDate: 'today',
                }"
              />
            </div>

            <div>
              <label class="form-label">Delivery Date</label>
              <FlatPickr
                class="form-input"
                v-model="delDate"
                :config="{
                  dateFormat: 'd M, Y',
                  defaultDate: 'today',
                }"
              />
            </div>

            <div>
              <label class="form-label">Total Amount</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-input" placeholder="3480.00" step="0.01" />
              </div>
            </div>

            <div>
              <label class="form-label">Payment Status</label>
              <select class="form-input">
                <option selected>Paid</option>
                <option>Pending</option>
                <option>Partially Paid</option>
                <option>Unpaid</option>
              </select>
            </div>

            <div>
              <label class="form-label">Order Status</label>
              <select class="form-input">
                <option selected>Received</option>
                <option>Processing</option>
                <option>Dispatched</option>
                <option>Cancelled</option>
              </select>
            </div>

            <div class="col-span-1 md:col-span-2">
              <label class="form-label">Additional Notes</label>
              <textarea class="form-textarea" rows="2" placeholder="Add any special instructions or remarks here..." />
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end gap-2 border-t border-default-300 p-5">
          <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addPurchaseOrderModal">Close</button>

          <button type="button" class="btn bg-danger text-white hover:bg-danger-hover">
            <Icon icon="check" />
            Save Purchase Order
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import FlatPickr from 'vue-flatpickr-component'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { purchasedOrderData } from './components/data'

const orderDate = ref('')
const delDate = ref('')
</script>
