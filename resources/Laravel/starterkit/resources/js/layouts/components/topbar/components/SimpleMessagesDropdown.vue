<template>
  <div class="topbar-item" id="simple-messages-dropdown">
    <BDropdown offset="5" placement="bottom-end" :variant="null" no-caret toggle-class="topbar-link" menu-class="dropdown-menu-lg p-0 my-0">
      <template #button-content>
        <span class="topbar-link-icon">
          <Icon icon="mail" />
        </span>
        <BBadge class="text-bg-success badge-circle topbar-badge">{{ messageList.length }}</BBadge>
      </template>

      <div class="px-3 py-2 border-bottom">
        <BRow class="align-items-center">
          <BCol>
            <h6 class="m-0 fs-md fw-semibold">Messages</h6>
          </BCol>
          <BCol class="text-end">
            <a href="#" class="badge badge-soft-success badge-label py-1">{{ messageList.length }} Notifications</a>
          </BCol>
        </BRow>
      </div>

      <simplebar style="max-height: 300px">
        <div v-for="message in messageList" :class="['dropdown-item notification-item py-2 text-wrap', { active: message.active }]">
          <div class="d-flex gap-3">
            <template v-if="message.icon">
              <span class="avatar-md flex-shrink-0">
                <span :class="['avatar-title rounded-circle fs-22 text-bg-info']">
                  <Icon :icon="message.icon" class="fs-22" />
                </span>
              </span>
            </template>

            <template v-if="message.avatar">
              <span class="flex-shrink-0">
                <img :src="message.avatar" height="36" width="36" class="avatar-md rounded-circle" alt="User Avatar" />
              </span>
            </template>

            <span class="flex-grow-1 text-muted">
              <span class="fw-medium text-body">{{ message.name }}</span>
              {{ message.message }}
              <span class="fw-medium text-body">{{ message.project }}</span>
              <br />
              <span class="fs-xs">{{ message.time }}</span>
            </span>

            <BButton variant="link" type="button" class="flex-shrink-0 text-muted p-0" @click.stop.prevent="dismissMessage(message.id)">
              <Icon icon="square-rounded-x" class="fs-xxl" />
            </BButton>
          </div>
        </div>
      </simplebar>

      <Link href="" class="dropdown-item text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2"> Read All Messages </Link>
    </BDropdown>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import simplebar from 'simplebar-vue'
import { ref } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'
import user1 from '/images/users/user-1.jpg'
import user2 from '/images/users/user-2.jpg'
import user4 from '/images/users/user-4.jpg'
import user5 from '/images/users/user-5.jpg'
import user6 from '/images/users/user-6.jpg'

type MessageType = {
  id: string
  name: string
  message: string
  project: string
  time: string
  avatarType: 'image' | 'icon'
  avatar?: string
  icon?: string
  avatarBg?: string
  active?: boolean
}

const messageData: MessageType[] = [
  {
    id: 'message-1',
    name: 'Liam Carter',
    message: 'uploaded a new document to',
    project: 'Project Phoenix',
    time: '5 minutes ago',
    avatarType: 'image',
    avatar: user1,
    active: true,
  },
  {
    id: 'message-2',
    name: 'Ava Mitchell',
    message: 'commented on',
    project: 'Marketing Campaign Q3',
    time: '12 minutes ago',
    avatarType: 'image',
    avatar: user2,
  },
  {
    id: 'message-3',
    name: 'Noah Blake',
    message: 'updated the status of',
    project: 'Client Onboarding',
    time: '30 minutes ago',
    avatarType: 'icon',
    icon: 'user-hexagon',
    avatarBg: 'text-bg-info',
  },
  {
    id: 'message-4',
    name: 'Sophia Taylor',
    message: 'sent an invoice for',
    project: 'Service Renewal',
    time: '1 hour ago',
    avatarType: 'image',
    avatar: user4,
  },
  {
    id: 'message-5',
    name: 'Ethan Moore',
    message: 'completed the task',
    project: 'UI Review',
    time: '2 hours ago',
    avatarType: 'image',
    avatar: user5,
  },
  {
    id: 'message-6',
    name: 'Olivia White',
    message: 'assigned you a task in',
    project: 'Sales Pipeline',
    time: 'Yesterday',
    avatarType: 'image',
    avatar: user6,
  },
]

const messageList = ref<MessageType[]>(messageData)

const dismissMessage = (id: string) => {
  messageList.value = messageList.value.filter((item) => item.id !== id)
}
</script>
