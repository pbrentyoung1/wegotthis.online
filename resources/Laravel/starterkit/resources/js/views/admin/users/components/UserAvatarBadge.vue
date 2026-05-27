<template>
  <div :class="large ? 'avatar-xl' : 'avatar-md'">
    <img
      v-if="avatarUrl"
      :src="avatarUrl"
      :alt="alt"
      class="rounded-circle object-fit-cover"
      :class="large ? 'avatar-xl' : 'avatar-md'"
    />
    <span
      v-else
      class="avatar-title rounded-circle fw-bold"
      :class="large ? 'fs-2 bg-primary-subtle text-primary' : 'fs-5 bg-light text-dark'"
    >
      {{ initials }}
    </span>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  initials: string
  avatarUrl?: string | null
  alt?: string
  large?: boolean
}>()
</script>
