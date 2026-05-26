<template>
  <div class="flex gap-1.25">
    <button class="btn btn-icon border-default-300 hover:border-default-400/75 hover:bg-default-50" aria-haspopup="dialog" aria-expanded="false" aria-controls="videoCallModal" data-hs-overlay="#videoCallModal">
      <Icon icon="video" class="size-4.25" />
    </button>

    <button class="btn btn-icon border-default-300 hover:border-default-400/75 hover:bg-default-50" aria-haspopup="dialog" aria-expanded="false" aria-controls="audioCallModal" data-hs-overlay="#audioCallModal">
      <Icon icon="phone-call" class="size-4.25" />
    </button>

    <div class="relative">
      <div class="hs-dropdown inline-flex [--placement:bottom-right]">
        <button type="button" class="hs-dropdown-toggle btn btn-icon border-default-300 hover:border-default-400/75 hover:bg-default-50" aria-haspopup="menu" aria-expanded="false">
          <Icon icon="dots-vertical" class="text-sm" />
        </button>

        <div class="hs-dropdown-menu" role="menu">
          <div class="space-y-0.5">
            <a href="#" class="dropdown-item">
              <Icon icon="user" />
              Export as PDF
            </a>

            <a href="#" class="dropdown-item">
              <Icon icon="bell-off" />
              Export as CSV
            </a>

            <a href="#" class="dropdown-item">
              <Icon icon="trash" />
              Export as Excel
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="videoCallModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto hs-overlay-open:opacity-100 hs-overlay-open:duration-500" role="dialog" tabindex="-1" aria-labelledby="videoCallModalLabel">
    <div class="hs-overlay-animation-target m-3 flex min-h-[calc(100%-56px)] max-w-sm scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:max-w-xl lg:max-w-5xl hs-overlay-open:scale-100 hs-overlay-open:opacity-100">
      <div class="card pointer-events-auto flex w-full flex-col !bg-dark">
        <div class="card-header border-0!">
          <h3 id="videoCallModalLabel" class="text-sm font-bold text-white">Starting Video Call</h3>
          <button type="button" data-hs-overlay="#videoCallModal">
            <Icon icon="x" class="text-xl text-white" />
          </button>
        </div>

        <div class="overflow-y-auto px-6 py-18">
          <div class="mb-7.5">
            <img :src="user3" class="mx-auto size-37.5 rounded-full" alt="User" />
          </div>

          <h3 class="mb-1.25 text-center text-2xl font-semibold text-white">Alex Johnson</h3>
          <p class="mb-7.5 text-center text-default-400">Connecting to call...</p>

          <div class="flex flex-wrap justify-center gap-3">
            <button type="button" class="btn bg-light hover:text-primary"><Icon icon="video" /> Camera On</button>

            <button type="button" class="btn bg-light hover:text-primary"><Icon icon="microphone" /> Mic On</button>

            <button type="button" class="btn bg-danger text-white hover:bg-danger-hover" data-hs-overlay="#videoCallModal"><Icon icon="phone-call" /> End Call</button>
          </div>
        </div>

        <div class="card-footer flex justify-center border-0!">
          <span class="text-center text-default-300 italic"> Make sure your devices are connected before starting the call </span>
        </div>
      </div>
    </div>
  </div>

  <div id="audioCallModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto hs-overlay-open:opacity-100 hs-overlay-open:duration-500" role="dialog" tabindex="-1" aria-labelledby="audioCallModalLabel">
    <div class="hs-overlay-animation-target m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-lg hs-overlay-open:scale-100 hs-overlay-open:opacity-100">
      <div class="card pointer-events-auto flex w-full flex-col !bg-dark">
        <div class="card-header border-0!">
          <h3 id="audioCallModalLabel" class="text-sm font-bold text-white">Starting Audio Call</h3>
          <button type="button" data-hs-overlay="#audioCallModal">
            <Icon icon="x" class="text-xl text-white" />
          </button>
        </div>

        <div class="overflow-y-auto px-6 py-18">
          <div class="mb-7.5">
            <img :src="user3" class="mx-auto size-37.5 rounded-full" alt="User" />
          </div>

          <h3 class="mb-1.25 text-center text-2xl font-semibold text-white">Alex Johnson</h3>
          <p class="mb-7.5 text-center text-default-400">Calling...</p>

          <div class="flex flex-wrap justify-center gap-3">
            <button type="button" class="btn bg-light hover:text-primary"><Icon icon="microphone" /> Mic On</button>

            <button type="button" class="btn bg-light hover:text-primary"><Icon icon="volume" /> Speaker On</button>

            <button type="button" class="btn bg-danger text-white hover:bg-danger-hover" data-hs-overlay="#audioCallModal"><Icon icon="phone-call" /> End Call</button>
          </div>
        </div>

        <div class="card-footer flex justify-center border-0!">
          <span class="text-center text-default-300 italic"> Ensure your microphone is working properly </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import user3 from '/images/users/user-3.jpg'
</script>

<style></style>
