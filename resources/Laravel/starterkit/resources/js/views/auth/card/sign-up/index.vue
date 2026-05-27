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
                    <h4 class="fw-bold mt-4">Create your account</h4>
                    <p class="text-muted w-lg-75 mx-auto">Let’s get you started. Add your details below to create your workspace access.</p>
                  </div>

                  <BForm @submit.prevent="submit">
                    <BAlert v-if="form.hasErrors" variant="danger" model-value class="mb-3">
                      Please review the details below.
                    </BAlert>

                    <div class="mb-3">
                      <label for="userName" class="form-label"> Name <span class="text-danger">*</span> </label>
                      <div class="input-group">
                        <span class="input-group-text bg-light">
                          <Icon icon="user" class="text-muted fs-xl" />
                        </span>
                        <BFormInput v-model="form.name" type="text" id="userName" :placeholder="META_DATA.username" autocomplete="name" required />
                      </div>
                      <div v-if="form.errors.name" class="invalid-feedback d-block">{{ form.errors.name }}</div>
                    </div>

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
                        <BFormInput id="userPassword" v-model="form.password" type="password" placeholder="••••••••" autocomplete="new-password" required />
                      </div>
                      <PasswordStrengthBar :password="form.password" />
                      <div v-if="form.errors.password" class="invalid-feedback d-block">{{ form.errors.password }}</div>
                    </div>

                    <div class="mb-3">
                      <label for="userPasswordConfirmation" class="form-label"> Confirm password <span class="text-danger">*</span> </label>
                      <div class="input-group">
                        <span class="input-group-text bg-light">
                          <Icon icon="lock-password" class="text-muted fs-xl" />
                        </span>
                        <BFormInput
                          id="userPasswordConfirmation"
                          v-model="form.password_confirmation"
                          type="password"
                          placeholder="••••••••"
                          autocomplete="new-password"
                          required
                        />
                      </div>
                    </div>

                    <div class="d-grid">
                      <BButton type="submit" variant="primary" class="fw-semibold py-2" :disabled="form.processing"> Create Account </BButton>
                    </div>
                  </BForm>

                  <p class="text-muted text-center mt-4 mb-0">
                    Already have an account?
                    <Link href="/login" class="text-decoration-underline link-offset-3 fw-semibold"> Login </Link>
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
import AuthLogo from '@/components/AuthLogo.vue'
import PasswordStrengthBar from '@/components/PasswordStrengthBar.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { currentYear, META_DATA } from '@/config/constants'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const submit = () => {
  form.post('/register', {
    preserveScroll: true,
    onFinish: () => form.reset('password', 'password_confirmation'),
  })
}
</script>
