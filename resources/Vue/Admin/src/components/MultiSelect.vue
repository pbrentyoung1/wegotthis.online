<template>
  <Multiselect v-model="internalValue" ref="ref1" :options="options" :multiple="multiple" :close-on-select="closeOnSelect" :clear-on-select="clearOnSelect" :preserve-search="preserveSearch" :placeholder="placeholder" track-by="value" label="label" v-bind="$attrs" />
</template>

<script setup lang="ts">
import { onMounted, ref, watch } from 'vue'
import Multiselect from 'vue-multiselect'

const ref1 = ref()

type Option = {
  value: string | number
  label: string
}

const props = defineProps<{
  modelValue?: string | number | Array<string | number>
  options: Option[]
  multiple?: boolean
  closeOnSelect?: boolean
  clearOnSelect?: boolean
  preserveSearch?: boolean
  placeholder?: string
  isOpen?: boolean
}>()

const emit = defineEmits(['update:modelValue'])

const internalValue = ref(props.modelValue)

watch(internalValue, (val) => {
  emit('update:modelValue', val)
})

onMounted(() => {
  if (props.isOpen) {
    ref1.value.activate()
  }
})
</script>
