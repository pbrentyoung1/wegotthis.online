<template>
  <PageBreadcrumb title="Animation" subtitle="Plugins" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Animate.css</h4>
        </div>

        <div class="card-body">
          <p class="mb-4 text-default-400">A cross-browser library of CSS animations. Animate.css is a bunch of cool, fun, and cross-browser animations for you to use in your projects. Great for emphasis, home pages, sliders, and general just-add-water-awesomeness.</p>

          <div class="grid grid-cols-1 gap-7.5 lg:grid-cols-3">
            <div>
              <div class="card sticky top-20 overflow-hidden">
                <div class="card-body">
                  <div id="animation_box" class="animate__animated" ref="imageRef">
                    <img :src="blogImg" class="img-fluid rounded" alt="user" />
                  </div>
                  <p class="mt-5 text-center text-default-400">Example box for animation effect.</p>
                </div>
              </div>
            </div>

            <div class="lg:col-span-2">
              <div class="mb-4 flex items-center rounded bg-info/15 px-4 py-3 text-info">Click any of the buttons below to see the animation effect applied to the box on the left.</div>

              <div class="hs-accordion-group divide-y divide-default-300 rounded border border-default-300" id="animationAccordion">
                <div v-for="(item, idx) in animationGroups" :key="idx" :class="['hs-accordion', { active: idx === 0 }]">
                  <button class="hs-accordion-toggle flex w-full items-center justify-between px-5 py-4 font-secondary font-semibold transition hs-accordion-active:bg-default-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAttention">
                    {{ item.name }}
                    <Icon icon="chevron-down" class="text-base transition-transform hs-accordion-active:rotate-180" />
                  </button>

                  <div id="collapseAttention" :class="['hs-accordion-content w-full overflow-hidden border-t border-default-300 transition-[height] duration-300', { hidden: idx != 0 }]" data-bs-parent="#animationAccordion">
                    <div class="flex flex-wrap gap-2.5 px-5 py-4">
                      <button v-for="(animation, i) in item.animations" :key="i" class="btn animation_select bg-light" @click="animate(animation)">
                        {{ animation }}
                      </button>
                    </div>
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

<script setup lang="ts">
import { ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { animationGroups } from './components/data'
const blogImg = '/images/blog/blog-1.jpg'

const imageRef = ref<HTMLElement | null>(null)

const animate = (animation: string) => {
  if (imageRef.value) {
    imageRef.value.classList.add('animate__animated', `animate__${animation}`)

    const handleEnd = () => {
      imageRef.value?.classList.remove('animate__animated', `animate__${animation}`)
      imageRef.value?.removeEventListener('animationend', handleEnd)
    }

    imageRef.value.addEventListener('animationend', handleEnd, { once: true })
  }
}
</script>
