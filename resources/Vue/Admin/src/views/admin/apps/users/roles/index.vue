<template>
  <PageBreadcrumb title="Roles" subtitle="Users" />

  <div class="container">
    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
      <div>
        <h4 class="page-main-title mb-1.25">Manage Roles</h4>
        <p class="text-default-400">Manage roles for smoother operations and secure access.</p>
      </div>

      <div>
        <button class="btn bg-success text-white hover:bg-success-hover" aria-haspopup="dialog" data-hs-overlay="#addRoleModal">
          <Icon icon="plus" />
          Add New Role
        </button>
      </div>
    </div>

    <div class="mb-base grid grid-cols-1 gap-base md:grid-cols-2 lg:grid-cols-4">
      <MemberRoleCard v-for="(member, index) in memberRoleData" :key="index" :member="member" />
    </div>

    <UsersTable />

    <div id="addRoleModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog">
      <div class="hs-overlay-animation-target m-3 flex max-w-sm scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl">
        <div class="card pointer-events-auto flex w-full flex-col">
          <div class="card-header p-5">
            <h3 class="text-sm">Add New Role</h3>

            <button type="button" data-hs-overlay="#addRoleModal">
              <Icon icon="x" class="text-xl" />
            </button>
          </div>

          <div class="card-body overflow-y-auto">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
              <div>
                <label class="form-label">Role Name</label>

                <input type="text" class="form-input" placeholder="e.g. Developer, Project Manager" />
              </div>

              <div>
                <label class="form-label">Description</label>

                <input type="text" class="form-input" placeholder="Brief description" />
              </div>

              <div class="md:col-span-2">
                <label class="form-label">Key Responsibilities</label>

                <textarea class="form-textarea" rows="4" placeholder="Enter responsibilities separated by commas or lines"></textarea>

                <small class="text-xs text-default-400"> Example: Codebase Maintenance, API Integration, Unit Testing </small>
              </div>

              <div>
                <label class="form-label">Assign Users</label>

                <select class="form-textarea" multiple>
                  <option value="1">John Doe</option>
                  <option value="2">Sarah Smith</option>
                  <option value="3">Michael Brown</option>
                  <option value="4">Emma Wilson</option>
                </select>

                <small class="text-xs text-default-400"> Hold Ctrl (Windows) or Cmd (Mac) to select multiple users </small>
              </div>

              <div>
                <label class="form-label">Role Icon</label>

                <input type="text" class="form-input" placeholder="e.g. shield, briefcase" />

                <small class="text-xs text-default-400"> Use icon class from your icon library </small>
              </div>
            </div>
          </div>

          <div class="flex items-center justify-end gap-x-2 border-t border-default-300 p-4">
            <button class="btn bg-light hover:text-primary" data-hs-overlay="#addRoleModal">Cancel</button>

            <button class="btn bg-primary text-white hover:bg-primary-hover">Add Role</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import MemberRoleCard from './components/MemberRoleCard.vue'
import UsersTable from './components/UsersTable.vue'
import { memberRoleData } from './components/data'
</script>
