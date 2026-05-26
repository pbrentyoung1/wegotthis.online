<template>
  <div class="auth-box d-flex align-items-center">
    <BContainer fluid="xxl">
      <BRow class="align-items-center justify-content-center">
        <BCol xl="10">
          <BCard no-body class="rounded-3 p-0 rounded-4 border-0">
            <BCardBody class="p-0">
              <BRow class="justify-content-between g-0">
                <BCol lg="6">
                  <BCard no-body class="mb-0 border-0 rounded-4">
                    <BCardBody>
                      <div class="auth-brand text-center mb-3">
                        <AuthLogo />
                      </div>

                      <div class="p-2 text-center">
                        <div class="error-wave-container error-text-alt justify-content-center gap-1">
                          <span class="error-wave-char">4</span>
                          <span class="error-wave-char">0</span>
                          <span class="error-wave-char">8</span>
                        </div>

                        <h3 class="fw-bold text-uppercase">Request Timeout</h3>
                        <p class="text-muted">Your request took too long, and the server timed out. Please try again later.</p>

                        <Link href="/" class="btn btn-primary mt-3 rounded-pill">Back to Safety</Link>
                      </div>
                      <p class="text-center text-muted mt-5 mb-0">
                        © {{ currentYear }} {{ META_DATA.name }} — by
                        <span class="fw-bold">{{ META_DATA.author }}</span>
                      </p>
                    </BCardBody>
                  </BCard>
                </BCol>

                <BCol lg="6" class="d-none d-lg-block">
                  <div class="h-100 position-relative card-side-img rounded-end-4 overflow-hidden" style="background-image: url('/images/auth.jpg')">
                    <div class="p-4 card-img-overlay rounded-start-0 auth-overlay d-flex align-items-end justify-content-center"></div>
                  </div>
                </BCol>
              </BRow>
            </BCardBody>
          </BCard>
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
