<template>
  <PageBreadcrumb title="Links" subtitle="Base UI" />
  <div class="container">
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
      <CardWithAction title="Colored Links" isCollapsible>
        <p class="text-default-400 mb-4">
          You can apply different colors to links to match your design and highlight important actions. These links include built-in hover and focus states to improve usability and visual feedback. Lighter-colored links should be used on dark backgrounds to ensure proper contrast
          and accessibility.
        </p>

        <div class="flex flex-col gap-4">
          <RouterLink to="" class="text-primary hover:text-primary-hover">Primary link</RouterLink>
          <RouterLink to="" class="text-secondary hover:text-secondary-hover">Secondary link</RouterLink>
          <RouterLink to="" class="text-success hover:text-success-hover">Success link</RouterLink>
          <RouterLink to="" class="text-danger hover:text-danger-hover">Danger link</RouterLink>
          <RouterLink to="" class="text-warning hover:text-warning-hover">Warning link</RouterLink>
          <RouterLink to="" class="text-info hover:text-info-hover">Info link</RouterLink>
          <RouterLink to="" class="text-light hover:text-light-hover">Light link</RouterLink>
          <RouterLink to="" class="text-dark hover:text-dark-hover">Dark link</RouterLink>
          <RouterLink to="" class="text-default-700 hover:text-default-500">Emphasis link</RouterLink>
        </div>
      </CardWithAction>

      <CardWithAction title="Link Utilities" isCollapsible>
        <p class="text-default-400 mb-4">Colored link helpers have been updated to work seamlessly with our link utilities. Use these utilities to control link opacity, underline opacity, and underline offset.</p>

        <div class="flex flex-col gap-4">
          <RouterLink to="" class="text-primary hover:text-primary-hover underline">Primary link</RouterLink>
          <RouterLink to="" class="text-secondary hover:text-secondary-hover underline">Secondary link</RouterLink>
          <RouterLink to="" class="text-success hover:text-success-hover underline">Success link</RouterLink>
          <RouterLink to="" class="text-danger hover:text-danger-hover underline">Danger link</RouterLink>
          <RouterLink to="" class="text-warning hover:text-warning-hover underline">Warning link</RouterLink>
          <RouterLink to="" class="text-info hover:text-info-hover underline">Info link</RouterLink>
          <RouterLink to="" class="text-light hover:text-light-hover underline">Light link</RouterLink>
          <RouterLink to="" class="text-dark hover:text-dark-hover underline">Dark link</RouterLink>
          <RouterLink to="" class="text-default-700 hover:text-default-500 underline">Emphasis link</RouterLink>
        </div>
      </CardWithAction>

      <CardWithAction title="Link Opacity" isCollapsible>
        <p class="text-default-400 mb-4">You can adjust the transparency of link colors using utility options. Keep in mind that reducing opacity may result in links with insufficient contrast.</p>

        <div class="flex flex-col gap-4">
          <RouterLink to="" class="text-primary hover:text-primary-hover opacity-10">Link opacity 10</RouterLink>
          <RouterLink to="" class="text-primary hover:text-primary-hover opacity-25">Link opacity 25</RouterLink>
          <RouterLink to="" class="text-primary hover:text-primary-hover opacity-50">Link opacity 50</RouterLink>
          <RouterLink to="" class="text-primary hover:text-primary-hover opacity-75">Link opacity 75</RouterLink>
          <RouterLink to="" class="text-primary hover:text-primary-hover opacity-100">Link opacity 100</RouterLink>
        </div>
      </CardWithAction>

      <CardWithAction title="Link Hover Opacity" isCollapsible>
        <p class="text-default-400 mb-4">You can even change the opacity level on hover.</p>

        <div class="flex flex-col gap-4">
          <RouterLink to="" class="text-primary hover:text-primary-hover hover:opacity-10">Link opacity 10</RouterLink>
          <RouterLink to="" class="text-primary hover:text-primary-hover hover:opacity-25">Link opacity 25</RouterLink>
          <RouterLink to="" class="text-primary hover:text-primary-hover hover:opacity-50">Link opacity 50</RouterLink>
          <RouterLink to="" class="text-primary hover:text-primary-hover hover:opacity-75">Link opacity 75</RouterLink>
          <RouterLink to="" class="text-primary hover:text-primary-hover hover:opacity-100">Link opacity 100</RouterLink>
        </div>
      </CardWithAction>

      <CardWithAction title="Underline Color" isCollapsible>
        <p class="text-default-400 mb-4">Change the underline’s color independent of the link text color.</p>

        <div class="flex flex-col gap-4">
          <RouterLink to="" class="decoration-primary text-primary hover:text-primary-hover underline">Primary underline</RouterLink>
          <RouterLink to="" class="decoration-secondary text-primary hover:text-primary-hover underline">Secondary underline</RouterLink>
          <RouterLink to="" class="decoration-success text-primary hover:text-primary-hover underline">Success underline</RouterLink>
          <RouterLink to="" class="decoration-danger text-primary hover:text-primary-hover underline">Danger underline</RouterLink>
          <RouterLink to="" class="decoration-warning text-primary hover:text-primary-hover underline">Warning underline</RouterLink>
          <RouterLink to="" class="decoration-info text-primary hover:text-primary-hover underline">Info underline</RouterLink>
          <RouterLink to="" class="decoration-light text-primary hover:text-primary-hover underline">Light underline</RouterLink>
          <RouterLink to="" class="decoration-dark text-primary hover:text-primary-hover underline">Dark underline</RouterLink>
        </div>
      </CardWithAction>

      <CardWithAction title="Underline Opacity" isCollapsible>
        <p class="text-default-400 mb-4">Adjust the underline’s transparency to better match your design. Make sure an underline style is applied first so the opacity changes are visible.</p>

        <div class="flex flex-col gap-4">
          <RouterLink to="" class="decoration-primary/0 text-primary hover:text-primary-hover underline">Underline opacity 0</RouterLink>
          <RouterLink to="" class="decoration-primary/15 text-primary hover:text-primary-hover underline">Underline opacity 10</RouterLink>
          <RouterLink to="" class="decoration-primary/25 text-primary hover:text-primary-hover underline">Underline opacity 25</RouterLink>
          <RouterLink to="" class="decoration-primary/50 text-primary hover:text-primary-hover underline">Underline opacity 50</RouterLink>
          <RouterLink to="" class="decoration-primary/75 text-primary hover:text-primary-hover underline">Underline opacity 75</RouterLink>
          <RouterLink to="" class="decoration-primary text-primary hover:text-primary-hover underline">Underline opacity 100</RouterLink>
        </div>
      </CardWithAction>

      <CardWithAction title="Underline Offset" isCollapsible>
        <p class="text-default-400 mb-4">Change the underline’s opacity to control its visual emphasis. An underline must be applied first so that opacity adjustments can take effect.</p>

        <div class="flex flex-col gap-4">
          <RouterLink to="" class="text-primary hover:text-primary-hover">Default link</RouterLink>

          <RouterLink to="" class="text-primary hover:text-primary-hover underline">Offset 1 link</RouterLink>

          <RouterLink to="" class="text-primary hover:text-primary-hover underline">Offset 2 link</RouterLink>

          <RouterLink to="" class="text-primary hover:text-primary-hover underline">Offset 3 link</RouterLink>
        </div>
      </CardWithAction>

      <CardWithAction title="Hover Variants" isCollapsible>
        <p class="text-default-400 mb-4">These link styling options also include hover states by default. Feel free to combine different settings to create unique and expressive link styles.</p>

        <div class="flex flex-col gap-4">
          <RouterLink to="" class="text-primary hover:text-primary-hover hover:underline">Underline opacity 0</RouterLink>
        </div>
      </CardWithAction>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import CardWithAction from '~/components/CardWithAction.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
</script>
