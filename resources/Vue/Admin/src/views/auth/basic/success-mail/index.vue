<template>
  <div class="flex min-h-screen items-center p-12.5">
    <div class="container">
      <div class="flex justify-center px-2.5">
        <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
          <div class="mb-3 flex flex-col items-center justify-center text-center">
            <AuthLogo />
            <p class="text-default-400 mx-auto mt-6 mb-4 w-full lg:w-3/4">Awesome! You’ve read the important message like a pro.</p>
          </div>
          <div class="card p-7.5 rounded-2xl">
            <form action="">
              <div class="mt-3 mb-9">
                <div class="bg-default-50 border-light mx-auto flex size-20 items-center justify-center rounded-full border border-dashed">
                  <img src="/images/checkmark.png" alt="checkmark" class="size-16" />
                </div>
              </div>

              <h4 class="mb-9 text-center text-lg font-bold">Well Done! Email verified Successfully</h4>

              <div>
                <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Back to dashboard</button>
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
