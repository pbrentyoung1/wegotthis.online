<template>
  <RouterLink to="/" class="auth-logo">
    <img :src="logoDark" alt="logo" class="flex dark:hidden" />
    <img :src="logo" alt="dark logo" class="hidden dark:flex" />
  </RouterLink>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
const logoDark = '/images/logo-black.png'
const logo = '/images/logo.png'
</script>
