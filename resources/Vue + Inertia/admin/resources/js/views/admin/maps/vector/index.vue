<template>
  <PageBreadcrumb title="Vector Maps" subtitle="Maps" />
  <BContainer>
    <BRow>
      <BCol lg="12">
        <BCard no-body>
          <BCardHeader class="border-0 border-bottom border-dashed">
            <BCardTitle> Examples</BCardTitle>
          </BCardHeader>
          <BCardBody>
            <BRow class="g-3">
              <BCol lg="4">
                <BCardTitle class="mb-1">World Vector Map</BCardTitle>
                <p class="text-muted mb-0">A global map showing countries with interactive markers.</p>
              </BCol>
              <BCol lg="8">
                <JsVectorMap id="global-map" :options="getWorldMapOptions()" style="height: 360px" />
              </BCol>
            </BRow>
            <div class="my-4 border-top border-dashed"></div>
            <BRow class="g-3">
              <BCol lg="4">
                <BCardTitle class="mb-1">World Vector Live Map</BCardTitle>
                <p class="text-muted mb-0">Live dynamic vector representation of the world with real-time features.</p>
              </BCol>
              <BCol lg="8">
                <JsVectorMap id="world-map-marker-line" :options="getWorldMarkerLineOptions()" style="height: 360px" />
              </BCol>
            </BRow>
            <div class="my-4 border-top border-dashed"></div>
            <BRow class="g-3">
              <BCol lg="4">
                <BCardTitle class="mb-1">US Vector Map</BCardTitle>
                <p class="text-muted mb-0">Interactive vector map of the United States with state-level details.</p>
              </BCol>
              <BCol lg="8">
                <JsVectorMap id="usa-vector-map" :options="getUSAMapOptions()" style="height: 360px" />
              </BCol>
            </BRow>
            <div class="my-4 border-top border-dashed"></div>
            <BRow class="g-3">
              <BCol lg="4">
                <BCardTitle class="mb-1">Canada Vector Map</BCardTitle>
                <p class="text-muted mb-0">Displays Canadian provinces and territories with interactive regions.</p>
              </BCol>
              <BCol lg="8">
                <JsVectorMap id="canada-map" :options="getCanadaMapOptions()" style="height: 360px" />
              </BCol>
            </BRow>
            <div class="my-4 border-top border-dashed"></div>
            <BRow class="g-3">
              <BCol lg="4">
                <BCardTitle class="mb-1">Russia Vector Map</BCardTitle>
                <p class="text-muted mb-0">DInteractive map highlighting major regions across Russia..</p>
              </BCol>
              <BCol lg="8">
                <JsVectorMap id="russia-map" :options="getRussiaMapOptions()" style="height: 360px" />
              </BCol>
            </BRow>
            <div class="my-4 border-top border-dashed"></div>
            <BRow class="g-3">
              <BCol lg="4">
                <BCardTitle class="mb-1">Iraq Vector Map</BCardTitle>
                <p class="text-muted mb-0">Vector visualization of Iraq highlighting provinces and regions.</p>
              </BCol>
              <BCol lg="8">
                <JsVectorMap id="iraq-map" :options="getIraqMapOptions()" style="height: 360px" />
              </BCol>
            </BRow>
            <div class="my-4 border-top border-dashed"></div>
            <BRow class="g-3">
              <BCol lg="4">
                <BCardTitle class="mb-1">Spain Vector Map</BCardTitle>
                <p class="text-muted mb-0">Geographical map of Spain with region-based interaction.</p>
              </BCol>
              <BCol lg="8">
                <JsVectorMap id="spain-map" :options="getSpainMapOptions()" style="height: 360px" />
              </BCol>
            </BRow>
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { BCardHeader, BCardTitle, BCol, BRow } from 'bootstrap-vue-next'
import JsVectorMap from '@/components/JsVectorMap.vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import { getCanadaMapOptions, getIraqMapOptions, getRussiaMapOptions, getSpainMapOptions, getUSAMapOptions, getWorldMapOptions, getWorldMarkerLineOptions } from './components/data'
</script>
