<template>
  <PageBreadcrumb title="Warehouse" subtitle="Ecommerce" />

  <div class="card">
    <div class="card-header">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="text" class="form-input" placeholder="Search..." />
        </div>
      </div>

      <div class="flex flex-wrap items-center gap-2.5 lg:flex-nowrap">
        <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
          <div class="items-center gap-2.5 md:flex">
            <span class="me-2.5 font-semibold text-nowrap text-default-800"> Filter By: </span>

            <div class="input-icon-group">
              <Icon icon="building" class="input-icon" />
              <select class="form-select">
                <option value="All">Warehouse Status</option>
                <option value="Operational">Operational</option>
                <option value="Maintenance">Under Maintenance</option>
                <option value="Closed">Closed</option>
              </select>
            </div>
          </div>

          <div class="input-icon-group">
            <Icon icon="map-pin" class="input-icon" />
            <select class="form-select">
              <option value="All">Location</option>
              <option value="New York, USA">New York</option>
              <option value="Boston, USA">Boston</option>
              <option value="Los Angeles, USA">Los Angeles</option>
              <option value="Berlin, Germany">Berlin</option>
              <option value="Singapore">Singapore</option>
              <option value="Dubai, UAE">Dubai</option>
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

      <div class="flex gap-1">
        <a href="#addWarehouseModal" class="btn bg-danger text-white hover:bg-danger-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addWarehouseModal" data-hs-overlay="#addWarehouseModal">
          <Icon icon="plus" />
          Add New
        </a>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table-custom table-select table-hover table">
        <thead class="thead-sm">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
            </th>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Manager</th>
            <th>Contact</th>
            <th>Capacity</th>
            <th>Avai. Stock</th>
            <th>Stock Shipping</th>
            <th>Revenue</th>
            <th>Status</th>
            <th class="w-[1%] text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="warehouse in warehouseData.slice(0, 10)" :key="warehouse.id">
            <td>
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" value="option" />
            </td>

            <td>
              <h5 class="text-sm">{{ warehouse.id }}</h5>
            </td>

            <td>{{ warehouse.name }}</td>

            <td>
              <div class="flex items-center gap-2.5">
                <Icon icon="map-pin" class="text-default-500" />
                <span>{{ warehouse.location }}</span>
              </div>
            </td>

            <td>
              <div class="flex items-center gap-2.5">
                <div class="size-8">
                  <img :src="warehouse.user.image" alt="avatar" class="rounded-full" />
                </div>

                <div>
                  <h6 class="text-xs font-semibold">
                    {{ warehouse.user.name }}
                  </h6>
                  <p class="text-xs text-default-400">
                    {{ warehouse.user.email }}
                  </p>
                </div>
              </div>
            </td>

            <td>
              <a :href="`tel:${warehouse.phone}`">
                {{ warehouse.phone }}
              </a>
            </td>

            <td>{{ warehouse.area }}</td>

            <td>{{ warehouse.availableStock }} units</td>

            <td>{{ warehouse.shippingStock }} units</td>

            <td>{{ warehouse.revenue }}</td>

            <td>
              <span :class="['badge text-2xs font-semibold', warehouse.status === 'closed' ? 'bg-danger/15 text-danger' : warehouse.status === 'maintenance' ? 'bg-warning/15 text-warning' : 'bg-success/15 text-success']">
                {{ toPascalCase(warehouse.status) }}
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
      <TablePagination :currentPage="1" :perPageItems="10" :totalItems="warehouseData.length" label="orders" />
    </div>
  </div>

  <div id="addWarehouseModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="addWarehouseModalLabel">
    <div class="hs-overlay-animation-target m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl hs-overlay-open:scale-100 hs-overlay-open:opacity-100">
      <div class="card pointer-events-auto flex w-full flex-col">
        <div class="card-header p-5">
          <h3 id="addWarehouseModalLabel" class="flex items-center font-semibold">
            <Icon icon="building" class="me-2.5 text-danger" />
            Add New Warehouse
          </h3>

          <button type="button" aria-label="Close" data-hs-overlay="#addWarehouseModal">
            <Icon icon="x" class="align-middle text-2xl text-default-600" />
          </button>
        </div>

        <div class="card-body">
          <div class="grid grid-cols-1 gap-base md:grid-cols-2">
            <div>
              <label class="form-label">Warehouse ID</label>
              <input type="text" class="form-input" placeholder="#WH-002" />
            </div>

            <div>
              <label class="form-label">Warehouse Name</label>
              <input type="text" class="form-input" placeholder="North Region Hub" />
            </div>

            <div>
              <label class="form-label">Location</label>
              <input type="text" class="form-input" placeholder="Los Angeles, USA" />
            </div>

            <div>
              <label class="form-label">Manager Name</label>
              <input type="text" class="form-input" placeholder="Liam Parker" />
            </div>

            <div>
              <label class="form-label">Manager Email</label>
              <input type="email" class="form-input" placeholder="liam.parker@company.com" />
            </div>

            <div>
              <label class="form-label">Contact Number</label>
              <input type="tel" class="form-input" placeholder="+1 212 555 0184" />
            </div>

            <div>
              <label class="form-label">Total Area</label>
              <input type="text" class="form-input" placeholder="85,000 sq.ft" />
            </div>

            <div>
              <label class="form-label">Total Capacity</label>
              <input type="text" class="form-input" placeholder="40,000 units" />
            </div>

            <div>
              <label class="form-label">Current Stock</label>
              <input type="text" class="form-input" placeholder="12,500 units" />
            </div>

            <div>
              <label class="form-label">Asset Value</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-input" placeholder="1.25M" />
              </div>
            </div>

            <div>
              <label class="form-label">Status</label>
              <select class="form-input">
                <option selected>Operational</option>
                <option>Under Maintenance</option>
                <option>Closed</option>
              </select>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end gap-2 border-t border-default-300 p-5">
          <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addWarehouseModal">Close</button>

          <button type="button" class="btn bg-danger text-white hover:bg-danger-hover">
            <Icon icon="check" />
            Save Warehouse
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'

import { toPascalCase } from '~/utils/helpers'
import { warehouseData } from './components/data'
</script>
