<template>
  <BCard class="card-out-of-container border-top-0" no-body>
    <div class="position-relative card-side-img overflow-hidden" style="height: 250px; background-image: url('/images/profile-bg.jpg')">
      <div class="p-4 card-img-overlay rounded-start-0 auth-overlay d-flex align-items-center justify-content-center">
        <h3 class="text-white mb-0 fst-italic">"Designing the future, one template at a time"</h3>
      </div>
    </div>

    <BCardBody>
      <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-start align-items-center gap-3">
          <div class="avatar avatar-xxl">
            <img src="/images/users/user-1.jpg" alt="avatar" class="img-fluid img-thumbnail rounded-circle" />
          </div>

          <div>
            <h4 class="text-nowrap fw-bold mb-1">
              {{ META_DATA.username }}
            </h4>

            <p class="text-muted mb-1">Product Designer</p>

            <span class="badge badge-soft-primary fw-medium ms-2 fs-xs ms-auto"> Author </span>
          </div>
        </div>
        <div class="d-flex gap-2">
          <Link href="#" class="btn btn-outline-primary"> Follow </Link>

          <Link href="#" class="btn btn-primary"> Message </Link>
          <BDropdown placement="bottom-end" no-caret toggle-class="btn btn-icon btn-dark drop-arrow-none" class="d-flex gap-2">
            <template #button-content>
              <AppIcon icon="dots" class="fs-24" />
            </template>

            <BDropdownItem> Edit Profile </BDropdownItem>

            <BDropdownItem>
              <Link href="#" class="text-danger"> Report </Link>
            </BDropdownItem>
          </BDropdown>
        </div>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BDropdownItem } from 'bootstrap-vue-next'
import AppIcon from '@/components/wrappers/Icon.vue'
import { META_DATA } from '@/config/constants'
</script>
