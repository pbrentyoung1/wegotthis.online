<template>
  <BCard no-body>
    <BCardHeader>
      <h4 class="card-title">Skills</h4>
    </BCardHeader>

    <BCardBody>
      <div class="d-flex flex-wrap gap-1">
        <Link v-for="(skill, index) in skillData" :key="index" href="#" class="btn btn-light btn-sm">
          {{ skill }}
        </Link>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { skillData } from './data'
</script>
