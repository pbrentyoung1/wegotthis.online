<template>
  <section class="pt-12 pb-15 lg:pt-26" id="services">
    <div class="container">
      <div class="text-center">
        <span class="inline-block rounded-xl text-default-400"> 🚀 Empowering your digital journey </span>

        <h2 class="mt-5 mb-15 text-xl font-bold md:text-2xl">
          Discover Our
          <mark class="bg-warning/20 text-default-800 italic">Core Services</mark>
          and Capabilities
        </h2>
      </div>

      <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-2 xl:grid-cols-4">
        <div v-for="(service, index) in serviceData" :key="index" class="card h-full border-0 p-2">
          <div class="card-body pb-0">
            <div class="mb-5">
              <span class="flex size-12 items-center justify-center rounded-full bg-secondary text-white">
                <IconifyIcon :icon="service.icon" class="text-2xl" />
              </span>
            </div>

            <h4 class="mb-2.5 text-lg">{{ service.title }}</h4>

            <p class="mb-5 text-default-400">
              {{ service.description }}
            </p>
          </div>

          <div class="card-footer border-0 pt-0 pb-3.75">
            <RouterLink to="" class="flex items-center font-semibold text-primary hover:text-primary-hover">
              Know more
              <IconifyIcon icon="tabler:arrow-right" class="ms-2 align-middle" />
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import { serviceData } from './data'
</script>
