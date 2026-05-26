<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Checks, Radios and Switches</h4>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 gap-base lg:grid-cols-2">
        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Checkboxes</label>
            </div>

            <div class="space-y-3 lg:col-span-2">
              <div class="flex items-center gap-2">
                <input type="checkbox" id="checkDefault" class="form-checkbox" />
                <label for="checkDefault">Default Checkbox</label>
              </div>

              <div class="flex items-center gap-2">
                <input type="checkbox" id="checkLight" class="form-checkbox bg-default-200! checked:bg-primary!" />
                <label for="checkLight">Light Checkbox</label>
              </div>

              <div class="flex items-center gap-x-4">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkInline1" class="form-checkbox" checked />
                  <label for="checkInline1">Inline 1</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkInline2" class="form-checkbox" />
                  <label for="checkInline2">Inline 2</label>
                </div>
              </div>

              <div class="flex items-center gap-2">
                <input type="checkbox" id="checkIndeterminate" class="form-checkbox" />
                <label for="checkIndeterminate">Disabled indeterminate checkbox</label>
              </div>

              <div class="flex items-center gap-2">
                <input type="checkbox" id="checkCheckedDisabled" class="form-checkbox" checked disabled />
                <label for="checkCheckedDisabled">Disabled checked checkbox</label>
              </div>

              <h5 class="mt-5 mb-2 font-semibold">Sizes</h5>

              <div class="flex items-center gap-2">
                <input type="checkbox" id="checkSize1" class="form-checkbox size-5!" checked />
                <label for="checkSize1">I'm 16px Checkbox</label>
              </div>

              <div class="flex items-center gap-2">
                <input type="checkbox" id="checkSize2" class="form-checkbox size-6.25! checked:bg-secondary!" checked />
                <label for="checkSize2">I'm 20px Checkbox</label>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Switches</label>
            </div>

            <div class="space-y-3 lg:col-span-2">
              <div class="flex items-center gap-2">
                <input type="checkbox" id="switch1" class="form-switch" checked />
                <label for="switch1">Enabled Switch</label>
              </div>

              <div class="flex items-center gap-2">
                <input type="checkbox" id="switch2" class="form-switch" disabled />
                <label for="switch2" class="text-default-400">Disabled Switch</label>
              </div>

              <h5 class="mt-5 mb-2 font-semibold">Sizes</h5>

              <div class="flex items-center gap-2">
                <input type="checkbox" id="checkboxSize16" class="form-switch" checked />
                <label for="checkboxSize16">I'm 16px Switch</label>
              </div>

              <div class="flex items-center gap-2">
                <input type="checkbox" id="checkboxSize20" class="form-switch form-switch-lg checked:bg-secondary!" checked />
                <label for="checkboxSize20">I'm 20px Switch</label>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Colored Checkboxes</label>
            </div>

            <div class="col-span-1 flex flex-wrap gap-9 lg:col-span-2">
              <div class="space-y-3">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkPrimary" class="form-checkbox checked:bg-primary!" checked />
                  <label for="checkPrimary">Primary</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkSecondary" class="form-checkbox checked:bg-secondary!" checked />
                  <label for="checkSecondary">Secondary</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkSuccess" class="form-checkbox checked:bg-success!" checked />
                  <label for="checkSuccess">Success</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkInfo" class="form-checkbox checked:bg-info!" checked />
                  <label for="checkInfo">Info</label>
                </div>
              </div>

              <div class="space-y-3">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkWarning" class="form-checkbox checked:bg-warning!" checked />
                  <label for="checkWarning">Warning</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkDanger" class="form-checkbox checked:bg-danger!" checked />
                  <label for="checkDanger">Danger</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkDark" class="form-checkbox checked:bg-dark!" checked />
                  <label for="checkDark">Dark</label>
                </div>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Colored Switches</label>
            </div>

            <div class="col-span-1 flex flex-wrap gap-9 lg:col-span-2">
              <div class="space-y-3">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkPrimary" class="form-switch checked:bg-primary!" checked />
                  <label for="checkPrimary">Primary</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkSecondary" class="form-switch checked:bg-secondary!" checked />
                  <label for="checkSecondary">Secondary</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkSuccess" class="form-switch checked:bg-success!" checked />
                  <label for="checkSuccess">Success</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkInfo" class="form-switch checked:bg-info!" checked />
                  <label for="checkInfo">Info</label>
                </div>
              </div>

              <div class="space-y-3">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkWarning" class="form-switch checked:bg-warning!" checked />
                  <label for="checkWarning">Warning</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkDanger" class="form-switch checked:bg-danger!" checked />
                  <label for="checkDanger">Danger</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkDark" class="form-switch checked:bg-dark!" checked />
                  <label for="checkDark">Dark</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Radios</label>
            </div>

            <div class="space-y-3 lg:col-span-2">
              <div class="flex items-center gap-2">
                <input type="radio" name="gridRadio" id="radio1" class="form-radio rounded-full!" checked />
                <label for="radio1">Option 1</label>
              </div>

              <div class="flex items-center gap-2">
                <input type="radio" name="gridRadio" id="radio2" class="form-radio rounded-full!" />
                <label for="radio2">Option 2</label>
              </div>

              <div class="flex space-x-4">
                <div class="flex items-center gap-2">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" class="form-radio rounded-full!" checked />
                  <label for="inlineRadio1">Inline 1</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" class="form-radio rounded-full!" />
                  <label for="inlineRadio2">Inline 2</label>
                </div>
              </div>

              <div class="flex items-center gap-2">
                <input type="radio" name="disabledRadioOptions" id="inlineRadio3" value="option3" class="form-radio rounded-full!" checked disabled />
                <label for="inlineRadio3" class="text-default-400">Disabled Checked Radio</label>
              </div>

              <h5 class="mt-5 mb-2 font-semibold">Sizes</h5>

              <div class="flex items-center space-x-4">
                <div class="flex items-center gap-2">
                  <input type="radio" name="paymentMethod" id="radioCash" value="cash" class="form-radio size-5! rounded-full!" checked />
                  <label for="radioCash">Cash</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="radio" name="paymentMethod" id="radioCard" value="card" class="form-radio size-5! rounded-full!" />
                  <label for="radioCard">Card</label>
                </div>
              </div>

              <div class="mt-2 flex items-center space-x-4">
                <div class="flex items-center gap-2">
                  <input type="radio" name="deliveryOption" id="radioPickup" value="pickup" class="form-radio size-6! rounded-full!" checked />
                  <label for="radioPickup">Pickup</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="radio" name="deliveryOption" id="radioHome" value="home" class="form-radio size-6! rounded-full!" />
                  <label for="radioHome">Home Delivery</label>
                </div>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Reverse</label>
            </div>

            <div class="col-span-1 w-full space-y-3 lg:col-span-2 lg:w-1/2">
              <div class="flex flex-row-reverse items-center gap-2">
                <input type="checkbox" id="reverseCheck1" class="form-checkbox" checked />
                <label for="reverseCheck1">Reverse checkbox</label>
              </div>

              <div class="flex flex-row-reverse items-center gap-2">
                <input type="radio" id="reverseCheck2" name="reverseRadio" class="form-radio rounded-full!" disabled />
                <label for="reverseCheck2">Disabled reverse radio</label>
              </div>

              <div class="flex flex-row-reverse items-center gap-2">
                <input type="checkbox" id="switchCheckReverse" class="form-switch" checked />
                <label for="switchCheckReverse">Reverse switch checkbox input</label>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Colored Radios</label>
            </div>

            <div class="col-span-1 flex flex-wrap gap-9 lg:col-span-2">
              <div class="space-y-3">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkPrimary" class="form-radio rounded-full! checked:bg-primary!" checked />
                  <label for="checkPrimary">Primary</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkSecondary" class="form-radio rounded-full! checked:bg-secondary!" checked />
                  <label for="checkSecondary">Secondary</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkSuccess" class="form-radio rounded-full! checked:bg-success!" checked />
                  <label for="checkSuccess">Success</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkInfo" class="form-radio rounded-full! checked:bg-info!" checked />
                  <label for="checkInfo">Info</label>
                </div>
              </div>

              <div class="space-y-3">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkWarning" class="form-radio rounded-full! checked:bg-warning!" checked />
                  <label for="checkWarning">Warning</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkDanger" class="form-radio rounded-full! checked:bg-danger!" checked />
                  <label for="checkDanger">Danger</label>
                </div>
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="checkDark" class="form-radio rounded-full! checked:bg-dark!" checked />
                  <label for="checkDark">Dark</label>
                </div>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Checkbox Toggle</label>
            </div>

            <div class="space-y-3 lg:col-span-2">
              <div>
                <input type="checkbox" id="toggleSingle" class="peer hidden" />
                <label for="toggleSingle" class="btn border-primary text-primary peer-checked:bg-primary peer-checked:text-white">Single Toggle</label>
              </div>

              <div class="flex">
                <div>
                  <input type="checkbox" id="toggle1" class="peer hidden" />
                  <label for="toggle1" class="btn rounded-e-none border-primary text-primary peer-checked:bg-primary peer-checked:text-white">One</label>
                </div>
                <div>
                  <input type="checkbox" id="toggle2" class="peer hidden" />
                  <label for="toggle2" class="btn rounded-none border-x-0 border-primary text-primary peer-checked:bg-primary peer-checked:text-white">Two</label>
                </div>
                <div>
                  <input type="checkbox" id="toggle3" class="peer hidden" />
                  <label for="toggle3" class="btn rounded-s-none border-primary text-primary peer-checked:bg-primary peer-checked:text-white">Three</label>
                </div>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Radio Toggle</label>
            </div>

            <div class="col-span-1 flex lg:col-span-2">
              <div>
                <input type="radio" name="radiotoggle" id="radioLeft" class="peer hidden" checked />
                <label for="radioLeft" class="btn rounded-e-none border-secondary text-secondary peer-checked:bg-secondary peer-checked:text-white">Left</label>
              </div>

              <div>
                <input type="radio" name="radiotoggle" id="radioMiddle" class="peer hidden" />
                <label for="radioMiddle" class="btn rounded-none border-x-0 border-secondary text-secondary peer-checked:bg-secondary peer-checked:text-white">Middle</label>
              </div>

              <div>
                <input type="radio" name="radiotoggle" id="radioRight" class="peer hidden" />
                <label for="radioRight" class="btn rounded-s-none border-secondary text-secondary peer-checked:bg-secondary peer-checked:text-white">Right</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup></script>
