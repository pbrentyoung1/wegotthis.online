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
                    <h4 class="fw-bold mt-4">Welcome back</h4>
                    <p class="text-muted w-lg-75 mx-auto">Let’s get you signed in. Enter your email and password to continue.</p>
                  </div>

                  <BForm @submit.prevent="submit">
                    <BAlert v-if="status" variant="success" model-value class="mb-3">
                      {{ status }}
                    </BAlert>

                    <BAlert v-if="form.hasErrors" variant="danger" model-value class="mb-3">
                      Please check your email and password.
                    </BAlert>

                    <div class="mb-3">
                      <label for="userEmail" class="form-label"> Email address <span class="text-danger">*</span> </label>
                      <div class="input-group">
                        <span class="input-group-text bg-light">
                          <Icon icon="mail" class="text-muted fs-xl" />
                        </span>
                        <BFormInput v-model="form.email" type="email" id="userEmail" placeholder="you@example.com" autocomplete="email" required />
                      </div>
                      <div v-if="form.errors.email" class="invalid-feedback d-block">{{ form.errors.email }}</div>
                    </div>

                    <div class="mb-3">
                      <label for="userPassword" class="form-label"> Password <span class="text-danger">*</span> </label>
                      <div class="input-group">
                        <span class="input-group-text bg-light">
                          <Icon icon="lock-password" class="text-muted fs-xl" />
                        </span>
                        <BFormInput
                          v-model="form.password"
                          type="password"
                          id="userPassword"
                          placeholder="password"
                          autocomplete="current-password"
                          required
                        />
                      </div>
                      <div v-if="form.errors.password" class="invalid-feedback d-block">{{ form.errors.password }}</div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <BFormCheckbox v-model="form.remember" name="remember"> Keep me signed in </BFormCheckbox>
                      <Link v-if="canResetPassword" href="/forgot-password" class="text-decoration-underline link-offset-3 text-muted"> Forgot Password? </Link>
                    </div>

                    <div class="d-grid">
                      <BButton type="submit" variant="primary" class="fw-semibold py-2" :disabled="form.processing"> Sign In </BButton>
                    </div>
                  </BForm>

                  <p v-if="canRegister" class="text-muted text-center mt-4 mb-0">
                    New here?
                    <Link href="/register" class="text-decoration-underline link-offset-3 fw-semibold"> Create an account </Link>
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

import { BAlert, BButton, BCard, BCol, BContainer, BForm, BFormCheckbox, BFormInput, BRow } from 'bootstrap-vue-next'
import AuthLogo from '@/components/AuthLogo.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { currentYear, META_DATA } from '@/config/constants'

defineProps<{
  canRegister: boolean
  canResetPassword: boolean
  status?: string | null
}>()

const form = useForm({
  email: 'test@example.com',
  password: 'password',
  remember: false,
})

const submit = () => {
  form.post('/login', {
    preserveScroll: true,
    onFinish: () => form.reset('password'),
  })
}
</script>
