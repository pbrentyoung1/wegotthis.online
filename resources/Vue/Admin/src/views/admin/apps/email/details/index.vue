<template>
  <PageBreadcrumb title="Email Details" subtitle="Apps" />

  <div class="lg:flex lg:h-[calc(100vh-200px)]">
    <EmailSidebar />

    <div class="w-full min-w-0 flex-1">
      <div class="card z-90 h-full rounded-none">
        <div class="card-header lg:hidden">
          <button class="btn btn-icon rounded border border-default-300">
            <Icon icon="menu-4" class="size-6 text-default-600" aria-haspopup="dialog" aria-expanded="false" aria-controls="emailSidebaroffcanvas" aria-label="Toggle navigation" data-hs-overlay="#emailSidebaroffcanvas" />
          </button>

          <div class="input-icon-group inline-flex lg:hidden">
            <Icon icon="search" class="input-icon" />
            <input type="text" class="form-input" placeholder="Search mails..." />
          </div>
        </div>

        <div class="card-header justify-between">
          <div class="flex flex-wrap items-center gap-1.25">
            <span class="hs-tooltip inline-block [--placement:top]">
              <a href="#" class="hs-tooltip-toggle btn btn-icon size-8 border border-default-300">
                <Icon icon="arrow-left" class="text-base text-default-800" />
              </a>
            </span>

            <span v-for="(item, idx) in actionButtonData" :key="idx" class="hs-tooltip inline-block [--placement:top]">
              <button type="button" class="hs-tooltip-toggle btn btn-icon size-8 border border-default-300">
                <Icon :icon="item.icon" class="text-base text-default-800" />
              </button>
            </span>
          </div>

          <div class="flex items-center gap-1.5">
            <button class="btn btn-icon size-7.5 rounded-full text-secondary hover:bg-secondary hover:text-white">
              <Icon icon="corner-up-right-double" class="text-lg" />
            </button>

            <button class="btn btn-icon size-7.5 rounded-full text-dark hover:bg-dark hover:text-white">
              <Icon icon="dots-vertical" class="text-lg" />
            </button>
          </div>
        </div>

        <Simplebar class="card-body h-[calc(100vh-420px)] py-0 lg:h-[calc(100vh-334px)]" data-simplebar>
          <h4 class="card shadow-none sticky top-0 z-20 rounded-none! border-none! py-5 text-lg">Design Reviews & Feedback</h4>

          <div class="border-b border-dashed border-default-300 pb-base">
            <div>
              <div class="flex flex-wrap items-center justify-between">
                <button type="button" class="hs-collapse-toggle" id="EmailOne" aria-expanded="false" aria-controls="EmailOne-heading" data-hs-collapse="#EmailOne-heading">
                  <RouterLink class="text-reset flex items-center" to="">
                    <img :src="user3" class="size-9 rounded-full" alt="User Avatar" />
                    <div class="ms-2.5 overflow-hidden text-start">
                      <h5>John Maxwell</h5>
                      <p class="text-default-400">john.maxwell&#64;uxstudio.com</p>
                    </div>
                  </RouterLink>
                </button>

                <div class="flex items-center gap-1 md:ms-auto">
                  <button class="btn btn-icon size-8 rounded-full text-default-800 hover:bg-default-100">
                    <Icon icon="star-filled" class="text-base text-warning" />
                  </button>
                  <button class="btn btn-icon size-8 rounded-full text-default-800 hover:bg-default-100">
                    <Icon icon="mail-forward" class="text-base" />
                  </button>
                  <button class="btn btn-icon size-8 rounded-full text-default-800 hover:bg-default-100">
                    <Icon icon="mail-opened" class="text-base" />
                  </button>
                  <span class="ms-2 text-xs text-default-400">Apr 11, 07:47 AM</span>
                </div>
              </div>
              <div id="EmailOne-heading" class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="EmailOne">
                <div class="mt-5">
                  <p class="mb-4">Hey team,</p>
                  <p class="mb-4">I reviewed the new dashboard layout and overall it's looking solid. The spacing and typography are much better than the previous version.</p>
                  <p class="mb-4">A couple of suggestions:</p>
                  <ul>
                    <li>Make the chart legends slightly smaller and lighter in color.</li>
                    <li>Try a softer drop shadow for the card components – they feel a bit harsh right now.</li>
                  </ul>
                  <p class="mb-4">Let me know if you need a quick call to discuss.</p>
                  <p class="mt-5">Cheers,</p>
                  <p class="font-medium">John</p>
                </div>
              </div>
            </div>
          </div>

          <div class="border-b border-dashed border-default-300 py-5">
            <div>
              <div class="flex flex-wrap items-center justify-between">
                <button type="button" class="hs-collapse-toggle" id="EmailTwo" aria-expanded="false" aria-controls="EmailTwo-heading" data-hs-collapse="#EmailTwo-heading">
                  <a class="text-reset flex items-center">
                    <img :src="user6" class="size-9 rounded-full" alt="User Avatar" />
                    <div class="ms-2.5 overflow-hidden text-start">
                      <h5>Anika Patel</h5>
                      <p class="text-default-400">anika&#64;creativemix.net</p>
                    </div>
                  </a>
                </button>

                <div class="flex items-center gap-1 md:ms-auto">
                  <button class="btn btn-icon size-8 rounded-full text-default-800 hover:bg-default-100">
                    <Icon icon="star-filled" class="text-base text-warning" />
                  </button>
                  <button class="btn btn-icon size-8 rounded-full text-default-800 hover:bg-default-100">
                    <Icon icon="mail-forward" class="text-base" />
                  </button>
                  <button class="btn btn-icon size-8 rounded-full text-default-800 hover:bg-default-100">
                    <Icon icon="mail-opened" class="text-base" />
                  </button>
                  <span class="ms-2 text-xs text-default-400">Apr 11, 09:05 AM</span>
                </div>
              </div>

              <div id="EmailTwo-heading" class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="EmailTwo">
                <div class="mt-5">
                  <p class="mb-4">Hello team,</p>
                  <p class="mb-4">I did a final check on the landing page animations. Everything works smoothly except the testimonial slider – there's a tiny jitter on loop transition.</p>
                  <p class="mb-4">Maybe easing timing or delay tweaks can help fix it. Otherwise, great job!</p>
                  <p class="mb-5">Let me know once it's deployed to staging so I can do one last run-through.</p>
                  <p class="mt-5">Thanks,</p>
                  <p class="font-medium">Anika</p>
                </div>
              </div>
            </div>
          </div>

          <div class="py-5">
            <div>
              <div class="flex flex-wrap items-center justify-between">
                <button type="button" class="hs-collapse-toggle" id="EmailThree" aria-expanded="false" aria-controls="EmailThree-heading" data-hs-collapse="#EmailThree-heading">
                  <a class="text-reset flex items-center">
                    <img :src="user5" class="size-9 rounded-full" alt="User Avatar" />
                    <div class="ms-2.5 overflow-hidden text-start">
                      <h5>Laura Chen</h5>
                      <p class="text-default-400">laura.chen&#64;designteam.co</p>
                    </div>
                  </a>
                </button>

                <div class="flex items-center gap-1 md:ms-auto">
                  <button class="btn btn-icon size-8 rounded-full text-default-800 hover:bg-default-100">
                    <Icon icon="star-filled" class="text-base text-warning" />
                  </button>
                  <button class="btn btn-icon size-8 rounded-full text-default-800 hover:bg-default-100">
                    <Icon icon="mail-forward" class="text-base" />
                  </button>
                  <button class="btn btn-icon size-8 rounded-full text-default-800 hover:bg-default-100">
                    <Icon icon="mail-opened" class="text-base" />
                  </button>
                  <span class="ms-2 text-xs text-default-400">Apr 12, 11:42 AM</span>
                </div>
              </div>

              <div id="EmailThree-heading" class="hs-collapse w-full overflow-hidden transition-[height] duration-300" aria-labelledby="EmailThree">
                <div class="mt-7.5">
                  <p class="mb-4">Hi folks,</p>
                  <p class="mb-4">Thanks for sharing the prototype. The color scheme and layout look clean, but I think we can still refine the mobile responsiveness on the pricing page.</p>
                  <p class="mb-4">Also, the button contrast on the footer needs more WCAG-friendly contrast – it's currently a bit hard to read.</p>
                  <p class="mb-4">I’ve attached some screenshots with markup for clarity.</p>
                  <p class="mt-5">Regards,</p>
                  <p class="font-medium">Laura</p>
                </div>

                <div class="mt-5">
                  <div class="flex justify-between">
                    <h4 class="text-sm text-default-400">2 Attachments</h4>
                  </div>
                  <div class="mt-4 flex flex-wrap gap-base">
                    <div class="group relative flex items-center gap-2.5 rounded border border-dashed border-default-300 p-2.5 text-start">
                      <Icon icon="file" class="text-2xl text-danger" />
                      <div>
                        <h4 class="mb-1.25">
                          <RouterLink to="" class="group-hover:text-primary"> footer-contrast-notes.pdf</RouterLink>
                        </h4>
                        <p class="text-xs">1.2 MB</p>
                      </div>
                      <Icon icon="download" class="text-2xl text-default-400" />
                    </div>
                    <div class="group relative flex items-center gap-2.5 rounded border border-dashed border-default-300 p-2.5 text-start">
                      <Icon icon="photo" class="text-2xl text-secondary" />
                      <div>
                        <h4 class="mb-1.25">
                          <RouterLink to="" class="group-hover:text-primary"> responsive-issues.png</RouterLink>
                        </h4>
                        <p class="text-xs">850 KB</p>
                      </div>
                      <Icon icon="download" class="text-2xl text-default-400" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="EmailReply-heading" class="hs-collapse sticky bottom-0 z-10 hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="EmailReply">
            <div class="card mb-4 border border-default-300">
              <textarea class="form-textarea border-0!" id="exampleFormControlTextarea1" rows="6" placeholder="Enter message"></textarea>
              <div class="border-t border-default-300 bg-light/15 p-3">
                <div class="flex flex-wrap items-center gap-1.5">
                  <span v-for="(item, idx) in replyToolbarButtonData" :key="idx" class="hs-tooltip inline-block [--placement:top]">
                    <button type="button" class="hs-tooltip-toggle btn btn-icon size-8 bg-default-100">
                      <Icon :icon="item.icon" class="text-xs" />
                      <span class="hs-tooltip-content invisible absolute z-10 inline-block rounded bg-dark px-2 py-1 text-xs font-medium text-white opacity-0 transition-opacity hs-tooltip-shown:visible hs-tooltip-shown:opacity-100" role="tooltip">
                        {{ item.title }}
                      </span>
                    </button>
                  </span>

                  <button type="button" class="btn btn-sm ms-auto bg-light">
                    <Icon icon="x" class="text-xs" />
                    Cancel
                  </button>

                  <button type="button" class="btn btn-sm bg-success text-white">
                    <Icon icon="send-2" class="text-xs" />
                    Send
                  </button>
                </div>
              </div>
            </div>
          </div>
        </Simplebar>

        <div class="card-footer border-t border-dashed">
          <div class="flex flex-wrap items-center justify-between gap-3">
            <button class="hs-collapse-toggle btn btn-sm border border-default-300 hover:border-default-400 hover:bg-default-50" id="EmailReply" aria-expanded="false" aria-controls="EmailReply-heading" data-hs-collapse="#EmailReply-heading">
              <Icon icon="corner-up-left" class="text-base" />
              <span class="font-medium">Reply</span>
            </button>

            <button class="btn btn-sm border border-default-300 hover:border-default-400 hover:bg-default-50" type="button">
              <Icon icon="corner-up-right-double" class="text-base" />
              <span class="font-medium">Forward</span>
            </button>

            <button class="btn btn-sm border border-default-300 hover:border-default-400 hover:bg-default-50" type="button">
              <Icon icon="printer" class="text-base" />
              <span class="font-medium">Print</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import EmailSidebar from '../components/EmailSidebar.vue'

import { actionButtonData, replyToolbarButtonData } from './components/data'

import Simplebar from 'simplebar-vue'
import user3 from '/images/users/user-3.jpg'
import user5 from '/images/users/user-5.jpg'
import user6 from '/images/users/user-6.jpg'
</script>
