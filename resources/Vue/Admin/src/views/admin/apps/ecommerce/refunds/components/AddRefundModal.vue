<template>
  <div id="createRefundModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="createRefundModalLabel">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-lg lg:max-w-lg">
      <div class="card pointer-events-auto flex w-full flex-col">
        <div class="card-header p-5">
          <h3 id="createRefundModalLabel" class="flex items-center font-semibold">
            <Icon icon="credit-card" class="text-primary me-2.5" />
            Create Refund
          </h3>
          <button type="button" aria-label="Close" data-hs-overlay="#createRefundModal">
            <Icon icon="x" class="text-2xl align-middle text-default-600" />
          </button>
        </div>

        <div class="card-body">
          <div>
            <div class="mb-5">
              <label for="refundOrderId" class="form-label">Order ID</label>
              <select id="refundOrderId" class="form-select">
                <option selected disabled>Select Order</option>
                <option>#INV-10423</option>
                <option>#INV-10424</option>
                <option>#INV-10425</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="refundCustomer" class="form-label">Customer</label>
              <input id="refundCustomer" type="text" class="form-input" value="Mason Carter" readonly />
            </div>

            <div class="mb-5">
              <label for="refundReason" class="form-label">Reason</label>
              <textarea id="refundReason" class="form-textarea" rows="2" placeholder="Enter refund reason (e.g., damaged item, wrong product, etc.)"></textarea>
            </div>

            <div class="mb-5">
              <label for="refundMethod" class="form-label">Refund Method</label>
              <select id="refundMethod" class="form-select">
                <option selected>Original Payment Method (Visa ****7832)</option>
                <option>Store Credit</option>
                <option>Bank Transfer</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="refundAmount" class="form-label">Refund Amount</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input id="refundAmount" type="number" class="form-input" placeholder="129.45" value="129.45" />
              </div>
            </div>

            <div>
              <label for="refundDate" class="form-label">Refund Date</label>
              <FlatPickr v-model="refundDate" :config="{ defaultDate: '2025-10-08', dateFormat: 'd M, Y' }" id="refundDate" class="form-input" />
            </div>
          </div>
        </div>
        <div class="border-default-300 flex items-center justify-end gap-2 border-t p-5">
          <button type="button" class="btn bg-default-200" data-hs-overlay="#createRefundModal">Close</button>

          <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">
            <Icon icon="check" />
            Confirm Refund
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue'
import FlatPickr from 'vue-flatpickr-component'
import Icon from '~/components/wrappers/Icon.vue'

const refundDate = ref('')
</script>
