<template>
  <PageBreadcrumb title="Idle Timer" subtitle="Plugins" />
  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Idle Timer Plugin</h4>
        </div>
        <div class="card-body">
          
            <Vidle :duration="inactiveDuration" @idle="handleIdle" @refresh="handleActive" />
          
          <div class="bg-danger/15 text-danger idle-alert mb-4 hidden rounded px-4 py-3" role="alert" v-if="state === 'Inactive'">Your session has expired. Please move your mouse to resume your activity.</div>

          <p class="text-default-400">The Idle Timer plugin allows you to monitor user activity on the page. Idle is defined as a lack of mouse movement, scrolling, or keyboard input.</p>

          <div class="p-6 text-center">
            <Icon icon="fingerprint" class="block mb-5 text-4xl mx-auto"></Icon>
            <h3 class="mb-2 text-2xl italic">Please stay idle for 5 seconds</h3>
          </div>

          <p>
            You can instantiate the timer either statically or on a specific element. Element-bound timers will only track activity within that element, whereas global timers will monitor activity on the entire page. To set up page-level activity, you can initialize the timer on
            <code>document</code>
            ,
            <code>document.documentElement</code>
            , or
            <code>document.body</code>
            . The initialization returns a jQuery object, allowing for method chaining.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { toast } from 'vue3-toastify'
import 'vue3-toastify/dist/index.css'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'

const inactiveDuration = 5

const state = ref<'Active' | 'Inactive'>('Active')

const handleIdle = () => {
  state.value = 'Inactive'
  toast.warning("You've been inactive for too long. Please interact with the page to continue.", {
    position: 'top-right',
    autoClose: 2000,
  })
}

const handleActive = () => {
  if (state.value === 'Inactive') {
    toast.success('We missed you! Welcome back!', {
      position: 'top-right',
      autoClose: 2000,
    })
    state.value = 'Active'
  }
}
</script>
