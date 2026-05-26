<template>
  <PageBreadcrumb title="New Email (Compose)" subtitle="Apps" />
  <div class="lg:flex lg:h-[calc(100vh-190px)]">
    <EmailSidebar />

    <div class="w-full min-w-0 flex-1">
      <div class="card h-full rounded-none">
        <div class="card-header lg:hidden">
          <button class="btn btn-icon border-default-300 rounded border">
            <Icon icon="menu-4" class="text-default-600 size-6" aria-haspopup="dialog" aria-expanded="false" aria-controls="emailSidebaroffcanvas" aria-label="Toggle navigation" data-hs-overlay="#emailSidebaroffcanvas"></Icon>
          </button>

          <div class="input-icon-group lg:hidden inline-flex">
            <Icon icon="search" class="input-icon"></Icon>
            <input data-table-search type="text" class="form-input" placeholder="Search mails..." />
          </div>
        </div>

        <div class="card-header">
          <h4 class="card-title">Compose Message</h4>
        </div>

        <div class="lg:h-[calc(100vh-270px)] h-[calc(100vh-360px)]" data-simplebar data-simplebar-md>
          <div class="card-body border-default-300 border-b border-dashed py-3">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <span class="text-sm font-semibold">To:</span>
                <input type="text" class="form-input border-0! focus:border-0!" placeholder="Enter emails.." />
              </div>

              <div class="flex gap-4">
                <button type="button" class="hs-collapse-toggle underline disabled:pointer-events-none disabled:opacity-50" id="email-cc" aria-expanded="false" aria-controls="email-cc-heading" data-hs-collapse="#email-cc-heading">Cc</button>

                <button type="button" class="hs-collapse-toggle underline disabled:pointer-events-none disabled:opacity-50" id="email-bcc" aria-expanded="false" aria-controls="email-bcc-heading" data-hs-collapse="#email-bcc-heading">Bcc</button>
              </div>
            </div>
          </div>

          <div class="flex justify-between">
            <div id="email-cc-heading" class="hs-collapse card-body border-default-300 hidden w-full overflow-hidden border-b border-dashed py-4! transition-[height] duration-300" aria-labelledby="email-cc">
              <div class="flex items-center">
                <span class="text-sm font-semibold">Cc:</span>
                <input type="text" class="form-input border-0! py-3 focus:border-0!" placeholder="Enter emails.." />
              </div>
            </div>
          </div>

          <div class="flex justify-between">
            <div id="email-bcc-heading" class="hs-collapse card-body border-default-300 hidden w-full overflow-hidden border-b border-dashed py-4! transition-[height] duration-300" aria-labelledby="email-bcc">
              <div class="flex items-center">
                <span class="text-sm font-semibold">Bcc:</span>
                <input type="text" class="form-input border-0! py-3 focus:border-0!" placeholder="Enter emails.." />
              </div>
            </div>
          </div>

          <div class="card-body py-3 border-default-300 border-b border-dashed">
            <div class="flex items-center justify-start">
              <input type="text" class="form-input border-0! focus:border-0! font-semibold ps-0" placeholder="Subject" />
            </div>
          </div>

          <div class="email-editor">
            <QuillEditor
              v-model:content="content"
              theme="snow"
              content-type="html"
              :toolbar="[[{ header: [false, 1, 2, 3, 4, 5, 6] }], ['bold', 'italic', 'underline', 'strike'], [{ color: [] }, { background: [] }], ['blockquote', 'code-block'], [{ list: 'ordered' }, { list: 'bullet' }], ['link', 'image', 'video']]"
            />
          </div>

          <div class="bg-light/15 border-light border-b p-2.5">
            <div class="flex items-center justify-between gap-1.25">
              <div class="inline-flex">
                <button type="button" class="btn bg-primary hover:bg-primary-hover relative rounded-e-none! text-white">
                  <Icon icon="send-2" class="text-base"></Icon>
                  Send
                </button>

                <div class="hs-dropdown relative inline-flex [--placement:bottom-left]">
                  <button type="button" class="hs-dropdown-toggle btn btn-icon bg-primary/85 hover:bg-primary-hover relative rounded-s-none! text-white">
                    <Icon icon="chevron-down" class="text-base"></Icon>
                  </button>

                  <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                    <a class="dropdown-item" href="#">Send & Archive</a>
                    <a class="dropdown-item" href="#">Schedule Send</a>
                    <a class="dropdown-item" href="#">Save as Draft</a>
                    <hr class="dropdown-divider" />
                    <a class="dropdown-item" href="#">Discard</a>
                  </div>
                </div>
              </div>

              <div class="flex gap-1.25">
                <span class="hs-tooltip inline-block [--placement:top]">
                  <button type="button" class="hs-tooltip-toggle btn btn-icon bg-default-200 size-7.75!">
                    <Icon icon="settings" class="text-sm"></Icon>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible bg-dark invisible absolute z-10 inline-block rounded px-2 py-1 text-xs font-medium text-white opacity-0 transition-opacity" role="tooltip">Settings</span>
                  </button>
                </span>

                <span class="hs-tooltip inline-block [--placement:top]">
                  <button type="button" class="hs-tooltip-toggle btn btn-icon bg-danger/15 text-danger hover:bg-danger size-7.75! hover:text-white">
                    <Icon icon="trash" class="text-sm"></Icon>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible bg-dark invisible absolute z-10 inline-block rounded px-2 py-1 text-xs font-medium text-white opacity-0 transition-opacity" role="tooltip">Delete</span>
                  </button>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import EmailSidebar from '../components/EmailSidebar.vue'

const content = ref(
  ` <p>Hi<strong><em>James</em></strong>,</p><p>I hope you're doing well.</p><p>I'm reaching out regarding the latest updates on our project. Please find the summary below:</p><ul><li>All UI components have been reviewed and finalized.</li><li>The mobile responsiveness is now optimized across all breakpoints.</li><li>We’re awaiting final client feedback before deployment.</li></ul><p>Let me know if you need anything else or if there's anything you'd like us to adjust.</p><p><br /></p><p>Best regards,</p><p><em>Damian</em></p>`
)
</script>

<style></style>
