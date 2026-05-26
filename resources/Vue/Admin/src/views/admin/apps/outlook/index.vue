<template>
  <PageBreadcrumb title="Outlook View" subtitle="Apps" />

  <div class="flex h-[calc(100vh-200px)] lg:gap-1.25">
    <div id="outlookSidebaroffcanvas" class="hs-overlay fixed start-0 top-0 bottom-0 z-70 h-full w-70 -translate-x-full transform transition-all duration-300 [--auto-close:lg] lg:static lg:end-auto lg:bottom-0 lg:block! lg:translate-x-0 hs-overlay-open:translate-x-0">
      <Sidebar />
    </div>

    <div class="card h-full min-w-0 flex-1">
      <div class="card-header lg:hidden">
        <div class="text-start">
          <button class="btn btn-sm btn-icon border-default-300" data-hs-overlay="#outlookSidebaroffcanvas">
            <Icon icon="menu-4" class="text-2xl text-default-600" />
          </button>
        </div>
      </div>

      <Simplebar class="card-body h-[calc(100vh-200px)]" data-simplebar>
        <div v-for="(message, idx) in messageData" :key="message.id" :id="`outlook-${message.id}`" role="tabpanel" :class="[idx !== 1 && 'hidden']" :aria-labelledby="`outlook-view-${message.id}`">
          <div class="mb-5 flex flex-wrap items-start justify-between md:mb-0">
            <div>
              <div class="mb-2.5 flex items-center gap-1 text-default-400">
                <Icon icon="clock" />
                {{ message.body.timestamp }}
              </div>

              <h2 class="mb-5 text-lg">
                {{ message.body.title }}
              </h2>
            </div>

            <div class="flex items-center gap-1">
              <div class="hs-tooltip flex [--placement:left]">
                <button class="hs-tooltip-toggle">
                  <div class="btn btn-sm border-default-300 text-sm text-default-800 hover:border-default-400">
                    <Icon icon="plug" />
                    Plug it
                  </div>
                  <span class="hs-tooltip-content invisible absolute z-10 rounded-md bg-default-800 px-3 py-1.5 text-xs text-default-50 opacity-0 hs-tooltip-shown:visible hs-tooltip-shown:opacity-100"> Plug this message </span>
                </button>
              </div>

              <div class="hs-tooltip flex [--placement:top]">
                <button class="hs-tooltip-toggle">
                  <div class="btn btn-icon size-7.75 border-default-300 text-default-800 hover:border-default-400">
                    <Icon icon="eye" />
                  </div>
                  <span class="hs-tooltip-content invisible absolute z-10 rounded-md bg-default-800 px-3 py-1.5 text-xs text-default-50 opacity-0 hs-tooltip-shown:visible hs-tooltip-shown:opacity-100"> Mark as read </span>
                </button>
              </div>

              <div class="hs-tooltip flex [--placement:top]">
                <button class="hs-tooltip-toggle">
                  <div class="btn btn-icon size-7.75 border-default-300 text-default-800 hover:border-default-400">
                    <Icon icon="alert-circle" />
                  </div>
                  <span class="hs-tooltip-content invisible absolute z-10 rounded-md bg-default-800 px-3 py-1.5 text-xs text-default-50 opacity-0 hs-tooltip-shown:visible hs-tooltip-shown:opacity-100"> Mark as important </span>
                </button>
              </div>

              <div class="hs-tooltip flex [--placement:top]">
                <button class="hs-tooltip-toggle">
                  <div class="btn btn-icon size-7.75 border-default-300 text-default-800 hover:border-default-400">
                    <Icon icon="trash" />
                  </div>
                  <span class="hs-tooltip-content invisible absolute z-10 rounded-md bg-default-800 px-3 py-1.5 text-xs text-default-50 opacity-0 hs-tooltip-shown:visible hs-tooltip-shown:opacity-100"> Move to trash </span>
                </button>
              </div>
            </div>
          </div>

          <span class="prose prose-sm dark:text-body-color">
            <VueMarkdown :source="message.body.content" />
          </span>

          <form class="my-5">
            <div class="mb-5">
              <textarea class="form-textarea" rows="4" placeholder="Enter your reply..."></textarea>
            </div>

            <div class="text-end">
              <button type="submit" class="btn bg-secondary text-white hover:bg-secondary-hover">
                Submit
                <Icon icon="send-2" />
              </button>
            </div>
          </form>
        </div>
      </Simplebar>
    </div>
  </div>
</template>

<script setup lang="ts">
import Simplebar from 'simplebar-vue'
import VueMarkdown from 'vue3-markdown-it'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { messageData } from './components/data'
import Sidebar from './components/Sidebar.vue'
</script>
