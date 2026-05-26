<template>
  <section class="lg:py-26 py-12 relative overflow-hidden" id="reviews">
    <div class="absolute top-0 inset-s-1/2 -translate-x-1/2 mt-12 opacity-50">
      <img :src="bgPattern" alt="" />
    </div>

    <div class="container">
      <div class="text-center">
        <span class="text-default-400 rounded-xl inline-block"> 💬 What Our Customers Are Saying </span>

        <h2 class="mt-5 font-bold md:text-2xl text-xl mb-15">
          Real Feedback from
          <mark class="bg-warning/20 text-default-800 italic">Satisfied</mark>
          Clients
        </h2>
      </div>

      <div class="grid xl:grid-cols-3 grid-cols-1 gap-base place-items-center">
        <TestimonialCard v-for="(testimonial, index) in testimonialData" :key="index" :testimonial="testimonial" />
      </div>

      <div class="mx-auto mt-15 lg:w-3/4">
        <div class="flex flex-wrap justify-center gap-12 pt-7.5">
          <div v-for="(logo, index) in clients" :key="index">
            <RouterLink to="" class="block">
              <img :src="logo" alt="logo" class="h-10.5" />
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import TestimonialCard from './TestimonialCard.vue'
import { testimonialData } from './data'
import bgPattern from '/images/bg-pattern.png'
import client1 from '/images/clients/01.svg'
import client2 from '/images/clients/02.svg'
import client3 from '/images/clients/03.svg'
import client4 from '/images/clients/04.svg'
import client5 from '/images/clients/05.svg'
import client6 from '/images/clients/06.svg'
import client7 from '/images/clients/07.svg'

const clients = [client1, client2, client3, client4, client5, client6, client7]
</script>
