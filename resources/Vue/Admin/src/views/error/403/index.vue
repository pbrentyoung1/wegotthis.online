<template>
  <div class="flex min-h-screen items-center">
    <div class="container">
      <div class="flex justify-center lg:p-0 p-12.5">
        <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
          <div class="p-7.5">
            <div class="mb-4 flex flex-col items-center justify-center text-center">
              <AuthLogo />
            </div>
            <div class="p-9 text-center">
              <div class="error-glitch" data-text="403">403</div>
              <h3 class="mb-2 text-xl font-bold uppercase">Permission Required</h3>
              <p class="text-default-400 mx-auto">
                You don’t have the required permissions to view this page.
                <br />
                Please contact your administrator or try a different account.
              </p>
              <div class="mt-9 flex items-center justify-center gap-1.5">
                <RouterLink to="/" class="btn bg-primary text-white hover:bg-primary-hover"> Go to Dashboard</RouterLink>
                <a href="#!" class="btn border-secondary text-secondary hover:bg-secondary hover:text-white"> Back </a>
              </div>
            </div>
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
import { META_DATA, currentYear } from '~/config/constants'

</script>
