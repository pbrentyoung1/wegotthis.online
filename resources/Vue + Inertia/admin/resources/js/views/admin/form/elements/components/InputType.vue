<template>
  <BCard no-body>
    <BCardHeader>
      <BCardTitle>Input Type</BCardTitle>
    </BCardHeader>
    <BCardBody>
      <form>
        <!-- Email Input -->
        <BRow class="g-lg-4 g-2 mb-3">
          <BCol lg="2">
            <label for="example-email" class="col-form-label">Email</label>
          </BCol>
          <BCol lg="5">
            <BFormInput type="email" id="example-email" name="example-email" placeholder="Email" />
          </BCol>
        </BRow>

        <div class="border-top border-dashed my-3"></div>

        <!-- Password -->
        <BRow class="g-lg-4 g-2 mb-3">
          <BCol lg="2">
            <label for="example-password" class="col-form-label">Password</label>
          </BCol>
          <BCol lg="5">
            <BFormInput type="password" id="example-password" value="password" />
          </BCol>
        </BRow>

        <div class="border-top border-dashed my-3"></div>

        <!-- Show/Hide Password -->
        <BRow class="g-lg-4 g-2 mb-3">
          <BCol lg="2">
            <label for="password" class="col-form-label">Show/Hide Password</label>
          </BCol>
          <BCol lg="5">
            <BInputGroup data-password>
              <BFormInput id="password" :type="showPassword ? 'text' : 'password'" placeholder="Enter your password" />
              <BInputGroupText class="password-eye" @click="togglePassword" style="cursor: pointer">
                <Icon icon="eye" :class="showPassword ? 'd-block' : 'd-none'" data-pass="show" />
                <Icon icon="eye-off" :class="showPassword ? 'd-none' : 'd-block'" data-pass="hide" />
              </BInputGroupText>
            </BInputGroup>
          </BCol>
        </BRow>

        <div class="border-top border-dashed my-3"></div>

        <!-- Month -->
        <BRow class="g-lg-4 g-2 mb-3">
          <BCol lg="2">
            <label for="example-month" class="col-form-label">Month</label>
          </BCol>
          <BCol lg="5">
            <BFormInput id="example-month" type="month" name="month" />
          </BCol>
        </BRow>

        <div class="border-top border-dashed my-3"></div>

        <!-- Time -->
        <BRow class="g-lg-4 g-2 mb-3">
          <BCol lg="2">
            <label for="example-time" class="col-form-label">Time</label>
          </BCol>
          <BCol lg="5">
            <BFormInput id="example-time" type="time" name="time" />
          </BCol>
        </BRow>

        <div class="border-top border-dashed my-3"></div>

        <!-- Week -->
        <BRow class="g-lg-4 g-2 mb-3">
          <BCol lg="2">
            <label for="example-week" class="col-form-label">Week</label>
          </BCol>
          <BCol lg="5">
            <BFormInput id="example-week" type="week" name="week" />
          </BCol>
        </BRow>

        <div class="border-top border-dashed my-3"></div>

        <!-- Number -->
        <BRow class="g-lg-4 g-2 mb-3">
          <BCol lg="2">
            <label for="example-number" class="col-form-label">Number</label>
          </BCol>
          <BCol lg="5">
            <BFormInput id="example-number" type="number" name="number" />
          </BCol>
        </BRow>

        <div class="border-top border-dashed my-3"></div>

        <!-- Color -->
        <BRow class="g-lg-4 g-2 mb-3">
          <BCol lg="2">
            <label for="example-color" class="col-form-label">Color</label>
          </BCol>
          <BCol lg="5">
            <BFormInput v-model="color" id="example-color" type="color" name="color" value="#3b97de" />
          </BCol>
        </BRow>

        <div class="border-top border-dashed my-3"></div>

        <!-- Range -->
        <BRow class="g-lg-4 g-2 mb-3">
          <BCol lg="2">
            <label for="example-range" class="col-form-label">Range</label>
          </BCol>
          <BCol lg="5">
            <input v-model="range" class="form-range" id="example-range" type="range" name="range" min="0" max="100" />
          </BCol>
        </BRow>
      </form>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'

const color = ref('#1ab394')
const range = ref(50)
const showPassword = ref(false)

const togglePassword = () => {
  showPassword.value = !showPassword.value
}
</script>
