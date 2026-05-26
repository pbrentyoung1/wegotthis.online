<template>
  <PageBreadcrumb title="Social Feed" subtitle="Apps" />
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-base">
      <div>
        <SocialProfile />
      </div>

      <div class="mb-5 lg:col-span-2 lg:mb-0">
        <Feeds />
      </div>

      <div>
        <div class="flex flex-col gap-base">
          <SidebarWidgets />
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Feeds from './components/Feeds.vue'
import SidebarWidgets from './components/SidebarWidgets.vue'
import SocialProfile from './components/SocialProfile.vue'
</script>
<style></style>
