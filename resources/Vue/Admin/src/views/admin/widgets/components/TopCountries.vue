<template>
  <CardWithAction title="Top 10 Countries" isCloseable isCollapsible isReloadable>
    <div>
      <div v-for="(country, idx) in topCountriesData" :key="idx" :class="`flex items-center gap-2.5 ${idx !== topCountriesData.length - 1 ? 'mb-5' : ''}`">
        <span class="text-sm font-medium text-default-400 italic"> {{ String(country.rank).padStart(2, '0') }}. </span>

        <img :src="country.image" :alt="country.name" class="size-4 rounded" />

        <h5 class="font-medium">
          <a href="#" class="hover:text-primary">
            {{ country.name }}
          </a>
        </h5>

        <div class="ms-auto">
          <div class="flex items-center gap-5">
            <p class="font-medium">
              {{ country.visitors.toLocaleString() }}
            </p>

            <p :class="['badge badge-label mb-0 text-2xs', country.className]">{{ country.change > 0 ? '+' : '' }}{{ country.change }}%</p>
          </div>
        </div>
      </div>

      <div class="mt-2.5 text-center">
        <RouterLink to="" class="link-offset-3 flex items-center justify-center font-semibold underline hover:text-primary"> View all Countries <Icon icon="world" /> </RouterLink>
      </div>
    </div>
  </CardWithAction>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import CardWithAction from '~/components/CardWithAction.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { topCountriesData } from './data'
</script>
