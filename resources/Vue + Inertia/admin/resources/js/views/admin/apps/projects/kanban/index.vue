<template>
  <PageBreadcrumb title="Kanban Board" subtitle="Projects" />

  <div class="outlook-box kanban-app">
    <BCard no-body class="h-100 mb-0 flex-grow-1">
      <BCardHeader class="border-light align-items-center gap-2">
        <div class="app-search">
          <input type="search" class="form-control" placeholder="Search tasks..." />
          <Icon icon="search" class="app-search-icon text-muted" />
        </div>

        <div class="d-flex flex-wrap align-items-center gap-2">
          <div class="app-search">
            <select class="form-select form-control">
              <option selected>Department</option>
              <option value="Design">Design</option>
              <option value="Development">Development</option>
              <option value="UI/UX">UI/UX</option>
              <option value="Marketing">Marketing</option>
              <option value="Finance">Finance</option>
              <option value="QA">QA</option>
            </select>
            <Icon icon="briefcase" class="app-search-icon text-muted" />
          </div>

          <div class="app-search">
            <select class="form-select form-control">
              <option selected>Due Date</option>
              <option value="Today">Today</option>
              <option value="This Week">This Week</option>
              <option value="This Month">This Month</option>
            </select>
            <Icon icon="calendar-clock" class="app-search-icon text-muted" />
          </div>
        </div>

        <button type="submit" class="btn btn-secondary ms-lg-auto"><Icon icon="plus" class="me-1" /> Add New Card</button>
      </BCardHeader>

      <BCardBody class="p-0">
        <div class="kanban-content bg-light bg-opacity-40">
          <div v-for="(status, idx) in statuses" :key="idx" class="kanban-board">
            <div class="kanban-item py-2 px-3 d-flex align-items-center">
              <h5 class="m-0">{{ toTitleCase(status) }} ({{ tasksByStatus(status).length }})</h5>
              <Link href="" class="ms-auto btn btn-sm btn-icon rounded-circle btn-primary">
                <Icon icon="plus" />
              </Link>
            </div>
            <simplebar class="kanban-board-group px-3">
              <ul data-plugins="sortable">
                <li class="kanban-item" v-for="(task, idx) in tasksByStatus(status)" :key="idx">
                  <VueDraggableNext group="project-task" id="project-tasks-list">
                    <TaskCard :item="task" />
                  </VueDraggableNext>
                </li>
              </ul>
            </simplebar>
          </div>
        </div>
      </BCardBody>
    </BCard>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardHeader } from 'bootstrap-vue-next'
import simplebar from 'simplebar-vue'
import { VueDraggableNext } from 'vue-draggable-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { toTitleCase } from '@/utils/helpers'
import { KanbanTaskData, type KanbanTaskType } from './components/data'
import TaskCard from './components/TaskCard.vue'

const statuses: KanbanTaskType['status'][] = ['todo', 'in-progress', 'in-review', 'done']

const tasksByStatus = (status: string) => {
  return KanbanTaskData.filter((task: KanbanTaskType) => task.status === status)
}
</script>

<style lang="scss" scoped></style>
