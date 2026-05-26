<template>
  <PageBreadcrumb title="Leaflet" subtitle="Maps" />
  <div class="grid xl:grid-cols-2 gap-base">
    <BasicMap />
    <ShapeMap />
    <DraggableMarker />
    <CustomIconsMap />
    <LayerControlMap />
    <ChoroplethMap />
    <UserLocation />
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import BasicMap from './components/BasicMap.vue'
import ChoroplethMap from './components/ChoroplethMap.vue'
import CustomIconsMap from './components/CustomIconsMap.vue'
import DraggableMarker from './components/DraggableMarker.vue'
import LayerControlMap from './components/LayerControlMap.vue'
import ShapeMap from './components/ShapeMap.vue'
import UserLocation from './components/UserLocation.vue'
</script>
