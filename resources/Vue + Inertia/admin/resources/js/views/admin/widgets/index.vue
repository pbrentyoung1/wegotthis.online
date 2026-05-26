<template>
  <PageBreadcrumb title="Widgets" subtitle="Pages" />

  <BRow>
    <BCol cols="12">
      <BCard no-body>
        <BCardBody>
          <BRow class="row-cols-xxl-4 row-cols-md-2 row-cols-1 g-3 align-items-center">
            <BCol v-for="(widget, idx) in widget1Data" :key="idx">
              <Widget1 :widget="widget" />
            </BCol>
          </BRow>
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>

  <BRow>
    <BCol xl="4">
      <SalesPerformanceOverview />
    </BCol>
    <BCol xxl="4" lg="6">
      <TrafficSources />
    </BCol>
    <BCol xxl="4" lg="6">
      <TopCountries />
    </BCol>
  </BRow>

  <BRow>
    <BCol xl="4">
      <ProfileCard />
      <CommentCard />
    </BCol>

    <BCol xl="4">
      <ChatCard />
      <BRow>
        <BCol xl="6">
          <BCard no-body class="text-bg-purple">
            <BCardBody>
              <div class="d-flex align-items-center mb-3 gap-2">
                <div class="avatar-md">
                  <span class="avatar-title bg-light bg-opacity-20 text-white rounded-circle fs-xl">
                    <IconifyIcon icon="tabler:phone" />
                  </span>
                </div>
                <p class="mb-0 fw-semibold">PHONE</p>
              </div>
              <h5 class="mb-1 text-white text-opacity-75">+1 800 123 4567</h5>
              <h5 class="mb-0 text-white text-opacity-75">+1 800 765 4321</h5>
            </BCardBody>
          </BCard>
        </BCol>

        <BCol xl="6">
          <BCard no-body class="text-bg-success">
            <BCardBody>
              <div class="d-flex align-items-center mb-3 gap-2">
                <div class="avatar-md">
                  <span class="avatar-title bg-light bg-opacity-20 text-white rounded-circle fs-xl">
                    <IconifyIcon icon="tabler:mail" />
                  </span>
                </div>
                <p class="mb-0 fw-semibold">EMAIL</p>
              </div>
              <h5 class="mb-1 text-white text-opacity-75">support@example.com</h5>
              <h5 class="mb-0 text-white text-opacity-75">sales@example.com</h5>
            </BCardBody>
          </BCard>
        </BCol>
      </BRow>
    </BCol>

    <BCol xl="4">
      <FileManageCard />
      <TodaySchedule />
    </BCol>
  </BRow>

  <Widget3 />

  <BRow class="row-cols-xxl-4 row-cols-md-2 row-cols-1">
    <BCol v-for="(item, idx) in widget4Data" :key="idx">
      <Widget4 :item="item" />
    </BCol>
  </BRow>

  <BRow class="row-cols-xxl-4 row-cols-md-2 row-cols-1">
    <BCol v-for="(item, idx) in widget5Data" :key="idx">
      <Widget5 :item="item" />
    </BCol>
  </BRow>

  <BRow class="row-cols-xxl-4 row-cols-md-2 row-cols-1">
    <BCol v-for="(item, idx) in widget6Data" :key="idx">
      <Widget6 :item="item" />
    </BCol>
  </BRow>

  <BRow class="row-cols-xxl-6 row-cols-md-3 row-cols-2">
    <BCol v-for="(item, idx) in widget7Data" :key="idx">
      <Widget7 :item="item" />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import { BCard, BCardBody, BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import { widget1Data, widget4Data, widget5Data, widget6Data, widget7Data } from './components/data'

import ChatCard from './components/ChatCard.vue'
import CommentCard from './components/CommentCard.vue'
import FileManageCard from './components/FileManageCard.vue'
import ProfileCard from './components/ProfileCard.vue'
import SalesPerformanceOverview from './components/SalesPerformanceOverview.vue'
import TodaySchedule from './components/TodaySchedule.vue'
import TopCountries from './components/TopCountries.vue'
import TrafficSources from './components/TrafficSources.vue'
import Widget1 from './components/Widget1.vue'
import Widget3 from './components/Widget3.vue'
import Widget4 from './components/Widget4.vue'
import Widget5 from './components/Widget5.vue'
import Widget6 from './components/Widget6.vue'
import Widget7 from './components/Widget7.vue'
</script>
