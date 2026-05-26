<template>
  <div class="p-0 w-100">
    <BRow class="w-100 g-0">
      <BCol xl="6">
        <BCard no-body class="border-0 mb-0">
          <BCardBody class="min-vh-100 d-flex flex-column justify-content-center">
            <div class="auth-brand text-center mb-0">
              <AuthLogo />
            </div>
            <div class="mt-auto">
              <div class="p-4 text-center">
                <h3 class="fw-bold my-2">Big things are on the Way</h3>
                <p class="text-muted mb-0">We're crafting something awesome. Stay tuned!</p>

                <BRow class="row text-center justify-content-center my-4 g-4">
                  <BCol sm="4" md="3" cols="6" class="col-lg">
                    <div class="bg-light bg-opacity-25 py-4 px-2 rounded shadow-inner">
                      <h2 class="fw-bold text-primary fs-36">{{ days }}</h2>
                      <p class="fw-semibold fs-xs mb-0">Days</p>
                    </div>
                  </BCol>

                  <BCol sm="4" md="3" cols="6" class="col-lg">
                    <div class="bg-light bg-opacity-25 py-4 px-2 rounded shadow-inner">
                      <h3 class="fw-bold text-primary fs-36">{{ hours }}</h3>
                      <p class="fw-semibold fs-xs mb-0">Hours</p>
                    </div>
                  </BCol>

                  <BCol sm="4" md="3" cols="6" class="col-lg">
                    <div class="bg-light bg-opacity-25 py-4 px-2 rounded shadow-inner">
                      <h3 class="fw-bold text-primary fs-36">{{ minutes }}</h3>
                      <p class="fw-semibold fs-xs mb-0">Minutes</p>
                    </div>
                  </BCol>

                  <BCol sm="4" md="3" cols="6" class="col-lg">
                    <div class="bg-light bg-opacity-25 py-4 px-2 rounded shadow-inner">
                      <h3 class="fw-bold text-primary fs-36">{{ seconds }}</h3>
                      <p class="fw-semibold fs-xs mb-0">Seconds</p>
                    </div>
                  </BCol>
                </BRow>

                <div class="error-glitch fs-xl">Stay tunned!</div>

                <div class="app-search app-search-pill w-xl-75 mx-auto input-group mt-3 rounded-pill">
                  <BFormInput type="text" class="py-2" placeholder="Enter email..." />
                  <Icon icon="mail" class="app-search-icon text-muted" />
                  <BButton variant="secondary" type="button">Notify me!</BButton>
                </div>
              </div>
            </div>

            <p class="text-center text-muted mt-auto mb-0">
              © {{ currentYear }} {{ META_DATA.name }} — by <span class="fw-bold">{{ META_DATA.author }}</span>
            </p>
          </BCardBody>
        </BCard>
      </BCol>

      <BCol>
        <div class="h-100 position-relative card-side-img rounded-0 overflow-hidden" style="background-image: url('/images/auth.jpg')">
          <div class="p-4 card-img-overlay auth-overlay d-flex align-items-end justify-content-center" />
        </div>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { BButton, BCard, BCardBody, BCol, BFormInput, BRow } from 'bootstrap-vue-next'
import { onMounted, onUnmounted, ref } from 'vue'
import AuthLogo from '@/components/AuthLogo.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { currentYear, META_DATA } from '@/config/constants'

const days = ref(0)
const hours = ref(0)
const minutes = ref(0)
const seconds = ref(0)

let interval: ReturnType<typeof setInterval> | null = null

const targetDate = new Date()
targetDate.setDate(targetDate.getDate() + 10)

const updateCountdown = () => {
  const now = new Date().getTime()
  const distance = targetDate.getTime() - now

  days.value = Math.floor(distance / (1000 * 60 * 60 * 24))
  hours.value = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
  minutes.value = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
  seconds.value = Math.floor((distance % (1000 * 60)) / 1000)
}

onMounted(() => {
  updateCountdown()
  interval = setInterval(updateCountdown, 1000)
})

onUnmounted(() => {
  if (interval) {
    clearInterval(interval)
  }
})

</script>
