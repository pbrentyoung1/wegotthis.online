<template>
  <div id="simple-messages-dropdown" class="topbar-item hs-dropdown relative inline-flex [--auto-close:inside] [--placement:bottom-right]">
    <button class="topbar-link hs-dropdown-toggle relative flex items-center" type="button" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
      <Icon icon="mail" class="topbar-link-icon" />
      <span class="badge bg-success absolute -end-px -top-[13px] size-4 rounded-full leading-0 text-white">7</span>
    </button>

    <div class="hs-dropdown-menu min-w-80 p-0 space-y-0" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-menu">
      <div class="border-default-300 border-b px-6 py-3">
        <div class="flex items-center justify-between">
          <h6 class="text-base font-semibold">Messages</h6>
          <a href="#" class="badge badge-label bg-success/15 text-success">09 Notifications</a>
        </div>
      </div>

      <simplebar style="max-height: 300px" data-simplebar>
        <div :id="`message-${idx}`" v-for="(message, idx) in messageData" :key="idx" :class="['hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 dropdown-item  px-4.5 py-3 text-wrap', { active: message.active }]">
          <span class="flex gap-base">
            <span class="shrink-0" v-if="message.image">
              <img :src="message.image" class="size-9 rounded-full" alt="User Avatar" />
            </span>
            <span v-if="message.icon" class="bg-info flex size-9 shrink-0 items-center justify-center rounded-full text-white">
              <Icon :icon="message.icon" class="text-xl" />
            </span>
            <span class="text-default-400 grow">
              <span class="text-body-color font-medium">{{ message.name }}</span>
              {{ message.action }}
              <span class="text-body-color font-medium">{{ message.context }}</span>
              <br />
              <span class="text-xs">{{ message.time }}</span>
            </span>
            <button type="button" class="text-default-400 btn btn-link shrink-0 p-0" :data-hs-remove-element="`#message-${idx}`">
              <Icon icon="square-rounded-x" class="text-xl" />
            </button>
          </span>
        </div>
      </simplebar>

      <a href="#" class="dropdown-item text-reset notify-item border-light justify-center border-t py-3 text-center font-bold underline underline-offset-2">Read All Messages</a>
    </div>
  </div>
</template>

<script setup lang="ts">
import simplebar from 'simplebar-vue'
import Icon from '~/components/wrappers/Icon.vue'
import user1 from '/images/users/user-1.jpg'
import user2 from '/images/users/user-2.jpg'
import user4 from '/images/users/user-4.jpg'
import user5 from '/images/users/user-5.jpg'
import user6 from '/images/users/user-6.jpg'

type MessageItemType = {
  name: string
  image?: string
  icon?: string
  action: string
  context: string
  time: string
  active?: boolean
}

const messageData: MessageItemType[] = [
  {
    name: 'Liam Carter',
    image: user1,
    action: 'uploaded a new document to',
    context: 'Project Phoenix',
    time: '5 minutes ago',
    active: true,
  },
  {
    name: 'Ava Mitchell',
    image: user2,
    action: 'commented on',
    context: 'Marketing Campaign Q3',
    time: '12 minutes ago',
  },
  {
    name: 'Noah Blake',
    icon: 'user-hexagon',
    action: 'updated the status of',
    context: 'Client Onboarding',
    time: '30 minutes ago',
  },
  {
    name: 'Sophia Taylor',
    image: user4,
    action: 'sent an invoice for',
    context: 'Service Renewal',
    time: '1 hour ago',
  },
  {
    name: 'Ethan Moore',
    image: user5,
    action: 'completed the task',
    context: 'UI Review',
    time: '2 hours ago',
  },
  {
    name: 'Olivia White',
    image: user6,
    action: 'assigned you a task in',
    context: 'Sales Pipeline',
    time: 'Yesterday',
  },
]
</script>
