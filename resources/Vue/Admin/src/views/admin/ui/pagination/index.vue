<template>
  <PageBreadcrumb title="Pagination" subtitle="Base UI" />
  <div class="container">
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
      <div class="flex gap-base flex-col">
        <CardWithAction title="Default Pagination" isCollapsible>
          <nav class="flex items-center -space-x-px" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary inline-flex items-center justify-center gap-x-1.5 border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-label="Previous">
              <span>Previous</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md">2</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary inline-flex items-center justify-center gap-x-1.5 border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-label="Next">
              <span>Next</span>
            </button>
          </nav>
        </CardWithAction>

        <CardWithAction title="Alignment" isCollapsible>
          <nav class="mb-4 flex items-center justify-center -space-x-px" aria-label="Pagination">
            <button type="button" class="text-default-400 border-default-300 inline-flex items-center justify-center gap-x-1.5 border px-3 py-1.5 first:rounded-s-md last:rounded-e-md" aria-label="Previous" disabled>
              <span>Previous</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md">2</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary inline-flex items-center justify-center gap-x-1.5 border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-label="Next">
              <span>Next</span>
            </button>
          </nav>

          <nav class="flex items-center justify-end -space-x-px" aria-label="Pagination">
            <button type="button" class="text-default-400 border-default-300 inline-flex items-center justify-center gap-x-1.5 border px-3 py-1.5 first:rounded-s-md last:rounded-e-md" aria-label="Previous" disabled>
              <span>Previous</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md">2</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary inline-flex items-center justify-center gap-x-1.5 border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-label="Next">
              <span>Next</span>
            </button>
          </nav>
        </CardWithAction>

        <CardWithAction title="Custom Color Pagination" isCollapsible>
          <nav class="mb-4 flex items-center gap-1.5" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Previous">
              <Icon icon="chevron-left" />
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="bg-info flex size-8.75 items-center justify-center rounded text-white">2</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">4</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">5</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Next">
              <Icon icon="chevron-right" />
            </button>
          </nav>

          <nav class="flex items-center gap-1.5" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Previous">
              <Icon icon="arrow-left" />
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">2</button>
            <button type="button" class="bg-secondary flex size-8.75 items-center justify-center rounded text-white">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">4</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">5</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Next">
              <Icon icon="arrow-right" />
            </button>
          </nav>
        </CardWithAction>

        <CardWithAction title="Disabled and active states" isCollapsible>
          <nav class="flex items-center -space-x-px" aria-label="Pagination">
            <button type="button" class="text-default-400 border-default-300 inline-flex items-center justify-center gap-x-1.5 border px-3 py-1.5 first:rounded-s-md last:rounded-e-md" aria-label="Previous" disabled>
              <span>Previous</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="bg-primary flex items-center justify-center border border-primary px-3 py-1.5 text-white transition-all duration-300">2</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-3 py-1.5 transition-all duration-300">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary inline-flex items-center justify-center gap-x-1.5 border px-3 py-1.5 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-label="Next">
              <span>Next</span>
            </button>
          </nav>
        </CardWithAction>

        <CardWithAction title="Custom Icon Pagination" isCollapsible>
          <nav class="mb-4 flex items-center gap-1.5" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Previous">
              <Icon icon="chevron-left" />
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="bg-primary flex size-8.75 items-center justify-center rounded text-white">2</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">4</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">5</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Next">
              <Icon icon="chevron-right" />
            </button>
          </nav>

          <nav class="flex items-center gap-1.5" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Previous">
              <Icon icon="arrow-left" />
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">2</button>
            <button type="button" class="bg-primary flex size-8.75 items-center justify-center rounded text-white">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">4</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">5</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Next">
              <Icon icon="arrow-right" />
            </button>
          </nav>
        </CardWithAction>
      </div>

      <div class="flex gap-base flex-col">
        <CardWithAction title="Sizing" isCollapsible>
          <nav class="mb-4 flex items-center -space-x-px" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary inline-flex items-center justify-center gap-x-1.5 border px-6 py-3 text-base transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-label="Previous">
              <span class="text-base">«</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-6 py-3 text-base transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-6 py-3 text-base transition-all duration-300 first:rounded-s-md last:rounded-e-md">2</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-6 py-3 text-base transition-all duration-300 first:rounded-s-md last:rounded-e-md">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary inline-flex items-center justify-center gap-x-1.5 border px-6 py-3 text-base transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-label="Next">
              <span class="text-base">»</span>
            </button>
          </nav>

          <nav class="flex items-center -space-x-px" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary inline-flex items-center justify-center gap-x-1.5 border px-2 py-1 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-label="Previous">
              <span>«</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-2 py-1 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-2 py-1 transition-all duration-300 first:rounded-s-md last:rounded-e-md">2</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex items-center justify-center border px-2 py-1 transition-all duration-300 first:rounded-s-md last:rounded-e-md">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary inline-flex items-center justify-center gap-x-1.5 border px-2 py-1 transition-all duration-300 first:rounded-s-md last:rounded-e-md" aria-label="Next">
              <span>»</span>
            </button>
          </nav>
        </CardWithAction>

        <CardWithAction title="Boxed Pagination" isCollapsible>
          <nav class="mb-4 flex items-center gap-1.5" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Previous">
              <span>«</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">2</button>
            <button type="button" class="bg-primary flex size-8.75 items-center justify-center rounded text-white">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">4</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded border transition-all duration-300">5</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Next">
              <span>»</span>
            </button>
          </nav>

          <nav class="mb-4 flex items-center gap-1.5" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-12.5 items-center justify-center gap-x-1.5 rounded border text-base transition-all duration-300" aria-label="Previous">
              <span>«</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-12.5 items-center justify-center rounded border text-base transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-12.5 items-center justify-center rounded border text-base transition-all duration-300">2</button>
            <button type="button" class="bg-primary flex size-12.5 items-center justify-center rounded text-base text-white">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-12.5 items-center justify-center rounded border text-base transition-all duration-300">4</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-12.5 items-center justify-center rounded border text-base transition-all duration-300">5</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-12.5 items-center justify-center gap-x-1.5 rounded border text-base transition-all duration-300" aria-label="Next">
              <span>»</span>
            </button>
          </nav>

          <nav class="flex items-center gap-1.5" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-7.25 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Previous">
              <span>«</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-7.25 items-center justify-center rounded border transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-7.25 items-center justify-center rounded border transition-all duration-300">2</button>
            <button type="button" class="bg-primary flex size-7.25 items-center justify-center rounded text-white">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-7.25 items-center justify-center rounded border transition-all duration-300">4</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-7.25 items-center justify-center rounded border transition-all duration-300">5</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-7.25 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Next">
              <span>»</span>
            </button>
          </nav>
        </CardWithAction>

        <CardWithAction title="Rounded Pagination" isCollapsible>
          <nav class="flex items-center gap-1.5" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded-full border transition-all duration-300" aria-label="Previous">
              <span>«</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded-full border transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded-full border transition-all duration-300">2</button>
            <button type="button" class="bg-primary flex size-8.75 items-center justify-center rounded-full text-white">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded-full border transition-all duration-300">4</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center rounded-full border transition-all duration-300">5</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-primary flex size-8.75 items-center justify-center gap-x-1.5 rounded-full border transition-all duration-300" aria-label="Next">
              <span>»</span>
            </button>
          </nav>
        </CardWithAction>

        <CardWithAction title="Soft Pagination" isCollapsible>
          <nav class="flex items-center gap-1.5" aria-label="Pagination">
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-danger flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Previous">
              <span>«</span>
            </button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-danger flex size-8.75 items-center justify-center rounded border transition-all duration-300" aria-current="page">1</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-danger flex size-8.75 items-center justify-center rounded border transition-all duration-300">2</button>
            <button type="button" class="text-danger bg-danger/10 flex size-8.75 items-center justify-center rounded">3</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-danger flex size-8.75 items-center justify-center rounded border transition-all duration-300">4</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-danger flex size-8.75 items-center justify-center rounded border transition-all duration-300">5</button>
            <button type="button" class="border-default-300 hover:bg-default-100 hover:text-danger flex size-8.75 items-center justify-center gap-x-1.5 rounded border transition-all duration-300" aria-label="Next">
              <span>»</span>
            </button>
          </nav>
        </CardWithAction>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import CardWithAction from '~/components/CardWithAction.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
</script>
