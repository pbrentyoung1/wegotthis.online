<template>
  <PageMeta title="Profile" />

  <div class="mb-5">
    <article class="card">
      <div class="relative h-62.5 overflow-hidden bg-cover bg-center" :style="`background-image: url(${profileBg})`">
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-linear-to-t from-[#313A46] via-[#313a46cc] to-[#313a4680] p-7.5 text-center">
          <h3 class="text-xl text-white italic">"Designing the future, one template at a time"</h3>
        </div>
      </div>

      <div class="card-body">
        <div class="flex flex-wrap items-center justify-between">
          <div class="flex items-center gap-base">
            <div>
              <img :src="user1" alt="avatar" class="size-20 rounded-full border-5 border-default-200 object-cover" />
            </div>

            <div>
              <h4 class="mb-1.25 text-lg font-bold text-default-800">
                {{ META_DATA.username }}
              </h4>
              <p class="mb-1.25 text-sm text-default-400">Product Designer</p>
              <span class="badge bg-primary/15 text-xs text-primary">Author</span>
            </div>
          </div>

          <div class="mt-5 flex items-center gap-2.5 md:mt-0">
            <RouterLink to="" class="btn border border-primary text-primary hover:bg-primary hover:text-white"> Follow </RouterLink>

            <RouterLink to="" class="btn bg-primary text-white hover:bg-primary-hover"> Message </RouterLink>

            <div class="hs-dropdown relative inline-flex [--auto-close:inside]">
              <button type="button" class="hs-dropdown-toggle btn btn-icon bg-dark text-white" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <Icon icon="dots" class="size-6 text-white" />
              </button>

              <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                <div>
                  <RouterLink to="" class="dropdown-item"> Edit Profile </RouterLink>

                  <RouterLink to="" class="dropdown-item text-danger"> Report </RouterLink>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
  </div>

  <div class="container-fluid px-5">
    <div class="grid grid-cols-1 gap-base xl:grid-cols-12">
      <div class="xl:col-span-4">
        <PersonalInformation />
        <Skills />
        <SocialFeed />
      </div>

      <div class="xl:col-span-8">
        <div class="mb-5 grid gap-base md:grid-cols-2 xl:grid-cols-4">
          <template v-for="(item, index) in statisticsData" :key="index">
            <StatisticsCard :item="item" />
          </template>
        </div>

        <About />

        <Tasks />

        <h4 class="my-7.5 text-lg font-semibold text-default-800">My Blog Posts</h4>

        <div class="grid gap-base md:grid-cols-2 xl:grid-cols-3">
          <template v-for="(blog, index) in blogData" :key="index">
            <BlogPost :blog="blog" />
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import profileBg from '/images/profile-bg.jpg'
import user1 from '/images/users/user-1.jpg'

import Icon from '~/components/wrappers/Icon.vue'

import { META_DATA } from '~/config/constants'

import About from './components/About.vue'
import BlogPost from './components/BlogPost.vue'
import PersonalInformation from './components/PersonalInformation.vue'
import Skills from './components/Skills.vue'
import SocialFeed from './components/SocialFeed.vue'
import StatisticsCard from './components/StatisticsCard.vue'
import Tasks from './components/Tasks.vue'

import { RouterLink } from "vue-router"
import { blogData, statisticsData } from './components/data'

</script>
