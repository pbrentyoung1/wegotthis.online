<template>
  <div class="flex min-h-screen items-center p-12.5">
    <div class="container">
      <div class="flex justify-center">
        <div class="xl:w-5/6">
          <div class="card rounded-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-2">
              <div class="card-body relative p-12.5">
                <div class="mb-7.5 flex flex-col items-center justify-center text-center">
                  <AuthLogo />
                  <h4 class="mt-7.5 mb-2 text-base font-bold">Welcome to Admin</h4>
                  <p class="text-default-400 mx-auto w-full lg:w-3/4">Let’s get you signed in. Enter your email and password to continue.</p>
                </div>

                <div class="rounded-md">
                  <form>
                    <div class="mb-5">
                      <label for="userEmail" class="form-label">
                        Email address
                        <span class="text-danger">*</span>
                      </label>
                      <div class="input-icon-group">
                        <Icon icon="mail" class="input-icon" />
                        <input type="email" class="form-input" id="userEmail" placeholder="you&#64;example.com" required />
                      </div>
                    </div>

                    <div class="mb-5">
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
                        <input class="form-checkbox form-checkbox-light mt-1 size-4.25 lg:mt-0" type="checkbox" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">Keep me signed in</label>
                      </div>
                      <RouterLink to="/auth/card/reset-pass" class="text-default-400 underline underline-offset-4">Forgot Password?</RouterLink>
                    </div>

                    <div>
                      <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Sign In</button>
                    </div>
                  </form>

                  <p class="text-default-400 mt-7.5 text-center">
                    New here?
                    <RouterLink to="/auth/card/sign-up" class="text-primary font-semibold underline underline-offset-4">Create an account</RouterLink>
                  </p>

                  <p class="text-default-400 mt-7.5 text-center">
                    © {{ currentYear }} {{ META_DATA.name }} - by
                    <span>{{ META_DATA.author }}</span>
                  </p>
                </div>
              </div>
              <div class="relative hidden h-full overflow-hidden rounded-e-2xl bg-cover bg-center object-cover lg:block" style="background-image: url('/images/auth.jpg')">
                <div class="absolute inset-0 flex items-end justify-center rounded-e-sm p-9 [background:linear-gradient(to_top,#313a46,rgba(49,58,70,.8),rgba(49,58,70,.5))]"></div>
              </div>
            </div>
          </div>
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
