<template>
  <PageBreadcrumb title="Categories" subtitle="Ecommerce" />

  <div class="card">
    <div class="card-header">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="search" placeholder="Search category..." class="form-input" />
        </div>
      </div>

      <div class="flex items-center gap-1.25">
        <div>
          <select class="form-select">
            <option value="5">5</option>
            <option value="8" selected>8</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
        </div>

        <div class="input-icon-group">
          <Icon icon="circle" class="input-icon" />
          <select class="form-select">
            <option value="">All</option>
            <option value="">Active</option>
            <option value="">Unactive</option>
          </select>
        </div>

        <RouterLink data-sort="product" to="" class="btn bg-primary text-white text-nowrap hover:bg-primary-hover ms-1.25" aria-haspopup="dialog" aria-expanded="false" aria-controls="addCategoryModal" data-hs-overlay="#addCategoryModal">
          <Icon icon="plus" /> Add Category
        </RouterLink>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="w-full table table-hover table-custom table-centered table-select table-hover">
        <thead class="thead-sm font-semibold">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
            </th>
            <th>Category Name</th>
            <th>Slug</th>
            <th>Products</th>
            <th>Orders</th>
            <th>Earnings</th>
            <th>Last Modify</th>
            <th>Status</th>
            <th class="text-center w-[1%]">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(category, idx) in categoryData.slice(0, 8)" :key="idx">
            <td>
              <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
            </td>
            <td>
              <div class="flex gap-base items-center">
                <div>
                  <img :src="category.image" alt="Product" class="size-9" />
                </div>
                <h5>
                  <RouterLink data-sort="product" to="" class="font- hover:text-primary"> {{ category.name }}</RouterLink>
                </h5>
              </div>
            </td>
            <td>{{ category.slug }}</td>
            <td>{{ category.products }}</td>
            <td>{{ category.orders }}</td>
            <td>{{ category.earnings }}</td>
            <td>
              {{ category.lastModifiedDate }}
              <small class="text-default-400 ms-1"> {{ category.lastModifiedTime }}</small>
            </td>
            <td>
              <span :class="['badge text-2xs ', category.status === 'inactive' ? 'bg-danger/15 text-danger' : 'bg-success/15 text-success']"> {{ toPascalCase(category.status) }} </span>
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
      <TablePagination :currentPage="1" :perPageItems="8" :totalItems="categoryData.length" label="categories" />
    </div>
  </div>

  <div id="addCategoryModal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="addCategoryModalLabel">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 lg:max-w-3xl md:max-w-2xl md:w-full m-3 md:mx-auto min-h-[calc(100%-56px)] flex items-center">
      <div class="w-full flex flex-col card pointer-events-auto">
        <div class="card-header">
          <h3 id="addCategoryModalLabel" class="font-bold text-sm">Add New Category</h3>

          <button type="button" aria-label="Close" data-hs-overlay="#addCategoryModal">
            <Icon icon="x" class="text-2xl align-middle text-default-600" />
          </button>
        </div>

        <div class="card-body overflow-y-auto">
          <div class="grid grid-cols-2 gap-base">
            <div>
              <label for="categoryName" class="form-label">Category Name</label>
              <input type="text" class="form-input" id="categoryName" placeholder="e.g. Electronics" required />
            </div>

            <div>
              <label for="categorySlug" class="form-label">Slug</label>
              <input type="text" class="form-input" id="categorySlug" placeholder="e.g. electronics" required />
            </div>

            <div class="lg:col-span-2 col-span-1">
              <label for="categoryImage" class="form-label">Category Image</label>
              <input type="file" name="file-input" id="categoryImage" class="block w-full border border-default-300 rounded disabled:opacity-50 disabled:pointer-events-none file:bg-default-100 file:border-0 file:me-4 file:py-2 file:px-3" />
            </div>

            <div>
              <label for="categoryStatus" class="form-label">Status</label>
              <select id="categoryStatus" class="form-input" required>
                <option value="">Select Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>

            <div class="lg:col-span-2 col-span-1">
              <label for="categoryDescription" class="form-label">Description (Optional)</label>
              <textarea id="categoryDescription" class="form-textarea" rows="3" placeholder="Brief description of the category..."></textarea>
            </div>
          </div>
        </div>

        <div class="flex justify-end items-center gap-x-2 border-t border-default-300 card-body">
          <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addCategoryModal">Cancel</button>

          <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">Add Category</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { categoryData } from './components/data'
</script>

<style scoped></style>
