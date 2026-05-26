<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Striped Columns</h4>
    </div>

    <div class="card-body">
      <div class="table-wrapper">
        <table class="table">
          <thead class="font-semibold text-xs">
            <tr>
              <th v-for="(header, idx) in staticTableData.header" :key="idx" :style="header === 'Actions' ? { width: '1%' } : { width: 'auto' }">
                {{ header }}
              </th>
              <!-- <th>Product Name</th>
              <th class="bg-default-100 p-2 text-start">Category</th>
              <th>Price</th>
              <th class="bg-default-100 p-2 text-start">Stock</th>
              <th>Rating</th>
              <th class="bg-default-100 p-2 text-start">Status</th>
              <th class="text-end w-[1%]">Actions</th> -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="(product, idx) in staticTableData.data" :key="idx">
              <td class="font-medium">{{ product.name }}</td>
              <td class="bg-default-100 px-2.25 py-3">
                {{ product.category }}
              </td>
              <td>{{ product.price }}</td>
              <td class="bg-default-100 px-2.25 py-3">{{ product.stock }}</td>
              <td>{{ product.rating }} ★</td>
              <td class="bg-default-100 px-2.25 py-3">
                <span
                  class="badge badge-label"
                  :class="{
                    'bg-success/10 text-success': product.status === 'active',
                    'bg-warning/10 text-warning': product.status === 'out-of-stock',
                  }"
                  >{{ toPascalCase(product.status) }}</span
                >
              </td>
              <td class="text-end">
                <div class="hs-dropdown relative inline-flex">
                  <button type="button" class="hs-dropdown-toggle flex h-7.5 w-11.25 items-center justify-center font-semibold" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" hs-dropdown-placement="bottom-end">
                    <Icon icon="dots-vertical" class="text-xl" />
                  </button>
                  <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                    <div>
                      <a class="dropdown-item" href="#">
                        <Icon icon="eye" class="text-xs" />
                        Overview
                      </a>
                      <a class="dropdown-item" href="#">
                        <Icon icon="edit" class="text-xs" />
                        Edit
                      </a>
                      <a class="dropdown-item text-danger" href="#">
                        <Icon icon="trash" class="text-xs" />
                        Delete
                      </a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { staticTableData } from './data'
</script>
