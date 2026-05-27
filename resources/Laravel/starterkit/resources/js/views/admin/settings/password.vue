<template>
  <PageBreadcrumb title="Account Settings" subtitle="Password" subtitle-url="/settings/password" />

  <SettingsHero />

  <div class="settings-card-wrap">
    <BAlert v-if="status === 'password-updated'" variant="success" model-value class="mb-4">
      Your password was updated.
    </BAlert>

    <BCard no-body class="border-0 shadow-sm">
      <div class="card-body">
        <BForm @submit.prevent="submit">
          <h5 class="settings-section-title">
            <Icon icon="key" />
            Password
          </h5>

            <p class="text-muted mb-4">Use a strong password that is unique to this workspace.</p>

            <BRow class="g-3">
              <BCol cols="12">
                <label for="currentPassword" class="form-label">Current password</label>
                <BFormInput id="currentPassword" v-model="form.current_password" type="password" autocomplete="current-password" required />
                <div v-if="form.errors.current_password" class="invalid-feedback d-block">{{ form.errors.current_password }}</div>
              </BCol>

              <BCol md="6">
                <label for="newPassword" class="form-label">New password</label>
                <BFormInput id="newPassword" v-model="form.password" type="password" autocomplete="new-password" required />
                <PasswordStrengthBar :password="form.password" />
                <div v-if="form.errors.password" class="invalid-feedback d-block">{{ form.errors.password }}</div>
              </BCol>

              <BCol md="6">
                <label for="confirmPassword" class="form-label">Confirm new password</label>
                <BFormInput
                  id="confirmPassword"
                  v-model="form.password_confirmation"
                  type="password"
                  autocomplete="new-password"
                  required
                />
              </BCol>

              <BCol cols="12" class="text-end">
                <BButton type="submit" variant="success" :disabled="form.processing">Update password</BButton>
              </BCol>
            </BRow>
        </BForm>
      </div>
    </BCard>
  </div>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { BAlert, BButton, BCard, BCol, BForm, BFormInput, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import PasswordStrengthBar from '@/components/PasswordStrengthBar.vue'
import Icon from '@/components/wrappers/Icon.vue'
import SettingsHero from './components/SettingsHero.vue'

defineProps<{
  status?: string | null
}>()

const form = useForm({
  current_password: '',
  password: '',
  password_confirmation: '',
})

const submit = () => {
  form.put('/settings/password', {
    preserveScroll: true,
    onFinish: () => form.reset('current_password', 'password', 'password_confirmation'),
  })
}
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
