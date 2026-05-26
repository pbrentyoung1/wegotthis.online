<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Basic Table</h4>
    </div>

    <div class="card-body">
      <div class="table-wrapper">
        <table class="table">
          <thead class="font-semibold text-xs">
            <tr>
              <th v-for="(header, idx) in staticTableData.header" :key="idx">
                {{ header }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(product, idx) in staticTableData.data" :key="idx">
              <td>{{ product.name }}</td>
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
                >
                  {{ toPascalCase(product.status) }}
                </span>
              </td>
              <td class="flex gap-1.5">
                <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover">Edit</button>
                <button class="btn btn-sm bg-danger text-white hover:bg-danger-hover">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { toPascalCase } from '~/utils/helpers'
import { staticTableData } from './data'
</script>
