<template>
  <PageBreadcrumb title="Carousel" subtitle="UI" />

  <div class="container-xxl">
    <BRow>
      <BCol xl="12">
        <BCard no-body>
          <BCardHeader>
            <BCardTitle tag="h4">Examples</BCardTitle>
          </BCardHeader>

          <BCardBody>
            <p class="text-muted mb-2">A slideshow component for cycling through elements—images or slides of text—like a carousel.</p>

            <Link class="btn btn-link p-0 fw-semibold" href="https://bootstrap-vue-next.github.io/bootstrap-vue-next/docs/components/carousel.html" target="_blank">
              Carousel on Bootstrap
              <Icon icon="chevron-right" class="ms-1" />
            </Link>
          </BCardBody>
        </BCard>
      </BCol>

      <BCol lg="6">
        <CardWithAction title="Slides Only" isCollapsable>
          <BCarousel ride="carousel">
            <BCarouselSlide img-src="/images/stock/small-1.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-2.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-3.jpg" class="img-fluid" />
          </BCarousel>
        </CardWithAction>
      </BCol>

      <BCol lg="6">
        <CardWithAction title="With Controls" isCollapsable>
          <BCarousel controls ride="carousel">
            <BCarouselSlide img-src="/images/stock/small-4.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-1.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-2.jpg" class="img-fluid" />
          </BCarousel>
        </CardWithAction>
      </BCol>

      <BCol lg="6">
        <CardWithAction title="With Indicators" isCollapsable>
          <BCarousel controls indicators ride="carousel">
            <BCarouselSlide img-src="/images/stock/small-3.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-2.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-1.jpg" class="img-fluid" />
          </BCarousel>
        </CardWithAction>
      </BCol>

      <BCol lg="6">
        <CardWithAction title="With Captions" isCollapsable>
          <BCarousel id="carouselCaptions" controls ride="carousel">
            <BCarouselSlide img-src="/images/stock/small-1.jpg" caption="First slide label" text="Some representative placeholder content for the first slide." class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-3.jpg" caption="Second slide label" text="Some representative placeholder content for the second slide." class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-2.jpg" caption="Third slide label" text="Some representative placeholder content for the third slide." class="img-fluid" />
          </BCarousel>
        </CardWithAction>
      </BCol>

      <BCol lg="6">
        <CardWithAction title="Crossfade" isCollapsable>
          <BCarousel id="carouselCrossfade" controls indicators fade ride="carousel">
            <BCarouselSlide img-src="/images/stock/small-1.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-2.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-3.jpg" class="img-fluid" />
          </BCarousel>
        </CardWithAction>
      </BCol>

      <BCol lg="6">
        <CardWithAction title="Interval (Custom speed)" isCollapsable>
          <BCarousel id="carouselInterval" controls indicators :interval="2000" ride="carousel">
            <BCarouselSlide img-src="/images/stock/small-4.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-3.jpg" class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-2.jpg" class="img-fluid" />
          </BCarousel>
        </CardWithAction>
      </BCol>

      <BCol lg="6">
        <CardWithAction title="Dark Variant" isCollapsable>
          <BCarousel controls indicators ride="carousel" class="carousel-dark">
            <BCarouselSlide img-src="/images/stock/small-8.jpg" caption="First slide label" text="Dark variant text example." class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-9.jpg" caption="Second slide label" text="Dark variant text example." class="img-fluid" />
            <BCarouselSlide img-src="/images/stock/small-10.jpg" caption="Third slide label" text="Dark variant text example." class="img-fluid" />
          </BCarousel>
        </CardWithAction>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody, BCardHeader, BCardTitle, BCarousel, BCarouselSlide, BCol, BRow } from 'bootstrap-vue-next'
import CardWithAction from '@/components/CardWithAction.vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
</script>

<style scoped></style>
