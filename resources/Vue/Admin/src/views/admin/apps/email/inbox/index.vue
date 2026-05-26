<template>
  <PageBreadcrumb title="Email" subtitle="Apps" />

  <div class="lg:flex lg:h-[calc(100vh-200px)]">
    <EmailSidebar />

    <div class="w-full min-w-0 flex-1">
      <div class="card h-full rounded-none">
        <div class="card-header lg:hidden">
          <button class="btn btn-icon rounded border border-default-300" aria-label="Toggle sidenav">
            <Icon icon="menu-4" class="size-6 text-default-600" aria-haspopup="dialog" aria-expanded="false" aria-controls="emailSidebaroffcanvas" aria-label="Toggle navigation" data-hs-overlay="#emailSidebaroffcanvas" />
          </button>

          <div class="input-icon-group inline-flex lg:hidden">
            <Icon icon="search" class="input-icon" />
            <input v-model="search" type="text" class="form-input" placeholder="Search mails..." />
          </div>
        </div>

        <div class="card-header">
          <div class="flex flex-wrap items-center gap-1.25">
            <input class="form-checkbox-light me-6 form-checkbox size-4.5" type="checkbox" id="select-all-email" :checked="isAllSelected" @change="handleSelectAll" />

            <span v-for="(item, idx) in actionData" :key="idx" class="hs-tooltip inline-block [--placement:top]">
              <button type="button" class="hs-tooltip-toggle btn btn-icon size-7.75 border-default-300 hover:border-default-400/50 hover:text-primary">
                <Icon :icon="item.icon" class="text-base" />

                <span class="hs-tooltip-content invisible absolute z-10 inline-block rounded bg-dark px-2 py-1 text-xs font-medium text-white opacity-0 transition-opacity hs-tooltip-shown:visible hs-tooltip-shown:opacity-100" role="tooltip">
                  {{ item.label }}
                </span>
              </button>
            </span>
          </div>

          <div class="input-icon-group hidden lg:inline-flex">
            <Icon icon="search" class="input-icon" />
            <input v-model="search" type="text" class="form-input" placeholder="Search mails..." />
          </div>
        </div>

        <Simplebar class="h-[calc(100vh-360px)] lg:h-[calc(100vh-275px)]" data-simplebar>
          <div class="table-wrapper">
            <table class="table-hover table-select table">
              <tbody>
                <tr v-if="filteredEmails.length === 0">
                  <td colspan="5" class="text-center">No emails found</td>
                </tr>

                <tr
                  v-for="(email, idx) in filteredEmails"
                  :key="idx"
                  :class="[
                    'relative',
                    {
                      'mark-as-read opacity-75': email.isRead,
                    },
                  ]"
                >
                  <td class="w-[1%] ps-6">
                    <div class="flex items-center gap-6">
                      <input class="form-checkbox-light email-item-check z-10 form-checkbox size-4.5" type="checkbox" :checked="selected.includes(email.id)" @change="handleSelect(email.id)" />

                      <button :class="['flex', email.isStarred ? 'text-warning' : 'text-default-400']">
                        <Icon v-if="email.isStarred" icon="star-filled" class="text-lg" />
                        <Icon v-else icon="star" class="text-lg" />
                      </button>
                    </div>
                  </td>

                  <td>
                    <div class="flex items-center gap-2.5">
                      <img v-if="email.image" :src="email.image" alt="user avatar" class="size-6 rounded-full" />

                      <div v-else class="avatar-xs">
                        <span :class="['btn btn-icon size-6! rounded-full font-semibold', email.className]">
                          {{ email.name.charAt(0) }}
                        </span>
                      </div>

                      <h5>{{ email.name }}</h5>
                    </div>
                  </td>

                  <td>
                    <RouterLink to="/apps/email/details" class="font-medium after:absolute after:inset-0 hover:text-primary">
                      {{ email.subject }}
                    </RouterLink>
                    &nbsp;
                    <span class="hidden lg:inline-block"> — </span>
                    &nbsp;
                    <span class="hidden text-default-400 lg:inline-block">
                      {{ email.snippet }}
                    </span>
                  </td>

                  <td>
                    <div class="flex items-center gap-1.25" :class="{ 'opacity-25': email.attachments === 0 }">
                      <Icon icon="paperclip" />
                      <span class="font-semibold">{{ email.attachments }}</span>
                    </div>
                  </td>

                  <td>
                    <p class="pe-3 text-end text-xs text-default-400">{{ email.date }}, {{ email.time }}</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="flex items-center justify-center gap-2.5 p-5">
            <strong>Loading...</strong>

            <div class="inline-block size-4 animate-spin rounded-full border-2 border-current border-t-transparent text-danger" role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </Simplebar>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Simplebar from 'simplebar-vue'
import { computed, ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import EmailSidebar from '../components/EmailSidebar.vue'
import { actionData, emailData, type EmailType } from './components/data'

const search = ref('')
const selected = ref<number[]>([])

const filteredEmails = computed(() => {
  const q = search.value.toLowerCase()
  return emailData.filter((e: EmailType) => {
    return e.name.toLowerCase().includes(q) || e.subject.toLowerCase().includes(q) || e.snippet.toLowerCase().includes(q)
  })
})

const isAllSelected = computed(() => {
  return filteredEmails.value.length > 0 && selected.value.length === filteredEmails.value.length
})

function handleSelectAll() {
  selected.value = isAllSelected.value ? [] : filteredEmails.value.map((e) => e.id)
}

function handleSelect(id: number) {
  selected.value = selected.value.includes(id) ? selected.value.filter((x) => x !== id) : [...selected.value, id]
}
</script>
