<template>
  <BCard no-body>
    <BCardHeader class="justify-content-between">
      <BCardTitle>Striped Columns</BCardTitle>
      <Link href="https://getbootstrap.com/docs/5.3/content/tables/#striped-columns" target="_blank" class="icon-link icon-link-hover link-secondary link-underline-opacity-25 fw-semibold">
        View Docs
        <Icon icon="arrow-right" class="bi align-middle fs-lg" />
      </Link>
    </BCardHeader>

    <BCardBody>
      <BTableSimple responsive striped-columns class="align-middle mb-0">
        <thead class="align-middle thead-sm">
          <tr class="text-uppercase fs-xxs">
            <th v-for="(header, idx) in staticTableData.header" :key="idx" :style="header === 'Actions' ? { width: '1%' } : { width: 'auto' }">
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
              <span class="badge badge-label" :class="`badge-soft-${product.status === 'active' ? 'success' : 'warning'}`">
                {{ toPascalCase(product.status) }}
              </span>
            </td>
            <td class="text-end">
              <BDropdown end variant="link" class="text-muted" toggle-class="fs-xxl link-reset p-0 drop-arrow-none">
                <template #button-content>
                  <Icon icon="dots-vertical" />
                </template>

                <BDropdownItem href="#"> <Icon icon="eye" class="me-1" /> View </BDropdownItem>
                <BDropdownItem href="#"> <Icon icon="edit" class="me-1" /> Edit </BDropdownItem>
                <BDropdownItem href="#" class="text-danger"> <Icon icon="trash" class="me-1" /> Delete </BDropdownItem>
              </BDropdown>
            </td>
          </tr>
        </tbody>
      </BTableSimple>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import { toPascalCase } from '@/utils/helpers'
import { staticTableData } from './data'
</script>
