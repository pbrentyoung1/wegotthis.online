<template>
  <div class="flex flex-col gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Chat</h4>
      </div>

      <Simplebar class="card-body h-95 py-0" data-simplebar>
        <div v-for="(msg, idx) in chatMessages" :key="idx" :class="['my-5 flex items-start gap-2.5', msg.fromUser && 'justify-end']">
          <img v-if="!msg.fromUser" :src="msg.avatar" class="size-9 rounded-full" alt="User" />

          <div>
            <div :class="['rounded px-5 py-2.5 font-medium', msg.fromUser ? 'bg-info/15' : 'bg-warning/15']">
              {{ msg.message }}
            </div>

            <div :class="['mt-1.25 flex items-center gap-1 text-xs text-default-400', msg.fromUser && 'justify-end']">
              <Icon icon="clock" />
              {{ msg.time }}
            </div>
          </div>

          <img v-if="msg.fromUser" :src="msg.avatar" class="size-9 rounded-full" alt="User" />
        </div>
      </Simplebar>

      <div class="border-t border-dashed border-default-300 px-5 py-3.75">
        <form class="flex gap-2.5" @submit="handleSend">
          <div class="input-icon-group grow">
            <Icon icon="message-dots" class="input-icon text-default-400" />

            <input v-model="input" type="text" class="form-input border-light bg-light/20" placeholder="Enter message..." />
          </div>

          <button type="submit" class="btn btn-icon size-9.5 bg-primary text-white">
            <Icon icon="send-2" class="text-xl" />
          </button>
        </form>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-base md:grid-cols-2">
      <div>
        <div class="card border-0 bg-purple text-white">
          <div class="card-body">
            <div class="mb-5 flex items-center gap-2.5">
              <div>
                <span class="flex size-9 items-center justify-center rounded-full bg-light/20 text-white">
                  <Icon icon="phone" class="text-xl" />
                </span>
              </div>
              <p class="font-semibold">PHONE</p>
            </div>

            <h5 class="mb-1.25 text-white/75">+1 800 123 4567</h5>
            <h5 class="mb-0 text-white/75">+1 800 765 4321</h5>
          </div>
        </div>
      </div>

      <div>
        <div class="card border-0 bg-success text-white">
          <div class="card-body">
            <div class="mb-5 flex items-center gap-2.5">
              <div>
                <span class="flex size-9 items-center justify-center rounded-full bg-light/20 text-white">
                  <Icon icon="mail" class="text-xl" />
                </span>
              </div>
              <p class="font-semibold">EMAIL</p>
            </div>

            <h5 class="mb-1.25 text-white/75">support@example.com</h5>
            <h5 class="mb-0 text-white/75">sales@example.com</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import Simplebar from 'simplebar-vue'
import { ref } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'
import { messages } from './data'
import user2 from '/images/users/user-2.jpg'
import user5 from '/images/users/user-5.jpg'

const chatMessages = ref(messages)
const input = ref('')

const handleSend = (e: Event) => {
  e.preventDefault()
  const text = input.value.trim()
  if (!text) return

  const now = new Date()
  const h = now.getHours()
  const m = now.getMinutes()
  const ampm = h >= 12 ? 'pm' : 'am'
  const hour = h % 12 || 12
  const min = m < 10 ? `0${m}` : m
  const timeStr = `${hour}:${min} ${ampm}`

  chatMessages.value = [
    ...chatMessages.value,
    {
      message: text,
      time: timeStr,
      fromUser: true,
      avatar: user2,
    },
  ]

  input.value = ''

  setTimeout(() => {
    chatMessages.value = [
      ...chatMessages.value,
      {
        message: text,
        time: timeStr,
        fromUser: false,
        avatar: user5,
      },
    ]
  }, 1000)
}
</script>
