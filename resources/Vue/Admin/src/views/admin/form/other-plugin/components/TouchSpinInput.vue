<template>
  <div :class="[vertical ? 'flex items-center overflow-hidden' : 'input-group', className]" data-touchspin>
    <template v-if="vertical">
      <div class="flex flex-col">
        <button v-bind="incrementButtonProps" :class="incrementButtonProps?.class ?? 'btn bg-light'" :disabled="incrementButtonProps?.disabled ?? (disabled || localValue >= max)" @click="increment">
          <Icon icon="plus" />
        </button>
        <button v-bind="decrementButtonProps" :class="decrementButtonProps.class ?? incrementButtonProps?.class ?? 'btn bg-light'" :disabled="incrementButtonProps?.disabled ?? (disabled || localValue <= min)" @click="decrement">
          <Icon icon="minus" />
        </button>
      </div>
      <input type="number" :min="min" :max="max" :value="localValue" @input="handleChange" :class="['form-input w-full', inputClassName, size ? `form-input-${size}` : '']" :readonly="readonly" :disabled="disabled" />
    </template>

    <template v-else>
      <button v-bind="incrementButtonProps" :class="incrementButtonProps?.class ?? 'btn bg-light'" :disabled="incrementButtonProps?.disabled ?? (disabled || localValue <= min)" @click="decrement">
        <Icon icon="minus" />
      </button>
      <input type="number" :min="min" :max="max" :value="localValue" @input="handleChange" :class="['form-input', inputClassName, size ? `form-input-${size}` : '']" :readonly="readonly" :disabled="disabled" />
      <button v-bind="incrementButtonProps" :class="incrementButtonProps?.class ?? 'btn bg-light'" :disabled="incrementButtonProps?.disabled ?? (disabled || localValue >= max)" @click="increment">
        <Icon icon="plus" />
      </button>
    </template>
  </div>
</template>

<script lang="ts" setup>
import { ref, watch } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'

type HTMLButtonAttributes = Record<string, any>

type TouchSpinType = {
  min?: number
  max?: number
  value?: number
  setValue?: (value: number) => void
  inputClassName?: string
  className?: string
  incrementButtonProps: HTMLButtonAttributes
  decrementButtonProps?: HTMLButtonAttributes
  size?: string
  vertical?: boolean
  disabled?: boolean
  readonly?: boolean
}

const props = withDefaults(defineProps<TouchSpinType>(), {
  decrementButtonProps: () => ({}),
  max: 100,
  min: 0,
  readonly: false,
  inputClassName: '',
  size: '',
  value: 100,
  vertical: false,
  disabled: false,
  className: '',
})

const { incrementButtonProps, decrementButtonProps, max, min, readonly, inputClassName, size, setValue, vertical, disabled, className } = props

const localValue = ref(props.value)

watch(localValue, (val) => {
  if (setValue) {
    setValue(val)
  }
})

watch(
  () => props.value,
  (val) => {
    if (val !== undefined) {
      localValue.value = val
    }
  }
)

function increment() {
  if (readonly || localValue.value >= max) return
  localValue.value++
}

function decrement() {
  if (readonly || localValue.value <= min) return
  localValue.value--
}

function handleChange(event: Event) {
  const target = event.target as HTMLInputElement
  const val = target.value

  if (val === '') {
    localValue.value = min
    return
  }

  const newValue = parseInt(val)
  if (!isNaN(newValue)) {
    if (newValue < min) {
      localValue.value = min
    } else if (newValue > max) {
      localValue.value = max
    } else {
      localValue.value = newValue
    }
  }
}
</script>
