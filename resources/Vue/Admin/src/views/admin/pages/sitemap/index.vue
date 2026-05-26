<template>
  <PageBreadcrumb title="Sitemap" subtitle="Pages" />

  <div class="container-fluid">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-base">
      <div v-for="(section, idx) in sitemapData" :key="idx" class="card">
        <div class="card-body">
          <h5 class="font-bold uppercase">{{ section.title }}</h5>

          <ul class="relative mt-base list-none">
            <li v-for="(item, itemIdx) in section.items" :key="itemIdx" class="relative before:absolute before:start-2 before:top-0 before:bottom-0 before:border-s before:border-dashed before:border-default-300 before:content-['']">
              <RouterLink :to="item.href" :class="['relative z-10 flex items-center gap-2 ps-8 font-semibold after:absolute after:start-2 after:top-3 after:w-4 after:border-t after:border-dashed after:border-default-300', item.itemClassName]">
                <Icon :icon="item.icon" v-if="item.icon" :class="['text-default-400', item.itemClassName]" />
                {{ item.title }}
              </RouterLink>

              <ul v-if="item.children" class="relative list-none space-y-1 ps-8 pt-2 pb-3">
                <li
                  v-for="(child, idx) in item.children"
                  :key="idx"
                  class="relative transition-all hover:text-primary before:absolute before:start-2 before:top-0 before:bottom-0 before:border-s before:border-dashed before:border-default-300 before:content-[''] after:absolute after:start-2 after:top-3 after:w-4 after:border-t after:border-dashed after:border-default-300"
                >
                  <RouterLink :to="child.href" class="relative z-10 inline-block ps-8">
                    {{ child.title }}
                  </RouterLink>

                  <ul v-if="child.children" class="relative list-none space-y-1 ps-8 pt-2">
                    <li
                      v-for="(subChild, subChildIdx) in child.children"
                      :key="subChildIdx"
                      class="relative transition-all hover:text-primary before:absolute before:start-2 before:top-0 before:h-3 before:border-s before:border-dashed before:border-default-300 before:content-[''] after:absolute after:start-2 after:top-3 after:w-4 after:border-t after:border-dashed after:border-default-300"
                    >
                      <RouterLink :to="subChild.href" class="relative z-10 inline-block ps-8">
                        {{ subChild.title }}
                      </RouterLink>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { sitemapData } from './components/data'
</script>
