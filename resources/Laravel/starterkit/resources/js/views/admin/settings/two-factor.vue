<template>
  <PageBreadcrumb title="Account Settings" subtitle="Two-Factor" subtitle-url="/settings/two-factor" />

  <SettingsHero />

  <div class="settings-card-wrap">
    <BAlert v-if="statusMessage" variant="success" model-value class="mb-4">
      {{ statusMessage }}
    </BAlert>

    <BCard no-body class="border-0 shadow-sm">
      <div class="card-body">
        <h5 class="settings-section-title">
          <Icon icon="shield-lock" />
          Two-factor authentication
        </h5>

          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <div>
              <span class="badge badge-label" :class="badgeClass">{{ badgeLabel }}</span>
              <p class="text-muted mb-0 mt-2">{{ badgeDescription }}</p>
            </div>

            <div class="d-flex gap-2">
              <BButton
                v-if="!twoFactorEnabled && !twoFactorPendingConfirmation"
                variant="success"
                :disabled="enableForm.processing"
                @click="enableTwoFactor"
              >
                Enable two-factor
              </BButton>

              <BButton
                v-if="twoFactorEnabled || twoFactorPendingConfirmation"
                variant="outline-danger"
                :disabled="disableForm.processing"
                @click="disableTwoFactor"
              >
                Disable
              </BButton>
            </div>
          </div>

          <div v-if="twoFactorEnabled || twoFactorPendingConfirmation">
            <BRow class="g-4">
              <BCol lg="6">
                <BCard no-body class="border h-100">
                  <div class="card-body">
                    <h5 class="mb-3">Authenticator setup</h5>
                    <p class="text-muted mb-3">Scan this QR code with your authenticator app, or enter the secret key manually.</p>

                    <div v-if="qrCodeSvg" class="rounded-3 border bg-white p-3 mb-3" v-html="qrCodeSvg" />

                    <div class="rounded-3 bg-light p-3">
                      <p class="text-uppercase text-muted fw-semibold fs-xs mb-2">Secret key</p>
                      <code class="text-break">{{ secretKey || 'Loading...' }}</code>
                    </div>
                  </div>
                </BCard>
              </BCol>

              <BCol lg="6">
                <BCard no-body class="border h-100">
                  <div class="card-body">
                    <template v-if="twoFactorPendingConfirmation && requiresConfirmation">
                      <h5 class="mb-3">Confirm setup</h5>
                      <p class="text-muted mb-3">Enter the current 6-digit code from your authenticator app to finish enabling two-factor authentication.</p>

                      <BForm @submit.prevent="confirmTwoFactor">
                        <div class="mb-3">
                          <label for="twoFactorCode" class="form-label">Authenticator code</label>
                          <BFormInput id="twoFactorCode" v-model="confirmForm.code" autocomplete="one-time-code" required />
                          <div v-if="confirmForm.errors.code" class="invalid-feedback d-block">{{ confirmForm.errors.code }}</div>
                        </div>

                        <BButton type="submit" variant="success" :disabled="confirmForm.processing">Confirm setup</BButton>
                      </BForm>
                    </template>

                    <template v-else>
                      <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                        <div>
                          <h5 class="mb-1">Recovery codes</h5>
                          <p class="text-muted mb-0">Store these somewhere safe in case you lose access to your authenticator app.</p>
                        </div>

                        <BButton variant="outline-primary" size="sm" :disabled="regenerateForm.processing" @click="regenerateRecoveryCodes">
                          Regenerate
                        </BButton>
                      </div>

                      <div class="rounded-3 bg-light p-3">
                        <ul class="list-unstyled mb-0">
                          <li v-for="code in recoveryCodes" :key="code" class="font-monospace py-1">{{ code }}</li>
                        </ul>
                      </div>
                    </template>
                  </div>
                </BCard>
              </BCol>
            </BRow>
          </div>
      </div>
    </BCard>
  </div>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { BAlert, BButton, BCard, BCol, BForm, BFormInput, BRow } from 'bootstrap-vue-next'
import { computed, ref, watch } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import SettingsHero from './components/SettingsHero.vue'

const props = defineProps<{
  twoFactorEnabled: boolean
  twoFactorPendingConfirmation: boolean
  requiresConfirmation: boolean
  status?: string | null
}>()

const qrCodeSvg = ref('')
const secretKey = ref('')
const recoveryCodes = ref<string[]>([])

const enableForm = useForm({})
const confirmForm = useForm({
  code: '',
})
const disableForm = useForm({})
const regenerateForm = useForm({})

const badgeLabel = computed(() => {
  if (props.twoFactorEnabled) return 'Enabled'
  if (props.twoFactorPendingConfirmation) return 'Awaiting confirmation'
  return 'Not enabled'
})

const badgeDescription = computed(() => {
  if (props.twoFactorEnabled) return 'Your account requires a second factor when signing in.'
  if (props.twoFactorPendingConfirmation) return 'Finish confirmation below to activate two-factor authentication.'
  return 'Enable two-factor authentication to add another layer of protection.'
})

const badgeClass = computed(() => {
  if (props.twoFactorEnabled) return 'bg-success-subtle text-success'
  if (props.twoFactorPendingConfirmation) return 'bg-warning-subtle text-warning'
  return 'bg-secondary-subtle text-secondary'
})

const statusMessage = computed(() => {
  switch (props.status) {
    case 'two-factor-authentication-enabled':
      return 'Two-factor authentication has been started.'
    case 'two-factor-authentication-confirmed':
      return 'Two-factor authentication is now confirmed.'
    case 'two-factor-authentication-disabled':
      return 'Two-factor authentication has been disabled.'
    case 'recovery-codes-generated':
      return 'A fresh set of recovery codes has been generated.'
    default:
      return null
  }
})

const loadTwoFactorDetails = async () => {
  if (!props.twoFactorEnabled && !props.twoFactorPendingConfirmation) {
    qrCodeSvg.value = ''
    secretKey.value = ''
    recoveryCodes.value = []
    return
  }

  const [qrResponse, secretResponse] = await Promise.all([
    fetch('/user/two-factor-qr-code', { headers: { Accept: 'application/json' } }),
    fetch('/user/two-factor-secret-key', { headers: { Accept: 'application/json' } }),
  ])

  const qrData = await qrResponse.json()
  const secretData = await secretResponse.json()

  qrCodeSvg.value = qrData.svg ?? ''
  secretKey.value = secretData.secretKey ?? ''

  if (props.twoFactorEnabled) {
    const recoveryResponse = await fetch('/user/two-factor-recovery-codes', { headers: { Accept: 'application/json' } })
    recoveryCodes.value = await recoveryResponse.json()
  } else {
    recoveryCodes.value = []
  }
}

const enableTwoFactor = () => {
  enableForm.post('/user/two-factor-authentication', {
    preserveScroll: true,
  })
}

const confirmTwoFactor = () => {
  confirmForm.post('/user/confirmed-two-factor-authentication', {
    preserveScroll: true,
    onFinish: () => confirmForm.reset('code'),
  })
}

const disableTwoFactor = () => {
  disableForm.delete('/user/two-factor-authentication', {
    preserveScroll: true,
  })
}

const regenerateRecoveryCodes = () => {
  regenerateForm.post('/user/two-factor-recovery-codes', {
    preserveScroll: true,
  })
}

watch(
  () => [props.twoFactorEnabled, props.twoFactorPendingConfirmation, props.status],
  () => {
    void loadTwoFactorDetails()
  },
  { immediate: true }
)
</script>

<style scoped>
.settings-card-wrap {
  margin: -3rem auto 0;
  max-width: 980px;
  position: relative;
  z-index: 2;
}

.settings-section-title {
  align-items: center;
  background: rgba(var(--bs-light-rgb), 0.35);
  border: 1px dashed var(--bs-border-color);
  border-radius: var(--bs-border-radius);
  display: flex;
  font-size: 0.875rem;
  gap: 0.375rem;
  justify-content: center;
  margin-bottom: 1.25rem;
  padding: 0.4rem 0.75rem;
  text-transform: uppercase;
}
</style>
