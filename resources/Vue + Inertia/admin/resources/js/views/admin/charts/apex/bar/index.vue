<template>
  <PageBreadcrumb title="Bar Apexchart" subtitle="Charts" />
  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Basic Bar Charts</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getBasicBarChart" :series="getBasicBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Grouped Bar Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getGroupedBarChart" :series="getGroupedBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Stacked Bar Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getFullStackedBarChart" :series="getFullStackedBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">100% Stacked Bar Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getStackedBarChart" :series="getStackedBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Grouped Stacked Bars</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getGroupedStackedBarChart" :series="getGroupedStackedBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Bar with Negative Values</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getNegativeBarChart" :series="getNegativeBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Reversed Bar Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getReversedBarChart" :series="getReversedBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Bar with Image Fill</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getImageFillBarChart" :series="getImageFillBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Custom DataLabels Bar</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getCustomDataLabelsBarChart" :series="getCustomDataLabelsBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Patterned Bar Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getPatternedBarChart" :series="getPatternedBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Bar with Markers</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getMarkersBarChart" :series="getMarkersBarChart().series" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import ApexChart from '@/components/wrappers/ApexChart.vue'
import { getBasicBarChart, getCustomDataLabelsBarChart, getFullStackedBarChart, getGroupedBarChart, getGroupedStackedBarChart, getImageFillBarChart, getMarkersBarChart, getNegativeBarChart, getPatternedBarChart, getReversedBarChart, getStackedBarChart } from './data'
</script>
