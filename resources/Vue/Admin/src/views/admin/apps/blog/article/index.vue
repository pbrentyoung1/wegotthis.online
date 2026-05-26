<template>
  <PageBreadcrumb title="Article" subtitle="Blog" />
  <div class="container">
    <div class="card">
      <div class="card-body lg:p-15">
        <div class="grid grid-cols-1 gap-15 2xl:grid-cols-3">
          <div class="2xl:col-span-2">
            <h1 class="text-xl">Mastering the Art of Focus: Tools & Strategies for Deep Work</h1>

            <div class="items-cneter mt-5 inline-flex flex-wrap gap-base text-sm">
              <div>
                <span class="badge badge-label bg-dark text-white">Productivity</span>
              </div>

              <span class="flex items-center gap-1.25 text-default-400">
                <Icon icon="calendar" />
                Mar 18, 2025
              </span>

              <span class="flex items-center gap-1.25 text-default-400">
                <Icon icon="message-circle" />
                <RouterLink to="" class="hover:text-primary">42</RouterLink>
              </span>

              <span class="flex items-center gap-1.25 text-default-400">
                <Icon icon="eye" />
                982
              </span>
            </div>

            <img :src="blogPost" class="mt-7.5 rounded" alt="blog-img" />

            <div class="mt-7.5 text-md">
              <p class="mb-4">In a world full of constant notifications and distractions, developing the ability to focus has become a superpower. This article dives into proven methods for cultivating deep work and staying productive in a digital age.</p>
              <p class="mb-4">Eliminating distractions and building a workflow that encourages uninterrupted focus can drastically improve your efficiency. Whether you're coding, writing, or designing — deep work leads to higher quality output and greater satisfaction.</p>
              <p class="mb-4">Some effective strategies include time-blocking your calendar, using tools like Pomodoro timers, and creating a distraction-free workspace. Even just 90 minutes of intentional, focused work per day can compound into massive progress over time.</p>
              <p>
                By embracing stillness and training your attention,
                <span class="bg-warning/10 p-0.75 dark:text-warning"> you’ll uncover a new level of clarity and creativity </span>
                that transforms how you work and what you’re capable of achieving.
              </p>
            </div>

            <div class="mt-12 flex flex-wrap items-center justify-center gap-3 rounded border border-light bg-light/15 p-5 text-center md:mt-15 md:justify-between md:gap-0">
              <h5>Was this article helpful?</h5>
              <p>
                <b>41</b>
                out of
                <b>72</b>
                found this helpful
              </p>

              <div class="flex">
                <div>
                  <input type="radio" name="radiotoggle" id="radioYes" class="peer hidden" />
                  <label for="radioYes" class="btn btn-sm rounded-e-none bg-success/15 text-success peer-checked:bg-success peer-checked:text-white">
                    <Icon icon="thumb-up" />
                    Yes
                  </label>
                </div>

                <div>
                  <input type="radio" name="radiotoggle" id="radioNo" class="peer hidden" />
                  <label for="radioNo" class="btn btn-sm rounded-s-none bg-danger/15 text-danger peer-checked:bg-danger peer-checked:text-white">
                    No
                    <Icon icon="thumb-down" />
                  </label>
                </div>
              </div>
            </div>

            <div class="mt-7.5 mb-7.5 flex flex-wrap items-center gap-7.5 rounded border border-dashed border-default-300 p-6 md:flex-nowrap md:p-7.5">
              <div class="shrink-0 text-center">
                <div class="mb-3">
                  <img :src="user1" class="mx-auto size-12 rounded-full" alt="" />
                </div>
                <div class="text-center">
                  <RouterLink to="" class="text-sm font-bold text-primary"> Nathan Brooks </RouterLink>
                  <br />
                  <span class="mt-1.5 text-xs font-semibold text-default-400"> Productivity Coach </span>
                </div>
              </div>

              <div>
                <div class="mb-3 text-sm font-medium text-default-400">Nathan is passionate about helping creators, developers, and entrepreneurs reclaim their time and do meaningful work. He writes regularly about mindful productivity and digital wellness.</div>

                <RouterLink to="" class="text-sm font-semibold text-primary"> Author’s Profile </RouterLink>
              </div>
            </div>

            <div class="my-5 text-center md:my-7.5">
              <h5 class="mb-5 text-sm font-bold uppercase">Share This:</h5>
              <div class="mt-7.5 mb-2.5 flex flex-wrap items-center justify-start gap-2.5 md:justify-center">
                <a href="#" class="btn btn-icon rounded-full bg-primary hover:bg-primary-hover">
                  <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                  </svg>
                </a>

                <a href="#" class="btn btn-icon rounded-full bg-info hover:bg-info-hover">
                  <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                  </svg>
                </a>

                <a href="#" class="btn btn-icon rounded-full bg-danger hover:bg-danger-hover">
                  <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    <path d="M16.5 7.5v.01" />
                  </svg>
                </a>

                <a href="#" class="btn btn-icon rounded-full bg-success hover:bg-success-hover">
                  <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M9 3.6c5 6 7 10.5 7.5 16.2" />
                    <path d="M6.4 19c3.5 -3.5 6 -6.5 14.5 -6.4" />
                    <path d="M3.1 10.75c5 0 9.814 -.38 15.314 -5" />
                  </svg>
                </a>

                <a href="#" class="btn btn-icon rounded-full bg-secondary hover:bg-secondary-hover">
                  <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 11v5" />
                    <path d="M8 8v.01" />
                    <path d="M12 16v-5" />
                    <path d="M16 16v-3a2 2 0 1 0 -4 0" />
                    <path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
                  </svg>
                </a>

                <a href="#" class="btn btn-icon rounded-full bg-danger hover:bg-danger-hover">
                  <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                    <path d="M10 9l5 3l-5 3z" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

          <SideBar />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import SideBar from './components/SideBar.vue'
import blogPost from '/images/blog/blog-post.jpg'
import user1 from '/images/users/user-1.jpg'
</script>
