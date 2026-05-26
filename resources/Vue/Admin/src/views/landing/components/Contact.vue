<template>
  <section class="py-12 lg:py-26" id="contact">
    <div class="container">
      <div class="text-center">
        <span class="inline-block rounded-xl text-default-400">📞 We're Here to Help</span>
        <h2 class="mt-5 mb-15 text-xl font-bold md:text-2xl">
          Get in Touch with
          <mark class="bg-warning/20 text-default-800 italic">Our Team</mark>
        </h2>
      </div>

      <div class="grid grid-cols-1 gap-base xl:grid-cols-3">
        <div class="col-span-1">
          <div class="p-7.5">
            <div class="mb-15 flex gap-5">
              <div class="shrink-0">
                <span class="flex size-12 items-center justify-center rounded-full bg-secondary/15 text-secondary">
                  <IconifyIcon icon="tabler:phone-call" class="text-2xl" />
                </span>
              </div>
              <div>
                <span class="text-default-400">Contact Numbers</span>
                <h5 class="my-2.5">+1 (800) 123-4567</h5>
                <h5>+1 (415) 987-6543</h5>
              </div>
            </div>

            <div class="mb-15 flex gap-5">
              <div class="shrink-0">
                <span class="flex size-12 items-center justify-center rounded-full bg-secondary/15 text-secondary">
                  <IconifyIcon icon="tabler:mail" class="text-2xl" />
                </span>
              </div>
              <div>
                <span class="text-default-400">Email</span>
                <h5 class="my-2.5">support@yourcompany.com</h5>
                <h5>info@yourcompany.com</h5>
              </div>
            </div>

            <div class="flex gap-5">
              <div class="shrink-0">
                <span class="flex size-12 items-center justify-center rounded-full bg-secondary/15 text-secondary">
                  <IconifyIcon icon="tabler:map-pin" class="text-2xl" />
                </span>
              </div>
              <div>
                <span class="text-default-400">Address</span>
                <h5 class="my-1.25">{{ META_DATA.name }} HQ, 123 Market Street, 5th Floor, Financial District, San Francisco, CA 94103, United States</h5>
              </div>
            </div>
          </div>
        </div>

        <div class="xl:col-span-2">
          <form class="rounded-xl border border-dashed border-default-300 p-7.5">
            <div class="grid grid-cols-1 gap-base md:grid-cols-2">
              <div class="col-span-1">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-input bg-transparent! py-2.5" id="name" autocomplete="name" placeholder="Enter your full name" />
              </div>

              <div class="col-span-1">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-input bg-transparent! py-2.5" id="email" autocomplete="email" placeholder="Enter your email" />
              </div>

              <div class="md:col-span-2">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-input bg-transparent! py-2.5" id="subject" placeholder="What’s the reason for contact?" />
              </div>

              <div class="md:col-span-2">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-textarea bg-transparent! py-2.5" id="message" rows="5" placeholder="Write your message here..."></textarea>
              </div>

              <div class="text-end md:col-span-2">
                <button type="submit" class="btn rounded-full bg-primary text-white hover:bg-primary-hover">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import { META_DATA } from '~/config/constants'
</script>
