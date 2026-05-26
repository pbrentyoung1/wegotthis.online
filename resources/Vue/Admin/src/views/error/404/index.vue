<template>
  <div class="flex min-h-screen items-center">
    <div class="container">
      <div class="flex justify-center lg:p-0 p-12.5">
        <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
          <div class="p-7.5">
            <div class="mb-5 flex flex-col items-center justify-center text-center">
              <AuthLogo />
            </div>
            <div class="p-6 text-center">
              <img src="/images/svg/404.svg" alt="Maintenance" class="mx-auto md:size-64" />
              <h3 class="mb-2 text-xl font-bold uppercase">Page Not Found</h3>
              <p class="text-default-400 mx-auto">We couldn’t find the page you were looking for. It might have been moved or deleted.</p>
              <div class="mt-8 flex items-center justify-center gap-1.5">
                <RouterLink to="/" class="btn bg-primary text-white hover:bg-primary-hover"> Back to Home</RouterLink>
                <button class="btn border-info text-info hover:bg-info hover:text-white">Search</button>
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
