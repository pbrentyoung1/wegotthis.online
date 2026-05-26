<template>
  <PageBreadcrumb title="PDF Viewer" subtitle="Plugins" />

  <div class="grid lg:grid-cols-1 gap-base">
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          <div class="inline-flex text-nowrap">
            <button id="prev" class="btn bg-dark rounded-e-none text-white" @click="prevPage" :disabled="pageNumber <= 1">
              <Icon icon="arrow-left"></Icon>
              <span class="hidden sm:inline">Previous</span>
            </button>

            <button id="next" class="btn bg-dark rounded-none text-white" @click="nextPage" :disabled="totalPages > 0 && pageNumber >= totalPages">
              <Icon icon="arrow-right"></Icon>
              <span class="hidden sm:inline">Next</span>
            </button>

            <button id="zoomin" class="btn bg-dark rounded-none text-white" @click="onZoomIn">
              <Icon icon="zoom-in"></Icon>
              <span class="hidden sm:inline">Zoom In</span>
            </button>

            <button id="zoomout" class="btn bg-dark rounded-none text-white" @click="onZoomOut">
              <Icon icon="zoom-in"></Icon>
              <span class="hidden sm:inline">Zoom Out</span>
            </button>

            <button id="zoomfit" class="btn bg-dark rounded-s-none text-white" @click="onZoomReset">100%</button>

            <div class="flex">
              <input type="number" class="form-input ms-3 rounded-e-none!" id="page_num" v-model.number="pageInput" @change="onPageInputChange" style="width: 50px" />
              <span class="border-default-300 flex rounded-e border border-s-0 px-3 py-1.5 bg-light/15" id="page_count">/ {{ totalPages || '--' }}</span>
            </div>
          </div>
        </div>

        <div class="mt-3 flex justify-center overflow-auto text-center">
          <span id="the-canvas" class="pdfcanvas border-default-300 rounded-lg border">
            <PDF
              ref="pdfRef"
              :src="pdfSrc"
              :show-progress="true"
              :pdf-width="calculatedWidth + 'px'"
              @num-pages="onPages"
              @numpages="onPages"
              @on-numpages="onPages"
              @pdf-init="onPdfInit"
              @on-pdf-init="onPdfInit"
              @page-change="onPageChangeInternal"
              @on-page-change="onPageChangeInternal"
              v-model:page="pageNumber"
            />
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, ref, watch } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
const pdfSrc = 'https://raw.githubusercontent.com/mozilla/pdf.js/ba2edeae/web/compressed.tracemonkey-pldi-09.pdf'

const pdfRef = ref<any>(null)
const totalPages = ref(0)
const pageNumber = ref(1)
const pageInput = ref(1)
const scale = ref(1.5)

const calculatedWidth = computed(() => {
  return Math.round(920 * scale.value)
})

watch(pageNumber, (newVal) => {
  pageInput.value = newVal
})

const onPages = (n: any) => {
  if (typeof n === 'number') {
    totalPages.value = n
  } else if (n && typeof n.numPages === 'number') {
    totalPages.value = n.numPages
  } else if (typeof n === 'string') {
    const parsed = parseInt(n)
    if (!isNaN(parsed)) totalPages.value = parsed
  }
}

const onPdfInit = (pdf: any) => {
  if (pdf && typeof pdf.numPages === 'number') {
    totalPages.value = pdf.numPages
  }
}

const onPageChangeInternal = (page: any) => {
  if (typeof page === 'number') {
    pageNumber.value = page
  }
}

const nextPage = () => {
  if (totalPages.value === 0 || pageNumber.value < totalPages.value) {
    pageNumber.value++
  }
}

const prevPage = () => {
  if (pageNumber.value > 1) {
    pageNumber.value--
  }
}

const onZoomIn = () => {
  if (scale.value >= 3) return
  scale.value = Number((scale.value + 0.2).toFixed(1))
}

const onZoomOut = () => {
  if (scale.value <= 0.5) return
  scale.value = Number((scale.value - 0.2).toFixed(1))
}

const onZoomReset = () => {
  scale.value = 1
}

const onPageInputChange = () => {
  const value = pageInput.value
  if (!isNaN(value) && value > 0 && (totalPages.value === 0 || value <= totalPages.value)) {
    pageNumber.value = value
  } else {
    pageInput.value = pageNumber.value
  }
}
</script>

<style></style>
