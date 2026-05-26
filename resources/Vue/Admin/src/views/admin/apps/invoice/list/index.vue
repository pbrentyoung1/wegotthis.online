<template>
  <PageBreadcrumb title="Invoices list" subtitle="Apps" />

  <div class="card">
    <div class="card-header flex flex-wrap justify-between">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="search" placeholder="Search invoices..." class="form-input" />
        </div>

        <RouterLink to="/apps/invoice/create" class="btn btn-icon rounded-full bg-secondary text-white hover:bg-secondary-hover">
          <Icon icon="plus" class="text-base" />
        </RouterLink>
      </div>

      <div class="flex items-center gap-2.5">
        <span class="me-2.5 font-semibold">Filter By:</span>

        <div class="input-icon-group">
          <Icon icon="circle-check" class="input-icon" />
          <select class="form-select">
            <option value="All">Status</option>
            <option value="Paid">Paid</option>
            <option value="Pending">Pending</option>
            <option value="Overdue">Overdue</option>
            <option value="Draft">Draft</option>
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

    <div class="table-wrapper">
      <table class="table-custom table-select table-hover table">
        <thead class="thead-sm">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input data-table-select-all class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
            </th>

            <th>ID</th>
            <th>Create & End Date</th>
            <th data-table-sort="name">Clients Name</th>
            <th data-table-sort>Purchase</th>
            <th data-table-sort>Amount</th>
            <th data-table-sort data-column="status">Status</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(invoice, idx) in invoiceData.slice(0, 8)" :key="idx">
            <td>
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
            </td>

            <td>
              <h5 class="flex items-center gap-1.5">
                <Icon icon="invoice" :class="['text-base', invoice.status === 'paid' && 'text-success', invoice.status === 'pending' && 'text-warning', invoice.status === 'overdue' && 'text-danger', invoice.status === 'draft' && 'text-info']" />

                <RouterLink to="/apps/invoice/details" class="font-semibold hover:text-primary"> #{{ invoice.id }} </RouterLink>
              </h5>
            </td>

            <td>{{ invoice.date }}</td>

            <td>
              <div class="flex items-center gap-2.5">
                <div v-if="invoice.user.image">
                  <img :src="invoice.user.image" class="size-8 rounded-full" />
                </div>

                <div v-else class="flex size-8 items-center justify-center rounded-full bg-primary font-bold text-white">
                  {{ invoice.user.name.charAt(0) }}
                </div>

                <div>
                  <h5>
                    <RouterLink to="" class="text-default-900 hover:text-primary">
                      {{ invoice.user.name }}
                    </RouterLink>
                  </h5>
                  <p class="text-xs text-default-400">{{ invoice.user.email }}</p>
                </div>
              </div>
            </td>

            <td>{{ invoice.purchase }}</td>
            <td>{{ invoice.amount }} USD</td>

            <td>
              <span
                :class="[
                  'badge badge-label',
                  invoice.status === 'paid' && 'bg-success/15 text-success',
                  invoice.status === 'pending' && 'bg-warning/15 text-warning',
                  invoice.status === 'overdue' && 'bg-danger/15 text-danger',
                  invoice.status === 'draft' && 'bg-info/15 text-info',
                ]"
              >
                {{ toPascalCase(invoice.status) }}
              </span>
            </td>

            <td>
              <div class="flex justify-center gap-1.25">
                <button class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="eye" class="text-base" />
                </button>

                <button class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="edit" class="text-base" />
                </button>

                <button class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                  <Icon icon="trash" class="text-base" />
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="card-footer">
      <TablePagination :currentPage="1" :perPageItems="8" :totalItems="invoiceData.length" label="invoices" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { invoiceData } from './components/data'
</script>
