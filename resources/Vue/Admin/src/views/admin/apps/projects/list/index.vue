<template>
  <PageBreadcrumb title="Projects List" subtitle="Apps" />

  <div class="card mb-base">
    <div class="card-header">
      <div class="flex w-full items-center justify-between gap-base">
        <div class="flex gap-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="text" class="form-input" placeholder="Search project name..." />
          </div>
        </div>

        <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
          <div class="items-center gap-2.5 md:flex">
            <span class="me-2.5 font-semibold">Filter By:</span>

            <div class="input-icon-group">
              <Icon icon="activity" class="input-icon" />
              <select class="form-select">
                <option value="All">Status</option>
                <option value="In Progress">In Progress</option>
                <option value="Pending Review">Pending Review</option>
                <option value="Overdue">Overdue</option>
                <option value="In Review">In Review</option>
                <option value="Completed">Completed</option>
                <option value="Scheduled">Scheduled</option>
                <option value="On Hold">On Hold</option>
                <option value="Pending">Pending</option>
              </select>
            </div>
          </div>

          <div class="input-icon-group">
            <Icon icon="calendar-clock" class="input-icon" />
            <select class="form-select">
              <option selected>Deadline</option>
              <option value="This Week">This Week</option>
              <option value="This Month">This Month</option>
              <option value="Next Month">Next Month</option>
              <option value="No Deadline">No Deadline</option>
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
        </div>

        <div>
          <nav class="flex items-center gap-x-1">
            <RouterLink to="/apps/projects/grid" class="btn btn-icon bg-primary/15 text-primary hover:bg-primary hover:text-white">
              <Icon icon="category" class="text-lg" />
            </RouterLink>

            <RouterLink to="/apps/projects/list" class="btn btn-icon bg-primary text-white hover:bg-primary-hover">
              <Icon icon="list-check" class="text-lg" />
            </RouterLink>
          </nav>
        </div>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table-custom table-centered table-select table-hover table w-full">
        <thead class="thead-sm">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
            </th>
            <th>Project</th>
            <th>Members</th>
            <th>Status</th>
            <th>Tasks</th>
            <th>Progress</th>
            <th>Attachments</th>
            <th>Comments</th>
            <th>Due Date</th>
            <th class="w-[1%] text-center">Actions</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-default-300 whitespace-nowrap">
          <tr v-for="project in projectData.slice(0, 8)" :key="project.title">
            <td>
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
            </td>

            <td>
              <div class="flex gap-base">
                <div class="flex size-9 items-center justify-center rounded bg-light">
                  <Icon :icon="project.icon" class="text-xl text-default-400" />
                </div>

                <div class="flex-1">
                  <h5 class="mb-1.25 flex items-center hover:text-primary">
                    <RouterLink to="/apps/projects/details">
                      {{ project.title }}
                    </RouterLink>
                  </h5>
                  <p class="text-2xs text-default-400">Updated {{ project.updatedTime }}</p>
                </div>
              </div>
            </td>

            <td>
              <div class="flex">
                <div v-for="(member, idx) in project.members" :key="idx" :class="idx !== 0 ? '-ms-1.5' : ''">
                  <img :src="member.image" alt="user-img" class="size-6 rounded-full transition-all duration-200 hover:-translate-y-0.5" />
                </div>
              </div>
            </td>

            <td>
              <span :class="['badge badge-label', getVariant(project.status)]">
                {{ toPascalCase(project.status) }}
              </span>
            </td>

            <td>
              <h5>
                {{ project.task.completed }}/{{ project.task.total }}

                <span v-if="project.task.new" class="badge bg-secondary text-white"> +{{ project.task.new }} New </span>

                <span v-if="project.task.completed === project.task.total" class="badge bg-success text-white"> ✓ </span>
              </h5>
            </td>

            <td>
              <div class="h-1.25 w-full overflow-hidden rounded-full bg-default-100">
                <div
                  :class="['h-full', project.status === 'in-progress' ? 'bg-success' : project.status === 'in-review' ? 'bg-info' : project.status === 'overdue' ? 'bg-danger' : project.status === 'on-hold' ? 'bg-dark' : 'bg-primary']"
                  :style="{ width: project.progress + '%' }"
                ></div>
              </div>
            </td>

            <td>{{ project.attachments }} Files</td>
            <td>{{ project.comments }} Comments</td>
            <td>{{ project.dueDate }}</td>

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
      <TablePagination :currentPage="1" :perPageItems="8" :totalItems="projectData.length" label="projects" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { projectData } from './components/data'

type StatusType = 'in-progress' | 'in-review' | 'overdue' | 'on-hold' | string

function getVariant(status: StatusType) {
  return status === 'in-progress' ? 'bg-success/15 text-success' : status === 'in-review' ? 'bg-info/15 text-info' : status === 'overdue' ? 'bg-danger/15 text-danger' : status === 'on-hold' ? 'bg-dark/15 text-dark' : 'bg-primary/15 text-primary'
}
</script>
