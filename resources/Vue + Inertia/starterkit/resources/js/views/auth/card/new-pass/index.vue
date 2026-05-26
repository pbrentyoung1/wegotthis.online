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
                    <h4 class="fw-bold mt-4">Setup New Password !</h4>
                    <p class="text-muted w-lg-75 mx-auto">We've emailed you a 6-digit verification code. Please enter it below to confirm your Email Address.</p>
                  </div>

                  <form>
                    <div class="mb-3">
                      <label for="userEmail" class="form-label">Email address <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <span class="input-group-text bg-light">
                          <Icon icon="mail" class="text-muted fs-xl" />
                        </span>
                        <BFormInput type="email" id="userEmail" placeholder="you@example.com" disabled />
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Enter your 6-digit code <span class="text-danger">*</span></label>
                      <VOtpInput v-model:value="otp" :num-inputs="6" separator=" " input-classes="form-control text-center " :should-auto-focus="true" :is-input-num="true" />
                    </div>

                    <div class="mb-3">
                      <label for="userPassword" class="form-label">Password <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <span class="input-group-text bg-light">
                          <Icon icon="lock-password" class="ti ti-lock text-muted fs-xl"> </Icon>
                        </span>
                        <BFormInput type="password" v-model="password" id="userPassword" placeholder="••••••••" required />
                      </div>
                      <PasswordStrengthBar :password="password" />
                    </div>

                    <div class="mb-3">
                      <label for="confirmPassword" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <span class="input-group-text bg-light">
                          <Icon icon="lock-password" class="text-muted fs-xl" />
                        </span>
                        <BFormInput type="password" id="confirmPassword" placeholder="••••••••" required />
                      </div>
                    </div>

                    <div class="mb-3">
                      <BFormCheckbox name="termAndPolicy"> Agree the Terms & Policy </BFormCheckbox>
                    </div>

                    <div class="d-grid">
                      <BButton type="submit" variant="primary" class="fw-semibold py-2">Update Password</BButton>
                    </div>
                  </form>

                  <p class="mt-4 text-muted text-center mb-4">
                    Don’t have a code?
                    <Link href="" class="text-decoration-underline link-offset-2 fw-semibold"> Resend</Link>
                    or
                    <Link href="" class="text-decoration-underline link-offset-2 fw-semibold">Call Us</Link>
                  </p>

                  <p class="text-muted text-center mb-0">
                    Return to
                    <Link href="/auth/card/sign-in" class="text-decoration-underline link-offset-3 fw-semibold"> Sign in </Link>
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
import { Link } from '@inertiajs/vue3'

import { BButton, BCard, BCol, BContainer, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import VOtpInput from 'vue3-otp-input'
import AuthLogo from '@/components/AuthLogo.vue'
import PasswordStrengthBar from '@/components/PasswordStrengthBar.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { currentYear, META_DATA } from '@/config/constants'

const password = ref('')

const otp = ref('')

</script>
