<template>
  <div class="min-h-screen">
    <div class="flex h-full w-full">
      <div class="hidden w-full md:block">
        <div class="relative h-full overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url(/images/auth.jpg)">
          <div class="from-zinc-800 via-zinc-800/80 to-zinc-800/50 absolute inset-0 flex items-end justify-center bg-linear-to-t p-9"></div>
        </div>
      </div>
      <div class="min-w-full md:min-w-106 md:max-w-118">
        <div class="card relative flex min-h-screen flex-col justify-between rounded-none p-12.5">
          <div class="mb-7.5 flex flex-col items-center justify-center text-center">
            <AuthLogo />
          </div>

          <div>
            <h4 class="font-bold mb-2 text-default-900 text-lg text-center">Setup New Password!</h4>
            <p class="text-default-400 mx-auto w-full text-center lg:w-72">We've emailed you a 6-digit verification code. Please enter it below to confirm your Email Address..</p>
            <form action="" class="mt-9">
              <div class="mb-5">
                <label for="userEmail" class="form-label">
                  Enter your 6-digit code
                  <span class="text-danger">*</span>
                </label>

                <div class="two-factor flex gap-2">
                  <VOtpInput v-model:value="otp" :num-inputs="6" input-classes="form-input text-center mx-1" input-type="tel" :is-input-num="true" :should-auto-focus="true" separator=" " />
                </div>
              </div>

              <div class="mb-5" data-password="bar">
                <label for="userPassword" class="form-label">
                  Password
                  <span class="text-danger">*</span>
                </label>
                <input type="password" id="userPassword" class="form-input" placeholder="••••••••" v-model="password" />
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
          </div>

          <p class="text-default-400 mt-7.5 text-center">
            Don’t have a code?
            <RouterLink to="" class="text-primary font-semibold underline underline-offset-3">Resend</RouterLink>
            or
            <RouterLink to="" class="text-primary font-semibold underline underline-offset-3">Call Us</RouterLink>
          </p>

          <p class="text-default-400 mt-7.5 text-center">
            Return to
            <RouterLink to="/auth/split/sign-in" class="text-primary font-semibold underline underline-offset-4">Sign in</RouterLink>
          </p>

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
