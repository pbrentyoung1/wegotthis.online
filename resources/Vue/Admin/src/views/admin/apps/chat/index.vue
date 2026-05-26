<template>
  <div>
    <PageBreadcrumb title="Chat" subtitle="Apps" />

    <div class="flex h-[calc(100vh-190px)]">
      <div id="chatSidebaroffcanvas" class="hs-overlay fixed start-0 top-0 bottom-0 z-70 h-full w-80 -translate-x-full transform transition-all duration-300 [--auto-close:lg] lg:static lg:block lg:translate-x-0 hs-overlay-open:translate-x-0" role="dialog">
        <ContactList :contacts="contactsData" :setContact="(contact) => (currentContact = contact)" />
      </div>

      <div class="card min-w-0 flex-1 rounded-s-none">
        <div class="card-header">
          <div class="flex items-center gap-4">
            <div class="flex items-center gap-2 text-start lg:hidden!">
              <button class="btn btn-sm btn-icon border-default-300">
                <Icon icon="menu" class="size-6 text-default-600" data-hs-overlay="#chatSidebaroffcanvas" />
              </button>
            </div>

            <div>
              <h5 class="mb-1.25 text-base">
                <a href="#" class="hover:text-primary">{{ currentContact?.name }}</a>
              </h5>

              <p class="flex items-center gap-1.5 text-default-400">
                <Icon icon="circle-filled" :class="currentContact?.isOnline ? 'text-success' : 'text-danger'" />
                {{ currentContact?.isOnline ? 'Active' : 'Offline' }}
              </p>
            </div>
          </div>

          <ChatToolbar />
        </div>

        <Simplebar ref="chatScroll" class="h-[calc(100vh-333px)]" data-simplebar>
          <div class="card-body py-0 pb-2.5">
            <template v-if="currentThread">
              <template v-for="message in currentThread.messages" :key="message.id">
                <div v-if="message.senderId === currentContact?.id" class="my-5 flex items-start gap-2.5">
                  <img v-if="currentContact.image" :src="currentContact.image" class="size-9 rounded-full" />

                  <div v-else class="flex size-9 items-center justify-center rounded-full bg-primary text-white">
                    {{ generateInitials(currentContact.name) }}
                  </div>

                  <div>
                    <div class="rounded bg-warning/15 px-6 py-3">
                      {{ message.text }}
                    </div>
                    <div class="mt-1.5 flex items-center gap-1 text-xs text-default-400"><Icon icon="clock" /> {{ message.time }}</div>
                  </div>
                </div>

                <div v-else-if="message.senderId === currentUser.id" class="my-5 flex justify-end gap-2.5">
                  <div>
                    <div class="rounded bg-info/15 px-6 py-3">
                      {{ message.text }}
                    </div>
                    <div class="mt-1.5 flex justify-end gap-1 text-xs text-default-400"><Icon icon="clock" /> {{ message.time }}</div>
                  </div>

                  <img v-if="currentUser.image" :src="currentUser.image" class="size-7 rounded-full" />

                  <div v-else class="flex size-7 items-center justify-center rounded-full bg-primary text-white">
                    {{ generateInitials(currentUser.name) }}
                  </div>
                </div>
              </template>
            </template>
          </div>
        </Simplebar>

        <div class="border-t border-dashed border-default-300 px-6 py-3.75">
          <div class="flex gap-2">
            <div class="input-icon-group grow">
              <Icon icon="message" class="input-icon" />
              <input v-model="messageText" type="text" class="form-input bg-light/20" placeholder="Enter message..." @keydown.enter="sendMessage" />
            </div>

            <button class="btn bg-primary text-white" @click="sendMessage">
              Send
              <Icon icon="send-2" class="ms-1 text-xl" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="createSingleChatModal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="createSingleChatModalLabel">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex min-h-[calc(100%-56px)] scale-95 opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-lg">
      <div class="card pointer-events-auto flex w-full flex-col">
        <div class="card-header">
          <h3 id="createSingleChatModalLabel" class="text-sm font-bold">Start New Chat</h3>
          <button type="button" aria-label="Close" data-hs-overlay="#createSingleChatModal">
            <Icon icon="x" class="text-xl" />
          </button>
        </div>

        <div class="card-body overflow-y-auto">
          <div class="mb-5">
            <label for="recipientUser" class="form-label">Recipient</label>
            <input type="text" class="form-input" id="recipientUser" placeholder="Enter username or email" required />
          </div>

          <div>
            <label for="initialMessage" class="form-label">Message</label>
            <textarea class="form-textarea" id="initialMessage" rows="3" placeholder="Type your message here..." required></textarea>
          </div>
        </div>

        <div class="border-default-300 flex items-center justify-end gap-x-2 border-t border-dashed p-5">
          <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#createSingleChatModal">Cancel</button>

          <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">Send Message</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { nextTick, onMounted, ref, watch } from 'vue'

import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import ChatToolbar from './components/ChatToolbar.vue'
import ContactList from './components/ContactList.vue'

import Simplebar from 'simplebar-vue'
import { generateInitials } from '~/utils/helpers'
import { contactsData, currentUser, messageThreadsData, type ChatThreadType, type ContactType } from './components/data'

const messageText = ref('')

const currentContact = ref<ContactType>(contactsData[0]!)
const currentThread = ref<ChatThreadType | null>(messageThreadsData[0]!)

const chatScroll = ref<any>(null)

const scrollToBottom = async () => {
  await nextTick()

  const el = chatScroll.value?.$el?.querySelector('.simplebar-content-wrapper') as HTMLElement | null

  if (el) {
    el.scrollTop = el.scrollHeight
  }
}

watch(currentContact, async (newContact) => {
  const foundThread = messageThreadsData.find((thread) => thread.participants.some((p) => p.id === newContact.id))
  currentThread.value = foundThread || null
  await scrollToBottom()
})

watch(
  () => currentThread.value?.messages.length,
  async () => {
    await scrollToBottom()
  }
)

onMounted(async () => {
  await scrollToBottom()
})

const sendMessage = async () => {
  if (!messageText.value.trim() || !currentThread.value) return

  const text = messageText.value

  currentThread.value.messages.push({
    id: crypto.randomUUID(),
    senderId: currentUser.id,
    text,
    time: new Date().toLocaleTimeString([], {
      hour: '2-digit',
      minute: '2-digit',
    }),
  })

  messageText.value = ''
  await scrollToBottom()

  setTimeout(async () => {
    currentThread.value?.messages.push({
      id: crypto.randomUUID(),
      senderId: currentContact.value.id,
      text,
      time: new Date().toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit',
      }),
    })
    await scrollToBottom()
  }, 1000)
}
</script>

<style></style>
