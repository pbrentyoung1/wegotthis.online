<template>
  <ul class="pagination pagination-rounded pagination-boxed justify-content-center mb-0">
    <li class="page-item">
      <Link class="page-link" href="" aria-label="Previous">
        <Icon icon="chevron-left" class="align-middle fs-lg" />
      </Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href=""> 1 </Link>
    </li>
    <li class="page-item active">
      <Link class="page-link" href=""> 2 </Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href=""> 3 </Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href=""> 4 </Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href=""> 5 </Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href="" aria-label="Next">
        <Icon icon="chevron-right" class="align-middle fs-lg" />
      </Link>
    </li>
  </ul>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
</script>

<style scoped></style>
