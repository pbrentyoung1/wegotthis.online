<template>
  <PageBreadcrumb title="Carousel" subtitle="UI" />
  <div class="container">
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
      <CardWithAction title="Slides Only" isCollapsible>
        <div
          data-hs-carousel='{
                                    "loadingClasses": "opacity-0",
                                    "dotsItemClasses": "size-3 rounded-full cursor-pointer",
                                    "isAutoPlay": true
                                    }'
          class="relative"
        >
          <div class="hs-carousel relative min-h-94 w-full overflow-hidden">
            <div class="hs-carousel-body absolute start-0 top-0 bottom-0 flex flex-nowrap opacity-0 transition-transform duration-700">
              <div class="hs-carousel-slide">
                <img src="/images/stock/small-1.jpg" alt="First slide" />
              </div>

              <div class="hs-carousel-slide">
                <img src="/images/stock/small-2.jpg" alt="Second slide" />
              </div>

              <div class="hs-carousel-slide">
                <img src="/images/stock/small-3.jpg" alt="Third slide" />
              </div>
            </div>
          </div>
        </div>
      </CardWithAction>

      <CardWithAction title="With Controls" isCollapsible>
        <div
          data-hs-carousel='{
                                    "loadingClasses": "opacity-0",
                                    "dotsItemClasses": "size-3 rounded-full cursor-pointer",
                                    "isAutoPlay": true   
                                    }'
          class="relative"
        >
          <div class="hs-carousel relative min-h-94 w-full overflow-hidden">
            <div class="hs-carousel-body absolute start-0 top-0 bottom-0 flex flex-nowrap opacity-0 transition-transform duration-700">
              <div class="hs-carousel-slide">
                <img src="/images/stock/small-4.jpg" alt="First slide" />
              </div>

              <div class="hs-carousel-slide">
                <img src="/images/stock/small-1.jpg" alt="Second slide" />
              </div>

              <div class="hs-carousel-slide">
                <img src="/images/stock/small-2.jpg" alt="Third slide" />
              </div>
            </div>
          </div>

          <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-5 inline-flex items-center justify-center">
            <Icon icon="chevron-left" class="size-8 text-white" />
            <span class="sr-only">Previous</span>
          </button>

          <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-5 inline-flex items-center justify-center">
            <Icon icon="chevron-right" class="size-8 text-white" />
            <span class="sr-only">Next</span>
          </button>
        </div>
      </CardWithAction>

      <CardWithAction title="With Indicators" isCollapsible>
        <div
          data-hs-carousel='{
                                    "loadingClasses": "opacity-0",
                                    "dotsItemClasses": "hs-carousel-active:bg-white bg-white/50 w-7.5 h-0.75 cursor-pointer",
                                    "isAutoPlay": true
                                    }'
          class="relative"
        >
          <div class="hs-carousel relative min-h-94 w-full overflow-hidden bg-white">
            <div class="hs-carousel-body absolute start-0 top-0 bottom-0 flex flex-nowrap opacity-0 transition-transform duration-700">
              <div class="hs-carousel-slide">
                <img src="/images/stock/small-3.jpg" alt="First slide" />
              </div>

              <div class="hs-carousel-slide">
                <img src="/images/stock/small-2.jpg" alt="Second slide" />
              </div>

              <div class="hs-carousel-slide">
                <img src="/images/stock/small-1.jpg" alt="Third slide" />
              </div>
            </div>
          </div>

          <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-5 inline-flex items-center justify-center">
            <Icon icon="chevron-left" class="size-8 text-white" />
            <span class="sr-only">Previous</span>
          </button>

          <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-5 inline-flex items-center justify-center">
            <Icon icon="chevron-right" class="size-8 text-white" />
            <span class="sr-only">Next</span>
          </button>

          <div class="hs-carousel-pagination absolute start-0 end-0 bottom-3 flex justify-center gap-x-2"></div>
        </div>
      </CardWithAction>

      <CardWithAction title="With Captions" isCollapsible>
        <div
          data-hs-carousel='{
                                    "loadingClasses": "opacity-0",
                                    "dotsItemClasses": "size-3 rounded-full cursor-pointer",
                                    "isAutoPlay": true
                                    }'
          class="relative"
        >
          <div class="hs-carousel relative min-h-94 w-full overflow-hidden">
            <div class="hs-carousel-body absolute start-0 top-0 bottom-0 flex flex-nowrap opacity-0 transition-transform duration-700">
              <div class="hs-carousel-slide relative">
                <img src="/images/stock/small-1.jpg" alt="First slide" />
                <div class="absolute bottom-0 w-full pt-4 pb-4">
                  <h3 class="mb-2 text-center text-2xl text-white">First slide label</h3>
                  <p class="mb-4 text-center text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>

              <div class="hs-carousel-slide relative">
                <img src="/images/stock/small-3.jpg" alt="Second slide" />
                <div class="absolute bottom-0 w-full pt-4 pb-4">
                  <h3 class="mb-2 text-center text-2xl text-white">Second slide label</h3>
                  <p class="mb-4 text-center text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>

              <div class="hs-carousel-slide relative">
                <img src="/images/stock/small-2.jpg" alt="Third slide" />
                <div class="absolute bottom-0 w-full pt-4 pb-4">
                  <h3 class="mb-2 text-center text-2xl text-white">Third slide label</h3>
                  <p class="mb-4 text-center text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>
            </div>
          </div>

          <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-5 inline-flex items-center justify-center">
            <Icon icon="chevron-left" class="size-8 text-white" />
            <span class="sr-only">Previous</span>
          </button>

          <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-5 inline-flex items-center justify-center">
            <Icon icon="chevron-right" class="size-8 text-white" />
            <span class="sr-only">Next</span>
          </button>
        </div>
      </CardWithAction>

      <CardWithAction title="Individual Interval" isCollapsible>
        <div
          data-hs-carousel='{
                                    "loadingClasses": "opacity-0",
                                    "dotsItemClasses": "rounded-full cursor-pointer",
                                    "isAutoPlay": true
                                    }'
          class="relative"
        >
          <div class="hs-carousel relative min-h-94 w-full overflow-hidden bg-white">
            <div class="hs-carousel-body absolute start-0 top-0 bottom-0 flex flex-nowrap opacity-0 transition-transform duration-700">
              <div class="hs-carousel-slide">
                <img src="/images/stock/small-4.jpg" alt="First slide" />
              </div>

              <div class="hs-carousel-slide">
                <img src="/images/stock/small-2.jpg" alt="Second slide" />
              </div>

              <div class="hs-carousel-slide">
                <img src="/images/stock/small-1.jpg" alt="Third slide" />
              </div>
            </div>
          </div>

          <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-5 inline-flex items-center justify-center">
            <Icon icon="chevron-left" class="size-8 text-white" />
            <span class="sr-only">Previous</span>
          </button>

          <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-5 inline-flex items-center justify-center">
            <Icon icon="chevron-right" class="size-8 text-white" />
            <span class="sr-only">Next</span>
          </button>
        </div>
      </CardWithAction>

      <CardWithAction title="Dark Variant" isCollapsible>
        <div
          data-hs-carousel='{
                                    "loadingClasses": "opacity-0",
                                    "dotsItemClasses": "hs-carousel-active:bg-dark bg-dark/50 w-7.5 h-0.75 cursor-pointer",
                                    "isAutoPlay": true
                                    }'
          class="relative"
        >
          <div class="hs-carousel relative min-h-94 w-full overflow-hidden">
            <div class="hs-carousel-body absolute start-0 top-0 bottom-0 flex flex-nowrap opacity-0 transition-transform duration-700">
              <div class="hs-carousel-slide relative">
                <img src="/images/stock/small-8.jpg" alt="First slide" />
                <div class="text-dark absolute bottom-0 w-full pt-4 pb-4">
                  <h3 class="text-dark mb-2 text-center text-lg">First slide label</h3>
                  <p class="mb-4 text-center">Some representative placeholder content for the first slide.</p>
                </div>
              </div>

              <div class="hs-carousel-slide relative">
                <img src="/images/stock/small-9.jpg" alt="Second slide" />
                <div class="absolute bottom-0 w-full pt-4 pb-4">
                  <h3 class="text-dark mb-2 text-center text-lg">Second slide label</h3>
                  <p class="text-dark mb-4 text-center">Some representative placeholder content for the second slide.</p>
                </div>
              </div>

              <div class="hs-carousel-slide relative">
                <img src="/images/stock/small-10.jpg" alt="Third slide" />
                <div class="absolute bottom-0 w-full pt-4 pb-4">
                  <h3 class="text-dark mb-2 text-center text-lg">Third slide label</h3>
                  <p class="text-dark mb-4 text-center">Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
          </div>

          <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-5 inline-flex items-center justify-center">
            <Icon icon="chevron-left" class="size-8" />
            <span class="sr-only">Previous</span>
          </button>

          <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-5 inline-flex items-center justify-center">
            <Icon icon="chevron-right" class="size-8" />
            <span class="sr-only">Next</span>
          </button>
          <div class="hs-carousel-pagination absolute start-0 end-0 bottom-3 flex justify-center gap-x-2"></div>
        </div>
      </CardWithAction>
    </div>
  </div>
</template>

<script setup lang="ts">
import CardWithAction from '~/components/CardWithAction.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
</script>
