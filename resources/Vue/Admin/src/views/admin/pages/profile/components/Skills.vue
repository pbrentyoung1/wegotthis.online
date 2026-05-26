<template>
  <div class="card mb-5">
    <div class="card-header">
      <h4 class="card-title">Skills</h4>
    </div>

    <div class="card-body">
      <div class="itmes-center flex flex-wrap gap-1.25">
        <template v-for="(skill, index) in skillData" :key="index">
          <RouterLink to="" class="btn btn-sm bg-light text-sm hover:text-primary">
            {{ skill }}
          </RouterLink>
        </template>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { skillData } from './data'
</script>
