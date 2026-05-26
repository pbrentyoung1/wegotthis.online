<template>
  <div class="card rounded-e-none">
    <div class="card-header gap-3 p-5">
      <div class="input-icon-group grow">
        <Icon icon="search" class="input-icon" />
        <input type="search" placeholder="Search here..." class="form-input bg-light/30" />
      </div>

      <RouterLink to="" class="btn btn-icon size-9.25 bg-dark text-white" aria-haspopup="dialog" aria-expanded="false" aria-controls="createSingleChatModal" data-hs-overlay="#createSingleChatModal">
        <Icon icon="pencil" class="text-lg" />
      </RouterLink>
    </div>

    <Simplebar id="chat-sidebar" class="h-screen p-2.5 lg:h-[calc(100vh-265px)]" data-simplebar>
      <div class="space-y-0.5 *:hover:bg-default-100 *:[.active]:bg-default-100">
        <a v-for="contact in contacts" :key="contact.id" href="#" data-chat-id="chat1" class="block w-full rounded" :class="{ active: contact.id === currentContact.id }" @click="handleSelect(contact)">
          <div class="flex justify-between gap-2.5 px-3.75 py-3">
            <div class="flex items-center gap-2.5">
              <img v-if="contact.image" :src="contact.image" alt="avatar-4" class="size-8 rounded-full" />

              <div v-else class="flex size-8 items-center justify-center rounded-full bg-primary font-semibold text-white">
                {{ generateInitials(contact.name) }}
              </div>

              <span class="overflow-hidden text-start">
                <span data-chat-search-field class="font-semibold text-nowrap">
                  {{ contact.name }}
                </span>
                <span class="block max-w-40 truncate text-xs text-default-400">
                  {{ contact.lastMessage }}
                </span>
              </span>
            </div>

            <span class="flex shrink-0 flex-col items-end justify-center gap-1.25">
              <span v-if="contact.timestamp" class="text-xs text-default-400">
                {{ contact.timestamp }}
              </span>

              <span v-if="contact.unreadMessages" class="badge bg-primary text-2xs text-white">
                {{ contact.unreadMessages }}
              </span>
            </span>
          </div>
        </a>
      </div>
    </Simplebar>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Simplebar from 'simplebar-vue'
import { ref } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'
import { generateInitials } from '~/utils/helpers'
import type { ContactType } from './data'

const props = defineProps<{
  contacts: ContactType[]
  setContact: (c: ContactType) => void
}>()

const currentContact = ref<ContactType>(
  props.contacts[0] || {
    id: 'u1',
    name: '',
    image: '',
    lastMessage: '',
    timestamp: '',
    unreadMessages: 0,
    isOnline: false,
  }
)

function handleSelect(contact: ContactType) {
  props.setContact(contact)
  currentContact.value = contact
}
</script>

<style></style>
