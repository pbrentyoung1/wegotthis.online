<template>
  <div class="flex min-h-screen items-center p-12.5">
    <div class="container">
      <div class="flex justify-center px-2.5">
        <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
          <div class="mb-3 flex flex-col items-center justify-center text-center">
            <AuthLogo />
            <h4 class="font-bold text-base text-dark mt-5 mb-2">Welcome</h4>
            <p class="text-default-400 mx-auto w-full lg:w-3/4 mb-4">Let’s get you signed in. Enter your email and password to continue.</p>
          </div>
          <div class="card p-7.5 rounded-2xl">
            <form @submit.prevent="handleSubmit">
              <div class="mb-5">
                <label for="userEmail" class="form-label">
                  Email address
                  <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <input v-model="form.email" type="email" class="form-input" id="userEmail" placeholder="you&#64;example.com" required />
                </div>
              </div>

              <div class="mb-5">
                <label for="userPassword" class="form-label">
                  Password
                  <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <input v-model="form.password" type="password" class="form-input" id="userPassword" placeholder="••••••••" required />
                </div>
              </div>

              <div class="mb-5 flex items-center justify-between gap-2">
                <div class="flex items-start gap-2 lg:items-center">
                  <input class="form-checkbox form-checkbox-light mt-1 size-4.25 lg:mt-0" type="checkbox" id="rememberMe" checked />
                  <label class="form-check-label" for="rememberMe">Keep me signed in</label>
                </div>
                <RouterLink to="/auth/reset-pass" class="text-default-400 underline underline-offset-4">Forgot Password?</RouterLink>
              </div>

              <div>
                <button :disabled="loading" type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Sign In</button>
              </div>
            </form>

            <p class="text-default-400 mt-7.5 text-center">
              New here?
              <RouterLink to="/auth/sign-up" class="text-primary font-semibold underline underline-offset-4">Create an account</RouterLink>
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
import { reactive } from 'vue'
import AuthLogo from '~/components/AuthLogo.vue'
import { useAuth } from '~/composables/useAuth'
import { currentYear, META_DATA } from '~/config/constants'

const { login, loading } = useAuth()

const form = reactive({
  email: 'admin@example.com',
  password: 'password',
})

const handleSubmit = () => {
  login(form.email, form.password)
}

</script>
