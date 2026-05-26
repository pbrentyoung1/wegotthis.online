<template>
  <PageBreadcrumb title="Tour" subtitle="Plugins" />
  <BContainer fluid="xxl">
    <BRow>
      <BCol cols="12">
        <BCard no-body>
          <BCardBody>
            <BRow class="justify-content-center">
              <BCol lg="6">
                <div class="text-center mt-4 mb-5">
                  <div class="auth-brand text-center mb-4">
                    <Link href="" class="logo-dark">
                      <img src="/images/logo-black.png" alt="dark logo" height="32" />
                    </Link>
                    <Link href="" class="logo-light">
                      <img src="/images/logo.png" alt="logo" height="32" />
                    </Link>
                  </div>

                  <h5 class="fs-lg mb-2">Powerful & Flexible Admin Panel Template</h5>
                  <p class="text-muted fs-sm">
                    Our admin panel provides a robust foundation for modern web apps. With support for multiple frameworks and over a dozen demo variations, developers can build exactly what they need, fast and easily. Customize with ease and enjoy consistent UI across projects.
                  </p>

                  <div class="d-flex justify-content-center mt-4 flex-wrap gap-2">
                    <button @click="startTour" class="btn btn-primary">
                      <Icon icon="player-play" class="me-1" />
                      Start Tour
                    </button>

                    <Link href="#" class="btn btn-dark" id="exploreFeatures">
                      <Icon icon="compass" class="me-1" />
                      Explore Features
                    </Link>

                    <Link href="" target="_blank" class="btn btn-danger" id="buyNow">
                      <Icon icon="shopping-cart" class="me-1" />
                      Buy Now
                    </Link>
                  </div>
                </div>
              </BCol>
            </BRow>

            <div id="coreFeatures">
              <BRow>
                <BCol cols="12" class="text-center">
                  <span class="text-muted rounded-3 d-inline-block">🚀 Empowering your digital journey</span>
                  <h3 class="mt-3 fw-bold mb-5">
                    Framework
                    <mark>Support &amp; Core</mark>
                    Features
                  </h3>
                </BCol>
              </BRow>
              <BRow>
                <BCol v-for="(item, idx) in features" xl="3" :key="idx">
                  <BCard no-body class="border-0 p-2 card-h-100">
                    <BCardBody class="pb-0">
                      <div class="avatar-xl mb-3">
                        <span class="avatar-title text-bg-secondary rounded-circle fs-22">
                          <Icon :icon="item.icon" />
                        </span>
                      </div>
                      <h4 class="fw-semibold mb-2">{{ item.title }}</h4>
                      <p class="text-muted mb-3">{{ item.description }}</p>
                    </BCardBody>
                    <BCardFooter class="border-0 pt-0">
                      <Link class="link-primary fw-semibold" href=""
                        >Know more
                        <Icon icon="arrow-right" class="ms-2 align-middle" />
                      </Link>
                    </BCardFooter>
                  </BCard>
                </BCol>
              </BRow>
            </div>

            <div class="text-center my-4">
              <BButton variant="success" id="thankyou-tour" data-tg-order="7" data-tg-tour="&lt;p&gt;Thanks for exploring! Read the documentation to get the most out of this template.&lt;/p&gt;" data-tg-title="Documentation" style="scroll-margin: 50px 0px">
                <Icon icon="file" class="me-1" />
                Documentation
              </BButton>
            </div>
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { TourGuideClient } from '@sjmc11/tourguidejs/src/Tour'
import { BCard, BCardBody, BCardFooter, BCol, BContainer, BRow } from 'bootstrap-vue-next'
import { nextTick } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
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

<style scoped></style>
