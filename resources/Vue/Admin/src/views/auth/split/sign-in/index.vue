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
            <h4 class="font-bold mb-2 text-default-900 text-lg text-center">Welcome to Admin</h4>
            <p class="text-default-400 mb-4 mx-auto w-full text-center lg:w-3/4">You’re just one step away - sign in to continue.</p>

            <form action="" class="mt-9">
              <div class="mb-6">
                <label for="userEmail" class="form-label">
                  Email address
                  <span class="text-danger">*</span>
                </label>
                <div class="input-icon-group">
                  <Icon icon="mail" class="input-icon" />
                  <input type="email" class="form-input" id="userEmail" placeholder="you&#64;example.com" required />
                </div>
              </div>

              <div class="mb-6">
                <label for="userPassword" class="form-label">
                  Password
                  <span class="text-danger">*</span>
                </label>
                <div class="input-icon-group">
                  <Icon icon="lock-password" class="input-icon" />
                  <input type="password" class="form-input" id="userPassword" placeholder="••••••••" required />
                </div>
              </div>

              <div class="mb-5 flex items-center justify-between">
                <div class="flex items-start gap-2 lg:items-center">
                  <input class="form-checkbox form-checkbox-light mt-1 size-4.25 lg:mt-0" type="checkbox" id="rememberMe" checked />
                  <label class="form-check-label" for="rememberMe">Keep me signed in</label>
                </div>
                <RouterLink to="/auth/split/reset-pass" class="text-default-400 underline underline-offset-4">Forgot Password?</RouterLink>
              </div>

              <div>
                <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Sign In</button>
              </div>
            </form>

            <p class="text-default-400 mt-7.5 text-center">
              New here?
              <RouterLink to="/auth/split/sign-up" class="text-primary font-semibold underline underline-offset-4">Create an account</RouterLink>
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
import Icon from '~/components/wrappers/Icon.vue'
import { currentYear, META_DATA } from '~/config/constants'

</script>
