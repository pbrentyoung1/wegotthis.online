<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Order Summary</h4>
    </div>

    <div class="card-body">
      <ul class="list-unstyled mb-6.5">
        <li class="mb-2.5 flex justify-between">
          <span class="text-default-400">Subtotal (3 items):</span>
          <span>$2,427.00</span>
        </li>

        <li class="mb-2.5 flex justify-between">
          <span class="text-default-400">Saving:</span>
          <span class="text-danger">- $110.00</span>
        </li>

        <li class="mb-2.5 flex justify-between">
          <span class="text-default-400">Tax collected:</span>
          <span>$73.40</span>
        </li>

        <li class="border-default-300 mb-5 flex justify-between border-b pb-base">
          <span class="text-default-400">Shipping:</span>
          <span>Calculated at checkout</span>
        </li>

        <li class="mb-2.5 flex justify-between">
          <h6 class="text-default-400 text-xs uppercase">Estimated total:</h6>
          <h5 class="font-bold">$2,390.40</h5>
        </li>
      </ul>

      <RouterLink to="/apps/ecommerce/checkout" class="mb-5 btn btn-lg bg-danger text-base w-full text-white hover:bg-danger-hover">Proceed to Checkout</RouterLink>
      <p class="text-default-400 text-center">
        <RouterLink to="" class="text-primary font-semibold">Create an account</RouterLink>
        and get 239 bonuses
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
</script>
