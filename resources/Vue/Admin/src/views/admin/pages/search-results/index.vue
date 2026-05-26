<template>
  <PageBreadcrumb title="Search Results" subtitle="Pages" />
  <div class="card">
    <div class="card-body">
      <div class="mx-auto py-6 text-center xl:w-1/2 md:w-3/4">
        <div class="input-icon-group mb-base">
          <Icon icon="search" class="input-icon" />
          <input type="text" value="AI Content Tools" placeholder="Search AI platforms..." class="form-input-lg form-input rounded-s-full! font-semibold" />
          <button type="button" class="btn btn-lg -ms-px rounded-s-none rounded-e-full bg-secondary text-base text-white hover:bg-secondary-hover">Discover</button>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-1.25 text-sm">
          <h5 class="text-default-400">Popular Searches :</h5>

          <RouterLink v-for="tag in ['Text Generation', 'Image AI', 'Speech', 'Coding']" :key="tag" to="" class="bg-primary/15 text-primary inline-flex items-center rounded-full px-3 py-1 text-xs font-bold">
            {{ tag }}
          </RouterLink>
        </div>
      </div>
    </div>

    <div class="card-header">
      <h4 class="text-lg text-default-400 italic">
        Found
        <span class="badge bg-danger/15 font-bold text-danger">72</span>
        results for
        <span class="font-medium text-default-800">"AI Content Tools"</span>
      </h4>

      <div class="flex flex-wrap items-center gap-3">
        <span class="me-3 font-semibold">Filter By:</span>

        <div class="input-icon-group">
          <Icon icon="cpu" class="input-icon" />
          <select class="form-select">
            <option>Tool Type</option>
            <option value="chatbot">Chatbot</option>
            <option value="analytics">Analytics</option>
            <option value="image">Image Generator</option>
            <option value="voice">Voice AI</option>
            <option value="automation">Automation</option>
          </select>
        </div>

        <div class="input-icon-group">
          <Icon icon="wallet" class="input-icon" />
          <select class="form-select">
            <option>Pricing</option>
            <option value="free">Free</option>
            <option value="pro">Pro</option>
            <option value="enterprise">Enterprise</option>
          </select>
        </div>
      </div>
    </div>

    <div class="card-body p-0">
      <div v-for="item in searchResultData" :key="item.title">
        <div class="border-b border-dashed border-default-300 px-7.5 py-5">
          <h4 class="mb-1.25 text-base font-medium">
            <RouterLink to="" target="_blank" class="card-title">
              {{ item.title }}
            </RouterLink>
          </h4>

          <p class="mb-2.5 text-sm text-success">{{ item.href }}</p>
          <p class="mb-2.5 text-sm text-default-400">{{ item.description }}</p>

          <p class="mb-1.25 flex flex-wrap items-center gap-base text-sm text-default-500">
            <span class="flex items-center gap-1.25">
              <img :src="item.user.image" alt="avatar" class="size-6 rounded-full object-cover" />
              <a href="#!" class="font-semibold text-default-400 hover:text-primary">
                {{ item.user.name }}
              </a>
            </span>

            <span class="flex items-center gap-1 text-default-400">
              <Icon icon="calendar" />
              <span>Published on: {{ item.publishedDate }}</span>
            </span>

            <span class="flex items-center gap-1 text-default-400">
              <Icon icon="users" />
              <span>Users: {{ item.users }}+</span>
            </span>

            <span class="flex items-center gap-1 text-default-400">
              <Icon icon="message-circle" />
              <RouterLink to="" class="hover:text-primary"> Feedback: {{ item.feedback }} </RouterLink>
            </span>

            <span class="flex items-center gap-1 text-default-400">
              <Icon icon="star" />
              <span>Rating: {{ item.rating }}</span>
            </span>
          </p>
        </div>
      </div>

      <div class="border-b border-dashed border-default-300 px-7.5 py-5">
        <h4 class="card-title mb-base">Featured AI Creators:</h4>
        <div class="flex items-center gap-3">
          <img v-for="(user, idx) in [user4, user5, user3, user8, user2]" :key="idx" :src="user" alt="avatar" class="size-12 rounded" />
        </div>
      </div>

      <div class="px-7.5 py-5">
        <h4 class="card-title mb-base">People also search for:</h4>
        <div class="flex flex-wrap items-center gap-3">
          <RouterLink v-for="search in ['AI SaaS Platforms', 'AI Code Generators', 'AI Productivity Tools', 'AI for Marketing']" :key="search" to="" class="btn flex items-center gap-1 bg-light/50 text-md">
            {{ search }}
            <Icon icon="search" />
          </RouterLink>
        </div>
      </div>
    </div>

    <div class="card-footer">
      <nav class="mx-auto flex items-center justify-center gap-1.25">
        <button type="button" class="btn btn-icon size-8.5! rounded-full border border-default-300">
          <Icon icon="chevron-left" />
        </button>

        <button type="button" class="btn btn-icon size-8.5! rounded-full border border-default-300 bg-primary text-white">1</button>

        <button type="button" class="btn btn-icon size-8.5! rounded-full border border-default-300">2</button>
        <button type="button" class="btn btn-icon size-8.5! rounded-full border border-default-300">3</button>
        <button type="button" class="btn btn-icon size-8.5! rounded-full border border-default-300">...</button>
        <button type="button" class="btn btn-icon size-8.5! rounded-full border border-default-300">4</button>
        <button type="button" class="btn btn-icon size-8.5! rounded-full border border-default-300">5</button>

        <button type="button" class="btn btn-icon size-8.5! rounded-full border border-default-300">
          <Icon icon="chevron-right" />
        </button>
      </nav>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { searchResultData } from './components/data'
import user2 from '/images/users/user-2.jpg'
import user3 from '/images/users/user-3.jpg'
import user4 from '/images/users/user-4.jpg'
import user5 from '/images/users/user-5.jpg'
import user8 from '/images/users/user-8.jpg'
</script>
