<template>
  <div class="auth-box overflow-hidden d-flex align-items-center">
    <BContainer>
      <BRow class="justify-content-center">
        <BCol cols="12" sm="8" md="6" xxl="4">
          <div class="auth-brand text-center mb-4">
            <AuthLogo />
            <h4 class="fw-bold mt-3">Welcome</h4>
            <p class="text-muted w-lg-75 mx-auto">Let’s get you signed in. Enter your email and password to continue.</p>
          </div>

          <BCard no-body class="rounded-4 p-4">
            <BForm @submit.prevent="handleSubmit">
              <div class="mb-3">
                <label for="userEmail" class="form-label"> Email address <span class="text-danger">*</span> </label>
                <BFormInput v-model="form.email" id="userEmail" type="email" placeholder="you@example.com" required />
              </div>

              <div class="mb-3">
                <label for="userPassword" class="form-label"> Password <span class="text-danger">*</span> </label>
                <BFormInput v-model="form.password" id="userPassword" type="password" placeholder="••••••••" required />
              </div>

              <div class="d-flex justify-content-between align-items-center mb-3">
                <BFormCheckbox name="keepSignedIn"> Keep me signed in </BFormCheckbox>

                <Link href="/auth/reset-pass" class="text-decoration-underline link-offset-3 text-muted"> Forgot Password? </Link>
              </div>

              <div class="d-grid">
                <BButton type="submit" variant="primary" class="fw-semibold py-2" :disabled="loading"> Sign In </BButton>
              </div>
            </BForm>

            <p class="text-muted text-center mt-4 mb-0">
              New here?
              <Link href="/auth/sign-up" class="text-decoration-underline link-offset-3 fw-semibold"> Create an account </Link>
            </p>
          </BCard>

          <p class="text-center text-muted mt-4 mb-0">
            © {{ currentYear }} {{ META_DATA.name }} — by
            <span class="fw-semibold">{{ META_DATA.author }}</span>
          </p>
        </BCol>
      </BRow>
    </BContainer>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BButton, BCol, BFormCheckbox, BFormInput, BRow } from 'bootstrap-vue-next'
import { reactive } from 'vue'
import AuthLogo from '@/components/AuthLogo.vue'
import { useAuth } from '@/composables/useAuth'
import { currentYear, META_DATA } from '@/config/constants'
const { login, loading } = useAuth()

const form = reactive({
  email: 'admin@example.com',
  password: 'password',
})

const handleSubmit = () => {
  login(form.email, form.password)
}

</script>
