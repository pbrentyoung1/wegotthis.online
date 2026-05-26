<template>
  <div class="card">
    <div class="card-header justify-content-between">
      <h4 class="card-title">Today's Schedule</h4>
      <RouterLink to="" class="text-primary font-semibold hover:text-primary-hover flex items-center">
        <Icon icon="calendar" class="me-1" />
        <span>Invite</span>
      </RouterLink>
    </div>

    <div class="card-body">
      <div class="pb-2.5 border-b border-light border-dashed">
        <div class="mb-2.5">
          <p class="mb-1.25 text-truncate text-sm font-medium">Design Review Meeting</p>
          <span class="text-warning text-xs"> 30 minute session with UI/UX team </span>
        </div>

        <div class="flex justify-between items-center">
          <div class="flex items-center -space-x-2 transition-all duration-300">
            <div>
              <img :src="user5" alt="Liam Carter" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" />
            </div>
            <div>
              <img :src="user6" alt="Zoe Miles" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" />
            </div>
            <div>
              <span class="size-6 flex justify-center items-center rounded-full bg-primary/15 text-primary font-bold"> D </span>
            </div>
          </div>

          <button type="button" class="btn size-8 bg-secondary/15 text-secondary hover:bg-secondary hover:text-white rounded-full">
            <Icon icon="brand-figma" class="text-lg" />
          </button>
        </div>
      </div>

      <div class="py-2.5 border-b border-light border-dashed">
        <div class="mb-2.5">
          <p class="mb-1.25 text-truncate text-sm font-medium">Sprint Planning Session</p>
          <span class="text-success text-xs"> 1 hour agile team meeting </span>
        </div>

        <div class="flex justify-between items-center">
          <div class="flex items-center -space-x-2 transition-all duration-300">
            <div>
              <img :src="user7" alt="Ava Lee" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" />
            </div>
            <div>
              <img :src="user8" alt="Ethan King" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" />
            </div>
            <div>
              <img :src="user9" alt="Lucas White" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" />
            </div>
          </div>

          <button type="button" class="btn size-8 bg-secondary/15 text-secondary hover:bg-secondary hover:text-white rounded-full">
            <Icon icon="calendar-event" class="text-lg" />
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Icon from '~/components/wrappers/Icon.vue'

import { RouterLink } from "vue-router"
import user5 from '/images/users/user-5.jpg'
import user6 from '/images/users/user-6.jpg'
import user7 from '/images/users/user-7.jpg'
import user8 from '/images/users/user-8.jpg'
import user9 from '/images/users/user-9.jpg'
</script>
