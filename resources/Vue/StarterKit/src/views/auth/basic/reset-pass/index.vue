<template>
  <div class="flex min-h-screen items-center p-12.5">
    <div class="container">
      <div class="flex justify-center px-2.5">
        <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
          <div class="mb-3 flex flex-col items-center justify-center text-center">
            <AuthLogo />
            <h4 class="font-bold text-base text-dark mt-5 mb-2">Forgot Password?</h4>
            <p class="text-default-400 mx-auto w-full lg:w-3/4 mb-4">Enter your email address and we'll send you a link to reset your password.</p>
          </div>
          <div class="card p-7.5 rounded-2xl">
            <form action="">
              <div class="mb-5">
                <label for="userEmail" class="form-label">
                  Email address
                  <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <input type="email" class="form-input" id="userEmail" placeholder="you&#64;example.com" required />
                </div>
              </div>

              <div class="mb-6">
                <div class="flex items-center gap-2">
                  <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" id="rememberMe" />
                  <label class="form-check-label" for="rememberMe">Agree the Terms & Policy</label>
                </div>
              </div>

              <div>
                <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Send Request</button>
              </div>
            </form>

            <p class="text-default-400 mt-7.5 text-center">
              Return to
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
import AuthLogo from '~/components/AuthLogo.vue'
import { currentYear, META_DATA } from '~/config/constants'

</script>
