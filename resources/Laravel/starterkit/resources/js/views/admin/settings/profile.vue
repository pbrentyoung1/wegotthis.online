<template>
  <PageBreadcrumb title="Account Settings" subtitle="Profile" subtitle-url="/settings/profile" />

  <SettingsHero />

  <div class="settings-card-wrap">
    <BAlert v-if="status === 'profile-updated'" variant="success" model-value class="mb-4">
      Your account settings were updated.
    </BAlert>

    <BAlert v-if="status === 'verification-link-sent'" variant="success" model-value class="mb-4">
      A fresh verification link has been sent to your inbox.
    </BAlert>

    <BCard no-body class="border-0 shadow-sm mb-4">
      <div class="card-body">
        <BForm @submit.prevent="submitProfile">
            <h5 class="settings-section-title">
              <Icon icon="user-circle" />
              Personal info
            </h5>

            <BRow class="g-3 mb-4">
              <BCol md="6">
                <label for="profileName" class="form-label">Full name</label>
                <BFormInput id="profileName" v-model="profileForm.name" autocomplete="name" required />
                <div v-if="profileForm.errors.name" class="invalid-feedback d-block">{{ profileForm.errors.name }}</div>
              </BCol>

              <BCol md="6">
                <label for="profileJobTitle" class="form-label">Job title</label>
                <BFormInput id="profileJobTitle" v-model="profileForm.job_title" autocomplete="organization-title" />
                <div v-if="profileForm.errors.job_title" class="invalid-feedback d-block">{{ profileForm.errors.job_title }}</div>
              </BCol>

              <BCol md="6">
                <label for="profileEmail" class="form-label">Email address</label>
                <BFormInput id="profileEmail" v-model="profileForm.email" type="email" autocomplete="email" required />
                <div v-if="profileForm.errors.email" class="invalid-feedback d-block">{{ profileForm.errors.email }}</div>
              </BCol>

              <BCol md="6">
                <label for="profilePhone" class="form-label">Phone number</label>
                <BFormInput id="profilePhone" v-model="profileForm.phone" autocomplete="tel" />
                <div v-if="profileForm.errors.phone" class="invalid-feedback d-block">{{ profileForm.errors.phone }}</div>
              </BCol>

              <BCol md="6">
                <label for="profileDepartment" class="form-label">Department</label>
                <BFormInput id="profileDepartment" v-model="profileForm.department" />
                <div v-if="profileForm.errors.department" class="invalid-feedback d-block">{{ profileForm.errors.department }}</div>
              </BCol>

              <BCol md="6">
                <label for="profileWebsite" class="form-label">Website</label>
                <BFormInput id="profileWebsite" v-model="profileForm.website" type="url" placeholder="https://example.org" />
                <div v-if="profileForm.errors.website" class="invalid-feedback d-block">{{ profileForm.errors.website }}</div>
              </BCol>

              <BCol cols="12">
                <label for="profileBio" class="form-label">Bio</label>
                <BFormTextarea id="profileBio" v-model="profileForm.bio" rows="4" placeholder="A short profile summary helps people understand your role and focus." />
                <div v-if="profileForm.errors.bio" class="invalid-feedback d-block">{{ profileForm.errors.bio }}</div>
              </BCol>
            </BRow>

            <h5 class="settings-section-title">
              <Icon icon="map-pin" />
              Location
            </h5>

            <BRow class="g-3 mb-4">
              <BCol md="4">
                <label for="profileCity" class="form-label">City</label>
                <BFormInput id="profileCity" v-model="profileForm.city" />
                <div v-if="profileForm.errors.city" class="invalid-feedback d-block">{{ profileForm.errors.city }}</div>
              </BCol>

              <BCol md="4">
                <label for="profileState" class="form-label">State</label>
                <BFormInput id="profileState" v-model="profileForm.state" />
                <div v-if="profileForm.errors.state" class="invalid-feedback d-block">{{ profileForm.errors.state }}</div>
              </BCol>

              <BCol md="4">
                <label for="profileCountry" class="form-label">Country</label>
                <BFormInput id="profileCountry" v-model="profileForm.country" />
                <div v-if="profileForm.errors.country" class="invalid-feedback d-block">{{ profileForm.errors.country }}</div>
              </BCol>

              <BCol md="6">
                <label for="profileTimezone" class="form-label">Timezone</label>
                <BFormInput id="profileTimezone" v-model="profileForm.timezone" placeholder="America/Chicago" />
                <div v-if="profileForm.errors.timezone" class="invalid-feedback d-block">{{ profileForm.errors.timezone }}</div>
              </BCol>
            </BRow>

            <h5 class="settings-section-title">
              <Icon icon="world" />
              Social
            </h5>

            <BRow class="g-3 mb-4">
              <BCol md="6">
                <label for="profileFacebook" class="form-label">Facebook URL</label>
                <div class="input-group">
                  <span class="input-group-text"><Icon icon="brand-facebook" /></span>
                  <BFormInput id="profileFacebook" v-model="profileForm.facebook_url" type="url" />
                </div>
                <div v-if="profileForm.errors.facebook_url" class="invalid-feedback d-block">{{ profileForm.errors.facebook_url }}</div>
              </BCol>

              <BCol md="6">
                <label for="profileInstagram" class="form-label">Instagram handle</label>
                <div class="input-group">
                  <span class="input-group-text"><Icon icon="brand-instagram" /></span>
                  <BFormInput id="profileInstagram" v-model="profileForm.instagram_handle" />
                </div>
                <div v-if="profileForm.errors.instagram_handle" class="invalid-feedback d-block">{{ profileForm.errors.instagram_handle }}</div>
              </BCol>

              <BCol md="6">
                <label for="profileLinkedin" class="form-label">LinkedIn URL</label>
                <div class="input-group">
                  <span class="input-group-text"><Icon icon="brand-linkedin" /></span>
                  <BFormInput id="profileLinkedin" v-model="profileForm.linkedin_url" type="url" />
                </div>
                <div v-if="profileForm.errors.linkedin_url" class="invalid-feedback d-block">{{ profileForm.errors.linkedin_url }}</div>
              </BCol>

              <BCol md="6">
                <label for="profileX" class="form-label">X handle</label>
                <div class="input-group">
                  <span class="input-group-text"><Icon icon="brand-x" /></span>
                  <BFormInput id="profileX" v-model="profileForm.x_handle" />
                </div>
                <div v-if="profileForm.errors.x_handle" class="invalid-feedback d-block">{{ profileForm.errors.x_handle }}</div>
              </BCol>
            </BRow>

            <div v-if="mustVerifyEmail && !isVerified" class="border border-warning-subtle bg-warning-subtle rounded-3 p-3 mb-4">
              <p class="mb-2 fw-semibold text-warning-emphasis">Email verification is still pending.</p>
              <p class="mb-3 text-muted">Use Mailpit locally to inspect the verification message.</p>
              <BButton type="button" variant="warning" @click="resendVerification" :disabled="verificationForm.processing">
                Resend verification email
              </BButton>
            </div>

            <div class="text-end">
              <BButton type="submit" variant="success" :disabled="profileForm.processing">Save changes</BButton>
            </div>
        </BForm>
      </div>
    </BCard>

    <BCard no-body class="border-danger-subtle shadow-sm">
      <div class="card-body">
        <h5 class="settings-section-title text-danger-emphasis">
          <Icon icon="trash" />
          Delete account
        </h5>
        <p class="text-muted">This permanently removes your access and account data from this environment.</p>

        <BForm @submit.prevent="submitDelete">
          <div class="mb-3">
            <label for="deletePassword" class="form-label">Confirm with your password</label>
            <BFormInput id="deletePassword" v-model="deleteForm.password" type="password" autocomplete="current-password" required />
            <div v-if="deleteForm.errors.password" class="invalid-feedback d-block">{{ deleteForm.errors.password }}</div>
          </div>

          <div class="text-end">
            <BButton type="submit" variant="danger" :disabled="deleteForm.processing">Delete account</BButton>
          </div>
        </BForm>
      </div>
    </BCard>
  </div>
</template>

<script setup lang="ts">
import { useForm, usePage } from '@inertiajs/vue3'
import { BAlert, BButton, BCard, BCol, BForm, BFormInput, BFormTextarea, BRow } from 'bootstrap-vue-next'
import { computed } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import SettingsHero from './components/SettingsHero.vue'

const props = defineProps<{
  mustVerifyEmail: boolean
  profile: {
    jobTitle?: string | null
    department?: string | null
    phone?: string | null
    city?: string | null
    state?: string | null
    country?: string | null
    timezone?: string | null
    website?: string | null
    bio?: string | null
    facebookUrl?: string | null
    instagramHandle?: string | null
    linkedinUrl?: string | null
    xHandle?: string | null
  }
  status?: string | null
}>()

const page = usePage<{
  auth: {
    user: {
      name: string
      email: string
      email_verified_at?: string | null
    }
  }
}>()

const isVerified = computed(() => Boolean(page.props.auth.user.email_verified_at))

const profileForm = useForm({
  name: page.props.auth.user.name,
  email: page.props.auth.user.email,
  job_title: props.profile.jobTitle ?? '',
  department: props.profile.department ?? '',
  phone: props.profile.phone ?? '',
  city: props.profile.city ?? '',
  state: props.profile.state ?? '',
  country: props.profile.country ?? '',
  timezone: props.profile.timezone ?? '',
  website: props.profile.website ?? '',
  bio: props.profile.bio ?? '',
  facebook_url: props.profile.facebookUrl ?? '',
  instagram_handle: props.profile.instagramHandle ?? '',
  linkedin_url: props.profile.linkedinUrl ?? '',
  x_handle: props.profile.xHandle ?? '',
})

const verificationForm = useForm({})

const deleteForm = useForm({
  password: '',
})

const submitProfile = () => {
  profileForm.patch('/settings/profile', {
    preserveScroll: true,
  })
}

const resendVerification = () => {
  verificationForm.post('/email/verification-notification', {
    preserveScroll: true,
  })
}

const submitDelete = () => {
  deleteForm.delete('/settings/profile', {
    preserveScroll: true,
    onFinish: () => deleteForm.reset('password'),
  })
}
</script>

<style scoped>
.settings-card-wrap {
  margin: -3rem auto 0;
  max-width: 980px;
  position: relative;
  z-index: 2;
}

.settings-section-title {
  align-items: center;
  background: rgba(var(--bs-light-rgb), 0.35);
  border: 1px dashed var(--bs-border-color);
  border-radius: var(--bs-border-radius);
  display: flex;
  font-size: 0.875rem;
  gap: 0.375rem;
  justify-content: center;
  margin-bottom: 1.25rem;
  padding: 0.4rem 0.75rem;
  text-transform: uppercase;
}
</style>
