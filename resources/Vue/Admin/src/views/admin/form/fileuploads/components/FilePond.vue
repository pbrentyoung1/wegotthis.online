<template>
  <div class="card">
    <div class="card-header block">
      <h4 class="card-title mb-1.25">Filepond</h4>
      <p class="text-default-400">A JavaScript library that can upload anything you throw at it, optimizes images for faster uploads, and offers a great, accessible, silky smooth user experience.</p>
    </div>

    <div class="card-body">
      <div class="mb-5">
        <h5 class="mb-5">Basic Example</h5>
        <div class="filepond-uploader">
          <FilePond class="filepond" :files="files" :allow-multiple="true" :max-files="5" :allow-reorder="true" @updatefiles="handleUpdateFiles($event, 'files')" />
        </div>
      </div>

      <div class="mb-5">
        <h5 class="mb-5">Two Grid Example</h5>
        <div class="filepond-uploader two-grid">
          <FilePond class="filepond" :files="files2" :allow-multiple="true" :max-files="5" :allow-reorder="true" @updatefiles="handleUpdateFiles($event, 'files2')" />
        </div>
      </div>

      <div>
        <h5 class="mb-5">Three Grid Example</h5>
        <div class="filepond-uploader three-grid">
          <FilePond class="filepond" :files="files3" :allow-multiple="true" :max-files="5" :allow-reorder="true" @updatefiles="handleUpdateFiles($event, 'files3')" />
        </div>
      </div>
    </div>

    <div class="border-t border-dashed border-default-300"></div>

    <div class="card-body">
      <h4 class="card-title mb-3">Profile Picture</h4>
      <p class="text-default-400 mb-4">FilePond is a JavaScript library with profile picture-shaped file upload variation.</p>

      <div class="grid grid-cols-2 gap-base">
        <div class="col-span-1">
          <div class="size-19.5">
            <FilePond class="filepond filepond-input-circle" :allow-multiple="false" :max-files="1" :accepted-file-types="['image/png', 'image/jpeg', 'image/gif']" style-panel-aspect-ratio="1:1" :label-idle="cameraSvg" />
          </div>
        </div>
        <div class="col-span-1">
          <div class="size-19.5">
            <FilePond class="filepond rounded" :allow-multiple="false" :max-files="1" :accepted-file-types="['image/png', 'image/jpeg', 'image/gif']" style-panel-aspect-ratio="1:1" :label-idle="cameraSvg" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import vueFilePond from 'vue-filepond'

import FilePondPluginImageCrop from 'filepond-plugin-image-crop'
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation'
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'
import FilePondPluginImageResize from 'filepond-plugin-image-resize'
import FilePondPluginImageTransform from 'filepond-plugin-image-transform'

const FilePond = vueFilePond(FilePondPluginImagePreview, FilePondPluginImageExifOrientation, FilePondPluginImageCrop, FilePondPluginImageTransform, FilePondPluginImageResize)

type FilePondFile = {
  lastModified: number
  name: string
  size: number
  type: string
  webkitRelativePath: string
  arrayBuffer: () => Promise<ArrayBuffer>
  slice: (start?: number, end?: number, contentType?: string) => Blob
  stream: () => ReadableStream<Uint8Array>
  text: () => Promise<string>
}

type FileType = string | Blob | FilePondFile

const files = ref<FileType[]>([])
const files2 = ref<FileType[]>([])
const files3 = ref<FileType[]>([])

type FilePondFileItem = {
  file: FileType
  [key: string]: unknown
}

const handleUpdateFiles = (fileItems: FilePondFileItem[], key: 'files' | 'files2' | 'files3') => {
  if (key === 'files') files.value = fileItems.map((f) => f.file)
  if (key === 'files2') files2.value = fileItems.map((f) => f.file)
  if (key === 'files3') files3.value = fileItems.map((f) => f.file)
}

const cameraSvg = `
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
 fill="none" stroke="#9ba6b7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
 class="icon icon-tabler icons-tabler-outline icon-tabler-camera">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"/>
  <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/>
</svg>
`
</script>

<style></style>
