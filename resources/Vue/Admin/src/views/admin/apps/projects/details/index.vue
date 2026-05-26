<template>
  <PageBreadcrumb title="Project Overview" subtitle="Projects" />
  <div class="container">
    <div class="grid grid-cols-1 gap-base lg:grid-cols-4 lg:gap-0">
      <div class="lg:col-span-3">
        <div class="card h-full">
          <div class="card-header flex flex-wrap items-start gap-base p-7.5">
            <div class="me-5 flex size-20 items-center justify-center rounded bg-light">
              <img :src="starbucks" class="h-12" alt="Brand-img" />
            </div>

            <div>
              <h3 class="mb-1.25 flex items-center text-lg">Starbucks - AI Analytics Dashboard</h3>

              <p class="mb-2.5 text-2xs text-default-400">Updated 5 minutes ago</p>

              <span class="badge badge-label bg-success/15 text-2xs text-success"> In Progress </span>
            </div>

            <div class="ms-auto">
              <a href="#" class="btn bg-light hover:text-primary"> <Icon icon="pencil" /> Edit </a>
            </div>
          </div>

          <div class="card-body px-7.5">
            <div class="mb-7.5">
              <h5 class="mb-2.5">Project Description:</h5>

              <p class="mb-4 text-default-400">This dashboard provides AI-powered insights and analytics for Starbucks business data. It includes sales performance, customer behavior, and predictive trends to assist in data-driven decision-making.</p>

              <p class="mb-4 text-default-400">
                Customizable reports and role-based dashboards ensure relevant insights for marketing teams, financial analysts, and executive decision-makers. The system is built with scalability and responsiveness in mind, supporting both desktop and mobile views for seamless
                access.
              </p>
            </div>

            <div class="mb-7.5">
              <div class="grid grid-cols-2 gap-base md:grid-cols-4">
                <div>
                  <h6 class="mb-1.25 text-xs text-default-400 uppercase">Created Date:</h6>
                  <p class="font-medium">March 15, 2025</p>
                </div>

                <div>
                  <h6 class="mb-1.25 text-xs text-default-400 uppercase">Deadline:</h6>
                  <p class="font-medium">June 30, 2025</p>
                </div>

                <div>
                  <h6 class="mb-1.25 text-xs text-default-400 uppercase">Created By:</h6>
                  <p class="font-medium">John Smith</p>
                </div>

                <div>
                  <h6 class="mb-1.25 text-xs text-default-400 uppercase">Client Name:</h6>
                  <p class="font-medium">Starbucks Corporation</p>
                </div>
              </div>
            </div>

            <div class="border-b border-default-300">
              <nav class="flex gap-x-1" role="tablist" aria-orientation="horizontal">
                <button
                  type="button"
                  class="active inline-flex items-center gap-x-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap hover:text-primary hs-tab-active:border-primary hs-tab-active:font-semibold hs-tab-active:text-primary"
                  id="comments"
                  data-hs-tab="#comments-tab"
                >
                  <Icon icon="message-circle" class="me-md-1 text-base" />
                  <span class="hidden md:inline-block">Comments</span>
                </button>

                <button
                  type="button"
                  class="inline-flex items-center gap-x-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap hover:text-primary hs-tab-active:border-primary hs-tab-active:font-semibold hs-tab-active:text-primary"
                  id="tasks"
                  data-hs-tab="#tasks-tab"
                >
                  <Icon icon="list-check" class="me-md-1 text-base" />
                  <span class="hidden md:inline-block">Task List</span>
                </button>

                <button
                  type="button"
                  class="inline-flex items-center gap-x-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap hover:text-primary hs-tab-active:border-primary hs-tab-active:font-semibold hs-tab-active:text-primary"
                  id="activity"
                  data-hs-tab="#activity-tab"
                >
                  <Icon icon="activity" class="me-md-1 text-base" />
                  <span class="hidden md:inline-block">Activity</span>
                </button>
              </nav>
            </div>

            <div class="mt-5">
              <div id="comments-tab">
                <Comments />
              </div>

              <div id="tasks-tab" class="hidden">
                <TaskList />
              </div>

              <div id="activity-tab" class="hidden">
                <Activity />
              </div>
            </div>
          </div>
        </div>
      </div>

      <Sidebar />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import Activity from './components/Activity.vue'
import Comments from './components/Comments.vue'
import Sidebar from './components/Sidebar.vue'
import TaskList from './components/TaskList.vue'

import starbucks from '/images/logos/starbucks.svg'
</script>
