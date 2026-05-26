<template>
  <div class="flex min-h-screen items-center">
    <div class="container">
      <div class="flex justify-center lg:p-0 p-12.5">
        <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
          <div class="p-7.5">
            <div class="mb-5 flex flex-col items-center justify-center text-center">
              <AuthLogo />
            </div>
            <div class="p-9 text-center">
              <div class="error-wave-container justify-center gap-1">
                <span class="error-wave-char">4</span>
                <span class="error-wave-char">0</span>
                <span class="error-wave-char">8</span>
              </div>
              <h3 class="mb-2 text-xl font-bold uppercase">Connection Timed Out</h3>
              <p class="text-default-400">The request took too long to respond. Please check your connection and try again.</p>
              <div class="mt-8 flex items-center justify-center gap-1.5">
                <button class="btn bg-primary text-white hover:bg-primary-hover">Try Again</button>
                <button class="btn border-info text-info hover:bg-info hover:text-white">Get Help</button>
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
import AuthLogo from '~/components/AuthLogo.vue'
import { META_DATA, currentYear } from '~/config/constants'

</script>
