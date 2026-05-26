<template>
  <PageBreadcrumb title="Leaflet Maps" subtitle="Map" />
  <BContainer>
    <BRow>
      <BCol lg="12">
        <BCard no-body>
          <BCardHeader class="border-0 border-bottom border-dashed">
            <BCardTitle> Examples</BCardTitle>
          </BCardHeader>
          <BCardBody>
            <BasicMap />
            <div class="my-4 border-top border-dashed"></div>
            <ShapeMap />
            <div class="my-4 border-top border-dashed"></div>
            <DraggableMarker />
            <div class="my-4 border-top border-dashed"></div>
            <CustomIconsMap />
            <div class="my-4 border-top border-dashed"></div>
            <LayerControlMap />
            <div class="my-4 border-top border-dashed"></div>
            <ChoroplethMap />
            <div class="my-4 border-top border-dashed"></div>
            <UserLocation />
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { BContainer } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import BasicMap from './components/BasicMap.vue'
import ChoroplethMap from './components/ChoroplethMap.vue'
import CustomIconsMap from './components/CustomIconsMap.vue'
import DraggableMarker from './components/DraggableMarker.vue'
import LayerControlMap from './components/LayerControlMap.vue'
import ShapeMap from './components/ShapeMap.vue'
import UserLocation from './components/UserLocation.vue'
</script>
