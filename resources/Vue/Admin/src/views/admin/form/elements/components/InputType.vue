<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Input Types</h4>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 gap-base lg:grid-cols-2">
        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-email" class="form-label mb-0! py-2">Email</label>
            </div>

            <div class="lg:col-span-2">
              <input type="email" id="example-email" placeholder="Email" class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="password" class="form-label mb-0! py-2">Show/Hide Password</label>
            </div>

            <div class="lg:col-span-2">
              <div class="relative flex items-center">
                <input id="password" type="password" class="form-input w-full" placeholder="Enter password" />
                <button type="button" data-hs-toggle-password='{"target":"#password"}' class="absolute inset-y-0 end-0 flex items-center rounded rounded-s-none! border border-default-300 bg-default-100 px-3 py-1.75">
                  <Icon icon="eye" class="block text-sm hs-password-active:hidden" />
                  <Icon icon="eye-off" class="hidden text-sm hs-password-active:block" />
                </button>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-time" class="form-label mb-0! py-2">Time</label>
            </div>

            <div class="lg:col-span-2">
              <input type="time" id="example-time" class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-number" class="form-label mb-0! py-2">Number</label>
            </div>

            <div class="lg:col-span-2">
              <input id="example-number" type="number" name="number" class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-range" class="form-label mb-0! py-2">Range</label>
            </div>

            <div class="lg:col-span-2">
              <input type="range" class="form-range" id="example-range" min="0" max="100" />
            </div>
          </div>
        </div>

        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-password" class="form-label mb-0! py-2">Password</label>
            </div>

            <div class="lg:col-span-2">
              <input type="password" id="example-password" value="password" class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-month" class="form-label mb-0! py-2">Month</label>
            </div>

            <div class="lg:col-span-2">
              <input type="month" id="example-month" class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-week" class="form-label mb-0! py-2">Week</label>
            </div>

            <div class="lg:col-span-2">
              <input id="example-week" type="week" name="week" class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-color" class="form-label mb-0! py-2">Color</label>
            </div>

            <div class="lg:col-span-2">
              <input type="color" id="example-color" value="#2563eb" class="form-input h-10 p-1!" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import Icon from '~/components/wrappers/Icon.vue'
</script>
