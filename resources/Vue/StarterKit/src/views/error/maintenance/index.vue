<template>
  <div class="flex min-h-screen items-center">
    <div class="container">
      <div class="flex justify-center lg:p-0 p-12.5">
        <div class="w-full lg:w-1/2">
          <div class="card rounded-2xl">
            <div class="card-body p-12.5">
              <div class="flex flex-col items-center justify-center text-center">
                <AuthLogo />
              </div>

              <div class="p-3 text-center mt-5">
                <img src="/images/maintenance.svg" alt="Maintenance" class="mx-auto md:size-64" />
                <h3 class="mb-2 text-xl font-bold uppercase">Site Under Maintenance</h3>
                <p class="text-default-400">
                  We’re currently performing scheduled maintenance.
                  <br />
                  Please check back soon.
                </p>
                <div class="mt-8 flex items-center justify-center gap-2 flex-wrap">
                  <button class="btn bg-primary text-white hover:bg-primary-hover rounded-full">Call Support</button>
                  <button class="btn bg-info text-white hover:bg-info-hover rounded-full">Send Email</button>
                </div>
              </div>

              <p class="text-default-400 mt-18 text-center">
                © {{ currentYear }} {{ META_DATA.name }} - by
                <span>{{ META_DATA.author }}</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import AuthLogo from '~/components/AuthLogo.vue'
import { currentYear, META_DATA } from '~/config/constants'

</script>
