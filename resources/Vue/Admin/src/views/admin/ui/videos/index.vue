<template>
  <PageBreadcrumb title="Videos" subtitle="UI" />
  <div class="container">
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
      <div class="flex flex-col gap-base">
        <CardWithAction title="Responsive embed video 21:9" isCollapsible>
          <div class="relative aspect-21/9 w-full">
            <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" class="h-full w-full"></iframe>
          </div>
        </CardWithAction>

        <CardWithAction title="Responsive embed video 1:1" isCollapsible>
          <div class="relative aspect-square w-full">
            <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" class="h-full w-full"></iframe>
          </div>
        </CardWithAction>
      </div>

      <div class="flex flex-col gap-base">
        <CardWithAction title="Responsive embed video 16:9" isCollapsible>
          <div class="relative aspect-video w-full">
            <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" class="h-full w-full"></iframe>
          </div>
        </CardWithAction>

        <CardWithAction title="Responsive embed video 4:3" isCollapsible>
          <div class="relative aspect-4/3 w-full">
            <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" class="h-full w-full"></iframe>
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

<style scoped></style>
