<template>
  <PageBreadcrumb title="Collapse" subtitle="Base UI" />
  <div class="container">
    <div class="grid xl:grid-cols-2 gap-base">
      <CardWithAction title="Collapse" isCollapsible>
        <div class="mb-4 flex flex-wrap items-center gap-2">
          <button class="hs-collapse-toggle btn bg-primary hover:bg-primary-hover text-white open" data-hs-collapse="#collapseExample">Collapse Button</button>
        </div>

        <div id="collapseExample" class="hs-collapse open w-full overflow-hidden shadow transition-[height] duration-300" aria-labelledby="collapseLink">
          <div class="card border border-dashed border-light card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</div>
        </div>
      </CardWithAction>

      <CardWithAction title="Show/Hide Collapse" isCollapsible>
        <p>This admin UI kit provides a collection of ready-to-use dashboard and interface components built with the utility-first Tailwind CSS framework.</p>

        <div id="show-hide-collapse-heading" class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="show-hide-collapse">
          <p class="mt-2">These components are designed specifically for admin panels, dashboards, and internal tools. The collapsible content supports smooth transitions and can be used to organize advanced settings or additional information without cluttering the interface.</p>
        </div>

        <p class="mt-2">
          <button
            type="button"
            class="hs-collapse-toggle inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-primary decoration-2 hover:primary-hover hover:underline focus:outline-hidden focus:underline focus:primary-hover"
            id="show-hide-collapse"
            aria-expanded="false"
            aria-controls="show-hide-collapse-heading"
            data-hs-collapse="#show-hide-collapse-heading"
          >
            <span class="hs-collapse-open:hidden">Read more</span>
            <span class="hs-collapse-open:block hidden">Read less</span>
            <Icon icon="chevron-up" class="hs-collapse-open:rotate-180 shrink-0 text-base" />
          </button>
        </p>
      </CardWithAction>
    </div>
  </div>
</template>

<script setup lang="ts">
import CardWithAction from '~/components/CardWithAction.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
</script>
