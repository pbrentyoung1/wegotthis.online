<template>
  <PageBreadcrumb title="Clients" subtitle="Apps" />
  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="flex gap-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="search" placeholder="Search clients..." class="form-input" />
          </div>

          <button class="btn btn-icon bg-secondary text-white" data-hs-overlay="#addClientModal">
            <Icon icon="plus" class="text-base" />
          </button>

          <button class="btn hidden bg-danger text-white hover:bg-danger-hover">Delete</button>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
          <span class="me-2.5 font-semibold">Filter By:</span>

          <div class="input-icon-group">
            <Icon icon="world" class="input-icon" />
            <select class="form-select">
              <option value="All">Country</option>
              <option value="US">USA</option>
              <option value="UK">UK</option>
              <option value="AU">Australia</option>
              <option value="DE">Germany</option>
              <option value="IN">India</option>
            </select>
          </div>

          <div class="input-icon-group">
            <Icon icon="briefcase" class="input-icon" />
            <select class="form-select">
              <option value="All">Project Type</option>
              <option value="Project">Project</option>
              <option value="Contract">Contract</option>
              <option value="Retainer">Retainer</option>
              <option value="Dashboard">Dashboard</option>
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
        <table class="table-hover table-custom table-select table">
          <thead class="thead-sm">
            <tr class="bg-light/25 text-2xs uppercase">
              <th class="w-[1%]">
                <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
              </th>
              <th>Clients Name</th>
              <th>Phone</th>
              <th>Country</th>
              <th>Enrolled</th>
              <th>Type</th>
              <th>Job Title</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(client, idx) in clientData.slice(0, 8)" :key="idx">
              <td>
                <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
              </td>

              <td>
                <div class="flex items-center gap-2.5">
                  <img :src="client.user.image" class="size-8 rounded-full" />

                  <div>
                    <h5>
                      <a href="#" class="hover:text-primary">
                        {{ client.user.name }}
                      </a>
                    </h5>
                    <p class="text-xs text-default-400">
                      {{ client.user.email }}
                    </p>
                  </div>
                </div>
              </td>

              <td>{{ client.phone }}</td>

              <td>
                <div class="inline-flex items-center font-bold">
                  <img :src="client.country.flag" class="me-1.25 size-3 rounded-full" />
                  {{ client.country.code }}
                </div>
              </td>

              <td>{{ client.date }}</td>
              <td>{{ client.type }}</td>
              <td>{{ client.role }}</td>

              <td>
                <span :class="['badge badge-label font-semibold', client.status === 'active' ? 'bg-success/15 text-success' : client.status === 'pending' ? 'bg-warning/15 text-warning' : 'bg-danger/15 text-danger']">
                  {{ toPascalCase(client.status) }}
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

                  <button class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                    <Icon icon="trash" class="text-base" />
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer">
        <TablePagination :currentPage="1" :perPageItems="8" :totalItems="clientData.length" label="clients" />
      </div>
    </div>

    <div id="addClientModal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="addClientModalLabel">
      <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex min-h-[calc(100%-56px)] max-w-sm scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl">
        <div class="card pointer-events-auto flex w-full flex-col">
          <div class="card-header p-5">
            <h3 id="addClientModalLabel" class="card-title uppercase font-bold text-sm">Add New Client</h3>
            <button type="button" aria-label="Close" data-hs-overlay="#addClientModal">
              <Icon icon="x" class="text-xl" />
            </button>
          </div>

          <div class="card-body overflow-y-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-base">
              <div>
                <label for="clientName" class="form-label">Client Name</label>
                <input type="text" class="form-input" id="clientName" name="client_name" placeholder="Enter full name" required />
              </div>

              <div>
                <label for="clientEmail" class="form-label">Email</label>
                <input type="email" class="form-input" id="clientEmail" name="email" placeholder="client&#64;example.com" required />
              </div>

              <div>
                <label for="clientPhone" class="form-label">Phone</label>
                <input type="tel" class="form-input" id="clientPhone" name="phone" placeholder="+1 (000) 000-0000" />
              </div>

              <div>
                <label for="clientCountry" class="form-label">Country</label>
                <select class="form-input" id="clientCountry" name="country" required>
                  <option value="">Select country...</option>
                  <option value="US">United States</option>
                  <option value="UK">United Kingdom</option>
                  <option value="DE">Germany</option>
                  <option value="MX">Mexico</option>
                  <option value="IN">India</option>
                </select>
              </div>

              <div>
                <label for="clientEnrolled" class="form-label">Enrolled Date</label>
                <FlatPickr v-model="dueDate" :config="{ dateFormat: 'M d, Y' }" class="form-input" id="clientEnrolled" name="enrolled_date" value="2025-11-08" />
              </div>

              <div>
                <label for="clientType" class="form-label">Type</label>
                <select class="form-input" id="clientType" name="type" required>
                  <option value="">Select type...</option>
                  <option value="Project">Project</option>
                  <option value="Contract">Contract</option>
                </select>
              </div>

              <div>
                <label for="clientJobTitle" class="form-label">Job Title</label>
                <input type="text" class="form-input" id="clientJobTitle" name="job_title" placeholder="Frontend Developer" />
              </div>

              <div>
                <label for="clientStatus" class="form-label">Status</label>
                <select class="form-input" id="clientStatus" name="status">
                  <option value="Active">Active</option>
                  <option value="Pending">Pending</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
          </div>

          <div class="border-default-300 flex items-center justify-end gap-x-2 border-t p-5">
            <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addClientModal">Cancel</button>

            <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">Add Client</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import FlatPickr from 'vue-flatpickr-component'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'

import { ref } from 'vue'
import { toPascalCase } from '~/utils/helpers'
import { clientData } from './components/data'

const dueDate = ref('today')
</script>
