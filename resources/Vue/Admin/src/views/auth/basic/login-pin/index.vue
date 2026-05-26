<template>
  <div class="flex min-h-screen items-center p-12.5">
    <div class="container">
      <div class="flex justify-center px-2.5">
        <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
          <div class="mb-3 flex flex-col items-center justify-center text-center">
            <AuthLogo />

            <h4 class="font-bold text-base text-dark mt-5 mb-2">Login with PIN!</h4>
            <p class="text-default-400 mx-auto w-full lg:w-3/4 mb-4">This screen is locked. Enter your PIN to continue.</p>
          </div>
          <div class="card p-7.5 rounded-2xl">
            <form action="/">
              <div class="mb-9 text-center">
                <div class="border-default-300 mx-auto mb-3 size-20 rounded-full border-4">
                  <img src="/images/users/user-1.jpg" class="size-18 rounded-full" alt="thumbnail" />
                </div>
                <h5 class="text-lg">{{ META_DATA.username }}</h5>
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

              <div>
                <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Confirm</button>
              </div>
            </form>

            <p class="text-default-400 mt-7.5 text-center">
              Not you? Return to
              <RouterLink to="/auth/sign-in" class="text-primary font-semibold underline underline-offset-4">Sign in</RouterLink>
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
import { currentYear, META_DATA } from '~/config/constants'

const otp = ref('')

</script>

<style scoped></style>
