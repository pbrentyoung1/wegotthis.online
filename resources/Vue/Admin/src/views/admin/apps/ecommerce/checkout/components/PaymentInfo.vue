<template>
  <h5 class="my-1.25 text-md">Payment Method</h5>
  <p class="text-default-400 mb-5">Select your preferred payment method to complete your purchase securely.</p>

  <div class="border-default-300 mb-5 rounded border p-5">
    <div class="grid grid-cols-3 items-center">
      <div class="col-span-2">
        <div class="flex gap-1.5">
          <input type="radio" id="BillingOptRadio2" name="billingOptions" class="form-radio rounded-full!" />
          <label class="form-check-label font-bold" for="BillingOptRadio2">Pay with Paypal</label>
        </div>
        <p class="text-default-400 ps-base pt-1.25">You will be redirected to PayPal website to complete your purchase securely.</p>
      </div>
      <div class="ms-auto mt-5">
        <img src="/images/cards/paypal.svg" height="32" alt="paypal-img" class="size-8" />
      </div>
    </div>
  </div>

  <div class="border-default-300 mb-5 rounded border p-5">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-base">
      <div class="md:col-span-2">
        <div class="flex gap-1.5">
          <input type="radio" id="BillingOptRadio1" name="billingOptions" class="form-radio rounded-full!" checked />
          <label class="form-check-label font-bold" for="BillingOptRadio1">Credit / Debit Card</label>
        </div>
        <p class="text-default-400 ps-base pt-1.25">Safe money transfer using your bank account. We support Mastercard, Visa, Discover and Stripe.</p>
      </div>

      <div class="flex md:col-span-1 md:ms-auto">
        <img src="/images/cards/mastercard.svg" class="size-8" alt="master-card-img" />
        <img src="/images/cards/discover-card.svg" class="size-8" alt="discover-card-img" />
        <img src="/images/cards/visa.svg" class="size-8" alt="visa-card-img" />
        <img src="/images/cards/stripe.svg" class="size-8" alt="stripe-card-img" />
      </div>
    </div>
    <div class="mt-5 grid grid-cols-1">
      <div class="col-span-1">
        <div class="rounded bg-warning/10 text-warning text-xs py-2.5 px-4 mb-4">
          Enjoy an extra
          <span class="font-bold">10% discount</span>
          when you pay with your
          <span class="font-bold">Credit Card</span>
          .
        </div>

        <div class="mb-5">
          <label for="card-number" class="form-label">Card Number</label>
          <MaskInput v-model="cardNumber" mask="####-####-####-####" type="text" id="card-number" class="form-input" placeholder="4242 4242 4242 4242" />
        </div>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-base">
      <div class="md:col-span-2">
        <label for="card-name-on" class="form-label">Name on card</label>
        <input type="text" id="card-name-on" class="form-input" placeholder="Master Dhanu" />
      </div>
      <div>
        <label for="card-expiry-date" class="form-label">Expiry date</label>
        <MaskInput v-model="date" mask="##/##" type="text" id="card-expiry-date" class="form-input" placeholder="MM/YY" />
      </div>
      <div>
        <label for="card-cvv" class="form-label">CVV code</label>
        <MaskInput v-model="cvv" mask="###" type="text" id="card-cvv" class="form-input" data-toggle="input-mask" data-mask-format="000" placeholder="012" />
      </div>
    </div>
  </div>

  <div class="border-default-300 mb-5 rounded border p-5">
    <div class="grid grid-cols-3">
      <div class="col-span-2">
        <div class="flex gap-2">
          <input type="radio" id="BillingOptRadio3" name="billingOptions" class="form-radio rounded-full!" />
          <label class="form-check-label font-bold" for="BillingOptRadio3">Pay with Payoneer</label>
        </div>
        <p class="text-default-400 ps-base pt-1.25">You will be redirected to Payoneer website to complete your purchase securely.</p>
      </div>
      <div class="ms-auto">
        <img src="/images/cards/payoneer.svg" class="size-8" alt="payoneer" />
      </div>
    </div>
  </div>

  <div class="border-default-300 mb-5 rounded border p-5">
    <div class="grid grid-cols-3">
      <div class="col-span-2">
        <div class="flex gap-2">
          <input type="radio" id="BillingOptRadio4" name="billingOptions" class="form-radio rounded-full!" />
          <label class="form-check-label font-bold" for="BillingOptRadio4">Cash on Delivery</label>
        </div>
        <p class="text-default-400 ps-base pt-1.25">Pay with cash when your order is delivered.</p>
      </div>
      <div class="ms-auto">
        <img src="/images/cards/cod.png" class="h-6" alt="COD-img" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { MaskInput } from 'vue-mask-next'
const cardNumber = ref('')
const date = ref('')
const cvv = ref('')
</script>

<style scoped></style>
