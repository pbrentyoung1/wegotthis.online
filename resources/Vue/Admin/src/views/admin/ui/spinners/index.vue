<template>
  <PageBreadcrumb title="Spinners" subtitle="Base UI" />
  <div class="container">
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
      <div class="space-y-base">
        <CardWithAction title="Border Spinner" isCollapsible>
          <p class="text-default-400 mb-4">Use border spinners as lightweight loading indicators.</p>
          <div class="border-dark inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
          </div>
        </CardWithAction>

        <CardWithAction title="Colors" isCollapsible>
          <p class="text-default-400 mb-4">
            These spinners use border color utilities like
            <code>.border-primary</code>
            ,
            <code>.border-success</code>
            , or
            <code>.border-danger</code>
            to display different color variations. Each spinner’s top border is transparent to create a smooth rotating effect.
          </p>

          <div class="flex gap-base flex-wrap items-center">
            <div class="border-primary inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>

            <div class="border-secondary inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>

            <div class="border-success inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>

            <div class="border-danger inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>

            <div class="border-warning inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>

            <div class="border-info inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>

            <div class="border-light inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>

            <div class="border-dark inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </CardWithAction>

        <CardWithAction title="Alignment" isCollapsible>
          <p class="text-default-400 mb-4">
            These spinners use simple utility classes like
            <code>animate-spin</code>
            ,
            <code>border-dark</code>
            , and
            <code>border-t-transparent</code>
            to create a rotating loading indicator. The
            <code>rounded-full</code>
            class keeps the spinner perfectly circular and neatly aligned.
          </p>

          <div class="flex gap-base flex-wrap items-center">
            <strong>Loading...</strong>
            <div class="border-dark ms-auto inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading"></div>
          </div>

          <div class="mt-5 flex items-center justify-center gap-base">
            <div class="border-dark inline-block size-8 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading"></div>
          </div>
        </CardWithAction>

        <CardWithAction title="Buttons Spinner" isCollapsible>
          <div class="grid md:grid-cols-2 gap-base">
            <div class="flex flex-wrap items-center gap-2">
              <button class="btn btn-icon bg-primary">
                <div class="inline-block size-4 animate-spin rounded-full border-2 border-white border-t-transparent" role="status" aria-label="loading">
                  <span class="sr-only">Loading...</span>
                </div>
              </button>

              <button class="btn btn-icon bg-primary rounded-full">
                <div class="inline-block size-4 animate-spin rounded-full border-2 border-white border-t-transparent" role="status" aria-label="loading">
                  <span class="sr-only">Loading...</span>
                </div>
              </button>

              <button class="btn bg-primary">
                <div class="inline-block size-4 animate-spin rounded-full border-2 border-white border-t-transparent" role="status" aria-label="loading">
                  <span class="sr-only">Loading...</span>
                </div>
              </button>

              <button class="btn bg-primary">
                <div class="flex items-center gap-3">
                  <div class="inline-block size-4 animate-spin rounded-full border-2 border-white border-t-transparent" role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                  </div>
                  <span class="text-white">Loading..</span>
                </div>
              </button>
            </div>

            <div class="flex flex-wrap items-center gap-2">
              <button class="btn btn-icon bg-primary">
                <span class="size-4 animate-grow rounded-full bg-white"></span>
              </button>

              <button class="btn btn-icon bg-primary rounded-full">
                <span class="size-4 animate-grow rounded-full bg-white"></span>
              </button>

              <button class="btn bg-primary">
                <span class="size-4 animate-grow rounded-full bg-white"></span>
              </button>

              <button class="btn bg-primary">
                <div class="flex items-center gap-3">
                  <span class="size-4 animate-grow rounded-full bg-white"></span>
                  <strong class="text-white">Loading...</strong>
                </div>
              </button>
            </div>
          </div>
        </CardWithAction>
      </div>

      <div class="space-y-base">
        <CardWithAction title="Growing Spinner" isCollapsible>
          <p class="text-default-400 mb-4">A simple growing spinner built with Tailwind CSS. You can easily change its size, color, and alignment using utility classes.</p>

          <div class="flex items-center justify-start">
            <span class="bg-dark size-8 animate-grow rounded-full"></span>
          </div>
        </CardWithAction>

        <CardWithAction title="Color Growing Spinner" isCollapsible>
          <p class="text-default-400 mb-4">
            These growing spinners use different background color classes to display various color themes. You can apply any color class like
            <code>.bg-primary</code>
            ,
            <code>.bg-success</code>
            , or
            <code>.bg-warning</code>
            to customize the spinner appearance.
          </p>

          <div class="flex gap-base flex-wrap items-center">
            <div class="flex items-center justify-center">
              <span class="bg-primary size-8 animate-grow rounded-full"></span>
            </div>

            <div class="flex items-center justify-center">
              <span class="bg-secondary size-8 animate-grow rounded-full"></span>
            </div>

            <div class="flex items-center justify-center">
              <span class="bg-success size-8 animate-grow rounded-full"></span>
            </div>

            <div class="flex items-center justify-center">
              <span class="bg-danger size-8 animate-grow rounded-full"></span>
            </div>

            <div class="flex items-center justify-center">
              <span class="bg-warning size-8 animate-grow rounded-full"></span>
            </div>

            <div class="flex items-center justify-center">
              <span class="bg-info size-8 animate-grow rounded-full"></span>
            </div>

            <div class="flex items-center justify-center">
              <span class="bg-default-200 size-8 animate-grow rounded-full"></span>
            </div>

            <div class="flex items-center justify-center">
              <span class="bg-dark size-8 animate-grow rounded-full"></span>
            </div>

            <div class="flex items-center justify-center">
              <span class="bg-purple size-8 animate-grow rounded-full"></span>
            </div>
          </div>
        </CardWithAction>

        <CardWithAction title="Size" isCollapsible>
          <div class="grid md:grid-cols-2 gap-base">
            <div class="flex items-center gap-base">
              <div class="flex items-center justify-center">
                <div class="border-primary inline-block size-11 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>

              <div class="flex items-center justify-center">
                <span class="bg-secondary size-11 animate-grow rounded-full"></span>
              </div>
            </div>

            <div class="flex items-center gap-base">
              <div class="flex items-center justify-center">
                <div class="border-primary inline-block size-9 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>

              <div class="flex items-center justify-center">
                <span class="bg-secondary size-7 animate-grow rounded-full"></span>
              </div>
            </div>

            <div class="flex items-center gap-base">
              <div class="flex items-center justify-center">
                <div class="border-primary inline-block size-7 animate-spin rounded-full border-3 border-t-transparent" role="status" aria-label="loading">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>

              <div class="flex items-center justify-center">
                <span class="bg-secondary size-6 animate-grow rounded-full"></span>
              </div>
            </div>

            <div class="flex items-center gap-base">
              <div class="flex items-center justify-center">
                <div class="border-dark inline-block size-4 animate-spin rounded-full border-2 border-t-transparent" role="status" aria-label="loading">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>

              <div class="flex items-center justify-center">
                <span class="bg-dark size-4 animate-grow rounded-full"></span>
              </div>
            </div>
          </div>
        </CardWithAction>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import CardWithAction from '~/components/CardWithAction.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
</script>
