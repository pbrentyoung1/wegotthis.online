<template>
  <PageBreadcrumb title="Google" subtitle="Maps" />
  <div class="container-fluid">
    <div class="grid grid-cols-1 gap-base">
      <div class="grid xl:grid-cols-2 gap-base">
        <div class="card">
          <div class="card-header block">
            <h5 class="card-title mb-1.25">Basic Google Map</h5>
            <p class="text-default-400">Displays a basic embedded Google Map.</p>
          </div>
          <div class="card-body">
            <GoogleMap :api-key="apiKey" style="width: 100%; height: 360px" :center="eiffelTower" :zoom="15">
              <Marker :options="{ position: eiffelTower, title: 'Eiffel Tower' }" />
            </GoogleMap>
          </div>
        </div>

        <div class="card">
          <div class="card-header block">
            <h5 class="card-title mb-1.25">Street View Google Map</h5>
            <p class="text-default-400">Displays a satellite-styled view of the map.</p>
          </div>
          <div class="card-body">
            <GoogleMap :api-key="apiKey" style="width: 100%; height: 360px" :center="statueOfLiberty" :zoom="17" map-type-id="satellite">
              <Marker :options="{ position: statueOfLiberty, title: 'Statue of Liberty' }" />
            </GoogleMap>
          </div>
        </div>

        <div class="card">
          <div class="card-header block">
            <h5 class="card-title mb-1.25">Dark Google Map</h5>
            <p class="text-default-400">A dark-mode styled map using CSS filters.</p>
          </div>
          <div class="card-body">
            <GoogleMap :api-key="apiKey" style="width: 100%; height: 360px" :center="colosseum" :zoom="15" gestureHandling="greedy" map-Type-Id="hybrid" map-id="49ae42fed52588c3">
              <Marker :options="{ position: colosseum, title: 'Colosseum' }" />
            </GoogleMap>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { GoogleMap, Marker } from 'vue3-google-map'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
const apiKey = ref('AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4')

const eiffelTower = { lat: 48.8584, lng: 2.2945 }
const statueOfLiberty = { lat: 40.689247, lng: -74.044502 }
const colosseum = { lat: 41.8902, lng: 12.4922 }
</script>
