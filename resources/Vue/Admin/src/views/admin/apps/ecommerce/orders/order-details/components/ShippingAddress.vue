<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Shipping Address</h4>
      <RouterLink to="" class="btn btn-icon border-default-300 size-8! rounded-full border">
        <Icon icon="pencil" class="text-lg" />
      </RouterLink>
    </div>
    <div class="card-body">
      <iframe src="https://www.google.com/maps/embed/v1/place?q=New+York+University&key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4" style="width: 100%; height: 180px; margin-bottom: 1.5rem; overflow: hidden; border: 0"></iframe>
      <div class="my-5">
        <div class="flex items-center justify-between">
          <div class="mb-2.5">
            <h5 class="text-default-800">John Doe</h5>
          </div>
          <div>
            <span class="badge bg-success/15 font-semibold text-success">Primary Address</span>
          </div>
        </div>
        <p class="text-default-400 mb-1.25">
          1234 Elm Street,
          <br />
          Apt 567,
          <br />
          Springfield, IL 62704,
          <br />
          United States
        </p>
        <p class="text-default-400 mb-5">
          <strong>Phone:</strong>
          (123) 456-7890
          <br />
          <strong>Email:</strong>
          john.doe&#64;example.com
        </p>
      </div>
      <div class="bg-warning/15 rounded px-4 py-3 text-warning">
        <h6 class="mb-2.5 text-xs">Delivery Instructions:</h6>
        <p class="italic">Please leave the package at the front door if no one is home. Call upon arrival.</p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
</script>

<style scoped></style>
