<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Floating Labels</h4>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 gap-base lg:grid-cols-2">
        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Email address</label>
            </div>

            <div class="lg:col-span-2">
              <div class="relative">
                <input
                  type="email"
                  id="hs-floating-input-email"
                  class="peer block w-full rounded border-default-300 bg-transparent p-4 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 placeholder:text-transparent autofill:pt-6 autofill:pb-2 focus:border-default-500 focus:pt-6 focus:pb-2 focus:ring-0 sm:text-sm"
                  placeholder="you&#64;email.com"
                />
                <label
                  for="hs-floating-input-email"
                  class="pointer-events-none absolute start-0 top-0 h-full origin-top-left truncate border border-transparent p-4 transition duration-100 ease-in-out peer-not-placeholder-shown:translate-x-0.5 peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:scale-90 peer-not-placeholder-shown:text-default-500 peer-focus:translate-x-0.5 peer-focus:-translate-y-1.5 peer-focus:scale-90 peer-focus:text-default-500 sm:text-sm"
                  >Email</label
                >
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Comments</label>
            </div>

            <div class="lg:col-span-2">
              <div class="relative">
                <textarea
                  id="floatingTextarea"
                  rows="4"
                  placeholder=""
                  class="peer block w-full rounded border-default-300 bg-transparent p-4 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 placeholder:text-transparent autofill:pt-6 autofill:pb-2 focus:border-default-500 focus:pt-6 focus:pb-2 focus:ring-0 sm:text-sm"
                ></textarea>
                <label
                  for="floatingTextarea"
                  class="pointer-events-none absolute start-0 top-0 h-full origin-top-left truncate border border-transparent p-4 transition duration-100 ease-in-out peer-not-placeholder-shown:translate-x-0.5 peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:scale-90 peer-not-placeholder-shown:text-default-500 peer-focus:translate-x-0.5 peer-focus:-translate-y-1.5 peer-focus:scale-90 peer-focus:text-default-500 sm:text-sm"
                  >Comments</label
                >
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Password</label>
            </div>

            <div class="lg:col-span-2">
              <div class="relative">
                <input
                  type="password"
                  id="floatingPassword"
                  placeholder=""
                  class="peer block w-full rounded border-default-300 bg-transparent p-4 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 placeholder:text-transparent autofill:pt-6 autofill:pb-2 focus:border-default-500 focus:pt-6 focus:pb-2 focus:ring-0 sm:text-sm"
                />
                <label
                  for="floatingPassword"
                  class="pointer-events-none absolute start-0 top-0 h-full origin-top-left truncate border border-transparent p-4 transition duration-100 ease-in-out peer-not-placeholder-shown:translate-x-0.5 peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:scale-90 peer-not-placeholder-shown:text-default-500 peer-focus:translate-x-0.5 peer-focus:-translate-y-1.5 peer-focus:scale-90 peer-focus:text-default-500 sm:text-sm"
                  >Password</label
                >
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Select Menu</label>
            </div>

            <div class="lg:col-span-2">
              <div class="relative">
                <select
                  id="floatingSelect"
                  placeholder=""
                  class="peer block w-full rounded border-default-300 bg-transparent p-4 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 placeholder:text-transparent autofill:pt-6 autofill:pb-2 focus:border-default-500 focus:pt-6 focus:pb-2 focus:ring-0 sm:text-sm"
                >
                  <option value="" selected disabled>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <label
                  for="floatingSelect"
                  class="pointer-events-none absolute start-0 top-0 h-full origin-top-left truncate border border-transparent p-4 transition duration-100 ease-in-out peer-not-placeholder-shown:translate-x-0.5 peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:scale-90 peer-not-placeholder-shown:text-default-500 peer-focus:translate-x-0.5 peer-focus:-translate-y-1.5 peer-focus:scale-90 peer-focus:text-default-500 sm:text-sm"
                  >Works with selects</label
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup></script>
