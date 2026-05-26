<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import ProjectCard from './components/ProjectCard.vue'
import { projectData } from './components/data'
</script>

<template>
  <PageBreadcrumb title="Projects" subtitle="Apps" />

  <div class="card mb-base">
    <div class="card-body bg-light/20">
      <div class="grid grid-cols-1 items-center gap-base lg:grid-cols-3">
        <div>
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="text" class="form-input" placeholder="Search project name..." />
          </div>
        </div>

        <div class="lg:col-span-2">
          <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
            <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
              <div class="items-center gap-2.5 md:flex">
                <span class="me-2.5 font-semibold">Filter By:</span>

                <div class="input-icon-group">
                  <Icon icon="activity" class="input-icon" />
                  <select class="form-select">
                    <option selected>Status</option>
                    <option value="On Track">On Track</option>
                    <option value="Delayed">Delayed</option>
                    <option value="At Risk">At Risk</option>
                    <option value="Completed">Completed</option>
                  </select>
                </div>
              </div>

              <div class="input-icon-group">
                <Icon icon="users" class="input-icon" />
                <select class="form-select">
                  <option selected>Team</option>
                  <option value="Design">Design</option>
                  <option value="Development">Development</option>
                  <option value="Marketing">Marketing</option>
                  <option value="QA">QA</option>
                </select>
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

              <button type="submit" class="btn bg-secondary text-white hover:bg-secondary-hover">Apply</button>
            </div>

            <div class="md:ms-auto">
              <nav class="flex items-center gap-x-1">
                <RouterLink to="/apps/projects/grid" class="btn btn-icon bg-primary text-white hover:bg-primary-hover">
                  <Icon icon="category" class="text-lg" />
                </RouterLink>

                <RouterLink to="/apps/projects/list" class="btn btn-icon bg-primary/15 text-primary hover:bg-primary hover:text-white">
                  <Icon icon="list-check" class="text-lg" />
                </RouterLink>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-base md:grid-cols-2 lg:grid-cols-4">
    <ProjectCard v-for="project in projectData" :key="project.title" :project="project" />
  </div>

  <div class="mt-5">
    <nav class="mx-auto flex items-center justify-center gap-1.5" aria-label="Pagination">
      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary" aria-label="Previous">
        <span>«</span>
      </button>

      <button type="button" class="btn btn-icon rounded-full bg-primary text-white">1</button>

      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">2</button>

      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">3</button>

      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">4</button>

      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">5</button>

      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary" aria-label="Next">
        <span>»</span>
      </button>
    </nav>
  </div>
</template>
