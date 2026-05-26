<template>
  <BAlert v-model="showDismissibleAlert" variant="primary" class="top-alert mb-0 rounded-0 w-100 position-relative" body-class="d-flex align-items-center justify-content-center w-100">
    <div class="fst-italic fw-medium text-center">
      🚀 {{ META_DATA.name }} 4.x is here! Now with Bootstrap 5, dark mode, and a refreshed UI. Upgrade today for the best experience!
      <a :href="META_DATA.buyUrl" target="_blank" class="fw-semibold fst-normal text-white text-decoration-underline link-offset-3 ms-2"> Buy Now! </a>
    </div>
    <button class="btn-close btn-close-white position-absolute end-0 me-3" style="top: 50%; transform: translateY(-50%)" @click="closeAlert" />
  </BAlert>

  <header>
    <BNavbar id="landing-navbar" :container="false" toggleable="lg" :class="['py-3', 'sticky-top', isSticky ? 'top-scroll-up top-fixed' : '']">
      <div class="container">
        <div class="auth-brand d-inline-block mb-0">
          <Link href="/" class="logo-dark">
            <img src="/images/logo-black.png" alt="dark logo" height="32" />
          </Link>
          <Link href="/" class="logo-light">
            <img src="/images/logo.png" alt="logo" height="32" />
          </Link>
        </div>

        <BNavbarToggle target="nav-collapse" />

        <BCollapse id="nav-collapse" v-model="isCollapsed" is-nav>
          <BNavbarNav class="fw-medium gap-2 fs-sm mx-auto mt-2 mt-lg-0">
            <BNavItem v-for="item in navItems" :key="item" href="javascript:void(0)" @click="scroll.scrollTo(item)">
              {{ item }}
            </BNavItem>
          </BNavbarNav>

          <div class="d-flex align-items-center">
            <BButton variant="link" class="btn-icon fw-semibold text-body" @click="toggleTheme">
              <IconifyIcon icon="tabler:contrast" class="fs-22" />
            </BButton>
            <Link href="/auth/sign-in" class="btn btn-link fw-semibold text-body ps-2"> SIGN IN </Link>
            <Link href="/auth/sign-up" class="btn btn-sm btn-primary"> Sign Up </Link>
          </div>
        </BCollapse>
      </div>
    </BNavbar>
  </header>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import { storeToRefs } from 'pinia'
import { onMounted, ref } from 'vue'
import { META_DATA } from '@/config/constants'
import { useLayout } from '@/stores/layout'

const showDismissibleAlert = ref(true)
const isCollapsed = ref(false)
const isSticky = ref(false)
const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore

const toggleTheme = () => {
  updateLayout({ theme: layout.value.theme === 'light' ? 'dark' : 'light' })
}

const navItems = ['Home', 'Services', 'Features', 'Plans', 'Reviews', 'Blog', 'Contact']

const scroll = {
  scrollTo: (section: string) => {
    document.getElementById(section.toLowerCase())?.scrollIntoView({ behavior: 'smooth' })
  },
}

const closeAlert = () => {
  showDismissibleAlert.value = false
}
onMounted(() => {
  window.addEventListener('scroll', () => {
    isSticky.value = window.scrollY > 20
  })
})
</script>

<style scoped></style>
