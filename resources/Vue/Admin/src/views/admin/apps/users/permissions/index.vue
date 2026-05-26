<template>
  <PageBreadcrumb title="Permissions" subtitle="Users" />
  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="search" placeholder="Search permissions..." class="form-input" />
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

      <div class="table-wrapper">
        <table class="table-hover table">
          <thead class="thead-sm">
            <tr class="thead-sm bg-light/25 text-2xs uppercase">
              <th data-table-sort>Name</th>
              <th>Assign To</th>
              <th data-table-sort>Created Date</th>
              <th data-table-sort>Users</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(permission, idx) in permissionManagementData.slice(0, 8)" :key="idx">
              <td>
                {{ permission.name }}
              </td>

              <td>
                <span v-for="(role, index) in permission.roles" :key="index" class="badge badge-label me-1" :class="role.className">
                  {{ role.label }}
                </span>
              </td>

              <td>
                {{ permission.date }},
                <small class="text-sm text-default-400">
                  {{ permission.time }}
                </small>
              </td>

              <td>
                {{ permission.users }}
              </td>

              <td>
                <div class="flex justify-center gap-1.5">
                  <button class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                    <Icon icon="eye" class="text-base" />
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
        <TablePagination :currentPage="1" :perPageItems="8" :totalItems="permissionManagementData.length" label="permissions" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { permissionManagementData } from './components/data'
</script>
