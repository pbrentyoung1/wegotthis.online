<template>
  <div class="card border-light rounded-xl p-5 h-full">
    <div class="card-body pb-0 text-center">
      <div class="mx-auto mb-5 size-12">
        <img :src="testimonial.image" :alt="testimonial.name" class="rounded-full" />
      </div>

      <Rating :rating="testimonial.rating" className="text-warning mb-5 flex items-center justify-center flex-nowrap gap-1" />

      <h4 class="mb-2.5 text-md">{{ testimonial.title }}</h4>

      <p class="mb-5 text-sm text-default-400 italic">
        {{ testimonial.description }}
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import Rating from '~/components/Rating.vue'
import type { TestimonialType } from './data'

const props = defineProps<{
  testimonial: TestimonialType
}>()

const { testimonial } = props
</script>
