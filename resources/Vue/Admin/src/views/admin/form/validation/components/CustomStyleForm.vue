<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Custom styles Validation</h4>
    </div>

    <div class="card-body">
      <form id="tailwindValidationForm" class="grid grid-cols-1 gap-base md:grid-cols-12" novalidate @submit="handleSubmit">
        <div class="md:col-span-4">
          <label class="form-label">First Name</label>

          <div class="relative">
            <input
              type="text"
              class="input-field form-input"
              :class="{
                'border-danger!': showInvalid('firstName'),
                'border-success!': showValid('firstName'),
              }"
              v-model="form.firstName"
              @input="handleInput('firstName', form.firstName)"
            />

            <Icon v-if="showValid('firstName')" icon="check" class="absolute top-1/2 right-3 -translate-y-1/2 text-success" />
            <Icon v-if="showInvalid('firstName')" icon="alert-circle" class="absolute top-1/2 right-3 -translate-y-1/2 text-danger" />
          </div>

          <p v-if="showValid('firstName')" class="mt-1 text-sm text-success">Looks great!</p>
          <p v-if="showInvalid('firstName')" class="mt-1 text-sm text-danger">Please provide your first name.</p>
        </div>

        <div class="md:col-span-4">
          <label class="form-label">Last Name</label>

          <div class="relative">
            <input
              type="text"
              class="input-field form-input"
              :class="{
                'border-danger!': showInvalid('lastName'),
                'border-success!': showValid('lastName'),
              }"
              v-model="form.lastName"
              @input="handleInput('lastName', form.lastName)"
            />

            <Icon v-if="showValid('lastName')" icon="check" class="absolute top-1/2 right-3 -translate-y-1/2 text-success" />
            <Icon v-if="showInvalid('lastName')" icon="alert-circle" class="absolute top-1/2 right-3 -translate-y-1/2 text-danger" />
          </div>

          <p v-if="showValid('lastName')" class="mt-1 text-sm text-success">Looks great!</p>
          <p v-if="showInvalid('lastName')" class="mt-1 text-sm text-danger">Please provide your last name.</p>
        </div>

        <div class="md:col-span-4">
          <label class="form-label">Username</label>

          <div class="input-group relative">
            <span class="input-group-text">@</span>

            <input
              type="text"
              class="input-field form-input"
              :class="{
                'border-danger!': showInvalid('username'),
                'border-success!': showValid('username'),
              }"
              v-model="form.username"
              @input="handleInput('username', form.username)"
            />

            <Icon v-if="showValid('username')" icon="check" class="absolute top-1/2 right-3 -translate-y-1/2 text-success" />
            <Icon v-if="showInvalid('username')" icon="alert-circle" class="absolute top-1/2 right-3 -translate-y-1/2 text-danger" />
          </div>

          <p v-if="showInvalid('username')" class="mt-1 text-sm text-danger">Please choose a valid username.</p>
        </div>

        <div class="md:col-span-6">
          <label class="form-label">City</label>

          <div class="relative">
            <input
              type="text"
              class="input-field form-input"
              :class="{
                'border-danger!': showInvalid('city'),
                'border-success!': showValid('city'),
              }"
              v-model="form.city"
              @input="handleInput('city', form.city)"
            />

            <Icon v-if="showValid('city')" icon="check" class="absolute top-1/2 right-3 -translate-y-1/2 text-success" />
            <Icon v-if="showInvalid('city')" icon="alert-circle" class="absolute top-1/2 right-3 -translate-y-1/2 text-danger" />
          </div>

          <p v-if="showInvalid('city')" class="mt-1 text-sm text-danger">Please provide a valid city name.</p>
        </div>

        <div class="md:col-span-3">
          <label class="form-label">State</label>
          <div class="relative">
            <select
              class="input-field form-input"
              :class="{
                'border-danger!': showInvalid('state'),
                'border-success!': showValid('state'),
              }"
              v-model="form.state"
              @change="handleInput('state', form.state)"
            >
              <option value="">Choose...</option>
              <option>California</option>
              <option>Texas</option>
              <option>New York</option>
              <option>Florida</option>
            </select>

            <Icon v-if="showValid('state')" icon="check" class="absolute top-1/2 right-7 -translate-y-1/2 text-success" />
            <Icon v-if="showInvalid('state')" icon="alert-circle" class="absolute top-1/2 right-7 -translate-y-1/2 text-danger" />
          </div>

          <p v-if="showInvalid('state')" class="mt-1 text-sm text-danger">Please select your state.</p>
        </div>

        <div class="md:col-span-3">
          <label class="form-label">Zip Code</label>
          <div class="relative">
            <input
              type="text"
              class="input-field form-input"
              :class="{
                'border-danger!': showInvalid('zip'),
                'border-success!': showValid('zip'),
              }"
              v-model="form.zip"
              @input="handleInput('zip', form.zip)"
            />

            <Icon v-if="showValid('zip')" icon="check" class="absolute top-1/2 right-3 -translate-y-1/2 text-success" />
            <Icon v-if="showInvalid('zip')" icon="alert-circle" class="absolute top-1/2 right-3 -translate-y-1/2 text-danger" />
          </div>

          <p v-if="showInvalid('zip')" class="mt-1 text-sm text-danger">Please enter a valid zip code.</p>
        </div>

        <div class="md:col-span-12">
          <div class="flex items-center">
            <input type="checkbox" class="form-checkbox" v-model="form.terms" @change="handleInput('terms', form.terms)" />
            <label class="ms-2 text-sm">I agree to the terms and conditions</label>
          </div>

          <p v-if="showInvalid('terms')" class="mt-2 text-sm text-danger">You must agree before submitting.</p>
        </div>

        <div class="md:col-span-12">
          <button type="submit" class="btn bg-primary text-white">Submit Form</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { reactive, ref } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'

type FormData = {
  firstName: string
  lastName: string
  username: string
  city: string
  state: string
  zip: string
  terms: boolean
}

type FieldName = keyof FormData

const form = reactive<FormData>({
  firstName: 'John',
  lastName: 'Doe',
  username: '',
  city: '',
  state: '',
  zip: '',
  terms: false,
})

const touched = reactive<Partial<Record<FieldName, boolean>>>({})
const submitted = ref<boolean>(false)

const requiredFields: FieldName[] = ['firstName', 'lastName', 'username', 'city', 'state', 'zip']

function validateField(name: FieldName, value: FormData[FieldName]): boolean {
  if (name === 'terms') return value === true
  return typeof value === 'string' && value.trim().length > 0
}

function isValid(name: FieldName): boolean {
  return validateField(name, form[name])
}

function showInvalid(name: FieldName): boolean {
  return (submitted.value || !!touched[name]) && !isValid(name)
}

function showValid(name: FieldName): boolean {
  return (submitted.value || !!touched[name]) && isValid(name)
}

function handleInput<K extends FieldName>(name: K, value: FormData[K]) {
  form[name] = value
  touched[name] = true
}

function handleSubmit(e: Event) {
  e.preventDefault()
  submitted.value = true

  const valid = requiredFields.every((f) => isValid(f)) && validateField('terms', form.terms)

  if (valid) {
    alert('Form submitted successfully!')
  }
}
</script>
