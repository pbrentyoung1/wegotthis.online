<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Input Sizes</h4>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 gap-base lg:grid-cols-2">
        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="input-small" class="form-label mb-0! py-2">Small</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="input-small" placeholder=".input-sm" class="form-input-sm form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="input-large" class="form-label mb-0! py-2">Large</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="input-large" placeholder=".input-lg" class="form-input-lg form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Large Select</label>
            </div>

            <div class="lg:col-span-2">
              <select class="form-input-lg form-input">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
        </div>

        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="input-normal" class="form-label mb-0! py-2">Normal</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="input-normal" placeholder="Normal" class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="input-gridsize" class="form-label mb-0! py-2">Grid Sizes</label>
            </div>

            <div class="lg:col-span-2">
              <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
                <div>
                  <input type="text" id="input-gridsize" placeholder="col-span-4" class="form-input" />
                </div>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Small Select</label>
            </div>

            <div class="lg:col-span-2">
              <select class="form-input-sm form-input">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts"></script>
