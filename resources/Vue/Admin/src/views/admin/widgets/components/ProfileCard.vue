<template>
  <div class="flex flex-col gap-base">
    <div class="card">
      <div class="card-side-img relative overflow-hidden rounded-t-sm bg-no-repeat" :style="`height: 180px; background-image: url(${profileBg}); background-size: cover; background-position: center;`">
        <div class="auth-overlay absolute inset-0 flex h-full items-center justify-center rounded-s-sm rounded-t-sm bg-linear-to-t from-[#313a46] via-[rgba(49,58,70,0.8)] to-[rgba(49,58,70,0.5)] p-7.5">
          <h5 class="text-white italic">"Welcome!"</h5>
        </div>
      </div>

      <div class="card-body relative">
        <div class="flex justify-start gap-5">
          <div class="size-20" style="margin-top: -60px">
            <RouterLink to="">
              <img :src="user2" alt="User Profile" class="rounded-full border border-default-300 bg-body-bg p-1" />
            </RouterLink>
          </div>

          <div>
            <h4 class="mb-1.25 font-bold text-nowrap">
              <RouterLink to="" class="text-lg">
                {{ META_DATA.username }}
              </RouterLink>
            </h4>
            <p class="mb-0 text-default-400">Member since Jan 2021</p>
          </div>

          <div class="relative ms-auto -mt-10">
            <div class="hs-dropdown inline-flex [--placement:bottom-right]">
              <button type="button" class="hs-dropdown-toggle btn btn-icon size-9.5 rounded-full bg-primary text-white" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <Icon icon="dots" class="text-2xl" />
              </button>

              <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical" tabindex="-1">
                <div class="space-y-0.5">
                  <RouterLink to="" class="dropdown-item"> &nbsp; Edit Profile&nbsp; </RouterLink>

                  <RouterLink to="" class="dropdown-item text-danger"> &nbsp; Report&nbsp; </RouterLink>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div v-for="(comment, idx) in comments" :key="idx" class="flex rounded border border-dashed border-default-300 p-5">
          <div class="shrink-0">
            <img :src="comment.avatar" alt="" class="size-8 rounded-full shadow-sm" />
          </div>

          <div class="ms-2.5 grow">
            <h5 class="mb-1.25">
              {{ comment.name }}&nbsp;
              <small class="text-default-400"> {{ comment.date }} · {{ comment.time }} </small>
            </h5>

            <p class="mb-2.5">{{ comment.message }}</p>

            <div class="mt-2.5 flex justify-between text-default-400">
              <div class="flex gap-5">
                <span class="inline-flex items-center gap-1.25">
                  <Icon icon="eye" />
                  {{ abbreviatedNumber(comment.views) }}
                </span>
                <span class="inline-flex items-center gap-1.25">
                  <Icon icon="heart" />
                  {{ comment.likes }}
                </span>
                <span class="inline-flex items-center gap-1.25">
                  <Icon icon="message-circle-2" />
                  {{ comment.comments }}
                </span>
              </div>

              <RouterLink to="" class="inline-flex items-center gap-1.25 font-semibold text-primary hover:text-primary-hover"> <Icon icon="arrow-back-up" /> Reply </RouterLink>
            </div>

            <div v-if="comment.reply">
              <div v-for="(reply, rIdx) in comment.reply" :key="rIdx" class="mt-7.5 flex">
                <div class="shrink-0">
                  <img :src="reply.avatar" alt="" class="size-8 rounded-full shadow-sm" />
                </div>

                <div class="ms-2.5 grow">
                  <h5 class="mb-1.25">
                    {{ reply.name }}&nbsp;
                    <small class="text-default-400"> {{ reply.date }} · {{ reply.time }} </small>
                  </h5>

                  <p class="mb-2.5">{{ reply.message }}</p>

                  <div class="flex justify-between text-default-400">
                    <div class="flex gap-5">
                      <span class="inline-flex items-center gap-1.25">
                        <Icon icon="eye" />
                        {{ abbreviatedNumber(reply.views) }}
                      </span>
                      <span class="inline-flex items-center gap-1.25">
                        <Icon icon="heart" />
                        {{ reply.likes }}
                      </span>
                      <span class="inline-flex items-center gap-1.25">
                        <Icon icon="message-circle-2" />
                        {{ reply.comments }}
                      </span>
                    </div>

                    <RouterLink to="" class="inline-flex items-center gap-1.25 font-semibold text-primary hover:text-primary-hover"> <Icon icon="arrow-back-up" /> Reply </RouterLink>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { META_DATA } from '~/config/constants'
import { abbreviatedNumber } from '~/utils/helpers'
import { comments } from './data'
import profileBg from '/images/profile-bg.jpg'
import user2 from '/images/users/user-2.jpg'
</script>
