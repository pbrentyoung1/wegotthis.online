<template>
  <PageBreadcrumb title="Customers" subtitle="Ecommerce" />
  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="flex gap-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="search" placeholder="Search customer..." class="form-input" />
          </div>
        </div>

        <div class="flex gap-2.5 items-center flex-wrap md:flex-nowrap">
          <select class="form-select">
            <option value="5">5</option>
            <option value="8" selected>8</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>

          <div class="relative">
            <div class="hs-dropdown inline-flex [--placement:bottom-right]">
              <button type="button" class="hs-dropdown-toggle btn border border-default-300 text-default-800 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <Icon icon="download" class="text-sm" />
                Export
                <Icon icon="chevron-down" class="align-middle ms-1" />
              </button>

              <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                <div class="space-y-0.5">
                  <a class="dropdown-item" href="#"> Export as PDF </a>

                  <a class="dropdown-item" href="#"> Export as CSV </a>

                  <a class="dropdown-item" href="#"> Export as Excel </a>
                </div>
              </div>
            </div>
          </div>

          <RouterLink to="" class="btn bg-primary text-white text-nowrap hover:bg-primary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addCustomerModal" data-hs-overlay="#addCustomerModal"> <Icon icon="plus" /> Add Customer </RouterLink>
        </div>
      </div>

      <div class="overflow-x-auto whitespace-normal">
        <table class="table table-hover">
          <thead class="thead-sm bg-light/25">
            <tr class="uppercase text-2xs">
              <th class="w-[1%]">
                <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" id="select-all-products" />
              </th>
              <th>Clients Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Country</th>
              <th>Joined</th>
              <th>Orders</th>
              <th>Total Spends</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(customer, idx) in customerData.slice(0, 8)" :key="idx">
              <td>
                <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
              </td>
              <td>
                <div class="flex gap-2.5 items-center">
                  <img :src="customer.customer.image" alt="avatar-7" class="size-8 rounded-full" />

                  <h5>
                    <RouterLink to="" class="hover:text-primary">{{ customer.customer.name }}</RouterLink>
                  </h5>
                </div>
              </td>
              <td>{{ customer.email }}</td>
              <td>{{ customer.phone }}</td>
              <td>
                <div class="flex gap-2.5 items-center">
                  <div>
                    <img :src="customer.country.flag" alt="" class="size-4 rounded-full" />
                  </div>
                  <p>{{ customer.country.name }}</p>
                </div>
              </td>
              <td>
                {{ customer.joinedDate }}<small class="text-default-400 ms-1">{{ customer.joinedTime }}</small>
              </td>
              <td>{{ customer.orders }}</td>
              <td>{{ customer.totalSpends }}</td>
              <td>
                <div class="flex justify-center gap-1.5">
                  <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                    <Icon icon="eye" class="text-base" />
                  </a>
                  <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                    <Icon icon="edit" class="text-base" />
                  </a>
                  <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                    <Icon icon="trash" class="text-base" />
                  </a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer">
        <TablePagination :perPageItems="8" :totalItems="customerData.length" :currentPage="1" label="customers" />
      </div>
    </div>

    <div id="addCustomerModal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="addCustomerModalLabel">
      <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 lg:max-w-3xl md:max-w-2xl md:w-full m-3 md:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div class="w-full flex flex-col card pointer-events-auto">
          <div class="flex justify-between items-center card-body border-b border-default-300">
            <h3 id="addCustomerModalLabel" class="font-bold flex items-center">Add New Customer</h3>
            <button type="button" aria-label="Close" data-hs-overlay="#addCustomerModal">
              <Icon icon="x" class="text-2xl align-middle text-default-600"></Icon>
            </button>
          </div>
          <div class="card-body">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-base">
              <div>
                <label for="customerName" class="form-label">Full Name</label>
                <input type="text" class="form-input" id="customerName" placeholder="e.g. Carlos Méndez" required />
              </div>

              <div>
                <label for="customerEmail" class="form-label">Email</label>
                <input type="email" class="form-input" id="customerEmail" placeholder="e.g. carlos&#64;domain.com" required />
              </div>

              <div>
                <label for="customerPhone" class="form-label">Phone</label>
                <input type="tel" class="form-input" id="customerPhone" placeholder="+1 (415) 992-3412" required />
              </div>

              <div>
                <label for="customerCountry" class="form-label">Country</label>
                <select class="form-input" id="customerCountry" required>
                  <option value="">Select Country</option>
                  <option value="United States">🇺🇸 United States</option>
                  <option value="Canada">🇨🇦 Canada</option>
                  <option value="United Kingdom">🇬🇧 United Kingdom</option>
                  <option value="India">🇮🇳 India</option>
                </select>
              </div>

              <div>
                <label for="customerAvatar" class="form-label">Avatar</label>
                <input type="file" name="file-input" id="customerAvatar" class="block w-full border border-default-300 rounded disabled:opacity-50 disabled:pointer-events-none file:bg-default-100 file:border-0 file:me-4 file:py-2 file:px-3" />
              </div>

              <div>
                <label for="joinedDate" class="form-label">Join Date</label>
                <FlatPickr v-model="joinDate" type="date" class="form-input" id="joinedDate" :config="{ dateFormat: 'd M, Y' }" required />
              </div>
            </div>
          </div>
          <div class="flex justify-end items-center gap-2 p-5 border-t border-default-300">
            <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addCustomerModal">Close</button>
            <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">Add Customer</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { ref } from 'vue'
import FlatPickr from 'vue-flatpickr-component'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { customerData } from './components/data'

const joinDate = ref('today')
</script>

<style scoped></style>
