<template>
  <div class="flex min-h-screen items-center p-12.5">
    <div class="container">
      <div class="flex justify-center px-2.5">
        <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
          <div class="mb-3 flex flex-col items-center justify-center text-center">
            <AuthLogo />
            <h4 class="font-bold text-base text-dark mt-5 mb-2">Setup New Password!</h4>
            <p class="text-default-400 mx-auto w-full lg:w-3/4 mb-4">We've emailed you a 6-digit verification code. Please enter it below to confirm your email address</p>
          </div>
          <div class="card p-7.5 rounded-2xl">
            <form>
              <div class="mb-5">
                <label for="userEmail" class="form-label">
                  Email address
                  <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <input type="email" class="form-input" id="userEmail" placeholder="you&#64;example.com" required />
                </div>
              </div>

              <div class="mb-5">
                <label for="userEmail" class="form-label">
                  Enter your 6-digit code
                  <span class="text-danger">*</span>
                </label>

                <div class="two-factor flex gap-2">
                  <VOtpInput v-model:value="otp" :num-inputs="6" input-type="tel" :is-input-num="true" :should-auto-focus="true" input-classes="form-input text-center mx-1" />
                </div>
              </div>

              <div class="mb-5" data-password="bar">
                <label for="userPassword" class="form-label">
                  Password
                  <span class="text-danger">*</span>
                </label>
                <input v-model="password" type="password" id="userPassword" class="form-input" placeholder="••••••••" />
                <PasswordStrengthBar :password="password" />
              </div>

              <div class="mb-5">
                <label for="userNewPassword" class="form-label">
                  Confirm New Password
                  <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <input type="password" class="form-input" id="userNewPassword" placeholder="••••••••" required />
                </div>
              </div>

              <div class="mb-6">
                <div class="flex items-center gap-2">
                  <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" id="termAndPolicy" />
                  <label class="form-check-label" for="termAndPolicy">Agree the Terms & Policy</label>
                </div>
              </div>

              <div>
                <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Update Password</button>
              </div>
            </form>

            <p class="text-default-400 my-9 text-center">
              Don’t have a code?
              <RouterLink to="" class="text-primary font-semibold underline underline-offset-3">Resend</RouterLink>

              or
              <RouterLink to="" class="text-primary font-semibold underline underline-offset-3">Call Us</RouterLink>
            </p>

            <p class="text-default-400 text-center">
              Return to
              <RouterLink to="/auth/sign-in" class="underline text-primary font-semibold">Sign in</RouterLink>
            </p>
          </div>

          <p class="text-default-400 mt-7.5 text-center">
            © {{ currentYear }} {{ META_DATA.name }} - by
            <span>{{ META_DATA.author }}</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { ref } from 'vue'
import VOtpInput from 'vue3-otp-input'
import AuthLogo from '~/components/AuthLogo.vue'
import PasswordStrengthBar from '~/components/PasswordStrengthBar.vue'
import { currentYear, META_DATA } from '~/config/constants'

const password = ref('')
const otp = ref('')

</script>
