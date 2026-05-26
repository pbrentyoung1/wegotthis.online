<template>
  <div class="rounded-lg border-2 border-dashed border-default-300 p-5">
    <form action="/" method="post" class="my-8" id="myAwesomeDropzone" v-bind="getRootProps()">
      <div class="dz-clickable" @change="onChange">
        <div class="dz-message needsclick">
          <input v-bind="getInputProps()" />
          <div class="mx-auto mb-5 size-11">
            <span class="btn btn-icon size-11 rounded-full bg-info/15 text-info">
              <Icon icon="cloud-upload" class="text-2xl" />
            </span>
          </div>
          <h4 class="mb-2.5 text-center text-lg">{{ title }}</h4>
          <p class="mb-5 text-center text-default-400 italic">
            {{ subtitle }}
          </p>
          <div class="flex justify-center">
            <button type="button" class="btn btn-sm border border-default-300 shadow">Browse Images</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="dropzone-previews mt-5"></div>
  <template v-if="state.files.length > 0">
    <div class="card mt-1 border border-dashed border-default-300" v-for="(file, index) in state.files" :key="file.name + index">
      <div class="p-3">
        <div class="flex items-center">
          <div class="px-3">
            <img :src="file.previewUrl" class="size-8 rounded bg-light" alt="" />
          </div>

          <div>
            <a href="#" class="font-semibold text-primary" data-dz-name>{{ file.name }}</a>
            <p class="text-default-400" data-dz-size>{{ getSize(file) }}</p>
          </div>

          <div class="ms-auto">
            <button class="btn btn-sm text-danger" @click="handleClickDeleteFile(index)">
              <Icon icon="x" class="dropzone-close text-xl" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
</template>

<script setup lang="ts">
import { onBeforeUnmount, reactive } from 'vue'
import { useDropzone } from 'vue3-dropzone'
import Icon from './wrappers/Icon.vue'

defineProps({
  title: String,
  subtitle: String,
})

// extend File with previewUrl
type FileWithPreview = File & { previewUrl: string }

// reactive state
const state = reactive<{ files: FileWithPreview[] }>({
  files: [],
})

// dropzone setup
function onDrop(acceptFiles: File[]) {
  const newFiles = acceptFiles.map((file) => {
    const f = file as FileWithPreview
    f.previewUrl = URL.createObjectURL(file)
    return f
  })
  state.files.push(...newFiles)
}

const { getRootProps, getInputProps } = useDropzone({
  onDrop,
  multiple: true,
})

// delete file + cleanup
function handleClickDeleteFile(index: number) {
  const file = state.files[index]
  if (file?.previewUrl) {
    URL.revokeObjectURL(file.previewUrl)
  }
  state.files.splice(index, 1)
}

// cleanup all previews on unmount
onBeforeUnmount(() => {
  state.files.forEach((file: FileWithPreview) => {
    if (file.previewUrl) URL.revokeObjectURL(file.previewUrl)
  })
})

// file size helper
function getSize(file: File | undefined) {
  if (!file) return ''
  if (file.size / (1024 * 1024) >= 1) {
    return (file.size / (1024 * 1024)).toFixed(2) + ' MB'
  }
  return (file.size / 1024).toFixed(2) + ' KB'
}

function onChange() {
  if (state.files[0]) {
    getSize(state.files[0])
  }
}
</script>
