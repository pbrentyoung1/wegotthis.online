<template>
  <footer class="footer">
    <BContainer fluid>
      <BRow>
        <BCol md="6" class="text-center text-md-start">
          © {{ currentYear }} {{ META_DATA.name }} By
          <span class="fw-semibold">{{ META_DATA.author }}</span>
        </BCol>
        <div class="col-md-6">
          <div class="text-md-end d-none d-md-block">
            10GB of
            <span class="fw-bold">250GB</span>
            Free.
          </div>
        </div>
      </BRow>
    </BContainer>
  </footer>
</template>

<script setup lang="ts">
import { currentYear, META_DATA } from '@/config/constants'
</script>
