<template>
  <PageBreadcrumb title="Attributes" subtitle="Ecommerce" />
  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="flex gap-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="search" class="form-input" placeholder="Search Attributes..." />
          </div>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
          <span class="me-2.5 font-semibold">Filter By:</span>

          <div class="input-icon-group">
            <Icon icon="wand" class="input-icon" />
            <select class="form-select">
              <option value="All">Type</option>
              <option value="Dropdown">Dropdown</option>
              <option value="Text">Text</option>
              <option value="Number">Number</option>
            </select>
          </div>

          <div class="relative">
            <select class="form-select">
              <option value="5">5</option>
              <option value="8" selected>8</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
            </select>
          </div>
        </div>

        <div class="flex gap-1">
          <a href="#addAttributeForm" class="btn bg-danger text-white hover:bg-danger-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addAttributeForm" data-hs-overlay="#addAttributeForm">
            <Icon icon="plus" />
            Add Attribute
          </a>
        </div>
      </div>

      <div class="table-wrapper">
        <table class="table-hover table">
          <thead class="thead-sm">
            <tr class="bg-light/25 text-2xs uppercase">
              <th class="w-[1%]">
                <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" id="select-all-attributes" />
              </th>

              <th>Attribute Name</th>
              <th>Type</th>
              <th>Values</th>
              <th>Status</th>
              <th>Created Date</th>
              <th>Last Updated</th>
              <th>Last Modified By</th>
              <th class="w-[1%] text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="attribute in attributeData.slice(0, 8)" :key="attribute.attribute">
              <td>
                <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
              </td>

              <td>
                <h6>{{ attribute.attribute }}</h6>
              </td>

              <td>{{ attribute.inputType }}</td>

              <td>
                <span class="text-default-400">
                  {{ attribute.options.join(', ') }}
                </span>
              </td>

              <td>
                <div class="form-check form-switch">
                  <input class="form-switch" type="checkbox" :checked="attribute.isActive" />
                </div>
              </td>

              <td>
                {{ attribute.createdDate }}
                <small class="text-xs text-default-400">
                  {{ attribute.createdTime }}
                </small>
              </td>

              <td>
                {{ attribute.updatedDate }}
                <small class="text-xs text-default-400">
                  {{ attribute.updatedTime }}
                </small>
              </td>

              <td>
                <div class="flex items-center gap-2.5">
                  <div class="size-8">
                    <img :src="attribute.user.image" alt="avatar" class="rounded-full" />
                  </div>

                  <div>
                    <h6 class="text-xs font-semibold">
                      {{ attribute.user.name }}
                    </h6>

                    <p class="text-xs text-default-400">
                      {{ attribute.user.role }}
                    </p>
                  </div>
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
      </div>

      <div class="card-footer">
        <TablePagination :currentPage="1" :perPageItems="8" :totalItems="attributeData.length" label="products" />
      </div>
    </div>

    <!-- MODAL -->

    <div id="addAttributeForm" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="addAttributeFormLabel">
      <div class="hs-overlay-animation-target m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl hs-overlay-open:scale-100 hs-overlay-open:opacity-100">
        <div class="card pointer-events-auto flex w-full flex-col">
          <div class="card-header p-5">
            <h3 id="addAttributeFormLabel" class="flex items-center font-semibold">
              <Icon icon="circle-dashed-plus" class="me-2.5" />
              Add New Attribute
            </h3>

            <button type="button" aria-label="Close" data-hs-overlay="#addAttributeForm">
              <Icon class="align-middle text-2xl text-default-600" icon="close" />
            </button>
          </div>

          <div class="card-body">
            <div class="grid grid-cols-1 gap-base md:grid-cols-2">
              <div>
                <label class="form-label">Attribute Name</label>
                <input type="text" class="form-input" placeholder="e.g. Color, Size, Material" />
              </div>

              <div>
                <label class="form-label">Type</label>
                <select class="form-input">
                  <option value="">Select Type</option>
                  <option value="Dropdown">Dropdown</option>
                  <option value="Text">Text</option>
                  <option value="Number">Number</option>
                </select>
              </div>

              <div class="col-span-1 md:col-span-2">
                <label class="form-label">Values</label>

                <textarea class="form-textarea" rows="2" placeholder="Separate multiple values with commas (e.g. Red, Blue, Green)" />

                <small class="mt-1 block text-default-400"> Applicable only for Dropdown or selectable attributes. </small>
              </div>

              <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-2">
                  <input class="form-switch" type="checkbox" id="attributeStatus" checked />
                  <label class="form-check-label font-semibold" for="attributeStatus"> Active </label>
                </div>
              </div>
            </div>
          </div>

          <div class="flex items-center justify-end gap-2 border-t border-default-300 p-5">
            <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addAttributeForm">Close</button>

            <button type="button" class="btn bg-danger text-white hover:bg-danger-hover">
              <Icon icon="device-floppy" />
              Save Attribute
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'

import { attributeData } from './components/data'
</script>
