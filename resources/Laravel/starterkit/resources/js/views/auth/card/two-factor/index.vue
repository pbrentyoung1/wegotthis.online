<template>
  <div class="auth-box d-flex align-items-center">
    <BContainer fluid="xxl">
      <BRow class="align-items-center justify-content-center">
        <BCol xl="10">
          <BCard no-body class="rounded-4">
            <BRow class="justify-content-between g-0">
              <BCol lg="6">
                <div class="card-body">
                  <div class="auth-brand text-center mb-4">
                    <AuthLogo />
                    <h4 class="fw-bold mt-4">Two-factor verification</h4>
                    <p class="text-muted w-lg-75 mx-auto">Enter the code from your authenticator app, or use a recovery code if you need to.</p>
                  </div>

                  <BForm @submit.prevent="submit">
                    <BAlert v-if="form.hasErrors" variant="danger" model-value class="mb-3">
                      The verification code was invalid. Please try again.
                    </BAlert>

                    <div v-if="!usingRecoveryCode" class="mb-3">
                      <label class="form-label">Authenticator code <span class="text-danger">*</span></label>
                      <div class="two-factor">
                        <VOtpInput v-model:value="otp" :num-inputs="6" separator=" " input-type="tel" :is-input-num="true" :should-auto-focus="true" input-classes="form-control text-center" />
                      </div>
                      <div v-if="form.errors.code" class="invalid-feedback d-block">{{ form.errors.code }}</div>
                    </div>

                    <div v-else class="mb-3">
                      <label for="recoveryCode" class="form-label">Recovery code <span class="text-danger">*</span></label>
                      <BFormInput
                        id="recoveryCode"
                        v-model="form.recovery_code"
                        type="text"
                        placeholder="Enter one of your recovery codes"
                        autocomplete="one-time-code"
                        required
                      />
                      <div v-if="form.errors.recovery_code" class="invalid-feedback d-block">{{ form.errors.recovery_code }}</div>
                    </div>

                    <div class="d-grid">
                      <BButton type="submit" variant="primary" class="fw-semibold py-2" :disabled="form.processing">Confirm</BButton>
                    </div>
                  </BForm>

                  <p class="mt-4 text-muted text-center mb-4">
                    <button type="button" class="btn btn-link p-0 text-decoration-underline link-offset-2 fw-semibold" @click="toggleMode">
                      {{ usingRecoveryCode ? 'Use an authenticator code instead' : 'Use a recovery code instead' }}
                    </button>
                  </p>

                  <p class="text-muted text-center mb-0">
                    Return to
                    <Link href="/login" class="text-decoration-underline link-offset-3 fw-semibold"> Sign in </Link>
                  </p>

                  <p class="text-center text-muted mt-4 mb-0">
                    © {{ currentYear }} {{ META_DATA.name }} — by
                    <span class="fw-semibold">{{ META_DATA.author }}</span>
                  </p>
                </div>
              </BCol>

              <BCol lg="6" class="d-none d-lg-block">
                <div class="h-100 position-relative card-side-img rounded-end-4 overflow-hidden" style="background-image: url('/images/auth.jpg')">
                  <div class="p-4 card-img-overlay rounded-4 rounded-start-0 auth-overlay d-flex align-items-end justify-content-center" />
                </div>
              </BCol>
            </BRow>
          </BCard>
        </BCol>
      </BRow>
    </BContainer>
  </div>
</template>

<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3'

import { BAlert, BButton, BCard, BCol, BContainer, BForm, BFormInput, BRow } from 'bootstrap-vue-next'
import { ref, watch } from 'vue'
import VOtpInput from 'vue3-otp-input'
import AuthLogo from '@/components/AuthLogo.vue'
import { currentYear, META_DATA } from '@/config/constants'

const otp = ref('')
const usingRecoveryCode = ref(false)

const form = useForm({
  code: '',
  recovery_code: '',
})

watch(otp, (value) => {
  form.code = value
})

const toggleMode = () => {
  usingRecoveryCode.value = !usingRecoveryCode.value
  form.clearErrors()
  form.reset()
  otp.value = ''
}

const submit = () => {
  form.transform((data) => (
    usingRecoveryCode.value
      ? { recovery_code: data.recovery_code }
      : { code: otp.value }
  )).post('/two-factor-challenge', {
    preserveScroll: true,
    onFinish: () => {
      if (!usingRecoveryCode.value) {
        otp.value = ''
      }
      form.reset()
    },
  })
}
</script>
