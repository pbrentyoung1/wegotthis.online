<template>
  <div class="auth-box overflow-hidden d-flex align-items-center">
    <BContainer>
      <BRow class="justify-content-center">
        <BCol cols="12" sm="8" md="6" xxl="4">
          <div class="auth-brand text-center mb-4">
            <AuthLogo />
            <h4 class="fw-bold mt-3">Forgot Password ?</h4>
            <p class="text-muted w-lg-75 mx-auto">Enter your email address and we'll send you a link to reset your password.</p>
          </div>

          <BCard no-body class="p-4 rounded-4">
            <form>
              <div class="mb-3">
                <label for="userEmail" class="form-label"> Email address <span class="text-danger">*</span> </label>
                <div class="input-group">
                  <BFormInput type="email" id="userEmail" placeholder="you@example.com" required />
                </div>
              </div>

              <div class="mb-3">
                <BFormCheckbox name="agree"> Agree the Terms & Policy </BFormCheckbox>
              </div>

              <div class="d-grid">
                <BButton variant="primary" type="submit" class="fw-semibold py-2"> Send Request </BButton>
              </div>
            </form>

            <p class="text-muted text-center mt-4 mb-0">
              Return to
              <Link href="/auth/sign-in" class="text-decoration-underline link-offset-3 fw-semibold"> Sign in </Link>
            </p>
          </BCard>

          <p class="text-center text-muted mt-4 mb-0">
            © {{ currentYear }} {{ META_DATA.name }} — by <span class="fw-semibold">{{ META_DATA.author }}</span>
          </p>
        </BCol>
      </BRow>
    </BContainer>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

import { BCol, BContainer, BRow } from 'bootstrap-vue-next'
import AuthLogo from '@/components/AuthLogo.vue'
import { currentYear, META_DATA } from '@/config/constants'

</script>
