<template>
  <PageBreadcrumb title="Tour" subtitle="Plugins" />
  <div class="container">
    <div class="flex justify-center">
      <div class="lg:w-1/2">
        <div class="mt-7.5 mb-15 text-center">
          <RouterLink to="" class="mb-7.5 flex justify-center">
            <img src="/images/logo-black.png" alt="dark logo" class="flex h-6.5 dark:hidden" />
            <img src="/images/logo.png" alt="logo" class="hidden h-8 dark:flex" />
          </RouterLink>

          <h5 class="mb-2.5 text-base">Versatile & Scalable Admin Panel Template</h5>
          <p class="text-default-400 text-sm">Build modern web applications faster with our feature-rich admin panel. Compatible with multiple frameworks and packed with diverse demos, it offers seamless customization and a consistent UI across all your projects.</p>

          <div class="mt-7.5 flex flex-wrap justify-center gap-2.5">
            <button id="tourTrigger" class="btn bg-primary hover:bg-primary-hover text-white" @click="startTour">
              <Icon icon="player-play" class="me-1" />
              Start Guided Tour
            </button>

            <RouterLink to="" class="btn bg-dark hover:bg-dark-hover text-white" data-tg-order="1" id="exploreFeatures">
              <Icon icon="compass" class="me-1" />
              Discover Features
            </RouterLink>

            <RouterLink to="" target="_blank" class="btn bg-danger hover:bg-danger-hover text-white" id="buyNow">
              <Icon icon="shopping-cart" class="me-1" />
              Get the Template
            </RouterLink>
          </div>
        </div>
      </div>
    </div>

    <div id="coreFeatures">
      <div class="grid xl:grid-cols-4 gap-base">
        <div class="card h-full p-2.5" v-for="(item, idx) in features" :key="idx">
          <div class="card-body pb-0">
            <div class="mb-5">
              <span class="avatar-title bg-secondary flex size-12 items-center justify-center rounded-full text-2xl text-white">
                <Icon :icon="item.icon" />
              </span>
            </div>
            <h4 class="mb-2.5 text-lg font-semibold">{{ item.title }}</h4>
            <p class="text-default-400 mb-5">{{ item.description }}</p>
          </div>
          <div class="card-footer border-0 pt-0">
            <RouterLink class="text-primary font-semibold hover:text-primary-hover flex gap-1 items-center" to="">
              Know more
              <Icon icon="arrow-right" class="ms-1 align-middle" />
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { TourGuideClient } from '@sjmc11/tourguidejs/src/Tour'
import { nextTick } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { features } from './components/data'

const tourSteps = [
  {
    title: 'Getting Started',
    content: 'Click here to get started and explore our framework-rich admin panel. 🚀',
    target: '#exploreFeatures',
    placement: 'left',
    order: 1,
  },
  {
    title: 'Buy Now',
    content: 'Ready to supercharge your project ? Click here to purchase the template!',
    target: '#buyNow',
    placement: 'left',
    order: 2,
  },
  {
    title: 'Core Features',
    content: 'Learn more about the versatile services and modules we provide to enhance development',
    target: '#coreFeatures',
    placement: 'top',
    order: 3,
  },
]

let tour: TourGuideClient | null = null

function startTour() {
  nextTick(() => {
    if (!tour) {
      tour = new TourGuideClient({
        steps: tourSteps,
        showStepDots: true,
        dialogZ: 1006,
        showButtons: true,
        nextLabel: 'Next',
        prevLabel: 'Back',
        rememberStep: true,
        finishLabel: 'Finish',
      })

      tour.addSteps([
        {
          title: '👋 Welcome to the Dashboard Tour',
          content: '<p class="mb-3">Take a quick tour to explore the key features of our admin dashboard.</p><p>Use your keyboard or click "Next" to continue.</p>',
          order: 0,
        },
        {
          title: "You're All Set!",
          content: `<p class="mb-3">You’re ready to make the most of your admin panel 🎉</p><p class="mb-3 text-muted">Click anywhere outside the tour to exit.</p>`,
          order: 999,
        },
      ])
    } else {
      tour.refresh()
    }

    tour.start()
  })
}
</script>

<style></style>
