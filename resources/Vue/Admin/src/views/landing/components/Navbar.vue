<template>
  <div id="alert" class="relative bg-[#1E1F27] px-4 py-3 text-sm text-white transition-all duration-300 dark:bg-primary hs-removing:-translate-x-3 hs-removing:opacity-0" role="alert">
    <div class="relative flex items-start justify-center lg:items-center">
      <p class="text-center font-medium italic">
        🚀 {{ META_DATA.name }} is here! Now powered by Tailwind CSS 4.x, Bootstrap, multi-framework support, dark mode, and a completely refreshed UI. Upgrade today for the best experience!
        <a :href="META_DATA.buyUrl" target="_blank" class="ms-2 font-semibold text-white not-italic underline underline-offset-4"> Buy Now! </a>
      </p>
    </div>
  </div>

  <header class="bg-card dark:bg-body-bg">
    <nav class="container py-5">
      <div class="flex flex-wrap items-center justify-between">
        <div>
          <RouterLink to="/" class="inline-block">
            <img :src="logoBlack" alt="dark logo" class="block h-6.5 lg:h-8 dark:hidden" />
          </RouterLink>
          <RouterLink to="/" class="inline-block">
            <img :src="logo" alt="logo" class="hidden h-6.5 lg:h-8 dark:block" />
          </RouterLink>
        </div>

        <div class="flex items-center gap-x-2 lg:hidden">
          <button type="button" class="hs-collapse-toggle btn btn-icon relative border border-default-300 py-1" id="hs-navbar-alignment-collapse" aria-expanded="false" aria-controls="hs-navbar-alignment" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-alignment">
            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <line x1="3" x2="21" y1="6" y2="6" />
              <line x1="3" x2="21" y1="12" y2="12" />
              <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
          </button>
        </div>

        <div id="hs-navbar-alignment" class="hs-collapse hidden w-full overflow-hidden transition-all duration-300 lg:block lg:w-auto" aria-labelledby="hs-navbar-alignment-collapse" role="region">
          <div class="mt-2.5 flex flex-col gap-y-2 lg:mt-0 lg:flex-row lg:items-center lg:gap-1.25">
            <a class="py-2 text-sm text-default-700 hover:text-primary lg:p-2" href="#hero">Home </a>
            <a class="py-2 text-sm text-default-700 hover:text-primary lg:p-2" href="#services"> Services</a>
            <a class="py-2 text-sm text-default-700 hover:text-primary lg:p-2" href="#features"> Features</a>
            <a class="py-2 text-sm text-default-700 hover:text-primary lg:p-2" href="#plans">Plans </a>
            <a class="py-2 text-sm text-default-700 hover:text-primary lg:p-2" href="#reviews">Reviews </a>
            <a class="py-2 text-sm text-default-700 hover:text-primary lg:p-2" href="#blog">Blog </a>
            <a class="py-2 text-sm text-default-700 hover:text-primary lg:p-2" href="#contact">Contact </a>
          </div>

          <div class="flex gap-x-2 lg:hidden lg:items-center">
            <RouterLink to="/auth/sign-in" class="btn ps-2 font-semibold">SIGN IN</RouterLink>
            <RouterLink to="/auth/sign-up" class="btn btn-sm bg-primary text-white hover:bg-primary-hover"> Sign Up </RouterLink>
          </div>
        </div>

        <div class="hidden gap-x-2 lg:flex lg:items-center">
          <RouterLink to="/auth/sign-in" class="btn ps-2 font-semibold">SIGN IN</RouterLink>
          <RouterLink to="/auth/sign-up" class="btn btn-sm bg-primary text-white hover:bg-primary-hover"> Sign Up </RouterLink>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { META_DATA } from '~/config/constants'
import logoBlack from '/images/logo-black.png'
import logo from '/images/logo.png'
</script>
