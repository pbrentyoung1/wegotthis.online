<template>
  <div class="mb-5 flex flex-wrap items-center gap-base">
    <div>
      <div class="bg-success flex size-9 items-center justify-center rounded-full text-white">
        <Icon icon="check" class="size-5.5" />
      </div>
    </div>

    <div>
      <p class="text-default-400">Order #234000</p>
      <h4 class="text-lg">Thank you for your order!</h4>
    </div>
    <a href="#" class="hover:text-primary link-offset-2 ms-auto font-semibold underline">Track Order</a>
  </div>

  <hr class="border-default-300 my-4 border-t border-dashed" />
  <div class="mt-9">
    <h6 class="text-default-400 text-xs mb-2 font-bold uppercase">Delivery Address</h6>
    <span class="mb-1.25 block font-semibold">Marcus Reynolds</span>
    500 Howard Street, Floor 8
    <br />
    San Francisco, CA 94105
    <br />
    <abbr title="Phone">P:</abbr>
    (415) 392-6400
    <br />
  </div>

  <div class="mt-9">
    <h6 class="text-default-400 text-xs mb-2 font-bold uppercase">Payment Info</h6>
    <p>Credit card: xxxx xxxx xxxx 8521</p>
  </div>

  <div class="mt-9">
    <RouterLink to="" class="btn bg-success text-white hover:bg-success-hover">
      <Icon icon="download" class="me-1" />
      Download Invoice
    </RouterLink>
    <RouterLink to="/apps/ecommerce/products-grid" class="btn text-default-400 font-semibold">
      <Icon icon="arrow-left" class="me-1" />
      Continue Shopping
    </RouterLink>
  </div>

  <div class="rounded bg-info/15 text-info mt-9 p-7.5">
    <h4 class="text-dark mb-1.25 pb-3 text-center text-lg">🎁 Great News! You’ve unlocked 25% off your next order!</h4>
    <p class="mb-7.5 text-center italic">Apply the code below at checkout or find it anytime in your account.</p>
    <div class="mx-auto flex gap-3">
      <input type="text" class="form-input" value="SAVE25NOW" readonly />
      <button type="button" class="btn text-nowrap bg-dark text-white hover:bg-dark-hover">Copy Code</button>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
</script>

<style scoped></style>
