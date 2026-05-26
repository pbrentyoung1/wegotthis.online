<template>
  <div class="flex flex-col gap-base">
    <div class="card">
      <div class="card-header lg:hidden">
        <button class="btn btn-sm btn-icon border-default-300">
          <Icon icon="menu-4" class="text-2xl text-default-600" aria-haspopup="dialog" aria-expanded="false" aria-controls="outlookSidebaroffcanvas" aria-label="Toggle navigation" data-hs-overlay="#outlookSidebaroffcanvas" />
        </button>
      </div>

      <div class="card-body">
        <h5 class="mb-2.5">What's on your mind?</h5>

        <textarea rows="3" class="form-textarea" placeholder="Share your thoughts..." />

        <div class="flex justify-between pt-2.5">
          <div class="flex gap-1.25">
            <RouterLink to="" class="btn btn-sm btn-icon size-8 bg-light hover:text-primary">
              <Icon icon="user" class="text-base" />
            </RouterLink>

            <RouterLink to="" class="btn btn-sm btn-icon size-8 bg-light hover:text-primary">
              <Icon icon="map-pin" class="text-base" />
            </RouterLink>

            <RouterLink to="" class="btn btn-sm btn-icon size-8 bg-light hover:text-primary">
              <Icon icon="camera" class="text-base" />
            </RouterLink>

            <RouterLink to="" class="btn btn-sm btn-icon size-8 bg-light hover:text-primary">
              <Icon icon="mood-smile" class="text-base" />
            </RouterLink>
          </div>

          <button type="submit" class="btn btn-sm bg-dark text-white">Post</button>
        </div>
      </div>
    </div>

    <CommonPostCard :image="user10" name="Jeremy Tomlinson" time="about 2 minutes ago" description="Story based around the idea of time lapse, animation to post soon!">
      <div class="grid grid-cols-2 gap-1.25">
        <img :src="gallery10" class="h-full rounded" style="aspect-ratio: 3/4; object-fit: cover" />

        <div class="flex flex-col gap-1.25">
          <img :src="gallery2" class="rounded" style="aspect-ratio: 4/3; object-fit: cover" />
          <img :src="gallery3" class="rounded" style="aspect-ratio: 4/3; object-fit: cover" />
        </div>
      </div>
    </CommonPostCard>

    <CommonPostCard :image="user4" name="Sophia Martinez" time="about 30 minutes ago">
      <div class="mt-5 mb-7.5 text-center text-base italic">
        <Icon icon="quote" class="text-xl" />
        Just finished a weekend project! Built a small weather app using React and OpenWeather API. Feeling excited to share the results with everyone soon. 🚀
      </div>

      <div class="card-body border-t border-b border-dashed border-default-300 bg-default-50">
        <div v-for="(comment, idx) in commentData" :key="idx" class="flex">
          <img class="me-2.5 size-8 rounded-full" :src="comment.image" />

          <div class="flex-1">
            <div class="w-full">
              <h5 class="mb-1.25">
                <a href="#" class="hover:text-primary">{{ comment.name }}</a>
                <small class="float-end font-normal text-default-400">{{ comment.time }}</small>
              </h5>

              {{ comment.message }}
              <br />

              <RouterLink to="" class="mt-2.5 inline-flex items-center gap-1 text-default-400">
                <Icon icon="corner-up-left" />
                Reply
              </RouterLink>
            </div>

            <div v-if="comment.reply">
              <div v-for="(reply, rIdx) in comment.reply" :key="rIdx" class="mt-5 flex">
                <img class="me-2.5 size-8 rounded-full" :src="reply.image" />

                <div class="flex-1">
                  <div class="w-full">
                    <h5 class="mb-1.25">
                      <a href="#" class="hover:text-primary">{{ reply.image }}</a>
                      <small class="float-end font-normal text-default-400">
                        {{ reply.time }}
                      </small>
                    </h5>

                    {{ reply.message }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-5 flex items-start gap-2">
          <img :src="user3" class="size-7.75 rounded-full" />

          <div class="w-full">
            <input type="text" class="form-input" placeholder="Add a comment..." />
          </div>
        </div>
      </div>
    </CommonPostCard>

    <CommonPostCard :image="user2" name="Anika Roy" time="2 hours ago" description="Sharing a couple of timelapses from my recent Iceland trip. Let me know which one you like most!">
      <div class="grid grid-cols-1 gap-1.25 md:grid-cols-2">
        <div class="aspect-video overflow-hidden rounded-md">
          <iframe src="https://player.vimeo.com/video/1084537" class="h-full w-full" />
        </div>

        <div class="aspect-video overflow-hidden rounded-md">
          <iframe src="https://player.vimeo.com/video/76979871" class="h-full w-full" />
        </div>
      </div>
    </CommonPostCard>

    <CommonPostCard :image="user6" name="David Kim" time="Posted 1 hour ago">
      <h5 class="mb-5">🔥 Quick Poll: What’s your go-to front-end framework in 2025?</h5>

      <p class="mb-4 text-default-400">We’re gathering developer preferences for our next project. Cast your vote below! 💻</p>

      <form>
        <div class="mb-1.25 flex items-center gap-1.5">
          <input class="form-checkbox rounded-full" type="radio" name="framework_poll" id="optionReact" />
          <label class="form-check-label font-normal" for="optionReact">React (Meta)</label>
        </div>

        <div class="mb-1.25 flex items-center gap-1.5">
          <input class="form-checkbox rounded-full" type="radio" name="framework_poll" id="optionVue" />
          <label class="form-check-label font-normal" for="optionVue">Vue.js (Evan You)</label>
        </div>

        <div class="mb-1.25 flex items-center gap-1.5">
          <input class="form-checkbox rounded-full" type="radio" name="framework_poll" id="optionAngular" />
          <label class="form-check-label font-normal" for="optionAngular">Angular (Google)</label>
        </div>

        <div class="mb-5 flex items-center gap-1.5">
          <input class="form-checkbox rounded-full" type="radio" name="framework_poll" id="optionSvelte" />
          <label class="form-check-label font-normal" for="optionSvelte">Svelte (Emerging Favorite)</label>
        </div>

        <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover">Submit Vote</button>
      </form>
    </CommonPostCard>

    <CommonPostCard :image="user2" name="Anika Roy" time="Posted 2 hours ago">
      <h5 class="mb-3">
        📢 You're Invited:
        <strong>Dev Meetup 2025 – Build with AI</strong>
      </h5>

      <p class="mb-3 text-default-400">Join developers and tech enthusiasts for an inspiring evening of AI-driven development talks, live demos, and networking opportunities.</p>

      <ul class="list-unstyled mb-base">
        <li class="pb-3">
          <strong>Date:</strong>
          Friday, 25th July 2025
        </li>

        <li class="pb-3">
          <strong>Time:</strong>
          6:00 PM IST
        </li>

        <li>
          <strong>Location:</strong>
          Online (Zoom – link to be shared)
        </li>
      </ul>
      <div class="flex gap-2.5">
        <button class="btn btn-sm border-primary text-primary hover:bg-primary border hover:text-white">
          <Icon icon="bell" class="text-sm" />
          Interested
        </button>

        <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover">
          <Icon icon="user-plus" class="text-sm" />
          Join Now
        </button>
      </div>
    </CommonPostCard>

    <div class="card">
      <div class="card-body text-center">
        <h1 class="mb-2.5 text-4xl">🏆</h1>
        <h4 class="mb-1.25 text-lg font-semibold">Congratulations, Anika! 🎉</h4>

        <p class="mb-5 text-default-400 italic">You’ve hit 1,000 followers ! Your content is making waves in the community!</p>

        <div class="mb-5 flex justify-center gap-7.5">
          <div class="text-center">
            <h6 class="text-2xs">Posts</h6>
            <span class="font-bold">135</span>
          </div>

          <div class="text-center">
            <h6 class="text-2xs">Likes</h6>
            <span class="font-bold">8,400</span>
          </div>

          <div class="text-center">
            <h6 class="text-2xs">Subscribers</h6>
            <span class="font-bold">1,000</span>
          </div>
        </div>

        <div class="flex justify-center gap-3">
          <button class="btn btn-sm border border-success text-success hover:bg-success hover:text-white">
            <Icon icon="share" />
            Share Achievement
          </button>

          <a href="#" class="btn btn-sm bg-primary text-white hover:bg-primary-hover">
            <Icon icon="user" />
            View Profile
          </a>
        </div>
      </div>
    </div>

    <div class="mb-5 flex items-center justify-center gap-2.5 p-5">
      <strong>Loading...</strong>
      <div class="inline-block size-4 animate-spin rounded-full border-2 border-current border-t-transparent text-danger" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import CommonPostCard from './CommonPostCard.vue'
import { commentData } from './data'

import gallery10 from '/images/gallery/10.jpg'
import gallery2 from '/images/gallery/2.jpg'
import gallery3 from '/images/gallery/3.jpg'
import user10 from '/images/users/user-10.jpg'
import user2 from '/images/users/user-2.jpg'
import user3 from '/images/users/user-3.jpg'
import user4 from '/images/users/user-4.jpg'
import user6 from '/images/users/user-6.jpg'
</script>
