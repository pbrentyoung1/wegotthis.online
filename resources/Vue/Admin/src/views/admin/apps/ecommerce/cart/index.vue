<template>
  <PageBreadcrumb title="Cart" subtitle="Ecommerce" />

  <div class="container">
    <div class="bg-info/10 border border-info/25 text-info mb-4 rounded px-4 py-3">
      <h6 class="text-xs mb-2.5">Buy <span class="text-warning font-bold">$250</span> more to get <span class="font-semibold">Free Shipping</span></h6>

      <div class="bg-default-100 h-1 w-full overflow-hidden rounded-full">
        <div class="bg-warning h-1 w-[70%] transition-all"></div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-base">
      <div class="lg:col-span-2">
        <ShoppingCart />
      </div>

      <div>
        <div class="flex gap-base flex-col">
          <OrderSummary />

          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Apply Coupon Code</h4>
            </div>

            <div class="card-body">
              <div class="rounded bg-warning/15 text-warning mb-4 px-4 py-2.5 text-xs">
                Use
                <span class="font-bold">ADMINPRO</span>
                to get 10% off.
              </div>

              <div class="input-group relative">
                <input type="text" class="form-input" placeholder="Enter code" />
                <button class="btn bg-primary absolute inset-y-0 end-0 rounded-s-none text-white hover:bg-primary-hover" type="button">Apply</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import OrderSummary from './components/OrderSummary.vue'
import ShoppingCart from './components/ShoppingCart.vue'
</script>
