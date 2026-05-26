<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Server-side</h4>
    </div>
    <div class="card-body">
      <form id="serverForm" class="grid grid-cols-1 md:grid-cols-12 gap-base" novalidate>
        <div class="md:col-span-4">
          <label for="firstName" class="form-label">First name</label>
          <div class="relative">
            <input type="text" id="firstName" value="Mark" required class="form-input border-success!" />
            <div class="pointer-events-none absolute inset-y-0 end-0 flex items-center pe-3">
              <Icon icon="check" class="text-success text-base"></Icon>
            </div>
          </div>
          <p class="text-success mt-1 text-2xs">Looks good!</p>
        </div>

        <div class="md:col-span-4">
          <label for="lastName" class="form-label">Last name</label>
          <div class="relative">
            <input type="text" id="lastName" value="Otto" required class="form-input border-success!" />
            <div class="pointer-events-none absolute inset-y-0 end-0 flex items-center pe-3">
              <Icon icon="check" class="text-success text-base"></Icon>
            </div>
          </div>
          <p class="text-success mt-1 text-2xs">Looks good!</p>
        </div>

        <div class="md:col-span-4">
          <label for="username" class="form-label">Username</label>
          <div class="relative flex rounded-md">
            <span class="border-default-300 bg-default-100 text-default-600 inline-flex items-center rounded-s-md border px-3 text-sm">&#64;</span>
            <input type="text" id="username" name="username" class="form-input border-danger! rounded-s-none!" placeholder="johndoe123" required />
            <div class="pointer-events-none absolute inset-y-0 end-0 flex items-center pe-3">
              <Icon icon="info" class="text-danger text-base"></Icon>
            </div>
          </div>
          <p class="text-danger mt-1 text-2xs">Please choose a username.</p>
        </div>

        <div class="md:col-span-6">
          <label for="city" class="form-label">City</label>
          <div class="relative">
            <input type="text" id="city" required placeholder="Enter city" class="form-input border-danger!" />
            <div class="pointer-events-none absolute inset-y-0 end-0 flex items-center pe-3">
              <Icon icon="info" class="text-danger text-base"></Icon>
            </div>
          </div>
          <p class="text-danger mt-1 text-2xs">Please provide a valid city.</p>
        </div>

        <div class="md:col-span-3">
          <label for="state" class="form-label">State</label>
          <div class="relative">
            <select id="state" required class="form-input border-danger!">
              <option value="">Choose...</option>
              <option>California</option>
              <option>Texas</option>
              <option>Florida</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 end-6 flex items-center pe-3">
              <Icon icon="info" class="text-danger text-base"></Icon>
            </div>
          </div>
          <p class="text-danger mt-1 text-2xs">Please select a valid state.</p>
        </div>

        <div class="md:col-span-3">
          <label for="zip" class="form-label">Zip</label>
          <div class="relative">
            <input type="text" id="zip" required placeholder="Zip code" class="form-input border-danger!" />
            <div class="pointer-events-none absolute inset-y-0 end-0 flex items-center pe-3">
              <Icon icon="info" class="text-danger text-base"></Icon>
            </div>
          </div>
          <p class="text-danger mt-1 text-2xs">Please provide a valid zip.</p>
        </div>

        <div class="md:col-span-12">
          <label class="flex items-center space-x-2">
            <input type="checkbox" id="terms" required class="form-checkbox checked:bg-danger!" />
            <span class="text-danger">Agree to terms and conditions</span>
          </label>
          <p class="text-danger mt-1 text-2xs">You must agree before submitting.</p>
        </div>

        <div class="md:col-span-12">
          <button type="submit" class="btn bg-primary hover:bg-primary-hover text-white">Submit form</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
</script>

<style></style>
