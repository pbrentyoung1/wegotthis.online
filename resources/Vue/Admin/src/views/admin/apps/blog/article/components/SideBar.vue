<template>
  <div class="col-span-1">
    <h5 class="mb-5 font-bold uppercase">Search</h5>
    <div class="input-icon-group mb-12 md:mb-15">
      <Icon icon="search" class="input-icon" />
      <input type="text" class="form-input bg-light/25" placeholder="Search post..." />
    </div>

    <div class="mb-12 md:mb-15">
      <h5 class="mb-5 font-bold uppercase">Related post:</h5>
      <ul class="*:flex *:items-center *:justify-between *:py-3 *:pe-5">
        <li v-for="item in popularPostData" :key="item.title" class="border-b border-default-300">
          <RouterLink to="" class="flex items-center gap-3 font-medium hover:text-primary">
            <div>
              <Icon icon="article" />
            </div>
            {{ item.title }}
          </RouterLink>
        </li>
      </ul>
    </div>

    <div class="mb-12 md:mb-15">
      <h5 class="mb-5 font-bold uppercase">Popular Tags:</h5>
      <div class="itmes-center flex flex-wrap gap-1.25">
        <RouterLink v-for="tag in tagData" :key="tag.name" to="#!" class="btn btn-sm bg-light hover:text-primary">
          {{ tag.name }}
        </RouterLink>
      </div>
    </div>

    <div class="rounded border border-default-300 bg-light/15 p-6 md:p-7.5">
      <h5 class="mb-5 font-bold uppercase">Subscribe to Newsletter</h5>
      <p class="mb-5 text-sm text-default-400">Get the latest articles and updates directly to your inbox.</p>
      <form action="#">
        <div class="relative">
          <input type="email" class="form-input" placeholder="Your email address" />
          <button class="btn absolute end-0 top-1/2 -translate-y-1/2 rounded-s-none bg-dark py-3 text-white" type="submit">
            <Icon icon="send-2" />
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { popularPostData, tagData } from './data'
</script>
