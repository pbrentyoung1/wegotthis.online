<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">My Tasks</h4>
    </div>

    <div class="card-body p-0">
      <div class="table-wrapper whitespace-nowrap">
        <table class="table-hover table w-full text-sm">
          <thead class="thead-sm bg-light/25">
            <tr class="text-2xs uppercase">
              <th>Task</th>
              <th>Status</th>
              <th>Assigned By</th>
              <th>Start Date</th>
              <th>Priority</th>
              <th>Progress</th>
              <th style="width: 30px">Total Time Spent</th>
            </tr>
          </thead>

          <tbody>
            <template v-for="(task, idx) in taskData" :key="idx">
              <tr>
                <td>
                  <h5 class="my-1.25">
                    <RouterLink to="">{{ task.title }}</RouterLink>
                  </h5>
                  <span class="text-xs text-default-400"> Due in {{ task.dueDays }} days </span>
                </td>

                <td>
                  <span :class="`badge ${task.status === 'in-progress' ? 'bg-warning/15 text-warning' : task.status === 'out-dated' ? 'bg-danger/15 text-danger' : task.status === 'on-hold' ? 'bg-default-200 text-default-700' : 'bg-success/15 text-success'}`">
                    {{ toPascalCase(task.status) }}
                  </span>
                </td>

                <td>
                  <div class="flex items-center gap-2.5">
                    <img :src="task.assignBy.image" alt="avatar" class="size-8 rounded-full object-cover" />
                    <div>
                      <h5>{{ task.assignBy.name }}</h5>
                      <p class="text-xs text-default-400">
                        {{ task.assignBy.email }}
                      </p>
                    </div>
                  </div>
                </td>

                <td>{{ task.startDate }}</td>

                <td>
                  <span :class="`badge ${task.priority === 'high' ? 'bg-danger/15 text-danger' : task.priority === 'medium' ? 'bg-primary/15 text-primary' : 'bg-success/15 text-success'}`">
                    {{ toPascalCase(task.priority) }}
                  </span>
                </td>

                <td>{{ task.progress }}%</td>
                <td>{{ task.time }}</td>

                <td>
                  <RouterLink to="">
                    <Icon icon="edit" class="size-4.5 text-default-400" />
                  </RouterLink>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { taskData } from './data'
</script>
