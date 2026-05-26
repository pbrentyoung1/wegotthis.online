<template>
  <div class="auth-box overflow-hidden align-items-center d-flex">
    <BContainer>
      <BRow class="justify-content-center">
        <BCol cols="12" sm="8" md="6" xxl="4">
          <div class="auth-brand text-center mb-3">
            <AuthLogo />
          </div>

          <div class="p-2 text-center">
            <img src="/images/svg/404.svg" alt="404" class="img-fluid" />
            <h3 class="fw-bold text-uppercase">Page Not Found</h3>
            <p class="text-muted">The page you’re looking for doesn’t exist or has been moved.</p>

            <Link href="/" class="btn btn-primary mt-3 rounded-pill"> Go Home </Link>
          </div>

          <p class="text-center text-muted mt-5 mb-0">
            © {{ currentYear }} {{ META_DATA.name }} — by <span class="fw-bold">{{ META_DATA.author }}</span>
          </p>
        </BCol>
      </BRow>
    </BContainer>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import AuthLogo from '@/components/AuthLogo.vue'
import { currentYear, META_DATA } from '@/config/constants'

</script>

<style scoped></style>
