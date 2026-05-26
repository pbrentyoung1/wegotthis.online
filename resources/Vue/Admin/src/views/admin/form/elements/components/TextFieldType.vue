<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Input Textfield Type</h4>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 gap-base lg:grid-cols-2">
        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="simpleinput" class="form-label mb-0! py-2">Simple Input</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="simpleinput" class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Floating Input</label>
            </div>

            <div class="lg:col-span-2">
              <div class="relative">
                <input
                  type="text"
                  id="floatingInput"
                  placeholder=""
                  class="peer block w-full rounded border-default-300 bg-transparent p-4 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 placeholder:text-transparent autofill:pt-6 autofill:pb-2 focus:border-default-500 focus:pt-6 focus:pb-2 focus:ring-0 sm:text-sm"
                />
                <label for="floatingInput" class="peer-placeholder-shown: absolute start-3 top-2 text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                  >Name</label
                >
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="validInput" class="form-label mb-0! py-2">Valid Input</label>
            </div>

            <div class="lg:col-span-2">
              <div class="relative">
                <input type="text" id="validInput" name="hs-validation-name-success" class="form-input border-success!" required aria-describedby="hs-validation-name-success-helper" />
                <div class="pointer-events-none absolute inset-y-0 end-0 flex items-center pe-3">
                  <Icon icon="check" class="text-base text-success" />
                </div>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-rounded" class="form-label mb-0! py-2">Rounded Input</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="example-rounded" class="form-input rounded-full!" placeholder="Rounded Input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-textarea" class="form-label mb-0! py-2">Text area</label>
            </div>

            <div class="lg:col-span-2">
              <textarea id="example-textarea" rows="5" class="form-textarea"></textarea>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-disable" class="form-label mb-0! py-2">Disabled</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="example-disable" value="Disabled value" disabled class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-helping" class="form-label mb-0! py-2">Helping text</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="example-helping" placeholder="Helping text" class="form-input" />
              <small class="mt-1 block text-xs text-default-400">A block of help text that breaks onto a new line and may extend beyond one line.</small>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="discount" class="form-label mb-0! py-2">Select with Icon</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-icon-group">
                <Icon icon="discount" class="input-icon" />
                <select id="discount" class="form-input">
                  <option selected>Choose Discount</option>
                  <option>No Discount</option>
                  <option>Flat Discount</option>
                  <option>Percentage Discount</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Label Input</label>
            </div>

            <div class="lg:col-span-2">
              <div>
                <label for="labelInputInput1" class="form-label">Label Input</label>
                <input type="email" class="form-input" id="labelInputInput1" placeholder="name&#64;example.com" />
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="SearchInput" class="form-label mb-0! py-2">Search Style</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-icon-group">
                <Icon icon="search" class="input-icon" />
                <input type="search" id="SearchInput" placeholder="Search for something..." class="form-input" />
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="inValidationInput" class="form-label mb-0! py-2">Invalid Input</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-icon-group">
                <input type="text" id="inValidationInput" name="hs-validation-name-success" class="form-input border-danger" required aria-describedby="hs-validation-name-success-helper" />
                <Icon icon="info-circle" class="input-icon text-base text-danger!" />
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-placeholder" class="form-label mb-0! py-2">Placeholder</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="example-placeholder" class="form-input" placeholder="placeholder" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-readonly" class="form-label mb-0! py-2">Readonly</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="example-readonly" value="Readonly value" readonly class="form-input cursor-not-allowed" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-static" class="form-label mb-0! py-2">Static control</label>
            </div>

            <div class="lg:col-span-2">
              <input type="text" id="example-static" value="email&#64;example.com" readonly class="form-input border-transparent! bg-transparent!" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Default Select</label>
            </div>

            <div class="lg:col-span-2">
              <select class="form-select">
                <option selected>Open this select menu</option>
                <option>One</option>
                <option>Two</option>
                <option>Three</option>
              </select>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="example-multiselect" class="form-label mb-0! py-2">Multiple Select</label>
            </div>

            <div class="lg:col-span-2">
              <select id="example-multiselect" multiple class="form-input h-auto!">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
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
