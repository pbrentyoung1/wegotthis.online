<template>
  <div class="flex min-h-screen items-center">
    <div class="container">
      <div class="flex justify-center lg:p-0 p-12.5">
        <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
          <div class="p-7.5">
            <div class="mb-4 flex flex-col items-center justify-center text-center">
              <AuthLogo />
            </div>
            <div class="p-3 text-center">
              <div class="error-glitch" data-text="400">400</div>
              <h3 class="mb-2 text-xl font-bold uppercase">Oops! Invalid Request</h3>
              <p class="text-default-400">The request couldn’t be processed. Please check the URL or try again.</p>
              <div class="flex justify-center gap-3 mt-7.5">
                <RouterLink to="" class="btn border border-secondary text-secondary hover:text-white hover:bg-secondary"> Go Back </RouterLink>
                <RouterLink to="" class="btn bg-primary text-white hover:bg-primary-hover"> Back to Dashboard </RouterLink>
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
import { currentYear, META_DATA } from '~/config/constants'

</script>
