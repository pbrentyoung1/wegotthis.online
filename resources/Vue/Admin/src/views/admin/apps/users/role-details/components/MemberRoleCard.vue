<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-7.5 flex items-start">
        <div>
          <div class="flex size-12 items-center justify-center rounded-full bg-primary/15 text-primary">
            <Icon icon="shield-lock" class="text-2xl" />
          </div>
        </div>

        <div class="ms-6">
          <h5 class="mb-1.25 text-sm">Security Officer</h5>
          <p class="text-default-400">Handles platform safety and protocol reviews.</p>
        </div>

        <div class="relative ms-auto">
          <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle text-lg text-default-400" aria-haspopup="menu" aria-expanded="false">
              <Icon icon="dots-vertical" class="text-lg" />
            </button>

            <div class="hs-dropdown-menu" role="menu">
              <a class="dropdown-item" href="#">
                <Icon icon="edit" />
                Edit
              </a>

              <a class="dropdown-item text-danger" href="#">
                <Icon icon="trash" />
                Remove
              </a>
            </div>
          </div>
        </div>
      </div>

      <ul class="mb-base flex flex-col gap-y-3">
        <li class="flex items-center gap-3">
          <Icon icon="check" class="text-base text-success" />
          Daily Risk Assessment
        </li>

        <li class="flex items-center gap-3">
          <Icon icon="check" class="text-base text-success" />
          Manage Security Logs
        </li>

        <li class="flex items-center gap-3">
          <Icon icon="check" class="text-base text-success" />
          Control Access Rights
        </li>

        <li class="flex items-center gap-3">
          <Icon icon="check" class="text-base text-success" />
          Emergency Protocols
        </li>
      </ul>

      <p class="mb-3 text-sm text-default-400">Total 17 users</p>

      <div class="mb-base flex items-center -space-x-2">
        <img :src="user7" class="size-8 rounded-full transition-all duration-200 hover:-translate-y-1" />
        <img :src="user8" class="size-8 rounded-full transition-all duration-200 hover:-translate-y-1" />
        <img :src="user9" class="size-8 rounded-full transition-all duration-200 hover:-translate-y-1" />
        <img :src="user10" class="size-8 rounded-full transition-all duration-200 hover:-translate-y-1" />
      </div>

      <div class="flex justify-between">
        <span class="flex items-center gap-1.5 text-xs text-default-400">
          <Icon icon="clock" />
          Updated 1 hour ago
        </span>

        <div>
          <button class="btn btn-sm rounded-full border border-primary text-primary hover:bg-primary hover:text-white" data-hs-overlay="#editRoleModal">Edit Role</button>
        </div>
      </div>
    </div>
  </div>

  <div id="editRoleModal" class="hs-overlay pointer-events-none fixed inset-0 z-80 hidden overflow-x-hidden overflow-y-auto">
    <div class="pointer-events-none flex min-h-screen items-start justify-center p-4">
      <div class="hs-overlay-animation-target pointer-events-auto w-full max-w-3xl scale-95 opacity-0 transition-all duration-200">
        <div class="card flex flex-col">
          <div class="card-header p-5">
            <h3 class="font-semibold text-default-600">Edit Role</h3>

            <button type="button" class="text-default-800" data-hs-overlay="#editRoleModal">
              <Icon icon="x" class="text-2xl" />
            </button>
          </div>

          <div class="card-body">
            <div class="grid gap-4 md:grid-cols-2">
              <div>
                <label class="form-label">Role Name</label>
                <input type="text" class="form-input" value="Developer" />
              </div>

              <div>
                <label class="form-label">Description</label>
                <input type="text" class="form-input" value="Builds and maintains the platform core features." />
              </div>

              <div class="md:col-span-2">
                <label class="form-label">Responsibilities</label>

                <textarea class="form-textarea" rows="4">
Codebase Maintenance
API Integration
Unit Testing
Feature Deployment
              </textarea
                >

                <small class="text-default-400"> Separate each item by comma or line </small>
              </div>

              <div>
                <label class="form-label">Assign Users</label>

                <select class="form-input min-h-20" multiple>
                  <option value="1" selected>Leah Kim</option>
                  <option value="2" selected>David Tran</option>
                  <option value="3">Michael Brown</option>
                  <option value="4">Emma Wilson</option>
                </select>

                <small class="text-default-400"> Hold Ctrl (Windows) or Cmd (Mac) to select multiple users </small>
              </div>

              <div>
                <label class="form-label">Role Icon</label>

                <input type="text" class="form-input" value="ti ti-code" />

                <small class="text-default-400"> Use icon class from your icon library </small>
              </div>
            </div>
          </div>

          <div class="flex items-center justify-end gap-x-2 border-t border-dashed border-default-300 p-5">
            <button class="btn bg-light hover:text-primary" data-hs-overlay="#editRoleModal">Cancel</button>

            <button class="btn m-1 bg-primary text-white">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import user10 from '/images/users/user-10.jpg'
import user7 from '/images/users/user-7.jpg'
import user8 from '/images/users/user-8.jpg'
import user9 from '/images/users/user-9.jpg'

import Icon from '~/components/wrappers/Icon.vue'
</script>
