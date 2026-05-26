<template>
  <BCard no-body>
    <BCardHeader class="d-flex align-items-center">
      <BCardTitle class="mb-0">Order Summary</BCardTitle>
      <span class="badge badge-soft-success ms-auto">03 Items</span>
    </BCardHeader>
    <BCardBody>
      <div class="d-flex align-items-center gap-3 mb-3">
        <img src="/images/products/2.png" class="me-1 rounded" width="42" alt="MacBook Air" />
        <div>
          <p class="mb-1 fw-semibold">
            <Link href="/apps/ecommerce/product-details" class="link-reset"> Apple MacBook Air M3 13” </Link>
          </p>
          <p class="text-muted d-block mb-0">1 x $1,199</p>
        </div>
        <h5 class="mb-0 ms-auto">$1,199</h5>
      </div>

      <div class="d-flex align-items-center gap-3 mb-3">
        <img src="/images/products/5.png" class="me-1 rounded" width="42" alt="Sony Headphones" />
        <div>
          <p class="mb-1 fw-semibold">
            <Link href="/apps/ecommerce/product-details" class="link-reset"> Sony WH-1000XM5 Wireless Headphones </Link>
          </p>
          <p class="text-muted d-block mb-0">1 x $349</p>
        </div>
        <h5 class="mb-0 ms-auto">$349</h5>
      </div>

      <div class="d-flex align-items-center gap-3">
        <img src="/images/products/7.png" class="me-1 rounded" width="42" alt="Apple Watch" />
        <div>
          <p class="mb-1 fw-semibold">
            <Link href="/apps/ecommerce/product-details" class="link-reset"> Apple Watch Series 9 GPS </Link>
          </p>
          <p class="text-muted d-block mb-0">1 x $399</p>
        </div>
        <h5 class="mb-0 ms-auto">$399</h5>
      </div>

      <hr />

      <ul class="list-unstyled mb-0">
        <li class="d-flex justify-content-between mb-2">
          <span class="text-muted">Subtotal:</span>
          <span>$1,947.00</span>
        </li>
        <li class="d-flex justify-content-between mb-2">
          <span class="text-muted">Discount:</span>
          <span class="text-danger">- $120.00</span>
        </li>
        <li class="d-flex justify-content-between mb-2">
          <span class="text-muted">Tax collected:</span>
          <span>$65.85</span>
        </li>
        <li class="d-flex justify-content-between border-bottom pb-3 mb-3">
          <span class="text-muted">Shipping:</span>
          <span>Free</span>
        </li>
        <li class="d-flex justify-content-between align-items-center">
          <h6 class="text-uppercase text-muted mb-0">Estimated total:</h6>
          <h4 class="fw-bold mb-0">$1,892.85</h4>
        </li>
      </ul>
    </BCardBody>
  </BCard>
</template>
<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

</script>
