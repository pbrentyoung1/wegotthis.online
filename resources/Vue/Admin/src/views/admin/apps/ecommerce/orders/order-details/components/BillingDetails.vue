<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Billing Details</h4>
      <RouterLink to="" class="btn btn-icon border-default-300 size-8! rounded-full border">
        <Icon icon="pencil" class="text-lg" />
      </RouterLink>
    </div>
    <div class="card-body">
      <div class="mb-2.5 flex items-center justify-between">
        <div>
          <h5 class="text-default-800">John Doe</h5>
        </div>
        <div>
          <span class="badge bg-primary/15 font-semibold text-primary">Billing Details</span>
        </div>
      </div>
      <p class="text-default-400 border-default-300 border-b pb-4">
        5678 Oak Avenue,
        <br />
        Suite 101,
        <br />
        Chicago, IL 60611,
        <br />
        United States
      </p>
      <div class="flex items-center justify-between pt-4">
        <div class="flex items-center gap-2.5">
          <img :src="mastercard" alt="Mastercard" class="size-8 rounded" />
          <div>
            <h5 class="mb-1.25 text-xs">Mastercard Ending in 4242</h5>
            <p class="text-default-400 text-xs">Expiry: 08/26</p>
          </div>
        </div>
        <div>
          <span class="badge bg-success/15 text-success">Paid</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import mastercard from '/images/cards/mastercard.svg'
</script>

<style scoped></style>
