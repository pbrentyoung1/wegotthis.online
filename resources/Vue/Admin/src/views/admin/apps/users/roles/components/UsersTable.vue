<template>
  <div class="card">
    <div class="card-header">
      <div class="flex gap-2">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="search" placeholder="Search Users..." class="form-input" />
        </div>
      </div>

      <div class="flex flex-wrap items-center gap-3">
        <div class="items-center gap-3 md:flex">
          <span class="me-3 font-semibold text-nowrap">Filter By:</span>

          <div class="input-icon-group">
            <Icon icon="user-hexagon" class="input-icon" />
            <select class="form-select">
              <option value="">Role</option>
              <option value="Security Officer">Security Officer</option>
              <option value="Project Manager">Project Manager</option>
              <option value="Developer">Developer</option>
              <option value="Support Lead">Support Lead</option>
            </select>
          </div>
        </div>

        <div class="input-icon-group">
          <Icon icon="user-check" class="input-icon" />
          <select class="form-select">
            <option value="">Status</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Suspended">Suspended</option>
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

        <button class="btn bg-secondary text-white hover:bg-secondary-hover" type="button" aria-haspopup="dialog" data-hs-overlay="#addUserModal">Add User</button>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table-hover table">
        <thead class="thead-sm">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
            </th>
            <th>ID</th>
            <th>User</th>
            <th>Role</th>
            <th>Last Updated</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(user, idx) in userData.slice(0, 8)" :key="idx">
            <td>
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
            </td>

            <td>
              <h5>
                <a href="#" class="hover:text-primary">{{ user.id }}</a>
              </h5>
            </td>

            <td>
              <div class="flex items-center gap-3">
                <div>
                  <img :src="user.image" class="size-8 rounded-full" />
                </div>

                <div>
                  <h5>
                    <a class="hover:text-primary">{{ user.name }}</a>
                  </h5>
                  <p class="text-xs text-default-400">{{ user.email }}</p>
                </div>
              </div>
            </td>

            <td>{{ user.role }}</td>

            <td>
              {{ user.date }}
              <small class="text-default-400">{{ user.time }}</small>
            </td>

            <td>
              <span :class="['badge badge-label', user.status === 'suspended' ? 'bg-danger/15 text-danger' : user.status === 'inactive' ? 'bg-warning/15 text-warning' : 'bg-success/15 text-success']">
                {{ toPascalCase(user.status) }}
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
      <TablePagination :currentPage="1" :perPageItems="8" :totalItems="userData.length" label="roles" />
    </div>
  </div>

  <div id="addUserModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog">
    <div class="hs-overlay-animation-target m-3 flex max-w-sm scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl">
      <div class="card pointer-events-auto flex w-full flex-col">
        <div class="card-header p-5">
          <h3 class="text-sm">Add New User</h3>
          <button type="button" data-hs-overlay="#addUserModal">
            <Icon icon="x" class="text-xl" />
          </button>
        </div>

        <div class="card-body overflow-y-auto">
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="form-label">Full Name</label>
              <input type="text" class="form-input" placeholder="Enter full name" />
            </div>

            <div>
              <label class="form-label">Email Address</label>
              <input type="email" class="form-input" placeholder="Enter email" />
            </div>

            <div>
              <label class="form-label">Role</label>
              <select class="form-textarea" multiple>
                <option value="">Select role</option>
                <option value="Project Manager">Project Manager</option>
                <option value="Developer">Developer</option>
                <option value="Support Lead">Support Lead</option>
                <option value="Security Officer">Security Officer</option>
              </select>
            </div>

            <div>
              <label class="form-label">Status</label>
              <select class="form-input">
                <option value="">Select status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Suspended">Suspended</option>
              </select>
            </div>

            <div>
              <label class="form-label">User Avatar</label>
              <input type="file" class="form-input" />
              <small class="text-xs text-default-400"> Optional: Upload avatar image </small>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end gap-x-2 border-t border-default-300 p-5">
          <button class="btn bg-light hover:text-primary" data-hs-overlay="#addUserModal">Cancel</button>

          <button class="btn bg-primary text-white hover:bg-primary-hover">Add User</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { userData } from './data'
</script>
