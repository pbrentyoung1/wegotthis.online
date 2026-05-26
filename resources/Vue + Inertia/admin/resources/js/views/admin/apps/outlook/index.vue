<template>
  <PageBreadcrumb title="Outlook View" subtitle="Apps" />

  <div class="outlook-box">
    <BOffcanvas teleport-disabled no-header body-class="p-0 h-100" v-model="show" responsive="lg" placement="start" class="offcanvas-lg outlook-left-menu">
      <Sidebar :messages="messagesData" :set-messages="setMessages" />
    </BOffcanvas>

    <Simplebar class="card h-100 mb-0 rounded-start-0 border-start-0 flex-grow-1" data-simplebar-md>
      <BCardHeader class="d-lg-none d-flex">
        <BButton size="sm" class="btn-default btn-icon" type="button" @click="show = !show">
          <Icon icon="menu-2" class="fs-lg" />
        </BButton>
      </BCardHeader>

      <BCardBody>
        <div>
          <div class="d-flex justify-content-between gap-2">
            <div>
              <div class="text-muted mb-2">
                <Icon icon="clock" />
                {{ message.body.timestamp }}
              </div>
              <h2 class="fs-xl mb-3">{{ message.body.title }}</h2>
            </div>

            <div>
              <BTooltip placement="left">
                Plug this message
                <template #target>
                  <BButton size="sm" class="btn-default me-1 shadow-none">
                    <Icon icon="plug" class="me-1" />
                    Plug it
                  </BButton>
                </template>
              </BTooltip>

              <BTooltip placement="top">
                Mark as read
                <template #target>
                  <BButton size="sm" class="btn-icon btn-default me-1 shadow-none">
                    <Icon icon="eye" />
                  </BButton>
                </template>
              </BTooltip>

              <BTooltip placement="top">
                Mark as important
                <template #target>
                  <BButton size="sm" class="btn-icon btn-default me-1 shadow-none">
                    <Icon icon="alert-circle" />
                  </BButton>
                </template>
              </BTooltip>

              <BTooltip placement="top">
                Move to trash
                <template #target>
                  <BButton size="sm" class="btn-icon btn-default shadow-none">
                    <Icon icon="trash" />
                  </BButton>
                </template>
              </BTooltip>
            </div>
          </div>

          <VueMarkdown :source="message.body.content" />

          <BForm class="my-3">
            <div class="mb-3">
              <BFormTextarea rows="4" placeholder="Enter your reply..." />
            </div>
            <div class="text-end">
              <BButton variant="secondary" type="submit">
                Submit
                <Icon icon="send-2" class="align-baseline ms-1" />
              </BButton>
            </div>
          </BForm>
        </div>
      </BCardBody>
    </Simplebar>
  </div>
</template>

<script setup lang="ts">
import { BButton, BCardBody, BCardHeader, BForm, BFormTextarea, BOffcanvas, BTooltip } from 'bootstrap-vue-next'
import { ref } from 'vue'
import VueMarkdown from 'vue3-markdown-it'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import { messagesData, type MessageType } from './components/data'

import Simplebar from 'simplebar-vue'
import Icon from '@/components/wrappers/Icon.vue'
import Sidebar from './components/Sidebar.vue'

const message = ref<MessageType>(messagesData[0]!)
const show = ref(false)

const setMessages = (m: MessageType) => {
  message.value = m
}
</script>
