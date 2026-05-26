<template>
  <PageBreadcrumb title="Vector" subtitle="Maps" />

  <div class="container-fluid">
    <div class="grid xl:grid-cols-2 gap-base">
      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.75">World Vector Map</h4>
          <p class="text-default-400">A global map showing countries with interactive markers.</p>
        </div>
        <div class="card-body">
          <JsVectorMap id="global-map" :options="getWorldMapOptions()" style="height: 360px" />
        </div>
      </div>

      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.75">World Vector Map</h4>
          <p class="text-default-400">Live dynamic vector representation of the world with real-time features.</p>
        </div>
        <div class="card-body">
          <JsVectorMap id="world-map-marker-line" :options="getWorldMarkerLineOptions()" style="height: 360px" />
        </div>
      </div>

      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.75">US Vector Map</h4>
          <p class="text-default-400">Geographical map of Spain with region-based interaction.</p>
        </div>
        <div class="card-body">
          <JsVectorMap id="usa-vector-map" :options="getUSAMapOptions()" style="height: 360px" />
        </div>
      </div>

      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.75">Canada Vector Map</h4>
          <p class="text-default-400">Detailed vector map of India with region highlights.</p>
        </div>
        <div class="card-body">
          <JsVectorMap id="canada-map" :options="getCanadaMapOptions()" style="height: 360px" />
        </div>
      </div>

      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.75">Russia Vector Map</h4>
          <p class="text-default-400">Vector visualization of Iraq highlighting provinces and regions.</p>
        </div>
        <div class="card-body">
          <JsVectorMap id="russia-map" :options="getRussiaMapOptions()" style="height: 360px" />
        </div>
      </div>

      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.75">Iraq Vector Map</h4>
        </div>
        <div class="card-body">
          <JsVectorMap id="iraq-map" :options="getIraqMapOptions()" style="height: 360px" />
        </div>
      </div>

      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.75">Spain Vector Map</h4>
        </div>
        <div class="card-body">
          <JsVectorMap id="spain-map" :options="getSpainMapOptions()" style="height: 360px" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import JsVectorMap from '~/components/JsVectorMap.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import { getCanadaMapOptions, getIraqMapOptions, getRussiaMapOptions, getSpainMapOptions, getUSAMapOptions, getWorldMapOptions, getWorldMarkerLineOptions } from './components/data'
</script>
