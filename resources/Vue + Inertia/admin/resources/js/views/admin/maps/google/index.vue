<template>
  <PageBreadcrumb title="Google" subtitle="Maps" />

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
                <BCardTitle class="mb-1">Basic Google Map</BCardTitle>
                <p class="text-muted mb-0">Displays a basic embedded Google Map.</p>
              </BCol>
              <BCol lg="8">
                <GoogleMap :api-key="apiKey" style="width: 100%; height: 360px" :center="eiffelTower" :zoom="15" map-id="49ae42fed52588c3">
                  <AdvancedMarker :options="{ position: eiffelTower, title: 'Eiffel Tower' }" />
                </GoogleMap>
              </BCol>
            </BRow>
            <div class="my-4 border-top border-dashed"></div>
            <BRow class="g-3">
              <BCol lg="4">
                <BCardTitle class="mb-1">Street View Google Map</BCardTitle>
                <p class="text-muted mb-0">Displays a satellite-styled view of the map.</p>
              </BCol>
              <BCol lg="8">
                <GoogleMap :api-key="apiKey" style="width: 100%; height: 360px" :center="statueOfLiberty" :zoom="17" map-type-id="satellite" map-id="49ae42fed52588c3">
                  <AdvancedMarker :options="{ position: statueOfLiberty, title: 'Statue of Liberty' }" />
                </GoogleMap>
              </BCol>
            </BRow>
            <div class="my-4 border-top border-dashed"></div>
            <BRow class="g-3">
              <BCol lg="4">
                <BCardTitle class="mb-1">Dark Google Map</BCardTitle>
                <p class="text-muted mb-0">A dark-mode styled map using CSS filters.</p>
              </BCol>
              <BCol lg="8">
                <GoogleMap :api-key="apiKey" style="width: 100%; height: 360px" :center="colosseum" :zoom="15" gestureHandling="greedy" map-Type-Id="hybrid" map-id="49ae42fed52588c3">
                  <AdvancedMarker :options="{ position: colosseum, title: 'Colosseum' }" />
                </GoogleMap>
              </BCol>
            </BRow>
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCol, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import { AdvancedMarker, GoogleMap } from 'vue3-google-map'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
const apiKey = ref('AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4')

const eiffelTower = { lat: 48.8584, lng: 2.2945 }
const statueOfLiberty = { lat: 40.689247, lng: -74.044502 }
const colosseum = { lat: 41.8902, lng: 12.4922 }
</script>

<style scoped></style>
