<template>
  <div class="auth-box d-flex align-items-center">
    <BContainer fluid="xxl">
      <BRow class="align-items-center justify-content-center">
        <BCol xl="10">
          <BCard no-body class="rounded-4">
            <BRow class="justify-content-between g-0">
              <BCol lg="6">
                <div class="card-body">
                  <div class="auth-brand text-center mb-4">
                    <AuthLogo />
                    <h4 class="fw-bold mt-4">Confirm your password</h4>
                    <p class="text-muted w-lg-75 mx-auto">For security, confirm your password before continuing.</p>
                  </div>

                  <div class="text-center mb-4">
                    <div class="avatar-xxl mx-auto mb-3">
                      <div class="avatar-title rounded-circle bg-primary-subtle text-primary fs-1 fw-bold">
                        {{ initials }}
                      </div>
                    </div>
                    <h5 class="fs-md">{{ displayName }}</h5>
                  </div>

                  <BForm @submit.prevent="submit">
                    <BAlert v-if="form.hasErrors" variant="danger" model-value class="mb-3">
                      Please confirm your password to continue.
                    </BAlert>

                    <div class="mb-3">
                      <label for="userPassword" class="form-label"> Password <span class="text-danger">*</span> </label>
                      <BFormInput v-model="form.password" type="password" id="userPassword" placeholder="••••••••" autocomplete="current-password" required />
                      <div v-if="form.errors.password" class="invalid-feedback d-block">{{ form.errors.password }}</div>
                    </div>

                    <div class="d-grid">
                      <BButton type="submit" variant="primary" class="fw-semibold py-2" :disabled="form.processing">Continue</BButton>
                    </div>
                  </BForm>

                  <p class="text-muted text-center mt-4 mb-0">
                    Not you? Return to
                    <Link href="/login" class="text-decoration-underline link-offset-3 fw-semibold"> Sign in </Link>
                  </p>

                  <p class="text-center text-muted mt-4 mb-0">
                    © {{ currentYear }} {{ META_DATA.name }} — by
                    <span class="fw-semibold">{{ META_DATA.author }}</span>
                  </p>
                </div>
              </BCol>

              <BCol lg="6" class="d-none d-lg-block">
                <div class="h-100 position-relative card-side-img rounded-end-4 overflow-hidden" style="background-image: url('/images/auth.jpg')">
                  <div class="p-4 card-img-overlay rounded-4 rounded-start-0 auth-overlay d-flex align-items-end justify-content-center" />
                </div>
              </BCol>
            </BRow>
          </BCard>
        </BCol>
      </BRow>
    </BContainer>
  </div>
</template>

<script setup lang="ts">
import { Link, useForm, usePage } from '@inertiajs/vue3'

import { BAlert, BButton, BCard, BCol, BContainer, BForm, BFormInput, BRow } from 'bootstrap-vue-next'
import { computed } from 'vue'
import AuthLogo from '@/components/AuthLogo.vue'
import { currentYear, META_DATA } from '@/config/constants'

const page = usePage<{
  auth: {
    user: {
      name?: string | null
    } | null
  }
}>()

const displayName = computed(() => page.props.auth.user?.name || META_DATA.username)
const initials = computed(() => displayName.value
  .split(' ')
  .map((part) => part[0])
  .join('')
  .slice(0, 2)
  .toUpperCase())

const form = useForm({
  password: '',
})

const submit = () => {
  form.post('/user/confirm-password', {
    preserveScroll: true,
    onFinish: () => form.reset('password'),
  })
}
</script>
