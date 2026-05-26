<template>
  <PageBreadcrumb title="Checkout" subtitle="Ecommerce" />
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-base">
      <div class="lg:col-span-2">
        <div class="card">
          <div class="card-body">
            <div data-hs-stepper>
              <ul class="relative grid grid-cols-1 gap-1.5 md:grid-cols-4">
                <li :data-hs-stepper-nav-item="`{&quot;index&quot;:${idx + 1}}`" v-for="(step, idx) in checkoutStepData" :key="idx">
                  <a href="#" :class="['hs-stepper-active:bg-light/50 hs-stepper-success:bg-success/10 hs-stepper-success:border-success hs-stepper-success:text-success px-4 py-2.5 flex items-center justify-center gap-2.5 rounded border border-dashed border-default-300']">
                    <Icon :icon="step.icon" class="text-2xl" />
                    <span class="text-md block font-semibold">{{ step.title }}</span>
                  </a>
                </li>
              </ul>

              <div class="pt-base">
                <div data-hs-stepper-content-item='{"index": 1}' style="display: none">
                  <BillingInfo />
                </div>

                <div data-hs-stepper-content-item='{"index": 2}' style="display: none">
                  <AddressInfo />
                </div>

                <div data-hs-stepper-content-item='{"index": 3}' style="display: none">
                  <PaymentInfo />
                </div>

                <div data-hs-stepper-content-item='{"index": 4}' style="display: none">
                  <div class="md:p-7.5">
                    <InvoiceInfo />
                  </div>
                </div>

                <div class="mt-5 flex flex-wrap items-center justify-between">
                  <button type="button" class="btn bg-secondary text-white hover:bg-secondary-hover" data-hs-stepper-back-btn>
                    <Icon icon="arrow-left" />
                    Back
                  </button>

                  <button type="button" class="btn bg-primary text-white hover:bg-primary-hover" data-hs-stepper-next-btn>
                    Next
                    <Icon icon="arrow-right" />
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col gap-base">
        <OrderSummary />

        <div class="card">
          <div class="card-body">
            <p class="text-default-400">
              🎉 Congratulations! You’ve earned
              <span class="text-success font-bold">239 bonus points</span>
              !
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import AddressInfo from './components/AddressInfo.vue'
import BillingInfo from './components/BillingInfo.vue'
import InvoiceInfo from './components/InvoiceInfo.vue'
import OrderSummary from './components/OrderSummary.vue'
import PaymentInfo from './components/PaymentInfo.vue'
import { checkoutStepData } from './components/data'
</script>
<style scoped></style>
