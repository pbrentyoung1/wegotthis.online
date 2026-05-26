<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Custom Table</h4>
    </div>

    <div class="table-wrapper">
      <table class="table">
        <thead class="border-default-300 bg-default-100 border-b font-semibold text-xs">
          <tr>
            <th v-for="(header, idx) in staticTableData.header" :key="idx" :style="header === 'Actions' ? { width: '1%' } : { width: 'auto' }">
              {{ header }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(product, idx) in staticTableData.data" :key="idx">
            <td class="font-medium">{{ product.name }}</td>
            <td>{{ product.category }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.stock }}</td>
            <td>{{ product.rating }} ★</td>
            <td>
              <span
                class="badge badge-label bg-success/10 text-success"
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
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { staticTableData } from './data'
</script>
