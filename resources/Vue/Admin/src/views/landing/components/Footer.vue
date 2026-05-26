<template>
  <footer class="bg-[#1e1f27] pt-12 pb-2.5 lg:pt-26">
    <div class="container">
      <div class="grid grid-cols-1 gap-7.5 xl:grid-cols-12">
        <div class="xl:col-span-3">
          <img :src="logo" alt="logo" class="h-7.5" />

          <p class="my-5 text-sm text-white/50">{{ META_DATA.name }} is the top-selling admin dashboard template on WrapBootstrap, known for its sleek design, flexibility, and powerful features. Build modern web applications with ease using the best in class!</p>

          <div class="mt-7.5 mb-2.5 flex gap-2.5">
            <RouterLink v-for="(link, index) in socialData" :key="index" to="" class="btn btn-sm btn-icon rounded-full bg-dark text-white" :title="link.title">
              <IconifyIcon :icon="link.icon" class="text-sm" />
            </RouterLink>
          </div>
        </div>

        <div class="lg:ms-auto lg:w-187.75 xl:col-span-9">
          <div class="grid grid-cols-2 gap-7.5 md:grid-cols-3">
            <div v-for="(section, index) in footerData" :key="index">
              <h5 class="mb-7.5 ps-2.5 text-white">{{ section.title }}</h5>

              <ul class="flex flex-col">
                <li v-for="(link, i) in section.link" :key="i" :class="['px-4 py-2 text-white/50', i === 0 ? 'pt-0' : '']">
                  <RouterLink :to="link.href" class="hover:text-white/80">
                    {{ link.title }}

                    <span v-if="link.badge" :class="['badge ms-2.5', link.badge.className]">
                      {{ link.badge.title }}
                    </span>
                  </RouterLink>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-15">
        <div class="text-center">
          <p class="mb-7.5 text-white/50">
            © 2014 - {{ currentYear }} {{ META_DATA.name }} By

            <span class="fw-semibold">{{ META_DATA.author }}</span>
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import { currentYear, META_DATA } from '~/config/constants'
import { footerData, socialData } from './data'
import logo from '/images/logo.png'
</script>
