<template>
  <PageBreadcrumb title="Projects" subtitle="Apps" />

  <BRow class="mb-3">
    <BCol lg="12">
      <form class="bg-light-subtle rounded border p-3">
        <BRow class="gap-3">
          <BCol>
            <BRow class="gap-3">
              <BCol lg="4">
                <div class="app-search">
                  <BFormInput type="text" class="form-control" placeholder="Search project name..." />
                  <Icon icon="search" class="app-search-icon text-muted" />
                </div>
              </BCol>
              <div class="col-auto">
                <div class="d-flex flex-wrap align-items-center gap-2">
                  <span class="me-2 fw-semibold">Filter By:</span>

                  <div class="app-search">
                    <BFormSelect v-model="status" class="form-control my-1 my-md-0">
                      <option value="All">Status</option>
                      <option value="On Track">On Track</option>
                      <option value="Delayed">Delayed</option>
                      <option value="At Risk">At Risk</option>
                      <option value="Completed">Completed</option>
                    </BFormSelect>
                    <Icon icon="activity" class="app-search-icon text-muted" />
                  </div>

                  <div class="app-search">
                    <BFormSelect v-model="development" class="form-control my-1 my-md-0">
                      <option value="All">Team</option>
                      <option value="Design">Design</option>
                      <option value="Development">Development</option>
                      <option value="Marketing">Marketing</option>
                      <option value="QA">QA</option>
                    </BFormSelect>
                    <Icon icon="users" class="app-search-icon text-muted" />
                  </div>

                  <div class="app-search">
                    <BFormSelect v-model="deadline" class="form-control my-1 my-md-0">
                      <option value="All">Deadline</option>
                      <option value="This Week">This Week</option>
                      <option value="This Month">This Month</option>
                      <option value="Next Month">Next Month</option>
                      <option value="No Deadline">No Deadline</option>
                    </BFormSelect>
                    <Icon icon="calendar-clock" class="app-search-icon text-muted" />
                  </div>

                  <button type="submit" class="btn btn-secondary">Apply</button>
                </div>
              </div>
            </BRow>
          </BCol>

          <div class="col-auto">
            <div class="d-flex gap-1">
              <Link href="/apps/projects/grid" class="btn btn-primary btn-icon">
                <Icon icon="category" class="fs-lg" />
              </Link>
              <Link href="/apps/projects/list" class="btn btn-soft-primary btn-icon">
                <Icon icon="list-check" class="fs-lg" />
              </Link>
            </div>
          </div>
        </BRow>
      </form>
    </BCol>
  </BRow>

  <BRow>
    <BCol v-for="(project, idx) in projectData.slice(0, 4)" :key="idx" md="6" xxl="3">
      <ProjectCard1 :project="project" />
    </BCol>
    <BCol v-for="(project, idx) in projectData.slice(4, 8)" :key="idx" md="6" xxl="3">
      <ProjectCard2 :project="project" />
    </BCol>
  </BRow>

  <BPagination first-number last-number hide-ellipsis :total-rows="50" :per-page="10" class="pagination-rounded pagination-boxed justify-content-center" />
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCol, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { projectData } from './components/data'
import ProjectCard1 from './components/ProjectCard1.vue'
import ProjectCard2 from './components/ProjectCard2.vue'

const deadline = ref('All')
const development = ref('All')
const status = ref('All')
</script>

<style scoped></style>
