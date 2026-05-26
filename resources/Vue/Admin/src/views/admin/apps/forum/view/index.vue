<template>
  <PageBreadcrumb title="Forum" subtitle="Apps" />
  <div class="container">
    <div class="grid grid-cols-1 gap-base lg:grid-cols-4">
      <div class="lg:col-span-3">
        <div class="grid grid-cols-1">
          <div class="space-y-1.25">
            <div v-for="(post, idx) in forumPostData" :key="idx">
              <div class="card">
                <div class="card-body">
                  <p class="mb-2.5 text-sm font-semibold text-default-400 uppercase">
                    {{ post.category }}
                  </p>
                  <h4 class="mb-2.5 text-base">
                    <RouterLink to="/apps/forum/post" class="hover:text-primary">
                      {{ post.title }}
                    </RouterLink>
                  </h4>
                  <p class="text-default-400">
                    {{ post.description }}
                  </p>
                </div>

                <div class="card-footer block border-0">
                  <div class="flex flex-wrap items-center justify-between gap-base text-default-400">
                    <div class="flex items-center gap-2.5">
                      <img :src="post.author.image" :alt="post.author.name" class="size-8 rounded" />
                      <div>
                        <RouterLink to="" class="font-semibold text-dark">{{ post.author.name }} </RouterLink>
                        <p class="text-xs">{{ post.timeStamp }}</p>
                      </div>
                    </div>

                    <div class="flex items-center gap-1.25">
                      <Icon icon="messages" class="text-default-400" />
                      <RouterLink to="" class="hover:text-primary">Answers: {{ post.answers }} </RouterLink>
                    </div>

                    <div class="flex items-center gap-1.25">
                      <Icon icon="clock" class="text-default-400" />
                      <span class="font-semibold">Ends in: {{ post.timeLeft }}</span>
                    </div>

                    <div class="flex items-center gap-1.25">
                      <Icon icon="users" class="text-default-400" />
                      <RouterLink to="" class="hover:text-primary">Votes: {{ post.votes }}</RouterLink>
                    </div>

                    <div class="flex items-center gap-1.25">
                      <span :class="['badge text-white', post.badge.className]">
                        {{ post.badge.text }}
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-5">
              <nav class="mx-auto flex items-center justify-center gap-1.5" aria-label="Pagination">
                <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">
                  <span>«</span>
                </button>
                <button type="button" class="btn btn-icon rounded-full bg-primary text-white">1</button>
                <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">2</button>
                <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">3</button>
                <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">4</button>
                <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">5</button>
                <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">
                  <span>»</span>
                </button>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <div class="col-span-1">
        <button class="btn btn-lg mb-base w-full bg-primary text-base text-white hover:bg-primary-hover">Ask Question</button>

        <div class="card">
          <div class="card-body border-b border-dashed border-default-300">
            <h5 class="mb-5 font-bold uppercase">Search</h5>

            <div class="input-icon-group">
              <Icon icon="search" class="input-icon" />
              <input type="search" placeholder="Search issues..." class="form-input bg-light/20" />
            </div>
          </div>

          <div class="card-body border-b border-dashed border-default-300">
            <h5 class="mb-5 font-bold uppercase">Category:</h5>
            <ul class="text-sm">
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary">Development Talk</RouterLink>
              </li>
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary">AI & Ethics</RouterLink>
              </li>
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary">Product Design</RouterLink>
              </li>
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary">Career Growth</RouterLink>
              </li>
              <li class="py-3">
                <RouterLink to="" class="transition-colors hover:text-primary">Open Source</RouterLink>
              </li>
            </ul>
          </div>

          <div class="card-body border-b border-dashed border-default-300">
            <h5 class="mb-5 font-bold uppercase">Popular Questions:</h5>

            <ul class="text-sm">
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> Unlocking the Secrets of Modern UI Design </RouterLink>
              </li>
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> How to Build a Portfolio with Tailwind CSS </RouterLink>
              </li>
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> Boost Productivity with These Web Dev Tools </RouterLink>
              </li>
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> The Future of Frontend: Trends to Watch in 2025 </RouterLink>
              </li>
              <li class="py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> Essential Tips for Clean and Maintainable Code </RouterLink>
              </li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="mb-5 font-bold uppercase">Popular Tags:</h5>

            <div class="flex flex-wrap items-center gap-1.5">
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Web Design</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Frontend</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Tailwind CSS</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">JavaScript</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">React</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Startup</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">DevTools</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Open Source</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Performance</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">UX/UI</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">SEO</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { forumPostData } from './components/data'
</script>
