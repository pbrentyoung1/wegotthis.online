<template>
  <div class="bg-light/15 border-default-300 rounded border border-dashed p-6 leading-7">
    <div class="diff-output diff">
      <span v-for="(part, index) in diffOutput" :key="index" :style="part.style">
        {{ part.value }}
      </span>
    </div>
  </div>
</template>

<script setup lang="ts">
import { diffWords } from 'diff'
import { computed } from 'vue'
import { getColor } from '~/utils/helpers'

type Props = {
  originalText: string
  modifiedText: string
}

const props = defineProps<Props>()

const diffOutput = computed(() => {
  const diff = diffWords(props.originalText, props.modifiedText)
  return diff.map((part: any) => {
    let style: Record<string, string> = {}

    if (part.added) {
      style = { backgroundColor: getColor('success-rgb', 0.1), color: getColor('success') }
    } else if (part.removed) {
      style = {
        backgroundColor: getColor('danger-rgb', 0.1),
        color: getColor('danger'),
        textDecoration: 'line-through',
      }
    }

    return { value: part.value, style }
  })
})
</script>

<style></style>
