<template>
  <PageBreadcrumb title="Timeline Apexchart" subtitle="Charts" />

  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Basic Timeline</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getTimelineChart" type="rangeBar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Distributed Timeline</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getDistributedTimelineChart" type="rangeBar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>

  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Multi Series Timeline</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getMultiSeriesTimelineChart" type="rangeBar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Advanced Timeline</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getAdvanceTimelineChart" type="rangeBar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>

  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Multiple Series - Group Rows</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getGroupRowTimelineChart" type="rangeBar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCardTitle, BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import ApexChart from '@/components/wrappers/ApexChart.vue'
import { getAdvanceTimelineChart, getDistributedTimelineChart, getGroupRowTimelineChart, getMultiSeriesTimelineChart, getTimelineChart } from './data'
</script>
