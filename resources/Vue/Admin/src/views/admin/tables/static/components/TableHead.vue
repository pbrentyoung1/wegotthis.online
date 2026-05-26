<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Table Head</h4>
    </div>

    <div class="card-body">
      <div class="table-wrapper">
        <table class="table">
          <thead class="bg-dark">
            <tr class="*:text-white!">
              <th v-for="(header, idx) in staticTableData.header" :key="idx" :style="header === 'Actions' ? { width: '1%' } : { width: 'auto' }">
                {{ header }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(product, idx) in staticTableData.data.slice(0, 3)" :key="idx">
              <td class="font-medium">{{ product.name }}</td>
              <td>{{ product.category }}</td>
              <td>{{ product.price }}</td>
              <td>{{ product.stock }}</td>
              <td>{{ product.rating }} ★</td>
              <td>
                <span
                  class="badge badge-label"
                  :class="{
                    'bg-success/10 text-success': product.status === 'active',
                    'bg-warning/10 text-warning': product.status === 'out-of-stock',
                  }"
                >
                  {{ toPascalCase(product.status) }}</span
                >
              </td>
              <td class="text-end">
                <div class="hs-dropdown relative inline-flex">
                  <button type="button" class="hs-dropdown-toggle flex h-7.5 w-11.25 items-center justify-center font-semibold" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" hs-dropdown-placement="bottom-end">
                    <Icon icon="dots-vertical" class="text-xl"></Icon>
                  </button>
                  <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                    <div>
                      <a class="dropdown-item" href="#">
                        <Icon icon="eye" class="text-xs"></Icon>
                        Overview
                      </a>
                      <a class="dropdown-item" href="#">
                        <Icon icon="edit" class="text-xs"></Icon>
                        Edit
                      </a>
                      <a class="dropdown-item text-danger" href="#">
                        <Icon icon="trash" class="text-xs"></Icon>
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
