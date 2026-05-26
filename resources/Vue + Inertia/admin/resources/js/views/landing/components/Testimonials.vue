<template>
  <section class="section-custom position-relative overflow-hidden" id="reviews">
    <div class="position-absolute top-0 start-50 translate-middle-x mt-5 opacity-50">
      <img src="/images/bg-pattern.png" alt="Background pattern" />
    </div>

    <BContainer class="position-relative">
      <BRow>
        <BCol cols="12" class="text-center">
          <span class="text-muted rounded-3 d-inline-block">💬 What Our Customers Are Saying</span>
          <h2 class="mt-3 fw-bold mb-5">
            Real Feedback from
            <mark class="fst-italic">Satisfied</mark>
            Clients
          </h2>
        </BCol>
      </BRow>

      <BRow class="justify-content-center">
        <BCol lg="4" v-for="(testimonial, index) in testimonialData" :key="index">
          <TestimonialCard :testimonial="testimonial" />
        </BCol>
      </BRow>

      <BRow class="justify-content-center mt-5">
        <BCol xxl="9">
          <div class="d-flex justify-content-center align-items-center flex-wrap gap-5 mt-4">
            <div v-for="(logo, index) in clients" :key="index">
              <Link href="" class="d-block">
                <img :src="logo" alt="logo" height="42" />
              </Link>
            </div>
          </div>
        </BCol>
      </BRow>
    </BContainer>
  </section>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import TestimonialCard from './TestimonialCard.vue'
import { testimonialData } from './data'

const client1 = '/images/clients/01.svg'
const client2 = '/images/clients/02.svg'
const client3 = '/images/clients/03.svg'
const client4 = '/images/clients/04.svg'
const client5 = '/images/clients/05.svg'
const client6 = '/images/clients/06.svg'
const client7 = '/images/clients/07.svg'

const clients = [client1, client2, client3, client4, client5, client6, client7]
</script>
