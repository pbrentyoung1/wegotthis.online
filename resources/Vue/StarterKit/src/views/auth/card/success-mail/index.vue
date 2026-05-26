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
                </div>

                <form action="">
                  <div class="mt-3 mb-9">
                    <div class="bg-default-50 border-light mx-auto flex size-20 items-center justify-center rounded-full border border-dashed">
                      <img src="/images/checkmark.png" alt="checkmark" class="size-16" />
                    </div>
                  </div>

                  <h4 class="mb-9 text-center text-lg font-bold">Well Done! Email verified Successfully</h4>

                  <div>
                    <button type="submit" class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Back to Dashboard</button>
                  </div>
                </form>

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
import AuthLogo from '~/components/AuthLogo.vue'
import { currentYear, META_DATA } from '~/config/constants'

</script>

<style lang="scss" scoped></style>
