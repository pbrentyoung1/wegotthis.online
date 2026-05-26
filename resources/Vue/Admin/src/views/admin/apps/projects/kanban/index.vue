<template>
  <PageBreadcrumb title="Kanban" subtitle="Projects" />

  <div class="card h-[calc(100vh-200px)]">
    <div class="card-header gap-base!">
      <div class="flex gap-base flex-wrap items-center">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon text-default-400" />
          <input type="text" class="form-input" placeholder="Search tasks..." />
        </div>

        <div class="flex items-center gap-2.5">
          <div class="input-icon-group">
            <Icon icon="briefcase" class="input-icon text-default-400"></Icon>
            <select class="form-select">
              <option selected>Department</option>
              <option value="Design">Design</option>
              <option value="Development">Development</option>
              <option value="UI/UX">UI/UX</option>
              <option value="Marketing">Marketing</option>
              <option value="Finance">Finance</option>
              <option value="QA">QA</option>
            </select>
          </div>

          <div class="input-icon-group">
            <Icon icon="calendar-clock" class="input-icon text-default-400"></Icon>
            <select class="form-select">
              <option selected>Due Date</option>
              <option value="Today">Today</option>
              <option value="This Week">This Week</option>
              <option value="This Month">This Month</option>
            </select>
          </div>
        </div>
      </div>

      <div>
        <button class="btn bg-secondary text-white hover:bg-secondary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addTaskModal" data-hs-overlay="#addTaskModal">
          <Icon icon="plus" />
          Add New Task
        </button>
      </div>
    </div>

    <div class="card-body p-0">
      <div class="bg-light/40 flex items-stretch overflow-x-auto relative">
        <div class="w-85 min-w-84 border-default-300 border-e border-dashed" v-for="(status, idx) in statuses" :key="idx">
          <div class="flex items-center px-5 py-2.5">
            <h5>{{ toTitleCase(status) }} ({{ tasksByStatus(status).length }})</h5>
            <RouterLink to="" class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white">
              <Icon icon="plus" class="text-sm text-white" />
            </RouterLink>
          </div>
          <Simplebar class="h-[calc(100vh-332px)] px-5 pb-5" data-simplebar data-simplebar-md>
            <ul data-plugins="sortable" class="space-y-2.5">
              <li v-for="(task, idx) in tasksByStatus(status)" :key="idx">
                <VueDraggableNext group="project-task" id="project-tasks-list">
                  <TaskCard :item="task" />
                </VueDraggableNext>
              </li>
            </ul>
          </Simplebar>
        </div>
      </div>
    </div>
  </div>

  <div id="addTaskModal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="addTaskModalLabel">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-lg lg:max-w-lg min-h-[calc(100%-56px)]">
      <div class="card pointer-events-auto flex w-full flex-col">
        <div class="card-header p-5">
          <h3 id="addTaskModalLabel" class="text-sm font-semibold">Add New Task</h3>

          <button type="button" aria-label="Close" data-hs-overlay="#addTaskModal">
            <Icon icon="x" class="text-xl" />
          </button>
        </div>

        <div class="overflow-y-auto card-body">
          <form id="taskForm">
            <div class="mb-5">
              <label class="form-label">Task Title</label>
              <input type="text" class="form-input" placeholder="Enter task name..." required />
            </div>

            <div class="mb-5">
              <label class="form-label">Assign To</label>
              <select class="form-select">
                <option selected disabled>Select user</option>
                <option value="Liam Carter">Liam Carter</option>
                <option value="Ava Mitchell">Ava Mitchell</option>
                <option value="Noah Parker">Noah Parker</option>
                <option value="Emma Scott">Emma Scott</option>
                <option value="Logan Brooks">Logan Brooks</option>
              </select>
            </div>

            <div class="mb-5">
              <label class="form-label">Priority</label>
              <select class="form-select">
                <option value="Normal" selected>Normal</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Urgent">Urgent</option>
              </select>
            </div>

            <div class="mb-5">
              <label class="form-label">Due Date</label>
              <FlatPickr v-model="dueDate" :config="{ dateFormat: 'd M, Y' }" class="form-input" />
            </div>

            <div class="mb-5">
              <label class="form-label">Description</label>
              <textarea class="form-textarea" rows="3" placeholder="Brief details..."></textarea>
            </div>
          </form>
        </div>

        <div class="border-default-300 flex items-center justify-end gap-x-2 border-t p-5">
          <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addTaskModal">Cancel</button>

          <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">
            <Icon icon="check" />
            Save Task
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Simplebar from 'simplebar-vue'
import { ref } from 'vue'
import { VueDraggableNext } from 'vue-draggable-next'
import FlatPickr from 'vue-flatpickr-component'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toTitleCase } from '~/utils/helpers'
import { kanbanTaskData, type KanbanTaskType } from './components/data'
import TaskCard from './components/TaskCard.vue'

const statuses: KanbanTaskType['status'][] = ['todo', 'in-progress', 'in-review', 'done']
const tasksByStatus = (status: string) => {
  return kanbanTaskData.filter((task: KanbanTaskType) => task.status === status)
}

const dueDate = ref('today')
</script>

<style></style>
