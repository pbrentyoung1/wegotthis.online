<template>
  <PageBreadcrumb title="Breadcrumb" subtitle="Base UI" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic</h4>
        </div>

        <div class="card-body">
          <nav class="py-2.5">
            <ol class="flex items-center whitespace-nowrap">
              <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Home</li>
            </ol>
          </nav>

          <nav class="py-2.5">
            <ol class="flex items-center whitespace-nowrap">
              <li class="inline-flex items-center">
                <RouterLink class="text-default-600 hover:text-primary flex items-center font-medium" href="#">Home</RouterLink>
                <Icon icon="chevron-right" class="text-default-400 m-0.75 text-base pe-1" />
              </li>

              <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Library</li>
            </ol>
          </nav>

          <nav class="py-2.5">
            <ol class="flex items-center whitespace-nowrap">
              <li class="inline-flex items-center">
                <RouterLink class="text-default-600 hover:text-primary flex items-center font-medium" href="#">Home</RouterLink>
                <Icon icon="chevron-right" class="text-default-400 m-0.75 text-base pe-1" />
              </li>

              <li class="inline-flex items-center">
                <RouterLink class="text-default-600 hover:text-primary flex items-center font-medium" href="#">Library</RouterLink>
                <Icon icon="chevron-right" class="text-default-400 m-0.75 text-base pe-1" />
              </li>

              <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Data</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">With Icons</h4>
        </div>

        <div class="card-body">
          <nav class="bg-light/50 p-2.5 mb-2.5">
            <ol class="flex items-center whitespace-nowrap">
              <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">
                <Icon icon="smart-home" class="me-2 text-sm" />
                Home
              </li>
            </ol>
          </nav>

          <nav class="bg-light/50 p-2.5 mb-2.5">
            <ol class="flex items-center whitespace-nowrap">
              <li class="inline-flex items-center">
                <RouterLink class="hover:text-primary flex items-center font-medium" href="#"> <Icon icon="smart-home" class="me-1.25" /> Home </RouterLink>
                <Icon icon="chevron-right" class="text-default-400 m-0.75 text-base pe-1" />
              </li>

              <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Library</li>
            </ol>
          </nav>

          <nav class="bg-light/50 p-2.5">
            <ol class="flex items-center whitespace-nowrap">
              <li class="inline-flex items-center">
                <RouterLink class="hover:text-primary flex items-center font-medium" href="#">
                  <Icon icon="smart-home" class="me-1 text-sm" />
                  Home
                </RouterLink>
                <Icon icon="chevron-right" class="text-default-400 m-0.75 text-base pe-1" />
              </li>

              <li class="inline-flex items-center">
                <RouterLink class="hover:text-primary flex items-center font-medium" href="#">Library</RouterLink>
                <Icon icon="chevron-right" class="text-default-400 m-0.75 text-base pe-1" />
              </li>
              <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Data</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
</script>

<style scoped></style>
