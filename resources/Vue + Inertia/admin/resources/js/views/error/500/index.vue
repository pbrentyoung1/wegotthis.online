<template>
  <div class="auth-box p-0 w-100">
    <BRow class="w-100 g-0">
      <BCol>
        <div class="h-100 position-relative card-side-img rounded-0 overflow-hidden" style="background-image: url('/images/auth.jpg')">
          <div class="p-4 card-img-overlay auth-overlay d-flex align-items-end justify-content-center"></div>
        </div>
      </BCol>

      <BCol xl="auto">
        <BCard no-body class="auth-box-form border-0 mb-0">
          <BCardBody class="min-vh-100 d-flex flex-column justify-content-center">
            <div class="p-2 text-center mt-auto">
              <img src="/images/svg/500.svg" alt="500" class="img-fluid" />
              <h3 class="fw-bold text-uppercase">Internal Server Error</h3>
              <p class="text-muted">Something went wrong on our end. Please try again later.</p>

              <Link href="/" class="btn btn-primary mt-3 rounded-pill">Go Home</Link>
            </div>

            <p class="text-center text-muted mt-auto mb-0">
              © {{ currentYear }} {{ META_DATA.name }} — by
              <span class="fw-bold">{{ META_DATA.author }}</span>
            </p>
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { currentYear, META_DATA } from '@/config/constants'

</script>

<style scoped></style>
