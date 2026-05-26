<template>
  <PageBreadcrumb title="Password Meter" subtitle="Plugins" />

  <div class="container">
    <div class="grid lg:grid-cols-2 gap-base">
      <div>
        <CardWithAction title="Sessions Device" isCollapsible>
          <input type="password" class="form-input mb-3" placeholder="Password" v-model="password" />
          <PasswordStrengthBar :password="password" />
        </CardWithAction>
      </div>

      <div>
        <CardWithAction title="Password Condition" isCollapsible>
          <div>
            <label class="form-label hs-collapse-toggle" for="password-input" id="password-collapse-toggle" data-hs-collapse="#passwordBox">Magic Password ✨ (Click Here)</label>
            <input type="password" class="form-input hs-collapse-toggle" placeholder="Enter password" id="password-input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" data-hs-collapse="#passwordBox" v-model="magicPassword" @focus="showRules = true" @blur="onBlur" />

            <div class="text-default-400 mt-1 text-2xs">Use 8 or more characters with a mix of letters, numbers & symbols.</div>

            <div class="password-box hs-collapse hidden w-full overflow-hidden transition-[height] duration-300" id="passwordBox">
              <div class="p-3">
                <h5 class="mb-2 text-sm">Password Recipe:</h5>
                <p id="pass-length" :class="{ valid: isLengthValid, invalid: !isLengthValid }" class="fs-xs mb-2">
                  Minimum
                  <b>8 characters</b>
                </p>
                <p id="pass-lower" :class="{ valid: hasLowercase, invalid: !hasLowercase }" class="fs-xs mb-2">
                  At
                  <b>lowercase</b>
                  letter (a-z)
                </p>
                <p id="pass-upper" :class="{ valid: hasUppercase, invalid: !hasUppercase }" class="fs-xs mb-2">
                  At least
                  <b>uppercase</b>
                  letter (A-Z)
                </p>
                <p id="pass-number" :class="{ valid: hasNumber, invalid: !hasNumber }" class="fs-xs">
                  A least
                  <b>number</b>
                  (0-9)
                </p>
              </div>
            </div>
          </div>
        </CardWithAction>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue'
import CardWithAction from '~/components/CardWithAction.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import PasswordStrengthBar from '~/components/PasswordStrengthBar.vue'

const password = ref('')
const magicPassword = ref('')
const showRules = ref(false)

const isLengthValid = computed(() => magicPassword.value.length >= 8)
const hasLowercase = computed(() => /[a-z]/.test(magicPassword.value))
const hasUppercase = computed(() => /[A-Z]/.test(magicPassword.value))
const hasNumber = computed(() => /[0-9]/.test(magicPassword.value))

const onBlur = () => {
  if (magicPassword.value.length > 0) {
    showRules.value = true
  } else {
    showRules.value = false
  }
}
</script>

<style scoped></style>
