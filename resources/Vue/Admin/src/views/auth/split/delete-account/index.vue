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
            <form action="">
              <div class="mt-3 mb-9">
                <div class="bg-default-50 border-light mx-auto flex size-20 items-center justify-center rounded-full border border-dashed">
                  <img src="/images/delete.png" alt="checkmark" class="size-16 object-contain" />
                </div>
              </div>

              <h4 class="mb-5 text-center text-lg font-bold">Account Deactivated</h4>
              <p class="text-default-400 mx-auto mb-9 text-center">Your account is currently inactive. Reactivate now to regain access to all features and opportunities.</p>

              <div>
                <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Reactivate Now</button>
              </div>
            </form>
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
import { currentYear, META_DATA } from '~/config/constants'

</script>
