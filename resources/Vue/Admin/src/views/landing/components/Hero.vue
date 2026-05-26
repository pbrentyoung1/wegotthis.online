<template>
  <section class="bg-light/50 border-t border-light relative" id="hero">
    <div class="absolute top-0 inset-s-1/2 -translate-x-1/2 mt-15">
      <img :src="bgPattern" alt="" />
    </div>

    <div class="relative container pt-15">
      <div class="lg:w-8/12 mx-auto text-center">
        <span class="font-semibold text-default-400 italic">Trusted by 50k+ happy customers</span>

        <div class="flex justify-center items-center -space-x-2 mt-2.5">
          <div v-for="(item, index) in userData" :key="index">
            <img :src="item.image" :alt="item.name" class="size-8 rounded-full hover:-translate-y-0.75 transition-all duration-300" />
          </div>
        </div>

        <h1 class="my-7.5 text-4xl font-bold">
          The #1 <span class="text-primary">Admin Dashboard</span> Template on Wrapmarket –
          <span class="text-default-400 italic">Trusted by Thousands</span>
        </h1>

        <p class="mb-7.5 text-sm leading-6.5 text-default-400">
          Build powerful, modern web applications with our top-rated Admin Dashboard Template. Designed for performance, flexibility, and ease of customization, it’s the perfect solution for startups, agencies, and enterprise teams.
        </p>

        <div class="flex flex-wrap justify-center gap-2.5">
          <RouterLink class="btn bg-secondary py-2.5 font-semibold text-white hover:bg-secondary-hover" :to="META_DATA.buyUrl">
            <IconifyIcon icon="tabler:basket" class="me-2 text-xl" />
            Buy Now!
          </RouterLink>

          <a class="btn bg-light py-2.5 font-semibold hover:text-primary" href="https://wrapbootstrap.com/user/WebAppLayers/message" target="_blank">
            <IconifyIcon icon="tabler:confetti" class="me-2 text-xl" />
            Contact Us
          </a>
        </div>
      </div>

      <div class="relative container">
        <div class="relative mx-auto md:w-5/6">
          <figure class="absolute inset-s-0 top-0 -ms-3 -translate-1/2 opacity-50">
            <svg width="111" height="170" viewBox="0 0 111 170" fill="#1AB394" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M99.2319 7.37436C100.054 7.30936 101.638 15.7474 102.856 26.059C104.147 36.3089 105.01 48.3589 105.287 55.3911C105.778 69.3822 104.459 80.6992 102.753 80.7559C100.986 80.7391 99.5737 69.5262 99.0765 55.6027C98.7941 48.638 98.612 36.5788 98.4807 26.2931C98.3494 16.0074 98.3422 7.43353 99.2319 7.37436Z"
              />
              <path
                d="M80.3888 75.0118C79.555 75.2119 77.8208 71.6599 75.6665 67.4591C73.5063 63.3259 70.8525 58.6057 69.3802 55.9609C66.4471 50.5361 64.4804 45.7392 65.8687 44.6345C67.1836 43.5915 71.6484 47.0394 74.8842 52.8986C76.5416 55.7636 78.7318 61.1241 79.8822 65.9185C81.0327 70.7128 81.2226 74.8118 80.3888 75.0118Z"
              />
              <path
                d="M61.7883 89.4615C61.3805 90.2428 54.8078 87.5652 47.1688 83.8428C39.5297 80.1205 30.9035 75.2241 26.0659 72.1522C16.3908 66.0084 9.53733 59.4962 10.5438 58.0863C11.5502 56.6764 19.903 60.8007 29.4489 66.8652C34.2189 69.9313 42.3932 75.3329 49.4043 80.0217C56.4097 84.7779 62.1902 88.7478 61.7883 89.4615Z"
              />
              <path
                d="M46.1586 113.626C46.0151 114.498 42.6533 114.82 38.7186 114.684C34.7105 114.609 30.1297 114.077 27.4574 113.506C22.1804 112.369 18.3033 109.993 18.7195 108.328C19.1356 106.663 23.5897 106.299 28.7317 107.424C31.2689 107.984 35.6563 109.18 39.43 110.39C43.2037 111.601 46.2962 112.821 46.1586 113.626Z"
              />
              <path
                d="M52.2364 144.838C52.4365 145.672 46.3447 147.663 39.1256 150.101C31.9065 152.538 23.5601 155.423 18.719 157.114C9.04856 160.36 0.851466 162.305 0.169487 160.749C-0.512493 159.193 6.75837 154.583 16.7107 151.225C21.6868 149.545 30.3976 147.169 38.0635 145.858C45.6002 144.469 52.0363 144.005 52.2364 144.838Z"
              />
            </svg>
          </figure>

          <img :src="dashboard1" class="mt-15 rounded-t-md shadow-lg" alt="saas-img" />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import { META_DATA } from '~/config/constants'
import { userData } from './data'
import bgPattern from '/images/bg-pattern.png'
import dashboard1 from '/images/dashboard-1.png'
</script>
