<template>
  <div class="auth-box p-0 w-100">
    <BRow class="w-100 g-0">
      <BCol>
        <div class="h-100 position-relative card-side-img rounded-0 overflow-hidden" style="background-image: url('/images/auth.jpg')">
          <div class="p-4 card-img-overlay auth-overlay d-flex align-items-end justify-content-center"></div>
        </div>
      </BCol>

      <BCol xl="auto">
        <div class="card auth-box-form border-0 mb-0">
          <div class="card-body min-vh-100 d-flex flex-column justify-content-center">
            <div class="auth-brand text-center">
              <AuthLogo />
            </div>

            <div class="p-2 text-center mt-auto">
              <div class="error-glitch" data-text="403">403</div>
              <h3 class="fw-bold text-uppercase">Forbidden</h3>
              <p class="text-muted">You don't have permission to access this resource.</p>

              <Link href="/" class="btn btn-primary mt-3 rounded-pill">Go Home</Link>
            </div>

            <p class="text-center text-muted mt-auto mb-0">
              © {{ currentYear }} {{ META_DATA.name }} — by
              <span class="fw-bold">{{ META_DATA.author }}</span>
            </p>
          </div>
        </div>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import AuthLogo from '@/components/AuthLogo.vue'
import { currentYear, META_DATA } from '@/config/constants'

</script>

<style scoped></style>
