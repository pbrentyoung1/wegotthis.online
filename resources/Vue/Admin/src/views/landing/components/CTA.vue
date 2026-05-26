<template>
  <section class="relative min-h-87.5 overflow-hidden bg-cover bg-center bg-no-repeat" :style="`background-image: url(${landingCTA});`">
    <div class="absolute inset-s-0 start-0 end-0 inset-e-0 top-0 bottom-0 flex flex-col items-center justify-center gap-5 rounded-xl bg-linear-to-t from-[#313a46] via-[rgba(49,58,70,0.8)] to-[rgba(49,58,70,0.5)] text-center">
      <h3 class="text-2xl font-bold text-white">Build Faster with Our Premium Admin Template</h3>
      <p class="text-base text-white/75">
        Kickstart your project with a modern, responsive, and developer-friendly admin dashboard.
        <br />
        Try it free for 14 days — no credit card needed.
      </p>
      <RouterLink to="" class="btn rounded-full bg-light text-default-800 hover:text-primary"> Buy Our Template </RouterLink>
    </div>
  </section>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import landingCTA from '/images/landing-cta.jpg'
</script>
