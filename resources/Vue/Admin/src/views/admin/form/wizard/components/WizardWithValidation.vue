<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Validation Support</h4>
    </div>

    <div class="card-body">
      <div id="hs-stepper-validation">
        <ul class="relative flex flex-wrap gap-1.25">
          <li v-for="(step, idx) in wizardSteps" :key="idx" :class="['group  items-center gap-x-2', idx + 1 === currentStep && 'active', idx + 1 < currentStep && 'success']">
            <span class="group inline-flex items-center align-middle text-xs focus:outline-hidden disabled:pointer-events-none disabled:opacity-50">
              <button
                class="flex shrink-0 items-center justify-center gap-3 rounded border border-dashed border-default-300 px-4 py-2 font-medium hs-stepper-active:bg-default-50 hs-stepper-active:text-default-700 hs-stepper-success:border-success hs-stepper-success:bg-success/10 hs-stepper-success:text-success"
              >
                <Icon :icon="step.icon" class="size-8" />
                <div>
                  <span class="block text-sm font-semibold">{{ step.title }}</span>
                  <span class="text-2xs">{{ step.subtitle }}</span>
                </div>
              </button>
            </span>
          </li>
        </ul>

        <div class="pt-6">
          <div v-if="currentStep === 1">
            <div class="col-span-1 grid grid-cols-1 gap-base pb-base md:grid-cols-2">
              <div>
                <label class="form-label">Full Name</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="Enter your full name"
                  required
                  :class="{
                    'is-invalid': errors.fullName,
                    'is-valid': !errors.fullName && form.fullName,
                  }"
                  v-model="form.fullName"
                />
              </div>

              <div>
                <label class="form-label">Email</label>
                <input
                  type="email"
                  class="form-input"
                  placeholder="Enter your email"
                  required
                  :class="{
                    'is-invalid': errors.email,
                    'is-valid': !errors.email && form.email,
                  }"
                  v-model="form.email"
                />
              </div>

              <div>
                <label class="form-label">Phone Number</label>
                <input
                  type="phone"
                  class="form-input"
                  placeholder="Enter your phone number"
                  required
                  :class="{
                    'is-invalid': errors.phone,
                    'is-valid': !errors.phone && form.phone,
                  }"
                  v-model="form.phone"
                />
              </div>

              <div>
                <label class="form-label">Date of Birth</label>
                <input
                  type="date"
                  class="form-input"
                  required
                  :class="{
                    'is-invalid': errors.dob,
                    'is-valid': !errors.dob && form.dob,
                  }"
                  v-model="form.dob"
                />
              </div>
            </div>
          </div>

          <div v-if="currentStep === 2">
            <div class="col-span-1 grid gap-base pb-base md:grid-cols-2">
              <div>
                <label class="form-label">Street Address</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="123 Main St"
                  required
                  :class="{
                    'is-invalid': errors.street,
                    'is-valid': !errors.street && form.street,
                  }"
                  v-model="form.street"
                />
              </div>

              <div>
                <label class="form-label">City</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="e.g., New York"
                  required
                  :class="{
                    'is-invalid': errors.city,
                    'is-valid': !errors.city && form.city,
                  }"
                  v-model="form.city"
                />
              </div>

              <div>
                <label class="form-label">State</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="e.g., California"
                  required
                  :class="{
                    'is-invalid': errors.state,
                    'is-valid': !errors.state && form.state,
                  }"
                  v-model="form.state"
                />
              </div>

              <div>
                <label class="form-label">Zip Code</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="e.g., 10001"
                  required
                  :class="{
                    'is-invalid': errors.zip,
                    'is-valid': !errors.zip && form.zip,
                  }"
                  v-model="form.zip"
                />
              </div>
            </div>
          </div>

          <div v-if="currentStep === 3">
            <div class="col-span-1 grid gap-base pb-base md:grid-cols-2">
              <div>
                <label class="form-label">Choose Course</label>
                <select
                  class="form-select"
                  required
                  :class="{
                    'is-invalid': errors.course,
                    'is-valid': !errors.course && form.course,
                  }"
                  v-model="form.course"
                >
                  <option value="">Select</option>
                  <option value="Engineering">Engineering</option>
                  <option value="Medical">Medical</option>
                  <option value="Business">Business</option>
                </select>
              </div>

              <div>
                <label class="form-label">Enrollment Type</label>
                <select
                  class="form-select"
                  required
                  :class="{
                    'is-invalid': errors.enrollment,
                    'is-valid': !errors.enrollment && form.enrollment,
                  }"
                  v-model="form.enrollment"
                >
                  <option value="">Select</option>
                  <option value="Full Time">Full Time</option>
                  <option value="Part Time">Part Time</option>
                </select>
              </div>

              <div>
                <label class="form-label">Preferred Batch Time</label>
                <select
                  class="form-select"
                  required
                  :class="{
                    'is-valid': !errors.batch,
                    'is-invalid': errors.batch,
                  }"
                  v-model="form.batch"
                >
                  <option value="">Select Time</option>
                  <option value="Morning">Morning (8am – 12pm)</option>
                  <option value="Afternoon">Afternoon (1pm – 5pm)</option>
                  <option value="Evening">Evening (6pm – 9pm)</option>
                </select>
              </div>

              <div>
                <label class="form-label">Mode of Study</label>
                <select
                  class="form-select"
                  required
                  :class="{
                    'is-valid': !errors.mode,
                    'is-invalid': errors.mode,
                  }"
                  v-model="form.mode"
                >
                  <option value="">Select Mode</option>
                  <option value="Offline">Offline</option>
                  <option value="Online">Online</option>
                  <option value="Hybrid">Hybrid</option>
                </select>
              </div>
            </div>
          </div>

          <div v-if="currentStep === 4">
            <div class="col-span-1 grid gap-base pb-base md:grid-cols-2">
              <div>
                <label class="form-label">Parent/Guardian Name</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="e.g., John Doe"
                  required
                  :class="{
                    'is-valid': !errors.parentName,
                    'is-invalid': errors.parentName,
                  }"
                  v-model="form.parentName"
                />
              </div>

              <div>
                <label class="form-label">Relation</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="e.g., Father, Mother"
                  required
                  :class="{
                    'is-valid': !errors.relation,
                    'is-invalid': errors.relation,
                  }"
                  v-model="form.relation"
                />
              </div>

              <div>
                <label class="form-label">Parent Phone</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="e.g., +1 555 123 4567"
                  required
                  :class="{
                    'is-valid': !errors.parentPhone,
                    'is-invalid': errors.parentPhone,
                  }"
                  v-model="form.parentPhone"
                />
              </div>

              <div>
                <label class="form-label">Parent Email</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="e.g., parent@example.com"
                  required
                  :class="{
                    'is-valid': !errors.parentEmail,
                    'is-invalid': errors.parentEmail,
                  }"
                  v-model="form.parentEmail"
                />
              </div>
            </div>
          </div>

          <div v-if="currentStep === 5">
            <div class="grid grid-cols-1 gap-base pb-base">
              <div>
                <label class="form-label">Upload ID Proof</label>
                <input type="file" name="file-input" class="form-input" required />
              </div>

              <div>
                <label class="form-label">Upload Previous Marksheet</label>
                <input type="file" name="file-input" class="form-input" required />
              </div>
            </div>
          </div>

          <div class="mt-5 flex flex-wrap items-center justify-between gap-2">
            <button type="button" class="btn w-full bg-secondary text-white md:w-auto" data-hs-stepper-back-btn @click="back">← Back</button>

            <button type="button" class="btn w-full bg-primary text-white md:w-auto" data-hs-stepper-next-btn @click="next">Next →</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { reactive, ref } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'
import { wizardSteps } from './data'

type Step = 1 | 2 | 3 | 4 | 5

const currentStep = ref<Step>(1)

const form = reactive({
  fullName: '',
  email: '',
  phone: '',
  dob: '',
  street: '',
  city: '',
  state: '',
  zip: '',
  course: '',
  enrollment: '',
  batch: '',
  mode: '',
  parentName: '',
  relation: '',
  parentPhone: '',
  parentEmail: '',
})

const errors = reactive<Record<string, boolean>>({})

function validateStep(step: Step) {
  Object.keys(errors).forEach((k) => delete errors[k])

  if (step === 1) {
    errors.fullName = !form.fullName
    errors.email = !form.email
    errors.phone = !form.phone
    errors.dob = !form.dob
  }

  if (step === 2) {
    errors.street = !form.street
    errors.city = !form.city
    errors.state = !form.state
    errors.zip = !form.zip
  }

  if (step === 3) {
    errors.course = !form.course
    errors.enrollment = !form.enrollment
    errors.batch = !form.batch
    errors.mode = !form.mode
  }

  if (step === 4) {
    errors.parentName = !form.parentName
    errors.relation = !form.relation
    errors.parentPhone = !form.parentPhone
    errors.parentEmail = !form.parentEmail
  }

  return !Object.values(errors).some(Boolean)
}

function next() {
  if (!validateStep(currentStep.value)) return
  if (currentStep.value < 5) currentStep.value++
}

function back() {
  if (currentStep.value > 1) currentStep.value--
}
</script>
