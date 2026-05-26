<template>
  <div>
    <h5 class="my-1 fs-md">Payment Method</h5>
    <p class="text-muted fs-sm mb-3">Select your preferred payment method to complete your purchase securely.</p>

    <div class="border p-3 mb-3 rounded">
      <BRow>
        <BCol sm="8">
          <div class="form-check">
            <input type="radio" id="BillingOptRadio2" name="billingOptions" class="form-check-input" />
            <label class="form-check-label font-16 fw-bold" for="BillingOptRadio2"> Pay with Paypal </label>
          </div>
          <p class="mb-0 ps-3 pt-1 text-muted">You will be redirected to PayPal website to complete your purchase securely.</p>
        </BCol>
        <BCol sm="4" class="text-sm-end mt-3 mt-sm-0">
          <img src="/images/cards/paypal.svg" height="32" alt="paypal-img" />
        </BCol>
      </BRow>
    </div>

    <div class="border p-3 mb-3 rounded">
      <BRow>
        <BCol sm="8">
          <div class="form-check">
            <input type="radio" id="BillingOptRadio1" name="billingOptions" class="form-check-input" checked />
            <label class="form-check-label font-16 fw-bold" for="BillingOptRadio1"> Credit / Debit Card </label>
          </div>
          <p class="mb-0 ps-3 pt-1 text-muted">Safe money transfer using your bank account. We support Mastercard, Visa, Discover and Stripe.</p>
        </BCol>
        <BCol sm="4" class="text-sm-end mt-3 mt-sm-0">
          <img src="/images/cards/mastercard.svg" height="32" alt="master-card-img" />
          <img src="/images/cards/discover-card.svg" height="32" alt="discover-card-img" />
          <img src="/images/cards/visa.svg" height="32" alt="visa-card-img" />
          <img src="/images/cards/stripe.svg" height="32" alt="stripe-card-img" />
        </BCol>
      </BRow>

      <BRow class="mt-4">
        <BCol md="12">
          <div class="alert alert-warning fs-xs py-2">Enjoy an extra <span class="fw-bold">10% discount</span> when you pay with your <span class="fw-bold">Credit Card</span>.</div>

          <div class="mb-3">
            <label for="card-number" class="form-label">Card Number</label>
            <MaskInput v-model="cardNumber" mask="####-####-####-####" class="form-control" placeholder="4242 4242 4242 4242" />
          </div>
        </BCol>
      </BRow>

      <BRow>
        <BCol md="6">
          <div class="mb-3 mb-md-0">
            <label for="card-name-on" class="form-label">Name on card</label>
            <input type="text" id="card-name-on" class="form-control" placeholder="Master Dhanu" />
          </div>
        </BCol>
        <BCol md="3">
          <div class="mb-3 mb-md-0">
            <label for="card-expiry-date" class="form-label">Expiry date</label>
            <MaskInput v-model="date" mask="##/##" class="form-control" placeholder="MM/YY" />
          </div>
        </BCol>
        <BCol md="3">
          <div class="mb-0">
            <label for="card-cvv" class="form-label">CVV code</label>
            <MaskInput v-model="cvv" mask="###" class="form-control" placeholder="012" />
          </div>
        </BCol>
      </BRow>
    </div>

    <div class="border p-3 mb-3 rounded">
      <BRow>
        <BCol sm="8">
          <div class="form-check">
            <input type="radio" id="BillingOptRadio3" name="billingOptions" class="form-check-input" />
            <label class="form-check-label font-16 fw-bold" for="BillingOptRadio3"> Pay with Payoneer </label>
          </div>
          <p class="mb-0 ps-3 pt-1 text-muted">You will be redirected to Payoneer website to complete your purchase securely.</p>
        </BCol>
        <BCol sm="4" class="text-sm-end mt-3 mt-sm-0">
          <img src="/images/cards/payoneer.svg" height="32" alt="payoneer" />
        </BCol>
      </BRow>
    </div>

    <div class="border p-3 mb-3 rounded">
      <BRow>
        <BCol sm="8">
          <div class="form-check">
            <input type="radio" id="BillingOptRadio4" name="billingOptions" class="form-check-input" />
            <label class="form-check-label font-16 fw-bold" for="BillingOptRadio4"> Cash on Delivery </label>
          </div>
          <p class="mb-0 ps-3 pt-1 text-muted">Pay with cash when your order is delivered.</p>
        </BCol>
        <BCol sm="4" class="text-sm-end mt-3 mt-sm-0">
          <img src="/images/cards/cod.png" height="24" alt="COD-img" />
        </BCol>
      </BRow>
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
