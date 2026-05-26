<template>
  <PageBreadcrumb title="API Keys" subtitle="Apps" />

  <div class="card">
    <div class="card-header">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="search" placeholder="Search API clients..." class="form-input" />
        </div>

        <button type="button" class="btn btn-icon bg-secondary text-white hover:bg-secondary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addApiKeyModal" data-hs-overlay="#addApiKeyModal">
          <Icon icon="plus" class="text-base" />
        </button>

        <button class="btn hidden bg-danger text-white hover:bg-danger-hover">Delete</button>
      </div>

      <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
        <span class="me-2.5 font-semibold text-nowrap">Filter By:</span>

        <div class="input-icon-group">
          <Icon icon="circle-check" class="input-icon" />
          <select class="form-select">
            <option value="All">Status</option>
            <option value="Active">Active</option>
            <option value="Pending">Pending</option>
            <option value="Revoked">Revoked</option>
            <option value="Suspended">Suspended</option>
            <option value="Expired">Expired</option>
          </select>
        </div>

        <div class="input-icon-group">
          <Icon icon="world" class="input-icon" />
          <select class="form-select">
            <option value="All">Region</option>
            <option value="US">USA</option>
            <option value="UK">UK</option>
            <option value="IN">India</option>
            <option value="DE">Germany</option>
            <option value="AU">Australia</option>
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
      <table class="table-hover table">
        <thead class="thead-sm bg-light/25">
          <tr class="text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" id="checkAll" />
            </th>
            <th>Name</th>
            <th>Created By</th>
            <th>API Key</th>
            <th>Status</th>
            <th>Usage</th>
            <th>Created</th>
            <th>Expires</th>
            <th>Region</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(api, idx) in apiClientData.slice(0, 8)" :key="idx">
            <td>
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" value="option" />
            </td>

            <td>
              <div class="font-medium">{{ api.name }}</div>
            </td>

            <td>
              <div class="flex items-center gap-2.5">
                <img :src="api.user.image" class="size-6 rounded-full" />
                <div>
                  <h5 class="text-sm font-medium text-nowrap">
                    {{ api.user.name }}
                  </h5>
                </div>
              </div>
            </td>

            <td>
              <div class="input-group">
                <input type="text" class="form-input-sm form-input" id="keyOne" readonly :value="api.apiKey" />
                <button class="btn btn-sm btn-icon border-default-300" type="button" data-clipboard-target="#keyOne" @click="copyToClipboard(api.apiKey)">
                  <Icon icon="copy" class="text-lg" />
                </button>
              </div>
            </td>

            <td>
              <span :class="['badge badge-label font-semibold', api.status === 'active' ? 'bg-success/15 text-success' : api.status === 'pending' ? 'bg-warning/15 text-warning' : 'bg-danger/15 text-danger']">
                {{ toPascalCase(api.status) }}
              </span>
            </td>

            <td>{{ api.keyUsage }} / {{ api.totalKeys }}</td>
            <td>{{ api.createdAtDate }}</td>
            <td>{{ api.expireAtDate }}</td>

            <td>
              <div class="inline-flex items-center gap-1.25 font-bold">
                <img :src="api.country.flag" class="size-3.5 rounded-full" />
                {{ api.country.code }}
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
      <TablePagination label="apis" :currentPage="1" :perPageItems="8" :totalItems="apiClientData.length" />
    </div>
  </div>

  <div id="addApiKeyModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto hs-overlay-open:opacity-100 hs-overlay-open:duration-500" role="dialog" tabindex="-1" aria-labelledby="addApiKeyModalLabel">
    <div class="hs-overlay-animation-target m-3 flex max-w-sm items-start justify-end md:w-full md:max-w-2xl lg:max-w-3xl">
      <div class="card pointer-events-auto flex w-full flex-col">
        <div class="flex items-center justify-between border-b border-default-300 p-6">
          <h3 id="addApiKeyModalLabel" class="card-title">Add New API Key</h3>
          <button type="button" aria-label="Close" data-hs-overlay="#addApiKeyModal">
            <Icon icon="x" class="text-xl" />
          </button>
        </div>

        <div class="card-body overflow-y-auto">
          <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
              <label class="form-label">Client Name</label>
              <input type="text" class="form-input" placeholder="Enter client name" />
            </div>

            <div>
              <label class="form-label">Created By</label>
              <select class="form-select">
                <option selected disabled>Select user</option>
                <option>Mark Reynolds</option>
                <option>Sophia Turner</option>
                <option>Liam Watson</option>
                <option>Ava Turner</option>
              </select>
            </div>

            <div>
              <label class="form-label">API Key</label>
              <div class="relative">
                <input type="text" v-model="apiKey" readonly id="apiKeyInput" class="form-input" placeholder="Enter or generate API key" />
                <button type="button" @click="generateApiKey" class="btn absolute end-0 top-0 rounded-s-none bg-secondary text-white" id="generateApiKey">Generate</button>
              </div>
            </div>

            <div>
              <label class="form-label">Status</label>
              <select class="form-select">
                <option value="Active">Active</option>
                <option value="Pending">Pending</option>
                <option value="Revoked">Revoked</option>
                <option value="Suspended">Suspended</option>
                <option value="Trial">Trial</option>
              </select>
            </div>

            <div>
              <label class="form-label">Usage Limit</label>
              <input type="text" class="form-input" placeholder="e.g. 1000" />
            </div>

            <div>
              <label class="form-label">Region</label>
              <select class="form-select">
                <option value="DE">🇩🇪 Germany</option>
                <option value="UK">🇬🇧 UK</option>
                <option value="IN">🇮🇳 India</option>
                <option value="US">🇺🇸 USA</option>
                <option value="AU">🇦🇺 Australia</option>
                <option value="CA">🇨🇦 Canada</option>
              </select>
            </div>

            <div>
              <label class="form-label">Created On</label>
              <FlatPickr v-model="date" :config="{ dateFormat: 'd M, Y' }" class="form-input" />
            </div>

            <div>
              <label class="form-label">Expires On</label>
              <FlatPickr v-model="dueDate" :config="{ dateFormat: 'd M, Y' }" class="form-input" />
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end gap-x-2 border-t border-default-300 p-4">
          <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addApiKeyModal">Cancel</button>

          <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">Add API Key</button>
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
import { apiClientData } from './components/data'

const apiKey = ref('')

const generateApiKey = () => {
  const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'
  let key = ''

  for (let i = 0; i < 26; i++) {
    key += chars.charAt(Math.floor(Math.random() * chars.length))
  }

  apiKey.value = key
}

const date = ref('today')
const dueDate = ref('today')
const copyToClipboard = async (text: string) => {
  try {
    await navigator.clipboard.writeText(text)
  } catch (err) {
    console.error('Copy failed', err)
  }
}
</script>
