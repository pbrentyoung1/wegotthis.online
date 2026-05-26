<template>
  <PageBreadcrumb title="Videos" subtitle="UI" />

  <div class="container-xxl">
    <BRow>
      <BCol xl="12">
        <CardWithAction title="Embed Videos">
          <p class="text-muted mb-2">Use generated pseudo elements to make an element maintain the aspect ratio of your choosing. Perfect for responsively handling video or slideshow embeds based on the width of the parent.</p>

          <Link class="btn btn-link p-0 fw-semibold" href="https://getbootstrap.com/docs/5.3/helpers/ratio/" target="_blank">
            Ratios on Bootstrap
            <Icon icon="chevron-right" class="ms-1" />
          </Link>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Responsive embed video 21:9" isCollapsable>
          <div class="ratio ratio-21x9">
            <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
          </div>
        </CardWithAction>

        <CardWithAction title="Responsive embed video 1:1" isCollapsable>
          <div class="ratio ratio-1x1">
            <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
          </div>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Responsive embed video 16:9" isCollapsable>
          <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
          </div>
        </CardWithAction>

        <CardWithAction title="Responsive embed video 4:3" isCollapsable>
          <div class="ratio ratio-4x3">
            <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
          </div>
        </CardWithAction>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCol, BRow } from 'bootstrap-vue-next'
import CardWithAction from '@/components/CardWithAction.vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
</script>
