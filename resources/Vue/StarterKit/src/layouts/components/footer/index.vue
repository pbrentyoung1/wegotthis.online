<template>
  <footer class="footer">
    <div class="container-fluid">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-base">
        <div class="text-center md:text-start">
          © {{ currentYear }} {{ META_DATA.name }} By
          <span class="font-semibold">{{ META_DATA.author }}</span>
        </div>

        <div class="md:text-end hidden md:block">
          10GB of
          <span class="font-bold">250GB</span>
          Free.
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import { currentYear, META_DATA } from '~/config/constants'
</script>
