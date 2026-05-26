<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Order Summary</h4>
      <span class="badge bg-success/15 text-success font-semibold ms-auto">03 Items</span>
    </div>

    <div class="card-body">
      <div class="mb-5 flex items-center gap-base">
        <img src="/images/products/2.png" class="me-1.25 rounded" width="42" alt="MacBook Air" />
        <div>
          <p class="mb-1.25 font-semibold">
            <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary">Apple MacBook Air M3 13”</RouterLink>
          </p>
          <p class="text-default-400 block">1 x $1,199</p>
        </div>
        <h5 class="ms-auto">$1,199</h5>
      </div>

      <div class="mb-5 flex items-center gap-base">
        <img src="/images/products/5.png" class="me-1.25 rounded" width="42" alt="" />
        <div>
          <p class="mb-1.25 font-semibold">
            <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary">Sony WH-1000XM5 Wireless Headphones</RouterLink>
          </p>
          <p class="text-default-400 block">1 x $349</p>
        </div>
        <h5 class="ms-auto">$349</h5>
      </div>

      <div class="flex items-center gap-base">
        <img src="/images/products/7.png" class="me-1.25 rounded" width="42" alt="" />
        <div>
          <p class="mb-1.25 font-semibold">
            <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary">Apple Watch Series 9 GPS</RouterLink>
          </p>
          <p class="text-default-400 block">1 x $399</p>
        </div>
        <h5 class="ms-auto">$399</h5>
      </div>

      <hr class="border-default-300 my-3.25" />

      <ul class="list-unstyled">
        <li class="mb-2.5 flex justify-between">
          <span class="text-default-400">Subtotal:</span>
          <span>$1,947.00</span>
        </li>

        <li class="mb-2.5 flex justify-between">
          <span class="text-default-400">Discount:</span>
          <span class="text-danger">- $120.00</span>
        </li>

        <li class="mb-2.5 flex justify-between">
          <span class="text-default-400">Tax collected:</span>
          <span>$65.85</span>
        </li>

        <li class="border-default-300 mb-5 flex justify-between border-b pb-5">
          <span class="text-default-400">Shipping:</span>
          <span>Free</span>
        </li>

        <li class="flex items-center justify-between">
          <h6 class="text-default-400 text-xs uppercase">Estimated total:</h6>
          <h5 class="text-lg font-bold">$1,892.85</h5>
        </li>
      </ul>
    </div>
  </div>
</template>
<script setup lang="ts">
import { RouterLink } from "vue-router"
</script>
