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
            <h4 class="font-bold mb-2 text-default-900 text-lg text-center">Create New Account</h4>
            <p class="text-default-400 mb-4 mx-auto w-full text-center lg:w-3/4">Create your account by entering the form below.</p>

            <form action="" class="mt-9">
              <div class="mb-6">
                <label for="userName" class="form-label">
                  Full Name
                  <span class="text-danger">*</span>
                </label>
                <div class="input-icon-group">
                  <Icon icon="user" class="input-icon" />
                  <input type="text" class="form-input" id="userName" :placeholder="META_DATA.username" required />
                </div>
              </div>

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

              <div class="mb-5" data-password="bar">
                <label for="userPassword" class="form-label">
                  Password
                  <span class="text-danger">*</span>
                </label>
                <div class="input-icon-group">
                  <Icon icon="lock-password" class="input-icon" />
                  <input type="password" id="userPassword" class="form-input" placeholder="••••••••" v-model="password" />
                </div>
                <PasswordStrengthBar :password="password" />
              </div>

              <div class="mb-6">
                <div class="flex items-center gap-2">
                  <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" id="termAndPolicy" />
                  <label class="form-check-label" for="termAndPolicy">Agree the Terms & Policy</label>
                </div>
              </div>

              <div>
                <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Create Account</button>
              </div>
            </form>

            <p class="text-default-400 mt-7.5 text-center">
              Already have an account?
              <RouterLink to="/auth/split/sign-in" class="text-primary font-semibold underline underline-offset-4">Login</RouterLink>
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
import AuthLogo from '~/components/AuthLogo.vue'
import PasswordStrengthBar from '~/components/PasswordStrengthBar.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { currentYear, META_DATA } from '~/config/constants'

const password = ref('')

</script>
