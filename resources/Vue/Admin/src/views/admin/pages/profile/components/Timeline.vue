<template>
  <form class="mb-5">
    <textarea rows="3" class="form-textarea" placeholder="Write something..."></textarea>

    <div class="flex justify-between py-3">
      <div>
        <RouterLink to="" class="btn btn-icon size-7.5 bg-light hover:text-primary">
          <Icon icon="user" />
        </RouterLink>

        <RouterLink to="" class="btn btn-icon size-7.5 bg-light hover:text-primary">
          <Icon icon="map-pin" />
        </RouterLink>

        <RouterLink to="" class="btn btn-icon size-7.5 bg-light hover:text-primary">
          <Icon icon="camera" />
        </RouterLink>

        <RouterLink to="" class="btn btn-icon size-7.5 bg-light hover:text-primary">
          <Icon icon="mood-smile" />
        </RouterLink>
      </div>

      <button type="submit" class="btn btn-sm bg-dark text-white">Post</button>
    </div>
  </form>

  <div class="mb-base rounded border border-dashed border-light p-3">
    <div class="mb-3 flex items-center gap-3">
      <img class="size-9 rounded-full" :src="user3" alt="Jeremy Tomlinson" />

      <div class="w-full">
        <h5 class="text-sm">Jeremy Tomlinson</h5>
        <p class="text-default-400">
          <small>about 2 minutes ago</small>
        </p>
      </div>
    </div>

    <p class="mb-4 text-sm">Story based around the idea of time lapse, animation to post soon!</p>

    <div class="flex flex-wrap items-center gap-3">
      <img :src="small1" alt="post-img" class="h-15 rounded" />
      <img :src="small2" alt="post-img" class="h-15 rounded" />
      <img :src="small3" alt="post-img" class="h-15 rounded" />
    </div>

    <div class="mt-3">
      <RouterLink to="" class="btn btn-sm text-sm text-default-400">
        <Icon icon="corner-up-left" class="text-sm" />
        Reply
      </RouterLink>

      <RouterLink to="" class="btn btn-sm text-sm text-default-400">
        <div class="relative">
          <span id="like-count-one"></span>

          <button type="button">
            <div class="flex items-center gap-1">
              <Icon icon="heart-filled" class="text-danger" />
              Liked!
            </div>
          </button>
        </div>
      </RouterLink>

      <RouterLink to="" class="btn btn-sm text-sm text-default-400">
        <Icon icon="share" class="text-sm" />
        Share
      </RouterLink>
    </div>
  </div>

  <div class="mb-base rounded border border-dashed border-light p-3">
    <div class="mb-3 flex items-center gap-3">
      <img class="size-9 rounded-full" :src="user4" alt="avatar-4" />

      <div class="w-full">
        <h5 class="m-0 font-semibold">Sophia Martinez</h5>
        <p class="text-sm text-default-400">
          <small>about 30 minutes ago</small>
        </p>
      </div>
    </div>

    <div class="my-5 text-center text-lg italic flex">
      <Icon icon="quote" class="text-xl size-6 mb-2" />
      Just finished a weekend project! Built a small weather app using React and OpenWeather API. Feeling excited to share the results with everyone soon. 🚀
    </div>

    <div class="-mx-3 border-t border-b border-dashed border-default-300 bg-light/15 p-3">
      <div class="flex items-start gap-2">
        <img class="size-9 rounded-full" :src="user1" alt="avatar-1" />

        <div class="w-full">
          <h5 class="mt-0 mb-1.25 font-semibold">
            Liam Johnson
            <small class="ms-1 text-default-400">10 minutes ago</small>
          </h5>

          <p class="text-default-600">That sounds awesome! Can't wait to see how you designed the UI.</p>

          <RouterLink to="" class="mt-3 inline-block text-sm text-default-500">
            <Icon icon="corner-up-left" />
            Reply
          </RouterLink>

          <div class="mt-5 flex items-start gap-2">
            <img :src="user2" class="size-9 rounded-full" alt="avatar-2" />

            <div class="w-full">
              <h5 class="mb-1.25 font-semibold">
                Olivia Carter
                <small class="ms-1 text-xs text-default-400">15 minutes ago</small>
              </h5>

              <p class="text-default-600">I recently built something similar with Vue. Let's collaborate sometime!</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-3 flex items-start gap-2">
        <img :src="user3" class="size-9 rounded-full" alt="avatar-3" />

        <div class="w-full">
          <input type="text" class="form-input-sm form-input" placeholder="Add a comment..." />
        </div>
      </div>
    </div>

    <div class="mt-3 flex items-center gap-4">
      <RouterLink to="" class="flex items-center gap-1 text-sm text-default-400">
        <Icon icon="corner-up-left" />
        Reply
      </RouterLink>

      <RouterLink to="" class="flex items-center gap-1 text-sm text-default-400">
        <Icon icon="heart" />
        Likes(45)
      </RouterLink>

      <RouterLink to="" class="flex items-center gap-1 text-sm text-default-400">
        <Icon icon="share" />
        Share
      </RouterLink>
    </div>
  </div>

  <div class="mb-base rounded border border-dashed border-light p-3">
    <div class="mb-2 flex items-center gap-3">
      <img class="size-9 rounded-full" :src="user2" alt="avatar-2" />

      <div class="w-full">
        <h5>Anika Roy</h5>
        <p class="text-default-400">
          <small class="text-xs">2 hours ago</small>
        </p>
      </div>
    </div>

    <p class="mb-4">Sharing a couple of timelapses from my recent Iceland trip. Let me know which one you like most!</p>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
      <div class="w-full overflow-hidden rounded-lg bg-default-200">
        <div class="relative w-full pb-[56.25%]">
          <iframe src="https://player.vimeo.com/video/1084537" class="absolute inset-0 h-full w-full rounded-lg" allowfullscreen></iframe>
        </div>
      </div>

      <div class="w-full overflow-hidden rounded-lg bg-default-200">
        <div class="relative w-full pb-[56.25%]">
          <iframe src="https://player.vimeo.com/video/76979871" class="absolute inset-0 h-full w-full rounded-lg" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <div class="flex items-center justify-center gap-3 p-3 md:p-6">
    <strong>Loading...</strong>
    <div class="inline-block size-4 animate-spin rounded-full border-2 border-current border-t-transparent text-danger" role="status" aria-label="loading">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'

import { RouterLink } from "vue-router"
import small1 from '/images/stock/small-1.jpg'
import small2 from '/images/stock/small-2.jpg'
import small3 from '/images/stock/small-3.jpg'
import user1 from '/images/users/user-1.jpg'
import user2 from '/images/users/user-2.jpg'
import user3 from '/images/users/user-3.jpg'
import user4 from '/images/users/user-4.jpg'
</script>
