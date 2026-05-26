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
                  <h4 class="text-default-900 mt-7.5 mb-2 text-base font-bold">Create New Account</h4>
                  <p class="text-default-400 mx-auto w-full lg:w-3/4">Let’s get you started. Create your account by entering your details below.</p>
                </div>

                <form action="">
                  <div class="mb-5">
                    <label for="userName" class="form-label">
                      Name
                      <span class="text-danger">*</span>
                    </label>
                    <div class="input-icon-group">
                      <Icon icon="user" class="input-icon" />
                      <input type="text" class="form-input" id="userName" :placeholder="META_DATA.username" required />
                    </div>
                  </div>

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

                  <div class="mb-5" data-password="bar">
                    <label for="userPassword" class="form-label">
                      Password
                      <span class="text-danger">*</span>
                    </label>
                    <div class="input-icon-group">
                      <Icon icon="lock-password" class="input-icon" />
                      <input v-model="password" type="password" id="userPassword" class="form-input" placeholder="••••••••" />
                    </div>
                    <PasswordStrengthBar :password="password" />
                  </div>

                  <div class="mb-5">
                    <div class="flex items-center gap-2">
                      <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" id="termAndPolicy" checked />
                      <label class="form-check-label" for="termAndPolicy">Agree the Terms & Policy</label>
                    </div>
                  </div>

                  <div>
                    <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Create Account</button>
                  </div>
                </form>

                <p class="text-default-400 mt-7.5 text-center">
                  Already have an account?
                  <RouterLink to="/auth/card/sign-in" class="text-primary font-semibold underline underline-offset-4">Login</RouterLink>
                </p>

                <p class="text-default-400 mt-7.5 text-center">
                  © {{ currentYear }} {{ META_DATA.name }} - by
                  <span>{{ META_DATA.author }}</span>
                </p>
              </div>
              <div class="relative hidden h-full overflow-hidden rounded-e-2xl bg-cover bg-center object-cover lg:block" style="background-image: url(/images/auth.jpg)">
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
import { ref } from 'vue'
import AuthLogo from '~/components/AuthLogo.vue'
import PasswordStrengthBar from '~/components/PasswordStrengthBar.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { currentYear, META_DATA } from '~/config/constants'

const password = ref('')

</script>
