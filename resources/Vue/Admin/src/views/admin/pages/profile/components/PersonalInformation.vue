<template>
  <div class="card mb-5">
    <div class="card-header">
      <h4 class="card-title">Personal Information</h4>
    </div>

    <div class="card-body">
      <div class="space-y-2.5">
        <div class="flex items-center gap-2.5">
          <div class="btn btn-icon size-8 bg-light">
            <Icon icon="briefcase" class="size-4.5 text-secondary" />
          </div>
          <p class="text-default-800">UI/UX Designer & Full-Stack Developer</p>
        </div>

        <div class="flex items-center gap-2.5">
          <div class="btn btn-icon size-8 bg-light">
            <Icon icon="school" class="size-4.5 text-secondary" />
          </div>
          <p class="text-default-800">
            Studied at
            <span class="font-semibold text-default-800">Stanford University</span>
          </p>
        </div>

        <div class="flex items-center gap-2.5">
          <div class="btn btn-icon size-8 bg-light">
            <Icon icon="map-pin" class="size-4.5 text-secondary" />
          </div>
          <p class="text-default-800">
            Lives in
            <span class="font-semibold text-default-800">San Francisco, CA</span>
          </p>
        </div>

        <div class="flex items-center gap-2.5">
          <div class="btn btn-icon size-8 bg-light">
            <Icon icon="users" class="size-4.5 text-secondary" />
          </div>
          <p class="text-default-800">
            Followed by
            <span class="font-semibold text-default-800">25.3k People</span>
          </p>
        </div>

        <div class="flex items-center gap-2.5">
          <div class="btn btn-icon size-8 bg-light">
            <Icon icon="mail" class="size-4.5 text-secondary" />
          </div>
          <p class="text-default-800">
            Email
            <a href="mailto:hello@example.com" class="font-semibold text-primary">hello@example.com</a>
          </p>
        </div>

        <div class="flex items-center gap-2.5">
          <div class="btn btn-icon size-8 bg-light">
            <Icon icon="link" class="size-4.5 text-secondary" />
          </div>
          <p class="text-default-800">
            Website
            <a href="https://www.example.dev" class="font-semibold text-primary">www.example.dev</a>
          </p>
        </div>

        <div class="flex items-center gap-2.5">
          <div class="btn btn-icon size-8 bg-light">
            <Icon icon="world" class="size-4.5 text-secondary" />
          </div>
          <p class="text-default-800">
            Languages
            <span class="font-semibold text-default-800">English, Hindi, Japanese</span>
          </p>
        </div>
      </div>

      <div class="mt-7.5 mb-2.5 flex items-center justify-center gap-2.5">
        <a href="#" class="btn btn-icon rounded-full bg-primary text-white hover:bg-primary-hover">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
          </svg>
        </a>

        <a href="#" class="btn btn-icon rounded-full bg-info text-white hover:bg-info-hover">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
          </svg>
        </a>

        <a href="#" class="btn btn-icon rounded-full bg-danger text-white hover:bg-danger-hover">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            <path d="M16.5 7.5v.01" />
          </svg>
        </a>

        <a href="#" class="btn btn-icon rounded-full bg-success text-white hover:bg-success-hover">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-dribbble">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            <path d="M9 3.6c5 6 7 10.5 7.5 16.2" />
            <path d="M6.4 19c3.5 -3.5 6 -6.5 14.5 -6.4" />
            <path d="M3.1 10.75c5 0 9.814 -.38 15.314 -5" />
          </svg>
        </a>

        <a href="#" class="btn btn-icon rounded-full bg-secondary text-white hover:bg-secondary-hover">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M8 11v5" />
            <path d="M8 8v.01" />
            <path d="M12 16v-5" />
            <path d="M16 16v-3a2 2 0 1 0 -4 0" />
            <path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
          </svg>
        </a>

        <a href="#" class="btn btn-icon rounded-full bg-danger text-white hover:bg-danger-hover">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
            <path d="M10 9l5 3l-5 3z" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
</script>
