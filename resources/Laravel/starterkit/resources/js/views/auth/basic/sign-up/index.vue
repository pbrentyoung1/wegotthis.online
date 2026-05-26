<template>
  <div class="auth-box overflow-hidden d-flex align-items-center">
    <BContainer>
      <BRow class="justify-content-center">
        <BCol cols="12" sm="8" md="6" xxl="4">
          <div class="auth-brand text-center mb-4">
            <AuthLogo />
            <h4 class="fw-bold mt-3">Create New Account</h4>
            <p class="text-muted w-lg-75 mx-auto">Let’s get you started. Create your account by entering your details below.</p>
          </div>

          <BCard no-body class="p-4 rounded-4">
            <form>
              <div class="mb-3">
                <label for="userName" class="form-label"> Name <span class="text-danger">*</span> </label>
                <div class="input-group">
                  <BFormInput type="text" id="userName" :placeholder="META_DATA.username" required />
                </div>
              </div>

              <div class="mb-3">
                <label for="userEmail" class="form-label"> Email address <span class="text-danger">*</span> </label>
                <div class="input-group">
                  <BFormInput type="email" id="userEmail" placeholder="you@example.com" required />
                </div>
              </div>

              <div class="mb-3">
                <label for="userPassword" class="form-label"> Password <span class="text-danger">*</span> </label>
                <div class="input-group">
                  <BFormInput type="password" v-model="password" id="userPassword" placeholder="••••••••" required />
                </div>
                <PasswordStrengthBar :password="password" />
              </div>

              <div class="mb-3">
                <BFormCheckbox name="termAndPolicy"> Agree the Terms & Policy </BFormCheckbox>
              </div>

              <div class="d-grid">
                <BButton variant="primary" type="submit" class="fw-semibold py-2">Create Account </BButton>
              </div>
            </form>

            <p class="text-muted text-center mt-4 mb-0">
              Already have an account?
              <Link href="/auth/sign-in" class="text-decoration-underline link-offset-3 fw-semibold"> Login </Link>
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

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { ref } from 'vue'
import AuthLogo from '@/components/AuthLogo.vue'
import PasswordStrengthBar from '@/components/PasswordStrengthBar.vue'
import { currentYear, META_DATA } from '@/config/constants'

const password = ref('')

</script>
