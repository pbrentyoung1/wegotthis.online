<template>
  <PageBreadcrumb title="Issue List" subtitle="Apps" />

  <div class="card">
    <div class="card-header">
      <div class="input-icon-group">
        <Icon icon="search" class="input-icon" />
        <input type="search" placeholder="Search issues..." class="form-input" />
      </div>

      <div>
        <button class="btn bg-success text-white hover:bg-success-hover">Add New Issues</button>
      </div>
    </div>

    <div class="card-body">
      <div class="table-wrapper">
        <table class="table-hover table">
          <tbody>
            <tr v-for="(issue, idx) in issueData.slice(0, 8)" :key="idx">
              <td>
                <span :class="['badge badge-label text-2xs font-semibold text-white', issue.className]">
                  {{ toPascalCase(issue.status) }}
                </span>
              </td>

              <td>
                <a href="#" @click.prevent="openIssueModal(issue)" class="text-sm font-semibold uppercase hover:text-primary">
                  {{ issue.id }}
                </a>

                <p class="text-default-400">
                  {{ issue.description }}
                </p>
              </td>

              <td>
                <div class="flex items-center gap-2.5">
                  <img :src="issue.user.image" class="size-6 rounded-full" />
                  <h5 class="text-default-800">
                    {{ issue.user.name }}
                  </h5>
                </div>
              </td>

              <td>
                <p class="flex items-center gap-1">
                  <Icon icon="calendar" />
                  <span class="font-semibold">Created:</span>
                  {{ issue.createdAt }}
                </p>

                <p class="flex items-center gap-1">
                  <Icon icon="clock" />
                  <span class="font-semibold">Due:</span>
                  {{ issue.dueDate }}
                </p>
              </td>

              <td>
                <div class="flex items-center gap-0.75">
                  <a v-for="(tag, i) in issue.tags" :key="i" href="#" class="badge badge-label me-1 border border-default-300 font-semibold">
                    {{ tag }}
                  </a>
                </div>
              </td>

              <td>
                <div class="h-1.5 w-full rounded-full bg-default-100">
                  <div class="h-1.5 rounded-s-full" :class="issue.className" :style="{ width: issue.progress + '%' }" />
                </div>

                <small class="text-xs text-default-400"> {{ issue.progress }}% Complete </small>
              </td>

              <td>
                <div class="flex items-center gap-2">
                  <Icon icon="message-circle" class="text-default-400" />
                  {{ issue.comments }} comments
                </div>
              </td>

              <td>
                <div class="flex items-center gap-2">
                  <Icon icon="paperclip" class="text-default-400" />
                  {{ issue.files }} files
                </div>
              </td>

              <td>
                <div class="flex justify-center gap-1.5">
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
    </div>

    <div class="card-footer">
      <TablePagination className="mt-3" label="issues" :totalItems="issueData.length" :perPageItems="8" :currentPage="1" />
    </div>
  </div>

  <div id="taskDetailsModal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="taskDetailsModalLabel">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl">
      <div class="card pointer-events-auto flex w-full flex-col">
        <div class="card-header py-5">
          <h3 id="taskDetailsModalLabel" class="text-md">Issue Details</h3>
          <button @click="closeIssueModal" type="button" aria-label="Close" data-hs-overlay="#taskDetailsModal">
            <Icon icon="x" class="text-xl"></Icon>
          </button>
        </div>

        <div class="card-body overflow-y-auto">
          <!-- Status + Title -->
          <div class="flex flex-wrap items-center gap-3 mb-6">
            <span class="badge font-semibold bg-warning/10 text-warning rounded-full py-1.5 px-3 text-xs">In Progress</span>
            <h5 class="font-semibold">ISSUE-104 — User profile update not saving on mobile devices</h5>
          </div>

          <!-- Assigned User -->
          <div class="flex items-center mb-6">
            <img src="/images/users/user-1.jpg" class="rounded-full me-3" width="40" height="40" alt="User" />
            <div>
              <h5>Jason Lee</h5>
              <small class="text-default-400 text-2xs">Assigned User</small>
            </div>
          </div>

          <!-- Dates -->
          <div class="grid md:grid-cols-3 mb-6">
            <div>
              <strong>Created:</strong>
              10 Feb 2025
            </div>
            <div>
              <strong>Due:</strong>
              15 Feb 2025
            </div>
            <div>
              <!-- Tags -->
              <div class="mb-1.25">
                <span class="badge font-semibold badge-label bg-light">Mobile</span>
                <span class="badge font-semibold badge-label bg-light">UI</span>
                <span class="badge font-semibold bg-light text-danger">Urgent</span>
              </div>
            </div>
          </div>

          <p class="text-default-400 mb-4">User profile update is not saving correctly on mobile devices. This issue occurs on iOS Safari and Android Chrome. Needs urgent fix before next release.</p>

          <!-- Progress -->
          <div class="mb-6">
            <div class="flex justify-between">
              <small class="mb-3 uppercase text-2xs">Progress</small>
              <small class="font-bold text-warning text-2xs">60% Complete</small>
            </div>

            <div class="h-1.5 w-full rounded bg-default-200">
              <div class="h-full w-[60%] rounded bg-warning"></div>
            </div>
          </div>

          <!-- Comments & Files -->
          <div class="grid grid-cols-2 text-center mb-6">
            <div>
              <Icon icon="message" class="me-1.5"></Icon>
              <strong>12 Comments</strong>
            </div>
            <div>
              <Icon icon="paperclip" class="me-1.5"></Icon>
              <strong>3 Files Attached</strong>
            </div>
          </div>

          <!-- File List Example -->
          <ul class="list-group mb-6 border border-default-300">
            <li class="py-3 px-5 border-b border-default-300 flex justify-between items-center">
              <span> profile-update-bug.txt </span>
              <RouterLink to="" class="btn btn-sm border border-primary text-primary">Download</RouterLink>
            </li>
            <li class="py-3 px-5 flex justify-between items-center">
              <span> screenshot-mobile.png </span>
              <RouterLink to="" class="btn btn-sm border border-primary text-primary">Download</RouterLink>
            </li>
          </ul>
        </div>

        <div class="border-default-300 flex items-center justify-end gap-x-2 border-t p-5">
          <button type="button" class="btn bg-default-200 hover:text-primary" data-hs-overlay="#taskDetailsModal">Close</button>

          <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">Edit Issue</button>

          <button type="button" class="btn bg-danger text-white hover:bg-danger-hover">Delete Issue</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'

import { toPascalCase } from '~/utils/helpers'
import { issueData, type IssueType } from './components/data'

import { RouterLink } from "vue-router"
import { ref } from 'vue'

const selectedIssue = ref<IssueType>(issueData[0]!)

const openIssueModal = (issue: IssueType) => {
  selectedIssue.value = issue
  window.HSOverlay?.open('#taskDetailsModal')
}

const closeIssueModal = () => {
  selectedIssue.value = issueData[0]!
  window.HSOverlay?.close('#taskDetailsModal')
}
</script>
