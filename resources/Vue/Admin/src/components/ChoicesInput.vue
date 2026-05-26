<template>
  <label v-if="label" :for="id" class="form-label text-muted">{{ label }}</label>
  <input ref="inputRef" :type="type ?? 'text'" v-bind="$attrs" />
</template>

<script setup lang="ts">
import { onMounted, ref, type InputTypeHTMLAttribute } from 'vue'

type ChoicesInputPropsType = {
  id: string
  type?: InputTypeHTMLAttribute
  label?: string
  choiceOptions?: object
}

const props = defineProps<ChoicesInputPropsType>()

const inputRef = ref<HTMLInputElement | null>(null)

onMounted(async () => {
  const Choices = (await import('choices.js')).default
  if (inputRef.value) {
    new Choices(inputRef.value, { ...props.choiceOptions })
  }
})
</script>
